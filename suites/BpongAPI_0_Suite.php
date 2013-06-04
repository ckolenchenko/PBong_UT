<?php
/**
 * Copyright (c) 2012 Yukon Software, Ukraine. All rights reserved.
 * Created on 03-07-2012.
 */


/**
* @backupGlobals disabled
*/
class BpongAPI_0_Suite extends PHPUnit_Framework_TestCase{private $is_clear_db=TRUE;
	const _is_all = TRUE;   //  FALSE  TRUE

	const _is_1_1	= TRUE;
	const _is_1_2	= FALSE;


	protected function setUp(){
// 		session_tuning::initSessionData();
    }
//______________________________________________________________________________ _UT_ORG_CODE

	protected function tearDown(){
// 		if( $this->is_clear_db ){
// 			UT_utils::deleteOrgData();
// 		}
	}
//______________________________________________________________________________ _UT_ORG_CODE

	public function test_getResourceCollection_Params(){global $isUtErr;										//	_is_1_1
	if($isUtErr||(!self::_is_1_1&&!self::_is_all)){$this->is_clear_db=false;$this->markTestSkipped();}
		include( BPONG_EVENT_MGMT_DIR.'/tests/settings/UT_std_vars.php' );$isErr=TRUE;

		$bpong_obj	= new BpongEventMgmt\BpongAPI();
		$events = $bpong_obj->getResourceCollection( 'Events', -1, 0, array());
		$events	= $events['Events'];


		foreach( $events as $event ){

			$event	= $event['Event'];

			if( preg_match('/UT_ut_tests event 001/', $event['name'] ))
				break;
		}

		$event_id	= $event['id'];


		$params	= array(
			'event_id'	=> $event_id,
			'objects'	=> 'Users'
		);

		$regs = $bpong_obj->getResourceCollection( 'Registrations', -1, 0, $params );
		$regs	= $regs['Registrations'];

		$reg	= $regs[0]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNB/', $user['first_name'], "\n*** Assert 1 ***\nWrong item after sorting.\n" );

		$reg	= $regs[1]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNC/', $user['first_name'], "\n*** Assert 2 ***\nWrong item after sorting.\n" );


		$params	= array(
			'event_id'	=> $event_id,
			'objects'	=> 'Users',
			'sort'		=> 'User.first_name',
			'order'		=> 'ASC'
		);
		$regs = $bpong_obj->getResourceCollection( 'Registrations', -1, 0, $params );
		$regs	= $regs['Registrations'];

		$reg	= $regs[0]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNA/', $user['first_name'], "\n*** Assert 3 ***\nWrong item after sorting.\n" );

		$reg	= $regs[1]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNB/', $user['first_name'], "\n*** Assert 4 ***\nWrong item after sorting.\n" );


		$params	= array(
			'event_id'	=> $event_id,
			'objects'	=> 'Users',
			'sort'		=> 'User.first_name',
			'order'		=> 'DESC'
		);
		$regs = $bpong_obj->getResourceCollection( 'Registrations', -1, 0, $params );
		$regs	= $regs['Registrations'];

// print_r( $regs );


		$reg	= $regs[0]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNJ/', $user['first_name'], "\n*** Assert 5 ***\nWrong item after sorting.\n" );

		$reg	= $regs[1]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNI/', $user['first_name'], "\n*** Assert 6 ***\nWrong item after sorting.\n" );


		$params	= array(//For sorting only
			'event_id'	=> $event_id,
			'objects'	=> 'Users',
			'sort'		=> 'User.first_name',
			'order'		=> 'ASC'
		);
		$regs = $bpong_obj->getResourceCollection( 'Registrations', -1, 0, $params );
		$regs	= $regs['Registrations'];

		$reg	= $regs[0]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNA/', $user['first_name'], "\n*** Assert 7 ***\nWrong item after sorting.\n" );

		$reg	= $regs[1]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNB/', $user['first_name'], "\n*** Assert 8 ***\nWrong item after sorting.\n" );
/**/

		$isUtErr=FALSE;
	}
//______________________________________________________________________________ _UT_ORG_CODE

	public function test_getResourceCollection_OrderBy(){global $isUtErr;										//	_is_1_2
	if($isUtErr||(!self::_is_1_2&&!self::_is_all)){$this->is_clear_db=false;$this->markTestSkipped();}
		include( BPONG_EVENT_MGMT_DIR.'/tests/settings/UT_std_vars.php' );$isErr=TRUE;

		$bpong_obj	= new BpongEventMgmt\BpongAPI();
		$events = $bpong_obj->getResourceCollection( 'Events', -1, 0, array());
		$events	= $events['Events'];


		foreach( $events as $event ){

			$event	= $event['Event'];

			if( preg_match('/UT_ut_tests event 001/', $event['name'] ))
				break;
		}

		$event_id	= $event['id'];


		$params	= array(
			'event_id'	=> $event_id,
			'objects'	=> 'Users'
		);

		$order_by	= FALSE;

		$regs = $bpong_obj->getResourceCollection( 'Registrations', -1, 0, $params, $order_by );
		$regs	= $regs['Registrations'];

		$reg	= $regs[0]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNB/', $user['first_name'], "\n*** Assert 1 ***\nWrong item after sorting.\n" );

		$reg	= $regs[1]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNC/', $user['first_name'], "\n*** Assert 2 ***\nWrong item after sorting.\n" );


		$order_by	= array(
			'sort'		=> 'User.first_name',
			'order'		=> 'ASC'
		);

		$regs = $bpong_obj->getResourceCollection( 'Registrations', -1, 0, $params, $order_by );
		$regs	= $regs['Registrations'];

		$reg	= $regs[0]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNA/', $user['first_name'], "\n*** Assert 3 ***\nWrong item after sorting.\n" );

		$reg	= $regs[1]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNB/', $user['first_name'], "\n*** Assert 4 ***\nWrong item after sorting.\n" );


		$order_by	= array(
			'sort'		=> 'User.first_name',
			'order'		=> 'DESC'
		);

		$regs = $bpong_obj->getResourceCollection( 'Registrations', -1, 0, $params, $order_by );
		$regs	= $regs['Registrations'];

		$reg	= $regs[0]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNJ/', $user['first_name'], "\n*** Assert 5 ***\nWrong item after sorting.\n" );

		$reg	= $regs[1]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNI/', $user['first_name'], "\n*** Assert 6 ***\nWrong item after sorting.\n" );
 /**/

		$order_by	= 'User.first_name';

// echo "\n\norderBy1: $order_by\n\n";


		$regs = $bpong_obj->getResourceCollection( 'Registrations', -1, 0, $params, $order_by );
		$regs	= $regs['Registrations'];

		$reg	= $regs[0]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNA/', $user['first_name'], "\n*** Assert 7 ***\nWrong item after sorting.\n" );

		$reg	= $regs[1]['Registration'];
		$user	= $reg['User'];
		$this->assertRegExp( '/UtUser_FNB/', $user['first_name'], "\n*** Assert 8 ***\nWrong item after sorting.\n" );
 /**/

		$isUtErr=FALSE;
	}
//______________________________________________________________________________ _UT_ORG_CODE

}//  Class End

//	$this->assertEquals( $expected, $real, "\n*** Assert 1 ***\nInfo\n" );
//	$this->assertTrue( $condition, "\n*** Assert 1 ***\nInfo\n");
