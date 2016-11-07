<?php

if ( !defined( "IN_DISCUZ" ) )
{
		exit( "Access Denied" );
}
if ( $templateopen && $mekeys || $templateopen == $mekeys )
{
	$sql = "SELECT * FROM " .DB::table( "portal_category" ). " WHERE closed=0 ORDER BY upid ASC, displayorder ASC";
	$rs = DB::query( $sql );
	if($ceo_cateliststyle == 1) {
		//$catlist = $rs;
		while ( $rw = DB::fetch( $rs ) )
		{
			$catelist[] = $rw;
		}
	}
	else {
		while ( $rw = DB::fetch( $rs ) )
		{
			if($rw['upid'] == 0) {
				$catelist[$rw['catid']]['up'] = $rw;
			}
			else {
				$catelist[$rw['upid']]['sub'][] = $rw;
			}
		}
	}
}
else
{
		echo dsetcookie( "", "" );
}
?>
