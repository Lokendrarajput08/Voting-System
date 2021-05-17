<?php //session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Success</title>
    <link rel='stylesheet' type='text/css' media='screen' href='LoginSuccess.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>
<style>
   center{
    transform: translateY(150%);
    margin-left: 270px;
  }
</style>
<body style="background-color: yellowgreen;">
    <?php include "Loginnav.php"; ?>
    <center >
        
        <h1><b>Voted Successfully</b></h1>
        <br><br>
        <a href="Logout.php" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> LogOut</a>
        <?php session_destroy(); ?>
    </center>
</body>

</html>