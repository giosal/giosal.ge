<?php

function OpenConn () {
    $servername = "localhost";
    $username = "ntic19salukva0";
    $password = "salukva0pwd4mysql";
    $connname = "ntic19salukva0";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $connname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
    return $conn;
}

function CloseConn($conn) {
    mysqli_close($conn);
}

$conn = OpenConn();
session_start();

// initializing variables
$surname = "";
$name = "";
$username = "";
$errors = array();

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $surname = mysqli_real_escape_string($conn, $_POST['surname']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($surname)) { array_push($errors, "Surname is required"); }
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (surname, name, email, password)
  			  VALUES('$surname', '$name', '$username', '$password')";
  	$qr = mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../login.php');
  } else {
    print_r($errors);
  }

}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$username'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  //echo "You're logged in";
  	  header('location: ../index.php');
    } else {
  	    $message = "The user doesn't exist";
        echo "<script type='text/javascript'>alert('$message');</script>";
  	    header('location: login.php');
  		array_push($errors, "Wrong username/password combination");
    }
  }
}
?>