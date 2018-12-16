<?php



function dd($string)
{
	return die($string);
}


function clean( $string ) {

	return htmlspecialchars( $string );

}


function hashing( $string ) {
    
    return hash('sha256', $string );

}
