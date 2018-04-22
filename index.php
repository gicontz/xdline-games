<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>XDLINE GAMES - LOGIN</title>
	<?php getHeaderAssets(); 
	session_start();
	if (isset($_SESSION['xdl_part_details'])){
		header('location: game.php?page=mission');
	} ?>
</head>
<body>
<div class = "container">
	<div class="wrapper">
		<form method="post" class="form-signin">       
		    <h3 class="form-signin-heading">Welcome Participant!<br> Please Sign In</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="Username" placeholder="Username" required autofocus="" id="un" /><br>
			  <input type="password" class="form-control" name="Password" placeholder="Password" required id="pw" /> 

               <div class="form-group">
                <div class="col-sm-12">
                  <div class="alert fade in">
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <p>Wrong Password or Username.</p>
                  </div>
                </div>  
                </div>      		  
			 
			  <button class="btn btn-lg btn-primary btn-block btn-login"  name="Submit" value="Login">Login</button>  			
		</form>			
	</div>
</div>
<?php getFooterContents(); ?>
</body>
</html>