<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Log&adm.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form action="" method="POST">
            <center>
            <input type="email" name="Email" required placeholder="Email"><br>
            <input type="date" name="DOB" required placeholder="Date Of Birth"><br>
            <input type="password" name="Password" required placeholder="Password"><br>
            <button type="submit" name="submit" >Submit</button><br>
            <a href="admin.html">or Admin Login?</a>
        </center>
        </form> 
    </div>

    <button class="open-button" onclick="back()">Back</button>

<script>
    function back(){
        window.location="FrontPage.html";
    }
</script>  

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

     $Email=$_POST['Email'];
     $DOB=$_POST['DOB'];
     $Password=$_POST['Password'];

    $Email = stripcslashes($Email);  
    $DOB=stripcslashes($DOB); 
    $Password = stripcslashes($Password);  

    
    $insert = "select * from register where Email = '$Email', Password = '$Password' and DOB='$DOB'";
    $result=mysqli_query($conn,$insert);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  

    if($count == 1){  
        echo "<h1><center> Login successful </center></h1>";  
        header("location: LoginSuccess.html");
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    } 

?>

</body>
</html>