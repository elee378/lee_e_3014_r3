<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	require_once('phpscripts/config.php');
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

<?php
  if($_SESSION['current_hour'] <= "11") { //If current_hour is <= then display Good morning
    $greeting = "Good morning ";
  }elseif($_SESSION['current_hour'] >= "12" && $_SESSION['current_hour'] <= "16") { //If current_hour is between 12 & 16, display Good afternoon
    $greeting = "Good afternoon ";
  }elseif($_SESSION['current_hour'] >= "17") { // if current_hour is >= 17 display good evening
    $greeting = "Good evening ";
  }
?>

<h1><?php echo $greeting; echo $_SESSION['users_fname']; ?>. Welcome to your admin panel.</h1>

<div id="adminButCon">
  <div class="buttonCon"><a href="admin_createuser.php" class="button">Create User</a></div>
  <div class="buttonCon"><a href="admin_edituser.php" class="button">Edit User</a></div>
  <div class="buttonCon"><a href="phpscripts/caller.php?caller_id=logout" class="button">Log Out</a></div>
</div>

<p id="lastLogin">You last logged in on <?php echo $_SESSION['users_timestamp']; ?>.</p>

</body>
</html>