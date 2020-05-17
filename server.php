<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	// $db = mysqli_connect('localhost', 'root', 'root', 'event_share_test');
	require_once "db.php";


	// REGISTER USE
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$name = mysqli_real_escape_string($db, $_POST['name']);

		// form validation: ensure that the form is correctly filled
		$errors  = array();
		if (empty($username)) { $errors['name'] ="Name is required";}
		if (empty($username)) { $errors['username'] = "Username is required"; }
		if (empty($email)) { $errors['email']= "Email is required"; }
		if (empty($password_1)) { $errors['password'] = "Password is required"; }

		if ($password_1 != $password_2) {
			$errors['password_2']= "The two passwords do not match";
		}
		// print_r($errors);
		// die;
		$query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
		$results = mysqli_query($db, $query);
		$row = $results->fetch_assoc();
		
		if (mysqli_num_rows($results) == 0) {
			if (count($errors) == 0) {
				$password = md5($password_1);//encrypt the password before saving in the database
				$query = "INSERT INTO users (username, email, password,name) 
						  VALUES('$username', '$email', '$password', '$name')";

				mysqli_query($db, $query);
				
				$_SESSION['user_id'] = $db->insert_id;
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}
			
		}else {
			$errors['duplicate']="Username Or Email Already Exist!";
		}

		// register user if there are no errors in the form
		

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$errors  = array();
		if (empty($username)) {
			$errors['username']= "Username is required";
		}
		if (empty($password)) {
			$errors['password']="Password is required";
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			$row = $results->fetch_assoc();
			
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['user_id'] = $row['id'];

				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>