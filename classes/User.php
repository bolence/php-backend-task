<?php


class User {

	private $db
	        ,$sessionName
	        ,$data
	        ,$isLoggedIn = FALSE;

	/**
	 * Construct of User class
	 * @param Integer $user
	 */
	public function __construct( $user = null )
	{
		$this->db = DB::getInstance();

		$this->sessionName = Config::get('session/session_name');

		// check if user already logged in
		if( !is_null($user)) {

			if( $this->isLoginIn($this->sessionName) ) {
				$this->isLoggedIn = TRUE;
			} else {

				$this->loginOut($this->sessionName);

			}

		} else {
			$this->findUser( $user );
		}
	} 


	/**
	 * Find user in users table
	 * @param  [int] $user
	 * @return Boolean
	 */
	public function findUser( $user )
	{

		 if($user){

            $field = (is_numeric($user)) ? 'id' : 'email';

            $data = $this->db->get('users', array($field, '=', $user));

            if($data->count()){
                $this->data = $data->first();
                return $this->data;
            }
        }

        return false;

	}


	/**
	 * Create new user and save to db
	 * @param  Array $fields 
	 * @return [type]         [description]
	 */
	public function createNewUser( $fields = array() )
	{

	if($this->db->insert('users', $fields))
        {
            if( $this->db->error() === TRUE )
            {
                throw new Exception('There was a problem creating an account');
            }
        }

    }


    /**
     * Login user into application
     * @param  [type] $email    [description]
     * @param  [type] $password [description]
     * @return [type]           [description]
     */
	public function loginUser( $email, $password )
	{

		$user = $this->findUser( $email );



		if( $user ) {

			if( $this->data()->password == HASH::make($password) && $this->data()->email == $email) {

				Session::put($this->sessionName, $this->data()->id);

				return TRUE;

			}

		return FALSE;

	}

}



	/**
	 * [is_logged_in description]
	 * @return boolean
	 */
    public function isLoginIn() {
     

        if ( Session::exists($this->sessionName) ) {
            return true;
        }

        return false;
    }


    /**
     * [logged_out description]
     * @return [type] [description]
     */
    public function loginOut($session_name)
    {
    	return Session::delete($session_name);

    }

     public function exists() 
     {
        return ( !empty($this->data) ) ? TRUE : FALSE;
     }

     public function data() 
     {
        return $this->data;
     }



}