<?php

include('functions.php');

$query = "SELECT * FROM ms_users WHERE id=" . $_SESSION['user']['id'];
$result = mysqli_query($db, $query);
while($row = mysqli_fetch_array($result)){
	$unique = $row['idunique'];
	$idutente = $row['id'];
}
	
	if (!isset($_FILES["item_file"]))
		die ("Error: no files uploaded!");

	$file_count = count($_FILES["item_file"]['name']);
	
	echo $file_count . " file(s) sent... <BR><BR>";

	if(count($_FILES["item_file"]['name'])>0) { //check if any file uploaded

		for($j=0; $j < count($_FILES["item_file"]['name']); $j++) { //loop the uploaded file array
			
			$filen = $_FILES["item_file"]['name'][$j];	
			
			
			    // get file name (not including path)
				$filename = @basename($_FILES["item_file"]['name'][$j]);

				// filename of temp uploaded file
				$tmp_filename = $_FILES["item_file"]['tmp_name'][$j];
			
				$file_ext = @strtolower(@strrchr($filename,"."));
				if (@strpos($file_ext,'.') === false) { // no dot? strange
				  $errors[] = "Suspicious file name or could not determine file extension.";
				  break;
				}
				$file_ext = @substr($file_ext, 1); // remove dot
			
				// destination filename, rename if set to
				$dest_filename = $filename;
				$dest_filename = md5(uniqid(rand(), true)) . '.' . $file_ext;

				// get size
				$filesize = filesize($tmp_filename); // filesize($tmp_filename);

			// ingore empty input fields
			if ($filename!="")
			{
		
				// destination path - you can choose any file name here (e.g. random)
				$path = "uploads/". $unique . "/" . $dest_filename; 

				if(move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"],$path)) { 
					
					
					
					// db file registration
								
					$query = "INSERT INTO uploads (owner, filename, size, ext, date, origname) VALUES ('$idutente', '$dest_filename', '$filesize', '$file_ext', '$time', '$filen')";
					mysqli_query($db, $query);
					
					
					$_SESSION['success']  = "File caricati con successo!"; 
					header('location: home.php');

				} else
				{
					array_push($errors, "Errore nel caricare i file!");
					header('location: home.php');
				}
			}	

		}
	}
	
?>

