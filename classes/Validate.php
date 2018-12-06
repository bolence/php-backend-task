
<?php


class Validate {


    private $passed = false;
    private $errors = array();
    private $db     = null;
    
    /**
     * Db instance
     */
    public function __construct() {
        $this->db = DB::getInstance();
    }
    
    /**
     * Check inputs
     * @param  String $source POST/GET
     * @param  Array  $items 
     * @return 
     */
    public function check($source , $items = array()) {

        foreach($items as $item => $rules)
        {
            foreach ($rules as $rule => $rule_value)
            {
 
                $value = trim($source[$item]);
                // $item = escape_str($item); 
                if($rule === 'required' && empty($value))
                {
                    $this->addError("{$item} is required");
                } 
                else if (!empty ($value))
                {
                    switch ($rule)
                    {
                        case 'min':
                            if(strlen($value) < $rule_value)
                            {
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                            break;
                        
                        case 'max':
                            if(strlen($value) > $rule_value)
                            {
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }
                            break;
                        
                        case 'matches':
                            if($value != $source[$rule_value])
                            {
                                $this->addError("{$rule_value} must match {$item}");
                            }
                            break;
                        
                        case 'unique':
                                $check = $this->db->get($rule_value, array($item,'=',$value));
                                if($check->count())
                                {
                                    $this->addError("{$item} already exists.");
                                }
                            break;
                    }
                }
                
            }
        }
        
        if(empty($this->errors))
        {
            $this->passed = true;    
        }
        
        return $this;
    }

    /**
     * Add error to array of errors
     * @param Array
     */
    private function addError( $error ) {
        $this->errors[] = $error;
    }
    
    /**
     * Errors
     */
    public function errors() {
        return $this->errors;
    }

    /**
     * If validation passed
     * @return [type] [description]
     */
    public function passed() {
        return $this->passed;
    }
}
?>