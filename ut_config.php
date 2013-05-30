<?php
define( '_UT_DIR', dirname(__FILE__).'/' );
define( '_UT_SUITS_DIR', _UT_DIR . 'suites/' );

global $isUtErr;
$isUtErr	= FALSE;

require_once( 'PHPUnit/Autoload.php' );

require_once( 'settings/UT_utils.php' );
require_once( 'settings/Autoload.php' );
