<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>XDLINE GAMES - LOGIN</title>
	<?php
	getHeaderAssets(); 
	session_start();
	?>
</head>
<body>
	<?php getHeader(); ?>
	<div class = "container">

		<?php if($_REQUEST['page'] == 'mission') : ?>
			<div class="mission-levels levels">
				<div class="row">
					<div class="eas-level level col-md-offset-1 col-md-4 col-sm-12" id="mission-1" data-toggle="modal" 
					data-target="#access_mission" data-dismiss="modal">
					<p>MISSION 1</p>
				</div>
				<div class="dif-level level col-md-offset-2 col-md-4 col-sm-12" id="mission-2" data-toggle="modal" 
				data-target="#access_mission" data-dismiss="modal">
				<p>MISSION 2</p>					
			</div>
		</div>
	</div>

	<div class="modal fade" id="access_mission" role="dialog" style="overflow-y: hidden;">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="post" name="access_form" class="form-orgsignin form-signin">       
					<h3 class="form-signin-heading">ORGANIZER PASSWORD</h3>
					<hr class="colorgraph"><br>

					<input type="password" class="form-control" name="orgpass" placeholder="Password" 
					required="" autofocus="" id="orgpass" />
					<br>   		  

					<button class="btn btn-lg btn-primary btn-block"  name="org_pass" value="confirm" type="Submit">SUBMIT</button>  			
				</form>	
				<div class="modal-footer">
					<button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php if($_REQUEST['page'] == 'mission1' || $_REQUEST['page'] == 'mission2') : 
if(!isset($_SESSION['xdl_part_details'])){
	header('location: ?page=mission');
}
?>
<div id="mission-content">
	<div class="content-quest">
	</div>
			<script type="text/javascript">
				$(".content-quest").load('contents/'+'<?php echo $_REQUEST['page']; ?>'+'.html');
			</script>
<div class="text-center">
	<button type="button" class="btn btn-primary" data-toggle="modal" 
	data-target="#modal_answer" data-dismiss="modal">
	ANSWER
</button>
</div>

<div class="levels">
	<div class="row">
		<div class="eas-level level col-md-4 col-sm-12" id="easy">
			<p>EASY</p>
		</div>
		<div class="ave-level level col-md-4 col-sm-12" id="average">
			<p>AVERAGE</p>					
		</div>
		<div class="dif-level level col-md-4 col-sm-12" id="difficult">
			<p>DIFFICULT</p>					
		</div>
	</div>
</div>
</div>

<div class="modal fade" id="modal_answer" role="dialog" style="overflow-y: hidden;">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post" name="answer_form" class="form-signin">       
				<h3 class="form-signin-heading">SUBMIT YOUR ANSWER</h3>
				<hr class="colorgraph"><br>

				<input type="text" class="form-control" name="answer" placeholder="Answer" required="" autofocus="" />
				<br>   		  

				<button class="btn btn-lg btn-primary btn-block"  name="send_answer" value="Login" type="Submit">SUBMIT</button>  			
			</form>	
			<div class="modal-footer">
				<button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_questions" role="dialog" style="overflow-y: hidden;">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-footer">
				<button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">

</div>

<?php endif; ?>
</div>

<?php getFooterContents(); ?>
</body>
</html>