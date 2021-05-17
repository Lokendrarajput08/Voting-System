<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Log&adm.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- JS, Popper.js, and jQuery -->  
</head>
<body>
    <div class="login">
        <h1>admin panel</h1>
        <form action="" method="post" >
            <center>
            <input type="email" name="Username" required placeholder="Email"><br>
            <input type="password" name="Password" required placeholder="Password"><br>
            <button type="submit" name="submit" >Submit</button>
        </center>
        </form>
    </div>

    <button class="open-button" onclick="back()">Back</button>

<script>
    function back(){
        window.location="index.html";
    }
</script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
     $Username=$_POST['Username'];
     $Password=$_POST['Password'];
    
    $select="select * from admin where Username='$Username' and Password='$Password'";
    $run=mysqli_query($conn,$select);

    $row=mysqli_num_rows($run);
    if($row==1){
        echo "<script> window.open('adminPanel.php','_self') </script>";
        $_SESSION['Username']= $Username;
    }else{
        echo "<h5 style='color:red;text-align:center;'>Wrong Username or Password</h5>";
    }
}
?>
</body>
</html>