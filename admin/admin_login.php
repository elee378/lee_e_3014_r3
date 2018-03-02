<?php
  ini_set('display_errors',1);
  error_reporting(E_ALL);

  require_once("phpscripts/config.php");

  $ip = $_SERVER["REMOTE_ADDR"];

  if(isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if($username != "" && $password != "") {
      $result = logIn($username, $password, $ip);
      $message = $result;
    }else{
      $message = "Please finish filling me out";
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
    <link rel="stylesheet" href="../admin/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:500%7CUbuntu" rel="stylesheet">
  </head>
  <body>

  <img src="images/logo_black.svg" id="logo">

<p class="errorTxt"><?php if(!empty($message)){echo $message;} ?></p>
<form action="admin_login.php" method="post">
  <input type="text" name="username" value="" placeholder="Username" class="userPass">
  <input type="password" name="password" value="" placeholder="Password" class="userPass">
  <input type="submit" name="submit" value="Login" id="submit" class="button">
</form>

  </body>
</html>