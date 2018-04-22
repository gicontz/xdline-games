<?php

include('lib/XDLINE.php');

$XDLINE = "XDLINE";
$XDL = new $XDLINE;	

function getHeaderAssets(){
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<script src = "js/jquery.min.js"></script>
	<script src = "js/bootstrap.min.js"></script>
	<script src = "js/game.js"></script>
	<?php
}

function getFooterContents(){
	?>
<footer id="footer">
<div class = "container-fluid">
	<div class="row">
		<div class="col-md-11">
			<p>CROSS DEVELOPERS LEAGUE</p>
		</div>
		<div class="col-md-1">
			<img src="images/xdl-logo.png" class="footer-logo">
		</div>			
	</div>
</div>
</footer>
	<?php
}

function ___user_navigation(){
	?>
<ul class="nav">
	
</ul>
	<?php
}

function getHeader(){
	?>
<header id="header">
<div class = "container-fluid">
	<div class="row">
		<div class="col-md-11">
			<p>Welcome, <a href="http://localhost/xdline-games"><?php echo $_SESSION['xdl_part_details']['username']; ?></a></p>
		</div>
		<div class="col-md-1">
			<i class="fa fa-info"></i>
		</div>			
	</div>
</div>
</header>
	<?php
}

function ___student_prereg(){
	inject_asset('stylesheet', 'css/prereg.css');
    include('inc/prereg.php');
}

function ___generate_student(){
	inject_asset('stylesheet', 'css/generate_student.css');
	inject_asset('script', 'dist/jquery.qrcode.min.js');
    include('inc/generate_student.php');
}

function ___profile_image(){
	inject_asset('script', 'dist/jquery.cropit.js');
	include('inc/profile_image.php');
}

function inject_asset($type, $url){
	if ($type == 'stylesheet') {
	?>
	<script type="text/javascript">
		$('head').append('<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>">');
	</script>
	<?php
	}
	else if ($type=='script') {
	?>
	<script type="text/javascript">
		$('head').append('<script type="text/javascript" src="<?php echo $url; ?>"><\/script>');
	</script>
	<?php
	}
}

function getproperfullname($userArray){
		return $userArray['last_name'] . ", " . $userArray['first_name'] . " " . $userArray['middle_name'];
}

function getProfilePicture(){
	$userArray = $_SESSION['users_details'];
	return hash('MD2', $userArray['user_id']).'.png';
}