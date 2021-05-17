<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'voting_system');

  echo "<script> window.open('admin.php','_self') </script>";

session_destroy();
?>