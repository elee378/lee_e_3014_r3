<?php

	function editUser($id, $fname, $lname, $email, $username, $password) {
		include('connect.php'); 

		$updatestring = "UPDATE tbl_user SET user_fname = '{$fname}', user_lname = '{$lname}', user_email = '{$email}', user_name = '{$username}', user_pass = '{$password}' WHERE user_id = {$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery) {
			redirect_to("admin_index.php");
		}else{
			$message = "There was a problem editing your user account settings. Please contact the web admin for help.";
		}

		mysqli_close($link);		
	}

	function getUser($id) {
		require_once('connect.php');
		$userstring = "SELECT * FROM tbl_user WHERE user_id = {$id}";
		$userquery = mysqli_query($link, $userstring);

		if($userquery) {
			$found_user = mysqli_fetch_array($userquery, MYSQLI_ASSOC);
			return $found_user;
		}else{
			$message = "There was a problem editing your account. Please contact the web admin for help.";
			return $message;
		}

		mysqli_close($link);
	}

	function createUser($fname, $lname, $email, $username, $hashedPass, $level) {
		require_once("connect.php");
		$ip = 0;
		$userstring = "INSERT INTO tbl_user VALUES(NULL,'{$fname}','{$lname}','{$email}','{$username}','{$hashedPass}','{$level}','{$ip}', '', '0')"; 
		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			redirect_to("admin_index.php");
		}else{
			$message = "There was a problem setting up this user.";
			return $message;
		}
		mysqli_close($link);
	}

	function randomPass($length) { 
		$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
		$string = ""; 
		$size = mb_strlen($chars) - 1;
		for($i=0; $i<$length; $i++) { 
			$string .= $chars[random_int(0, $size)];
		}
		return $string;
	}

	function sendEmail($fname, $email, $username, $password) {
		$loginUrl = "admin_login.php";
		$message = "Welcome {$fname}. \r\n Username: {$username} \r\n Password: {$password} \r\n Login here: {$loginUrl}";
		mail($email, 'Welcome', $message); 
	}
?>