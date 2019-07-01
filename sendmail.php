<?php

include('functions.php');


if(isset($_POST['sendmail'])){

$mailArray = []; 
	
$mail1 = $_POST['p_scnt'] . ", ";	
$mailArray[] = $mail1; 
	
if(isset($_POST['p_scnt_2'])){
	$mail2 = $_POST['p_scnt_2'] . ", ";
	$mailArray[] = $mail2; 
}
if(!empty($_POST['p_scnt_3'])){
	$mail3 = $_POST['p_scnt_3'] . ", ";
	$mailArray[] = $mail3; 
}
if(isset($_POST['p_scnt_4'])){
	$mail4 = $_POST['p_scnt_4'] . ", ";
	$mailArray[] = $mail4; 
}
if(isset($_POST['p_scnt_5'])){
	$mail5 = $_POST['p_scnt_5'] . ", ";
	$mailArray[] = $mail5; 
}
if(!empty($_POST['p_scnt_6'])){
	$mail6 = $_POST['p_scnt_6'] . ", ";
	$mailArray[] = $mail6; 
}
if(isset($_POST['p_scnt_7'])){
	$mail7 = $_POST['p_scnt_7'] . ", ";
	$mailArray[] = $mail7; 
}
if(isset($_POST['p_scnt_8'])){
	$mail8 = $_POST['p_scnt_8'] . ", ";
	$mailArray[] = $mail8; 
}
if (isset($_POST['p_scnt_9'])){
	$mail9 = $_POST['p_scnt_9'] . ", ";
	$mailArray[] = $mail9; 
}
if(isset($_POST['p_scnt_10'])){
	$mail10 = $_POST['p_scnt_10'] . ", ";
	$mailArray[] = $mail10; 
}  
	
$finarray = implode( $mailArray );	
$finarray = rtrim($finarray,', ');
	
	
$idutente = $_GET['user'];
	
$query = "SELECT username FROM ms_users WHERE id=$idutente";
$result = mysqli_query($db, $query);
while($row = mysqli_fetch_array($result)){
		$up_user = $row['username'];
}

$up = $_GET['up'];
	
	
// use of explode 
$str_arr = explode (",", $up);  
	
$upnumbers = count($str_arr);
	
if($upnumbers == 1) {
	$button = "<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[0]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL MIO FILE</span></strong></span></span></a>";
} elseif ($upnumbers == 2) {
	$button = "<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[0]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL PRIMO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[1]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL SECONDO FILE</span></strong></span></span></a>";
} elseif ($upnumbers == 3) {
	$button = "<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[0]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL PRIMO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[1]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL SECONDO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[2]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL TERZO FILE</span></strong></span></span></a>";
} elseif ($upnumbers == 4) {
	$button = "<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[0]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL PRIMO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[1]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL SECONDO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[2]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL TERZO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[3]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL QUARTO FILE</span></strong></span></span></a>";
} elseif ($upnumbers == 5) {
	$button = "<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[0]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL PRIMO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[1]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL SECONDO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[2]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL TERZO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[3]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL MIO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[4]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL QUINTO FILE</span></strong></span></span></a>";
} elseif ($upnumbers == 6) {
	$button = "<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[0]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL PRIMO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[1]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL MIO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[2]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL MIO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[3]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL MIO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[4]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL MIO FILE</span></strong></span></span></a><br>
	<a href='https://sebastianoriva.altervista.org/musicshare/download.php?fileid=".$str_arr[5]."'><span style='font-size: 16px; line-height: 32px;'><span style='font-size: 15px; line-height: 30px;'><strong><span style='line-height: 30px; font-size: 15px;'>SCARICA IL MIO FILE</span></strong></span></span></a>";
}
	
// start email
	
$to = $finarray;
$subject = "$up_user ti ha inviato un file!";

$message = "
<html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'>
<head>
<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
<meta content='text/html; charset=utf-8' http-equiv='Content-Type/>
<meta content='width=device-width name=viewport'/>
<!--[if !mso]><!-->
<meta content=IE=edge http-equiv=X-UA-Compatible/>
<!--<![endif]-->
<title></title>
<!--[if !mso]><!-->
<link href=https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'/>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'/>
<!--<![endif]-->
<style type='text/css'>
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}

		.ie-browser table {
			table-layout: fixed;
		}

		[owa] .img-container div,
		[owa] .img-container button {
			display: block !important;
		}

		[owa] .fullwidth button {
			width: 100% !important;
		}

		[owa] .block-grid .col {
			display: table-cell;
			float: none !important;
			vertical-align: top;
		}

		.ie-browser .block-grid,
		.ie-browser .num12,
		[owa] .num12,
		[owa] .block-grid {
			width: 600px !important;
		}

		.ie-browser .mixed-two-up .num4,
		[owa] .mixed-two-up .num4 {
			width: 200px !important;
		}

		.ie-browser .mixed-two-up .num8,
		[owa] .mixed-two-up .num8 {
			width: 400px !important;
		}

		.ie-browser .block-grid.two-up .col,
		[owa] .block-grid.two-up .col {
			width: 300px !important;
		}

		.ie-browser .block-grid.three-up .col,
		[owa] .block-grid.three-up .col {
			width: 300px !important;
		}

		.ie-browser .block-grid.four-up .col [owa] .block-grid.four-up .col {
			width: 150px !important;
		}

		.ie-browser .block-grid.five-up .col [owa] .block-grid.five-up .col {
			width: 120px !important;
		}

		.ie-browser .block-grid.six-up .col,
		[owa] .block-grid.six-up .col {
			width: 100px !important;
		}

		.ie-browser .block-grid.seven-up .col,
		[owa] .block-grid.seven-up .col {
			width: 85px !important;
		}

		.ie-browser .block-grid.eight-up .col,
		[owa] .block-grid.eight-up .col {
			width: 75px !important;
		}

		.ie-browser .block-grid.nine-up .col,
		[owa] .block-grid.nine-up .col {
			width: 66px !important;
		}

		.ie-browser .block-grid.ten-up .col,
		[owa] .block-grid.ten-up .col {
			width: 60px !important;
		}

		.ie-browser .block-grid.eleven-up .col,
		[owa] .block-grid.eleven-up .col {
			width: 54px !important;
		}

		.ie-browser .block-grid.twelve-up .col,
		[owa] .block-grid.twelve-up .col {
			width: 50px !important;
		}
	</style>
<style id='media-query' type='text/css'>
		@media only screen and (min-width: 620px) {
			.block-grid {
				width: 600px !important;
			}

			.block-grid .col {
				vertical-align: top;
			}

			.block-grid .col.num12 {
				width: 600px !important;
			}

			.block-grid.mixed-two-up .col.num3 {
				width: 150px !important;
			}

			.block-grid.mixed-two-up .col.num4 {
				width: 200px !important;
			}

			.block-grid.mixed-two-up .col.num8 {
				width: 400px !important;
			}

			.block-grid.mixed-two-up .col.num9 {
				width: 450px !important;
			}

			.block-grid.two-up .col {
				width: 300px !important;
			}

			.block-grid.three-up .col {
				width: 200px !important;
			}

			.block-grid.four-up .col {
				width: 150px !important;
			}

			.block-grid.five-up .col {
				width: 120px !important;
			}

			.block-grid.six-up .col {
				width: 100px !important;
			}

			.block-grid.seven-up .col {
				width: 85px !important;
			}

			.block-grid.eight-up .col {
				width: 75px !important;
			}

			.block-grid.nine-up .col {
				width: 66px !important;
			}

			.block-grid.ten-up .col {
				width: 60px !important;
			}

			.block-grid.eleven-up .col {
				width: 54px !important;
			}

			.block-grid.twelve-up .col {
				width: 50px !important;
			}
		}

		@media (max-width: 620px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col>div {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num8 {
				width: 66% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>
<body class='clean-body' style='margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #B8CCE2;''>
<style id='media-query-bodytag' type='text/css'>
@media (max-width: 620px) {
  .block-grid {
    min-width: 320px!important;
    max-width: 100%!important;
    width: 100%!important;
    display: block!important;
  }
  .col {
    min-width: 320px!important;
    max-width: 100%!important;
    width: 100%!important;
    display: block!important;
  }
  .col > div {
    margin: 0 auto;
  }
  img.fullwidth {
    max-width: 100%!important;
    height: auto!important;
  }
  img.fullwidthOnMobile {
    max-width: 100%!important;
    height: auto!important;
  }
  .no-stack .col {
    min-width: 0!important;
    display: table-cell!important;
  }
  .no-stack.two-up .col {
    width: 50%!important;
  }
  .no-stack.mixed-two-up .col.num4 {
    width: 33%!important;
  }
  .no-stack.mixed-two-up .col.num8 {
    width: 66%!important;
  }
  .no-stack.three-up .col.num4 {
    width: 33%!important
  }
  .no-stack.four-up .col.num3 {
    width: 25%!important
  }
}
</style>
<!--[if IE]><div class='ie-browser'><![endif]-->
<table bgcolor='#B8CCE2' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #B8CCE2; width: 100%;' valign='top' width='100%'>
<tbody>
<tr style='vertical-align: top;' valign='top'>
<td style='word-break: break-word; vertical-align: top; border-collapse: collapse;' valign='top'>
<!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color:#B8CCE2'><![endif]-->
<div style='background-color:transparent;'>
<div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;;'>
<div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
<!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
<!--[if (mso)|(IE)]><td align='center' width='600' style='background-color:transparent;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
<div class='col num12' style='min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top;;'>
<div style='width:100% !important;'>
<!--[if (!mso)&(!IE)]><!-->
<div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
<!--<![endif]-->
<div class='mobile_hide'>
<table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
<tbody>
<tr style='vertical-align: top;' valign='top'>
<td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; border-collapse: collapse;' valign='top'>
<table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='40' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-top: 0px solid transparent; height: 40px;' valign='top' width='100%'>
<tbody>
<tr style='vertical-align: top;' valign='top'>
<td height='40' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse;' valign='top'><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style='background-color:transparent;'>
<div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #D8D8D8;;'>
<div style='border-collapse: collapse;display: table;width: 100%;background-color:#D8D8D8;'>
<!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:#D8D8D8'><![endif]-->
<!--[if (mso)|(IE)]><td align='center' width='600' style='background-color:#D8D8D8;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 20px; padding-top:5px; padding-bottom:5px;'><![endif]-->
<div class='col num12' style='min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top;;'>
<div style='width:100% !important;'>
<!--[if (!mso)&(!IE)]><!-->
<div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 20px;'>
<!--<![endif]-->
<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif'><![endif]-->
<div style='color:#555555;font-family:'Roboto', Tahoma, Verdana, Segoe, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
<div style='font-family: 'Roboto', Tahoma, Verdana, Segoe, sans-serif; font-size: 12px; line-height: 14px; color: #555555;'>
<p style='font-size: 14px; line-height: 60px; margin: 0;'><span style='font-size: 50px;'><strong><span style='line-height: 60px; font-size: 50px;'><span style='line-height: 60px; color: #1d3e49; font-size: 50px;'>MUSIC<span style='color: #e0ba12; font-size: 50px; line-height: 60px;'>SHAR</span></span><span style='color: #e0ba12; line-height: 60px; font-size: 50px;'>E</span></span></strong></span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style='background-color:transparent;'>
<div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;;'>
<div style='border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;'>
<!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:#FFFFFF'><![endif]-->
<!--[if (mso)|(IE)]><td align='center' width='600' style='background-color:#FFFFFF;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 35px; padding-left: 35px; padding-top:35px; padding-bottom:40px;'><![endif]-->
<div class='col num12' style='min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top;;'>
<div style='width:100% !important;'>
<!--[if (!mso)&(!IE)]><!-->
<div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:35px; padding-bottom:40px; padding-right: 35px; padding-left: 35px;'>
<!--<![endif]-->
<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
<div style='color:#132F40;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
<div style='font-size: 12px; line-height: 14px; font-family: 'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif; color: #132F40;'>
<p style='font-size: 14px; line-height: 26px; margin: 0;'><span style='font-size: 22px;'>Hey, <strong>$up_user</strong> ti ha inviato un file!</span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 30px; font-family: Arial, sans-serif'><![endif]-->
<div style='color:#555555;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:150%;padding-top:5px;padding-right:10px;padding-bottom:30px;padding-left:10px;'>
<div style='font-size: 12px; line-height: 18px; font-family: 'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif; color: #555555;'>
<p style='font-size: 14px; line-height: 21px; margin: 0;'>Un nostro utente ti ha inviato un file, adesso puoi scaricarlo gratuitamente dal pulsante che trovi qui sotto quando vuoi.</p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
<div style='color:#555555;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:120%;padding-top:20px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
<p style='font-size: 12px; line-height: 14px; color: #555555; font-family: 'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0;'><br/></p>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<div align='center' class='img-container center fixedwidth' style='padding-right: 0px;padding-left: 0px;'>
<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><img align='center' alt='Image' border='0' class='center fixedwidth' src='https://sebastianoriva.altervista.org/musicshare/images/illo.png' style='outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; clear: both; border: 0; height: auto; float: none; width: 100%; max-width: 530px; display: block;' title='Image' width='530'/>
<!--[if mso]></td></tr></table><![endif]-->
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style='background-image:url('https://sebastianoriva.altervista.org/musicshare/images/bg_password.gif');background-position:top center;background-repeat:no-repeat;background-color:transparent;'>
<div class='block-grid no-stack' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;;'>
<div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
<!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-image:url('https://sebastianoriva.altervista.org/musicshare/images/bg_password.gif');background-position:top center;background-repeat:no-repeat;background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
<!--[if (mso)|(IE)]><td align='center' width='600' style='background-color:transparent;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 35px; padding-left: 35px; padding-top:15px; padding-bottom:2px;'><![endif]-->
<div class='col num12' style='min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top;;'>
<div style='width:100% !important;'>
<!--[if (!mso)&(!IE)]><!-->
<div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:15px; padding-bottom:2px; padding-right: 35px; padding-left: 35px;'>
<!--<![endif]-->
<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 15px; font-family: Arial, sans-serif'><![endif]-->
<div style='color:#555555;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:120%;padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px;'>
<div style='line-height: 14px; font-family: 'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 12px; color: #555555;'>
<p style='line-height: 19px; font-size: 12px; margin: 0;'><span style='font-size: 16px;'>Per scaricare il file, vai alla pagina di download</span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<div align='left' class='button-container' style='padding-top:5px;padding-right:10px;padding-bottom:35px;padding-left:10px;'>
<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'><tr><td style='padding-top: 5px; padding-right: 10px; padding-bottom: 35px; padding-left: 10px' align='left'><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='' style='height:31.5pt; width:150.75pt; v-text-anchor:middle;' arcsize='120%' stroke='false' fillcolor='#FFD500'><w:anchorlock/><v:textbox inset='0,0,0,0'><center style='color:#132F40; font-family:Arial, sans-serif; font-size:15px'><![endif]-->
<div style='text-decoration:none;display:inline-block;color:#132F40;background-color:#FFD500;border-radius:50px;-webkit-border-radius:50px;-moz-border-radius:50px;width:auto; width:auto;;border-top:1px solid #FFD500;border-right:1px solid #FFD500;border-bottom:1px solid #FFD500;border-left:1px solid #FFD500;padding-top:5px;padding-bottom:5px;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;'>$button
</div>
<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style='background-color:transparent;'>
<div class='block-grid two-up no-stack' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #D8D8D8;;'>
<div style='border-collapse: collapse;display: table;width: 100%;background-color:#D8D8D8;'>
<!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:#D8D8D8'><![endif]-->
<!--[if (mso)|(IE)]><td align='center' width='300' style='background-color:#D8D8D8;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 25px; padding-top:15px; padding-bottom:15px;'><![endif]-->
<div class='col num6' style='max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top;;'>
<div style='width:100% !important;'>
<!--[if (!mso)&(!IE)]><!-->
<div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:15px; padding-bottom:15px; padding-right: 0px; padding-left: 25px;'>
<!--<![endif]-->
<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
<div style='color:#F8F8F8;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
<div style='font-size: 12px; line-height: 14px; font-family: 'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif; color: #F8F8F8;'>
<p style='font-size: 14px; line-height: 16px; margin: 0;'><strong>MusicShare</strong></p>
<p style='font-size: 14px; line-height: 16px; margin: 0;'>A project by Sebastiano Riva</p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td><td align='center' width='300' style='background-color:#D8D8D8;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
<div class='col num6' style='max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top;;'>
<div style='width:100% !important;'>
<!--[if (!mso)&(!IE)]><!-->
<div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
<!--<![endif]-->
<table cellpadding='0' cellspacing='0' class='social_icons' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;' valign='top' width='100%'>
<tbody>
<tr style='vertical-align: top;' valign='top'>
<td style='word-break: break-word; vertical-align: top; padding-top: 20px; padding-right: 35px; padding-bottom: 10px; padding-left: 10px; border-collapse: collapse;' valign='top'>
<table activate='activate' align='right' alignment='alignment' cellpadding='0' cellspacing='0' class='social_table' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: undefined; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;' to='to' valign='top'>
<tbody>
<tr align='right' style='vertical-align: top; display: inline-block; text-align: right;' valign='top'>
<td style='word-break: break-word; vertical-align: top; padding-bottom: 5px; padding-right: 0px; padding-left: 10px; border-collapse: collapse;' valign='top'><a href='https://www.facebook.com/Sebastiano-Riva-1611977855564821/' target='_blank'><img alt='Facebook' height='32' src='https://sebastianoriva.altervista.org/musicshare/images/facebook@2x.png' style='outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; clear: both; height: auto; float: none; border: none; display: block;' title='Facebook' width='32'/></a></td>
<td style='word-break: break-word; vertical-align: top; padding-bottom: 5px; padding-right: 0px; padding-left: 10px; border-collapse: collapse;' valign='top'><a href='https://twitter.com/skebby11' target='_blank'><img alt='Twitter' height='32' src='https://sebastianoriva.altervista.org/musicshare/images/twitter@2x.png' style='outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; clear: both; height: auto; float: none; border: none; display: block;' title='Twitter' width='32'/></a></td>
<td style='word-break: break-word; vertical-align: top; padding-bottom: 5px; padding-right: 0px; padding-left: 10px; border-collapse: collapse;' valign='top'><a href='https://instagram.com/skebbyy' target='_blank'><img alt='Instagram' height='32' src='https://sebastianoriva.altervista.org/musicshare/images/instagram@2x.png' style='outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; clear: both; height: auto; float: none; border: none; display: block;' title='Instagram' width='32'/></a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style='background-color:transparent;'>
<div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;;'>
<div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
<!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
<!--[if (mso)|(IE)]><td align='center' width='600' style='background-color:transparent;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
<div class='col num12' style='min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top;;'>
<div style='width:100% !important;'>
<!--[if (!mso)&(!IE)]><!-->
<div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
<!--<![endif]-->
<table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
<tbody>
<tr style='vertical-align: top;' valign='top'>
<td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; border-collapse: collapse;' valign='top'>
<table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' height='30' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-top: 0px solid transparent; height: 30px;' valign='top' width='100%'>
<tbody>
<tr style='vertical-align: top;' valign='top'>
<td height='30' style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse;' valign='top'><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</td>
</tr>
</tbody>
</table>
<!--[if (IE)]></div><![endif]-->
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <sebastianoriva@altervista.org>' . "\r\n";

mail($to,$subject,$message,$headers);
	
}

$_SESSION['success']  = "Ora puoi dire ai tuoi amici di controllare la loro inbox (e lo spam) !"; 
header('location: home.php');

?>
