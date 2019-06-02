<?php
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "Devi prima eseguire il login";
		header('location: login.php');
	}

	$up_id = uniqid(); 
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home // MS</title>
<meta name="description" content="" />
<meta http-equiv="language" content="it" />
<meta name="language" content="it" />
<!--Progress Bar and iframe Styling-->
<link href="style.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--Get jQuery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script>
	
<script language="javascript" type="text/javascript">

// allow all extensions
var exts = "";

// only allow specific extensions
// var exts = "jpg|jpeg|gif|png|bmp|tiff|pdf";

function checkExtension(value)
{
    if(value=="")return true;
    var re = new RegExp("^.+\.("+exts+")$","i");
    if(!re.test(value))
    {
        alert("Your file extension is not allowed: \n" + value + "\n\nOnly the following extensions are allowed: "+exts.replace(/\|/g,',')+" \n\n");
        return false;
    }

    return true;
}

$(document).ready(function() { 
//

//show the progress bar only if a file field was clicked
	var show_bar = 0;
    $('input[type="file"]').click(function(){
		show_bar = 1;
    });

//show iframe on form submit
    $("#upload-form").submit(function(){

		if (show_bar === 1) { 
			$('#progress-frame').show();
			function set () {
				$('#progress-frame').attr('src','progress-frame.php?up_id=<?php echo $up_id; ?>');
			}
			setTimeout(set);
		}
    });
//

});


var next_id=0;

var max_number =20;

	function _add_more() {
		
		if (next_id>=max_number)
		{
			alert("You reached maximum number of 20 files!");
			return;
		}

		next_id=next_id+1;
		var next_div=next_id+1;
		var txt = "<br><input type=\"file\" name=\"item_file[]\" onChange=\"checkExtension(this.value)\">";
		txt+='<div id="dvFile'+next_div+'"></div>';
		document.getElementById("dvFile" + next_id ).innerHTML = txt;
	}


	function validate(f){
		var chkFlg = false;
		for(var i=0; i < f.length; i++) {
			if(f.elements[i].type=="file" && f.elements[i].value != "") {
				chkFlg = true;
			}
		}
		if(!chkFlg) {
			alert('Please browse/choose at least one file');
			return false;
		}
		f.pgaction.value='upload';
		return true;
	}
</script>

<script type="text/javascript">

$(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#addScnt').live('click', function() {
			if (i < 11) {
                $('<p><label for="p_scnts"><input type="email" id="p_scnt" size="20" name="p_scnt_' + i +'" value="" placeholder="Indirizzo email" /></label> <a href="#" id="remScnt"><img src="images/remove.png" class="rmv" title="Rimuovi email"></a></p>').appendTo(scntDiv);
                i++;
                return false;
			} else {
				alert('Puoi inviare un massimo di 10 email.');
				return false;
			}
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});

	
</script>

</head>

<body>


<div class="menu">
	<ul>
	 <li><a class=" menu active" href="home.php">Home</a></li>
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
</div>
	
	<p class="title"><z class="m">MUSIC</i><z class="s">SHARE</i></b></p>

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


<?php if(!empty($_GET['uploaded'])) : ?>

<?php $upids = $_GET['uploaded']; ?>

<div class="mailshare">
	<form action="sendmail.php" method="post">
		<h2>Condividi i tuoi file per mail</h2>
		<p>Inserisci gli indirezzi e-mail delle persone a cui vuoi inviare il tuo file.</p>

		<div id="p_scents">
			<p>
				<label for="p_scnts"><input type="email" id="p_scnt" size="20" name="p_scnt" value="" placeholder="Indirizzo email" /></label>
			</p>
		</div>
		<a href="#" id="addScnt" class="addmail"> <b>+ mail</b></a> <br>

		
		<input type="submit" value="Invia" name="sendmail" class="mailbtn">
	</form>
</div>

<?php endif ?>

	
<div class="form-container">
	<form enctype="multipart/form-data" action="upload.php" method="post" name="upload-form" id="upload-form">

			<!--hidden field-->
			 <input type="hidden" value="demo" name="<?php echo ini_get("session.upload_progress.name"); ?>"/>
			<!---->


		<div id="dvFile0"><input type="file" name="item_file[]" onChange="checkExtension(this.value)"></div><div id="dvFile1"></div>
			<a href="javascript:_add_more(0);"><B>+ file</B></a> <br>
		<input type="submit" value="Upload!">
	</form>

		<!--Include the progress bar frame-->
		 <iframe style="position: relative; top: 5px;" id="progress-frame" name="progress-frame" border="0" src="" scrollbar="no" frameborder="0" scrolling="no"> </iframe>
		<!---->
</div>
<div class="credits">
	<p>Creato da Sebastiano Riva</p>
</div>
</body>
</html> 


