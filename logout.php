<?php
  session_start(); 
  
  $_SESSION['login'] = false; 
  header('LOCATION:login.php'); 
  die();
?>