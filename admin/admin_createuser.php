<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	require_once("phpscripts/config.php");
	confirm_logged_in();

	if(isset($_POST['submit'])) {
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$email = trim($_POST['email']);
		$username = trim($_POST['username']);
		$password = randomPass(8); 
		$level = $_POST['lvllist'];
		if(empty($level)) {
			$message = "Please select a user level.";
		}else{
			$cost = ['cost' => 10];
			$hashedPass = password_hash($password, PASSWORD_BCRYPT, $cost); 
			$result = createUser($fname, $lname, $email, $username, $hashedPass, $level);
			$sendEmail = sendEmail($fname, $email, $username, $password);
			$message = $result;
		}
	}
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Assignment</title>
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:500%7CUbuntu" rel="stylesheet">
  </head>
  <body>

<h1>Create User</h1>
<?php if(!empty($message)){echo $message;} ?>
<form action="admin_createuser.php" method="post">
	<input name="fname" type="text" placeholder="First name" value="<?php if(!empty($fname)){echo $fname;} ?>" required>
	<input name="lname" type="text" placeholder="Last name" value="<?php if(!empty($lname)){echo $lname;} ?>" required>
	<input name="email" type="email" placeholder="Email" value="<?php if(!empty($email)){echo $email;} ?>" required>
	<input name="username" type="text" placeholder="Username" value="<?php if(!empty($username)){echo $username;} ?>" required>
	<br>
	<select id="lvlList" name="lvllist" required>
		<option value="">Select user level</option>
		<option value="1">Web Master</option>
		<option value="2">Web Admin</option>
	</select>
	<br>
	<input type="submit" name="submit" value="Create User">
</form>

<a class="backBut button" href="admin_index.php">Back to Admin Panel</a>

</body>
</html>