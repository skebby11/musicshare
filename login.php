<?php 

include('functions.php');
if (isLoggedIn()) {
		header('location: home.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!--<link rel="stylesheet" type="text/css" href="assets/css/style.css?v1.1.51">-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
	<div class="header">
		<img src="" width="80%">	
	</div>
	<div class="menu">
		<ul>
 		 <li><a href="index.php">Home</a></li>
  		 <li><a href="myfiles.php">My files</a></li>
  		 <li><a href="settings.php">Settings</a></li>
		</ul>
		<!-- logged in user information -->
		<div class="profile_info" align="right"> 

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php else : ?>
				<ul class="login">
 		 		<li class="login"><a href="login.php">Login</a></li>
  		 		<li class="login"><a class="active" href="register.php">Signup</a></li>
				</ul>

				<?php endif ?>
			</div>
		</div>
	</div>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>

			<input type="text" name="goto" style="visibility: hidden" value="<?php echo $goto; ?>">

		<div class="input-group">
			<button type="submit" class="btn blue" name="login_btn">Login</button>
		</div>
		
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


</body>
</html>