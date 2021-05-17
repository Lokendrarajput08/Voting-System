<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel='stylesheet' type='text/css' media='screen' href='LoginSuccess.css'>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>

<body>
    <?php include "Loginnav.php"; ?>

    <div style="margin-left: 270px;"><br>

        <hr>
        <center>
            <h1><b>Winner : </b></h1>
        </center>
        <hr>
    </div>
        <div class="container-fluid row ">

            <?php
            $query = "select * from nominee";
            $run = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($run);
                $RStatus = $row['Status'];
                if($RStatus=='ON'){
                $view = "select * from nominee where Status='$RStatus'";
                $run1 = mysqli_query($conn, $view);
                
                while ($row1 = mysqli_fetch_array($run1)) {
                    $FullName = $row1['FullName'];
                    $PartyName = $row1['PartyName'];
                    $Image = $row1['Image'];
                    $Votes = $row1['Votes'];
                    $Status = $row1['Status'];
            ?>
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
                                <h4 class="card-title" style="text-transform: capitalize;"><?php echo "$FullName"; ?></h4>
                                <a href="LoginSuccess.php" class="btn btn-primary" style="width: 100%;">OK</a>
                            </div>
                        </div>
            
            <?php
                }}else{
                   echo "<center style='margin-left: 270px;color:red;'><h3>Data No Available.</h3></center>";
              }
            ?>
        </div>
</body>

</html>