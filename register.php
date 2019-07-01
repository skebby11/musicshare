<?php
	include('functions.php');

	if (isLoggedIn()) {
		header('location: home.php');
	}

	$up_id = uniqid(); 
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Register // MS</title>
<meta name="description" content="" />
<meta http-equiv="language" content="it" />
<meta name="language" content="it" />
<!--Progress Bar and iframe Styling-->
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="forms.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>


<div class="menu">
	<ul>
	 <li><a class="menu" href="home.php">Home</a></li>
	 <li><a href="myfiles.php" class="menu">My files</a></li>
	 <!--<li><a href="settings.php" class="menu">Settings</a></li>-->
	<!-- logged in user information -->
	<?php  if (isset($_SESSION['user'])) : ?>
		<li class="right"><strong>Ciao, <?php echo $_SESSION['user']['username']; ?></strong><br><small> <a href="home.php?logout='1'" style="color: red;">logout</a> </small></li>
	<?php else : ?>
	<li style="float:right"><a href="login.php" class="menu">Login</a></li>
	<li style="float:right"><a href="register.php" class="menu active">Signup</a></li>
	<?php endif ?>
	</ul>
	</div>
</div>
	
<div class="header">
	<!--<img src="">-->
</div>
	
	<p class="title"><z class="m">REGIS</i><z class="s">TER</i></b></p>

<!-- notification message -->
<?php if (isset($_SESSION['success'])) : ?>
	<div class="error success" >
		<h3> <i class="fa fa-check"></i>
			<?php 
				echo $_SESSION['success']; 
				unset($_SESSION['success']);
			?>
		</h3>
	</div>
<?php endif ?>
	
<div class="form-container">
	<form enctype="multipart/form-data" action="register.php" method="post">
	Nome <br> <input type="text" name="name"><br><br>
	Username <br> <input type="text" name="username"><br><br>
	Email <br> <input type="email" name="email"><br><br>
	Password <br> <input type="password" name="password_1"><br><br>
	Psw di nuovo <br> <input type="password" name="password_2"><br><br>
	<input type="submit" value="Register" name="register_btn"> <br><br>
	Oppure <a href="login.php">login</a>
</div>
<div class="credits">
	<p>&copy <?php echo $year; ?> | Creato da <a href="https://www.sebastianoriva.it/" target="_blank" style="color: #FFFFFF">Sebastiano Riva</a></p>
</div>
</body>
</html> 


