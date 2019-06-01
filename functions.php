<?php 
	session_start();

	// connect to universal database
	$db = mysqli_connect('localhost', 'root', '', 'musicshare');

	//declaring global vars
	$time = date("d/m/Y - H:i:s");
	$year = date("Y"); 
	$month = date("m"); 

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 

	// get variables from URL, if any
	if(!empty($_GET['pub'])){ $pub = $_GET['pub']; }
	if(!empty($_GET['priv'])){ $priv = $_GET['priv']; }

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if login_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	// call the mkpublic() function if pub URL variable is not empty
	if (!empty($pub)){
		mkpublic();
	}
	// call the mkpriv() function if priv URL variable is not empty
	if (!empty($priv)){
		mkpriv();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: index.php");
	}

	// REGISTER USER
	function register(){
		global $db, $dmY, $errors;

		// receive all input values from the form
		$nome    =  e($_POST['nome']);
		$username    =  e($_POST['username']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);
		
		$dmY = date("d/m/Y");

		// form validation: ensure that the form is correctly filled
		if (empty($nome)) { 
			array_push($errors, "Il nome è obbligatorio"); 
		}if (empty($username)) { 
			array_push($errors, "L'username è obbligatorio"); 
		}
		if (empty($email)) { 
			array_push($errors, "L'email è obbligatoria"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "La password è obbligatoria"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "Le due password non corrispondono");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
				$unique = bin2hex(openssl_random_pseudo_bytes(5));
				$query = "INSERT INTO ms_users (username, email, password, regdate, idunique) 
						  VALUES('$username', '$email', '$password', '$dmY', '$unique')";
				mysqli_query($db, $query);
				
				mkdir("uploads/$unique", 0775);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "Hai eseguito il log in";
				header('location: home.php');	

		}

	}

	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM ms_users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "L'username è obbligatorio");
		}
		if (empty($password)) {
			array_push($errors, "La password è obbligatoria");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM ms_users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "Log in eseguito correttamente";

					header('location: home.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	// CHANGE FILE PRIVACY
	function mkpublic(){
		global $db, $pub;
		
		$mkpubquery = "UPDATE uploaded SET priv='0' WHERE fileid=" . $pub;
		mysqli_query($db, $mkpubquery);
		$_SESSION['success']  = "File is now public";
	}
	function mkpriv(){
		global $db, $priv;

		$mkprivquery = "UPDATE uploaded SET priv='1' WHERE fileid=" . $priv;
		mysqli_query($db, $mkprivquery);
		$_SESSION['success']  = "File is now private";
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>