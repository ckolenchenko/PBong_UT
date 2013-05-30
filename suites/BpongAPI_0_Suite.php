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

	public function test_getResourceCollection(){global $isUtErr;										//	_is_1_1
	if($isUtErr||(!self::_is_1_1&&!self::_is_all)){$this->is_clear_db=false;$this->markTestSkipped();}
		include( BPONG_EVENT_MGMT_DIR.'/tests/settings/UT_std_vars.php' );$isErr=TRUE;

		$bpong_obj	= new BpongEventMgmt\BpongAPI();
		$events = $bpong_obj->getResourceCollection( 'Registrations' );

// print_r( $events );



// 		$bp_obj	= new \BpongEventMgmt\BpongAPI();
// 		$api_response	= $bp_obj->getResourceByURI( '/Events' );

// 		$events	= UT_utils::normalizeTestsItems( $api_response['Events'], 'Event', 'name', '/ut_tests event/');

// 		$count	= count( $events );
// 		$this->assertEquals( 8, $count, "\n*** Assert 1 ***\nWrong quantity of events was found.\n" );

		$isUtErr=FALSE;
	}
//______________________________________________________________________________ _UT_ORG_CODE

}//  Class End

//	$this->assertEquals( $expected, $real, "\n*** Assert 1 ***\nInfo\n" );
//	$this->assertTrue( $condition, "\n*** Assert 1 ***\nInfo\n");
