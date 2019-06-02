<?php
	include('functions.php');

	$dwfile = $_GET['fileid'];

	$query = "SELECT * FROM uploads WHERE id=" . $dwfile;
	$result = mysqli_query($db, $query);
	while($row = mysqli_fetch_array($result)){
		$owner = $row['owner'];
		$filename = $row['filename'];
		$size = $row['size'];
		$ext = $row['ext'];
		$date = $row['date'];
		$origname = $row['origname'];
		
		if ($size >= 1048576)
        {
            $size = number_format($size / 1048576, 2) . ' MB';
        }
		elseif ($size >= 1024)
        {
            $size = number_format($size / 1024, 2) . ' KB';
        }
        elseif ($size > 1)
        {
            $size = $size . ' bytes';
		}
	}

	$query = "SELECT username, idunique FROM ms_users WHERE ID = $owner";
	$result = mysqli_query($db, $query);
	while($row = mysqli_fetch_array($result)){
		$uploader = $row['username'];
		$unique = $row['idunique'];
		
	}
echo $query;
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $origname; ?> // MS</title>
<meta name="description" content="" />
<meta http-equiv="language" content="it" />
<meta name="language" content="it" />
<!--Progress Bar and iframe Styling-->
<link href="style.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--Get jQuery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script>
</head>

<body>


<div class="menu">
	<ul>
	 <li><a href="home.php" class="menu">Home</a></li>
	 <li><a href="myfiles.php" class="menu">My files</a></li>
	 <!--<li><a href="settings.php" class="menu">Settings</a></li>-->
	<!-- logged in user information -->
	<?php  if (isset($_SESSION['user'])) : ?>
		<li class="right"><strong>Ciao, <?php echo $_SESSION['user']['username']; ?></strong><br><small> <a href="home.php?logout='1'" style="color: red;">logout</a> </small></li>
	<?php else : ?>
	<li style="float:right"><a href="login.php">Login</a></li>
	<li style="float:right"><a href="register.php">Signup</a></li>
	<?php endif ?>
	</ul>
	</div>
</div>
	
<div class="header">
	<!--<img src="">-->
	<p class="title"><z class="m">MUSIC</i><z class="s">SHARE</i></b></p>
</div>

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
		
	<?php
	echo "<div class='dwfile'><a href='uploads/$unique/$filename'><b>$origname</b></a><br><br>
	Grandezza <i>$size</i><br>
	Caricato il <i>$date</i><br>
	da <i>$uploader</i><br><br>
	<a href='uploads/$unique/$filename'><input type='button' class='dwbtn' value='Scarica'></a></div>"; ?>
	
</div>
<div class="credits">
	<p>Creato da Sebastiano Riva</p>
</div>
</body>
</html> 


