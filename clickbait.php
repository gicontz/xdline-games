<?php 
	include_once('functions.php');
	session_start();
	$uid = $_SESSION['xdl_part_details']['user_id'];

	$getUser = $XDL::select("*", "pervert_table", "`user_id` = $uid", "config.ini");

	if($getUser[0] == ""){
		$insertPervert = $XDL::insert("pervert_table", array('user_id' => $uid,
															'number_of_clicks' => 1), "SUCCESS", "FAIL", "config.ini");
	}else{
		$newClickCount = $getUser[0]['number_of_clicks'] + 1;
		$updateClicks = $XDL::update("pervert_table", array('number_of_clicks' => $newClickCount ), "`user_id` = '$uid'", "SUCCESS", "FAIL", "config.ini");
	}

 ?>