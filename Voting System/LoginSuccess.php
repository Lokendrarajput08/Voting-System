<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login Success</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' type='text/css' media='screen' href='LoginSuccess.css'>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <?php include "Loginnav.php"; ?>

  <div class="container-fluid row ">
    <!--container-fluid ========================php====================== -->
    <?php
    $query = "select * from register";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
        $RStatus = $row['Status'];
        if($RStatus=='ON'){
    $conn = mysqli_connect('localhost', 'root', '', 'voting_system');
    $view = "select * from nominee";
    $run1 = mysqli_query($conn, $view);

    while ($row1 = mysqli_fetch_array($run1)) {
      $FullName1 = $row1['FullName'];
      $PartyName = $row1['PartyName'];
      $Image = $row1['Image'];
      $Votes = $row1['Votes'];
    ?>
      <!-- ========================php====================== -->
      <div class="card">
        <h2 style="text-transform: capitalize;">
            <!-- ========================php====================== -->
            <i class='fab fa-<?php echo $PartyName; ?>'></i> <?php echo $PartyName; ?>
            <!-- ========================php====================== -->
        </h2>
        <center>
          <img class="card-img-top" src="upload/<?php echo $Image; ?>" alt="Card image">
        </center>
        <div class="card-body">
          <h4 class="card-title" style="text-transform: capitalize;"><?php echo "$FullName1"; ?></h4>
          <a href="LoginVoteS.php?Party=<?php echo $PartyName;?>" class="btn btn-primary" style="width: 100%;" >Vote <?php echo $PartyName;?></a>
        </div>
      </div>

    <?php 
    } }else{
      echo "<br><br><br><br>";
      echo "<center style='margin-left: 270px;color:red;'><h3>Voting is No Available.</h3></center>";
    } ?>
  </div>
  <br>

</body>

</html>