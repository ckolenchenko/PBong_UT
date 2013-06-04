<?php
add_action('init',array('ut','registerShortcodes'));
require('ut_config.php');

class ut{

	public function __construct(){}
//______________________________________________________________________________

	public static function registerShortcodes(){

		$ut_obj = new ut();
		add_shortcode('DO_UT', array($ut_obj,'doUt'));

	}
//______________________________________________________________________________

	public function doUt(){	//******************	Tests    *********************
		$suites = new PHPUnit_Framework_TestSuite( 'Package' );


		$is_all	= TRUE;


		if(!isset($is_all)){

			$suites->addTestSuite( 'BpongAPI_0_Suite' );


		}else{
			$suites->addTestSuite( 'API_0_Suite' );
			$suites->addTestSuite( 'BpongAPI_0_Suite' );
		}

		echo '<pre style="font-size:12px;">';
			PHPUnit_TextUI_TestRunner::run( $suites );$suites = NULL;
		echo '</pre>';
	}
//_____________________________________________________________________________

}//	Class End












// /**
//  * @Copyright (c) 2011 Yukon Software™, Ukraine. All rights reserved.
//  * Created on 03-08-2011.
//  */
// // error_reporting(E_ALL);
// error_reporting(E_ERROR);
// require_once ('config.php');

// $is_browser = isset( $_GET['is_brs'] );
// echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'.
// '<html  xmlns="http://www.w3.org/1999/xhtml">'.
// '<head>'.
// 	'<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'.
// 	'<link REL="SHORTCUT ICON" HREF="Test005.png">'.
// 	'<title>CA Unit Tests</title>'.
// '</head>'.
// '<body>'.
// 'Host: '.$Host.' / DB: '.$DBName."\n".
// ( $is_browser  ? '<pre style="font-size:12px;">' : '');

// $is_all	= (TRUE);
// // $is_all	= FALSE;///////////////////////////////////****************************///////////////

// if( !$is_all ){
// 	echo "\n".'<div style="'.$ttl_style.'">Debug Mode</div>';
// 	$suites = new PHPUnit_Framework_TestSuite( 'Package' );

// 	$suites->addTestSuite( 'Synch_0_Suite' );
// 	$suites->addTestSuite( 'Widget_2_Suite' );

// 	PHPUnit_TextUI_TestRunner::run( $suites );$suites = NULL;
// }else{
// 	echo "\n".'<div style="'.$ttl_style.'">Groupe 1</div>';
// 	$suites = new PHPUnit_Framework_TestSuite( 'Package' );
// 	foreach( $group1 as $suit_name ) $suites->addTestSuite( $suit_name );
// 	PHPUnit_TextUI_TestRunner::run( $suites );$suites = NULL;

// 	echo "\n".'<div style="'.$ttl_style.'">Groupe 2</div>';
// 	$suites = new PHPUnit_Framework_TestSuite( 'Package' );
// 	foreach( $group2 as $suit_name ) $suites->addTestSuite( $suit_name );
// 	PHPUnit_TextUI_TestRunner::run( $suites );$suites = NULL;
// }
// echo ( $is_browser ? '</pre>' : '' ).
// '</body></html>';
// //Max Quantity dots in one line of tests is 63
