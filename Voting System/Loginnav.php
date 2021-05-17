<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'voting_system');
if (!isset($_SESSION['Email'])) { 
  echo "<script> window.open('Login.php','_self') </script>";
  // echo "wrong";
}
$user = $_SESSION['Email'];
// $vote = $_SESSION['Voted'];

$conn = mysqli_connect('localhost', 'root', '', 'voting_system');
$select = "select * from register where Email='$user'";

$run = mysqli_query($conn, $select);
$row_user = mysqli_fetch_array($run);
$FullName = $row_user['FullName'];
$MobileNo = $row_user['MobileNo'];
$DOB = $row_user['DOB'];
$Password = $row_user['Password'];
$Status = $row_user['Status'];
$Voted = $row_user['Voted'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav</title>
    <link rel='stylesheet' type='text/css' media='screen' href='LoginSuccess.css'>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
</head>
<body>
<div class="space">
    <div class="card">
      <center>
        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
      </center>
      <div class="card-body">
        <h6 class="card-title">Name : <?php echo $FullName; ?></h6>
        <h6 class="card-title">User : <?php echo $user; ?></h6>
        <h6 class="card-title">MobileNo : <?php echo $MobileNo; ?></h6>
        <h6 class="card-title">DOB : <?php echo $DOB; ?></h6>
        <!-- <h6 class="card-title">Status : <?php //echo $Status; ?></h6> -->
        <h6 class="card-title">Voted : <?php echo $Voted; ?></h6>
      </div>
    </div>

    <a href="LoginResult.php"><i class="fas fa-poll-h"></i> Result</a>
    <a href="Logout.php"><i class="fas fa-sign-out-alt"></i> LogOut</a>
  </div>
    
</body>
</html>