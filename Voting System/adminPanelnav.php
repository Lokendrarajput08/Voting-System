<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'voting_system');
if(!isset($_SESSION['Username'])){
  echo "<script> window.open('admin.php','_self') </script>";
}
$User=$_SESSION['Username'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin Panel</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='adminPanel.css'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="sidebar">
       <h4><i class="fas fa-user-shield"></i> Admin Panel</h4>
       <?php echo "<h5 style='color: white;'>$User</h5>"; ?>
        <a href="adminPanel.php"><i class="fas fa-home"></i> Home</a>
        <a href="adminResult.php"><i class="fas fa-poll-h"></i> Result</a>
        <a href="admintable.php"><i class="fas fa-table"></i> Table</a>
        <a href=""><i class="fas fa-database"></i> Data</a>
        <a href="adminLogout.php"><i class="fas fa-sign-out-alt"></i> LogOut</a>
    </div>

</body>
</html>