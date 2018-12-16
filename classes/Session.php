<?php

namespace Classes;

class Session {
    
    
    /**
     * [exists description]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    public static function session_exists ( $name ) {

        return (isset($_SESSION[$name])) ? true : false;

    }

    /**
     * [put description]
     * @param  [type] $name  [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public static function session_put( $name, $value ) {

        return $_SESSION[$name] = $value;

    }

    
    /**
     * [get description]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    public static function session_get( $name ) {

        return $_SESSION[$name];

    }

    /**
     * [delete description]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    public static function session_delete( $name ) {

        if( self::session_exists($name) )
        {

            unset($_SESSION[$name]);
            session_destroy();

        }

    }

    
    // public static function flash($name, $string = '') {
    //     if(self::exists($name))
    //     {
    //         $session = self::get($name);
    //         self::delete($name);
    //         return $session;
    //     } else {
    //         self::put($name, $string);
                    
    //     }
    //     return '';
    // }

}