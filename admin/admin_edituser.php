<?php
	require_once("phpscripts/config.php");

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$id = $_SESSION['users_id'];
	$popForm = getUser($id);

	if(isset($_POST['submit'])) {
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$email = trim($_POST['email']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

	$result = editUser($id, $fname, $lname, $email, $username, $password);
	$message = $result;
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

<h1>Edit Your Account Details</h1>
<?php if(!empty($message)){echo $message;} ?>
<form action="admin_edituser.php" method="post">
	<input name="fname" type="text" placeholder="First name" value="<?php echo $popForm['user_fname']; ?>">
	<input name="lname" type="text" placeholder="Last name" value="<?php echo $popForm['user_lname']; ?>">
	<input name="email" type="email" placeholder="Email" value="<?php echo $popForm['user_email']; ?>">
	<input name="username" type="text" placeholder="Username" value="<?php echo $popForm['user_name']; ?>">
	<input name="password" type="password" placeholder="Password" value="<?php echo $popForm['user_pass']; ?>">
	<br>
	<input type="submit" name="submit" value="Edit User">
</form>

<a class="backBut button" href="admin_index.php">Back to Admin Panel</a>

</body>
</html>