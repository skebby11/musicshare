<?php
  /* File upload progress in PHP 5.4 */
  
  /* needs a 5.4+ version */
  $version = explode( '.', phpversion() );
  if ( ($version[0] * 10000 + $version[1] * 100 + $version[2]) < 50400 )
    die( 'PHP 5.4.0 or higher is required' );

  if ( !intval(ini_get('session.upload_progress.enabled')) )
    die( 'session.upload_progress.enabled is not enabled' );

  session_start();

  if ( isset( $_GET['progress'] ) ) {

    $progress_key = strtolower(ini_get("session.upload_progress.prefix").'demo');
  
    //Print_r($_SESSION); 
 
    if ( !isset( $_SESSION[$progress_key] ) ) exit( "caricando..." );

    $upload_progress = $_SESSION[$progress_key];
    /* get percentage */
    $progress = round( ($upload_progress['bytes_processed'] / $upload_progress['content_length']) * 100, 2 );
  

    exit( "$progress" );
  } else
  {
    ;    //Print_r($_SESSION);
  } 

?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script>
<link href="style-progress.css" rel="stylesheet" type="text/css" />
<script>
$(document).ready(function() { 
//

	setInterval(function() 
		{
     $.get("<?php echo $url; ?>?progress&randval="+ Math.random(), { 
		
//get request to the current URL (upload_frame.php) which calls the code at the top of the page.  It checks the file's progress based on the file id "progress-key=" and returns the value with the function below:
	},
		function(data)	//return information back from jQuery's get request
			{
				$('#progress_container').fadeIn(100);	//fade in progress bar	
				$('#progress_bar').width(data +"%");	//set width of progress bar based on the $status value (set at the top of this page)
				$('#progress_completed').html(parseInt(data) +"%");	//display the % completed within the progress bar
			}
		)},1200);	//Interval is set at 500 milliseconds (the progress bar will refresh every .5 seconds)

});


</script>

<body style="margin:0px">
<font style="font-size: 12px;">Caricando i files...</font>
<!--Progress bar divs-->
<div id="progress_container">
	<div id="progress_bar">
  		 <div id="progress_completed"></div>
	</div>
</div>
<!---->
</body>
