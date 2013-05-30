<?php

class UT_utils{

	public static function normalizeTestsItems( $items, $model, $index, $pattern, $isAll=FALSE ){

		$itms	= array();
		foreach( $items as $ind => $item ){
			$itm	= $item["$model"];

			if( !$isAll && !(bool)preg_match( $pattern, $itm["$index"] ))
				unset($items[$ind]);

			else
				$itms[]	= $itm;
		}

		return $itms;
	}
//______________________________________________________________________________

}//	Class end
