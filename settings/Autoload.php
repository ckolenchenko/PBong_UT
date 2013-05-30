<?php
function UT_autoload( $className ){

    if( strpos( $className, '_Suite' )){

    	$file_name	= _UT_SUITS_DIR . $className . '.php';

    	include $file_name;

    }
}

spl_autoload_register( 'UT_autoload' );
