<?php


class Sanitize {

	public static function escape()
	{
		 return htmlentities($string, ENT_QUOTES, 'UTF-8');
	}


}