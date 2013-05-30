<?php
/**
 * Copyright (c) 2012 Yukon Software, Ukraine. All rights reserved.
 * Created on 03-07-2012.
 */


/**
* @backupGlobals disabled
*/
class API_0_Suite extends PHPUnit_Framework_TestCase{private $is_clear_db=TRUE;
	const _is_all = TRUE;   //  FALSE  TRUE

	const _is_1_1	= FALSE;
	const _is_1_2	= FALSE;
	const _is_1_3	= FALSE;

	const _is_2_1	= FALSE;

	const _is_3_1	= TRUE;


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

	public function test_getAllEvents(){global $isUtErr;										//	_is_1_1
	if($isUtErr||(!self::_is_1_1&&!self::_is_all)){$this->is_clear_db=false;$this->markTestSkipped();}
		include( BPONG_EVENT_MGMT_DIR.'/tests/settings/UT_std_vars.php' );$isErr=TRUE;

		$bp_obj	= new \BpongEventMgmt\BpongAPI();
		$api_response	= $bp_obj->getResourceByURI( '/Events' );

		$events	= UT_utils::normalizeTestsItems( $api_response['Events'], 'Event', 'name', '/ut_tests event/');

		$count	= count( $events );
		$this->assertEquals( 8, $count, "\n*** Assert 1 ***\nWrong quantity of events was found.\n" );

		$isUtErr=FALSE;
	}
//______________________________________________________________________________ _UT_ORG_CODE

	public function test_getAllEvents__ObjAll(){global $isUtErr;								//	_is_1_2
	if($isUtErr||(!self::_is_1_2&&!self::_is_all)){$this->is_clear_db=false;$this->markTestSkipped();}
		include( BPONG_EVENT_MGMT_DIR.'/tests/settings/UT_std_vars.php' );$isErr=TRUE;

		$bp_obj	= new \BpongEventMgmt\BpongAPI();
		$api_response	= $bp_obj->getResourceByURI( '/Events?objects=*' );

		$events	= UT_utils::normalizeTestsItems( $api_response['Events'], 'Event', 'name', '/ut_tests event/');

		$count	= count( $events );
		$this->assertEquals( 8, $count, "\n*** Assert 1 ***\nWrong quantity of events was found.\n" );

		$evt	= $events[0];
		$this->assertTrue( array_key_exists('Organization', $evt ), "\n*** Assert 2 ***\n`Organization` object was not found.\n");
		$this->assertTrue( array_key_exists('ParentEvent', $evt ), "\n*** Assert 3 ***\n`ParentEvent` object was not found.\n");
		$this->assertTrue( array_key_exists('Venue', $evt ), "\n*** Assert 4 ***\n`Venue` object was not found.\n");
		$this->assertTrue( array_key_exists('EventStructure', $evt ), "\n*** Assert 5 ***\n`EventStructure` object was not found.\n");
		$this->assertTrue( array_key_exists('EventType', $evt ), "\n*** Assert 6 ***\n`EventType` object was not found.\n");

		$this->assertTrue( array_key_exists('Tickets', $evt ), "\n*** Assert 7 ***\n`Tickets` object was not found.\n");
		$this->assertTrue( array_key_exists('EventAttributes', $evt ), "\n*** Assert 8 ***\n`EventAttributes` object was not found.\n");
		$this->assertTrue( array_key_exists('Games', $evt ), "\n*** Assert 9 ***\n`Games` object was not found.\n");
		$this->assertTrue( array_key_exists('Teams', $evt ), "\n*** Assert 10 ***\n`Teams` object was not found.\n");
		$this->assertTrue( array_key_exists('Registrations', $evt ), "\n*** Assert 11 ***\n`Registrations` object was not found.\n");
		$this->assertTrue( array_key_exists('Promotions', $evt ), "\n*** Assert 12 ***\n`Promotions` object was not found.\n");


		$isUtErr=FALSE;
	}
//______________________________________________________________________________ _UT_ORG_CODE

	public function test_getAllEvents__Obj_Organization_Tickets(){global $isUtErr;				//	_is_1_3
	if($isUtErr||(!self::_is_1_3&&!self::_is_all)){$this->is_clear_db=false;$this->markTestSkipped();}
		include( BPONG_EVENT_MGMT_DIR.'/tests/settings/UT_std_vars.php' );$isErr=TRUE;

		$bp_obj	= new \BpongEventMgmt\BpongAPI();
		$api_response	= $bp_obj->getResourceByURI( '/Events?objects=Organization,Tickets' );

		$events	= UT_utils::normalizeTestsItems( $api_response['Events'], 'Event', 'name', '/ut_tests event/');

		$count	= count( $events );
		$this->assertEquals( 8, $count, "\n*** Assert 1 ***\nWrong quantity of events was found.\n" );

		$evt	= $events[0];
		$this->assertTrue( array_key_exists('Organization', $evt ), "\n*** Assert 2 ***\n`Organization` object was not found.\n");
		$this->assertFalse( array_key_exists('ParentEvent', $evt ), "\n*** Assert 3 ***\n`ParentEvent` object was found.\n");
		$this->assertFalse( array_key_exists('Venue', $evt ), "\n*** Assert 4 ***\n`Venue` object was found.\n");
		$this->assertFalse( array_key_exists('EventStructure', $evt ), "\n*** Assert 5 ***\n`EventStructure` object was found.\n");
		$this->assertFalse( array_key_exists('EventType', $evt ), "\n*** Assert 6 ***\n`EventType` object was found.\n");

		$this->assertTrue( array_key_exists('Tickets', $evt ), "\n*** Assert 7 ***\n`Tickets` object was not found.\n");
		$this->assertFalse( array_key_exists('EventAttributes', $evt ), "\n*** Assert 8 ***\n`EventAttributes` object was found.\n");
		$this->assertFalse( array_key_exists('Games', $evt ), "\n*** Assert 9 ***\n`Games` object was found.\n");
		$this->assertFalse( array_key_exists('Teams', $evt ), "\n*** Assert 10 ***\n`Teams` object was found.\n");
		$this->assertFalse( array_key_exists('Registrations', $evt ), "\n*** Assert 11 ***\n`Registrations` object was found.\n");
		$this->assertFalse( array_key_exists('Promotions', $evt ), "\n*** Assert 12 ***\n`Promotions` object was found.\n");


		$isUtErr=FALSE;
	}
//______________________________________________________________________________ _UT_ORG_CODE


	public function test_getAllEvents__SearchObj_Organization(){global $isUtErr;						//	_is_2_1
	if($isUtErr||(!self::_is_2_1&&!self::_is_all)){$this->is_clear_db=false;$this->markTestSkipped();}
		include( BPONG_EVENT_MGMT_DIR.'/tests/settings/UT_std_vars.php' );$isErr=TRUE;

		$bp_obj	= new \BpongEventMgmt\BpongAPI();
		$api_response	= $bp_obj->getResourceByURI( '/Events?objects=Tickets&search_fields=Organization.name,Venue.city&search_pattern=_tests_A' );

		$events	= UT_utils::normalizeTestsItems( $api_response['Events'], 'Event', 'name', '/ut_tests event/', TRUE );


		$count	= count( $events );

		$this->assertEquals( 5, $count, "\n*** Assert 1 ***\nWrong quantity of events was found.\n" );


		$evt	= $events[0];
		$this->assertTrue( array_key_exists('Organization', $evt ), "\n*** Assert 2 ***\n`Organization` object was not found.\n");
		$this->assertFalse( array_key_exists('ParentEvent', $evt ), "\n*** Assert 3 ***\n`ParentEvent` object was found.\n");
		$this->assertTrue( array_key_exists('Venue', $evt ), "\n*** Assert 4 ***\n`Venue` object was not found.\n");
		$this->assertFalse( array_key_exists('EventStructure', $evt ), "\n*** Assert 5 ***\n`EventStructure` object was found.\n");
		$this->assertFalse( array_key_exists('EventType', $evt ), "\n*** Assert 6 ***\n`EventType` object was found.\n");

		$this->assertTrue( array_key_exists('Tickets', $evt ), "\n*** Assert 7 ***\n`Tickets` object was not found.\n");
		$this->assertFalse( array_key_exists('EventAttributes', $evt ), "\n*** Assert 8 ***\n`EventAttributes` object was found.\n");
		$this->assertFalse( array_key_exists('Games', $evt ), "\n*** Assert 9 ***\n`Games` object was found.\n");
		$this->assertFalse( array_key_exists('Teams', $evt ), "\n*** Assert 10 ***\n`Teams` object was found.\n");
		$this->assertFalse( array_key_exists('Registrations', $evt ), "\n*** Assert 11 ***\n`Registrations` object was found.\n");
		$this->assertFalse( array_key_exists('Promotions', $evt ), "\n*** Assert 12 ***\n`Promotions` object was found.\n");


		$isUtErr=FALSE;
	}
//______________________________________________________________________________ _UT_ORG_CODE


	public function test_getAllEvents__Filter(){global $isUtErr;								//	_is_3_1
	if($isUtErr||(!self::_is_3_1&&!self::_is_all)){$this->is_clear_db=false;$this->markTestSkipped();}
		include( BPONG_EVENT_MGMT_DIR.'/tests/settings/UT_std_vars.php' );$isErr=TRUE;

		$uri	= '/Events';

		$filter = urlencode( '(Organization.name LIKE \'%_tests_A%\')OR(Venue.city LIKE \'%_tests_A%\')' );

		$uri	.=
			'?filter='.$filter.
		'';

		$bp_obj	= new \BpongEventMgmt\BpongAPI();
		$api_response	= $bp_obj->getResourceByURI( $uri );
		$events	= UT_utils::normalizeTestsItems( $api_response['Events'], 'Event', 'name', '/ut_tests event/', TRUE );

		$this->assertEquals( 5, count( $events ), "\n*** Assert 1 ***\nWrong quantity of events was found.\n" );

		foreach( $events as $event ){

			$org	= $event['Organization'];
			$venue	= $event['Venue'];

			$condition	= (bool)preg_match( '/_tests_A/', $org['name'] )||(bool)preg_match( '/_tests_A/', $venue['city'] );

			$this->assertTrue( $condition, "\n*** Assert 2 ***\nPattern does not match.\n");
		}

		$isUtErr=FALSE;
	}
//______________________________________________________________________________ _UT_ORG_CODE


}//  Class End

//	$this->assertEquals( $expected, $real, "\n*** Assert 1 ***\nInfo\n" );
//	$this->assertTrue( $condition, "\n*** Assert 1 ***\nInfo\n");
