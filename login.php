<?php
  session_start(); 
  
  $username_sub = $password_sub = $userError = $passError = '';

  if(isset($_POST['sub'])){

    $username_sub = $_POST['username']; 
    $password_sub = $_POST['password'];
    $username_right = 'salco';
    $password_right = '54lc0';

    if($username_sub === $username_right && $password_sub === $password_right) {
      $_SESSION['login'] = true; 
      header('LOCATION:index.php'); 
      die();
    }
    if($username_sub !== $username_right) {
      $userError = 'Invalid Username';
    };
    if($password_sub !== $password_right) {
      $passError = 'Invalid Password';
    };
  }
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <title>Salco Italia - Login</title>
  <meta charset="utf-8">
  <meta name="robots" content="index, follow" />
  
  <meta name="author" content="Matteo Currò - curromatteo@gmail.com">

  <!-- Dblin Core Metadata : http://dublincore.org/ -->
  <meta name="DC.title" content="Project Name">
  <meta name="DC.subject" content="What you're about.">
  <meta name="DC.creator" content="Matteo Currò - curromatteo@gmail.com">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" href="css/style.css">

  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>

<?php 
include_once('menu.php');
?>

<div class="wrapper">
  <form name='input' action='' method='post'>
    <label for='username'>Username</label><br>
    <input type='text' placeholder='username' id='username' name='username' />
    <div class='error'><?php echo $userError ?></div>
    <br>
    <label for='password'>Password</label><br>
    <input type='password' placeholder='password' id='password' name='password' />
    <div class='error'><?php echo $passError ?></div>
    <input class="button" type='submit' value='Login' name='sub' />
  </form>
</div>
</body>
</html>