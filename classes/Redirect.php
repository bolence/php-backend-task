<?php




class Redirect {


public static function to( $location = NULL ) 
{
	if( !is_null( $location) && !is_numeric($location) ) {

		return header('Location:' . $location);

	} else {

		return header('Location: /pages/404.php');

	}
}



}