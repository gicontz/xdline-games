<?php
include_once('../functions.php');

session_start();

$info = $_POST['info'];

$team_answer = $XDL::select("COUNT('point_id')", "points_table", "mission_num = {$info['mission_num']} and difficulty = '{$info['difficulty']}' and item_num = {$info['item_num']} and team_id = {$_SESSION['xdl_part_details']['team_id']}")[0]["COUNT('point_id')"];

if($team_answer == 0) {

$number_of_correct_answer = $XDL::select("COUNT('point_id')", "points_table", "mission_num = {$info['mission_num']} and difficulty = '{$info['difficulty']}' and item_num = {$info['item_num']}")[0]["COUNT('point_id')"];
$dif = "{$info['difficulty']}";

if($dif == "easy") $main_score = 10;
if($dif == "average") $main_score = 20;
if($dif == "difficult") $main_score = 30;


if($dif == "easy") $deduct_score = 1;
if($dif == "average") $deduct_score = 2;
if($dif == "difficult") $deduct_score = 3;

$to_add_score = $main_score - ($number_of_correct_answer * $deduct_score);
$score = $to_add_score <= 0 ? 1 : $to_add_score;

echo $XDL::insert("points_table", array(
	"team_id" => $_SESSION['xdl_part_details']['team_id'],
	"student_id" => $_SESSION['xdl_part_details']['user_id'],
	"score" => $score,
	"mission_num" => $info['mission_num'],
	"difficulty" => $info['difficulty'],
	"item_num" => $info['item_num']
	), "SUCCESS", "ERROR");
}
else{
	echo "GG";
}

?>