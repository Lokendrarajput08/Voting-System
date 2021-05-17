<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
    <link rel='stylesheet' type='text/css' media='screen' href='LoginSuccess.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>
<style>

</style>

<body>
    <center>
        <?php include "Loginnav.php";
        $select = "select * from register where Email='$user'";

        $run = mysqli_query($conn, $select);
        $row_user = mysqli_fetch_array($run);
        $FullName = $row_user['FullName'];
        $Voted = $row_user['Voted'];

        if ($Voted == 'NO') {
        ?>

            <div style="margin-left: 250px;">
                <br><br>
                <h2 style="background-color: red;">Please confirm Your Vote </h2>

                <!-- ============PHP GET=================================== -->
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'voting_system');
                if (isset($_GET['Party'])) {
                    $PartyVote = $_GET['Party'];

                    $select = "select * from nominee where PartyName='$PartyVote'";
                    $run = mysqli_query($conn, $select);

                    $row_user = mysqli_fetch_array($run);
                    $eFullName = $row_user['FullName'];
                    $eVotes = $row_user['Votes'];
                    $eImage = $row_user['Image'];
                }
                ?>

                <!-- ============PHP GET=================================== -->

                <form action="" method="POST"><br>
                    <h5 style="text-transform: capitalize;">You Voted : <?php echo $PartyVote; ?></h5><br>
                    <img src="upload/<?php echo $eImage; ?>" style="width: 400px;height: 400px; border-radius: 30%;">
                    <input type="hidden" name="Votes" value="<?php echo $eVotes; ?>" required placeholder="Enter Party Name"><br>
                    <input class="btn btn-primary" type="submit" name="submit">
                    <a href="LoginSuccess.php" class="btn btn-warning">cancel</a>
                </form>

                <!-- ============PHP Update=================================== -->
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'voting_system');
                if (isset($_POST['submit'])) {
                    $Votes = $_POST['Votes'];

                    $eVotes = $eVotes + 1;
                    $update = "update nominee set Votes='$eVotes' where PartyName='$PartyVote'";

                    $run_update = mysqli_query($conn, $update);
                    if ($run_update === true) {
                        echo "<script> window.open('LoginVoteSuccess.php','_self') </script>";
                        // echo "<H5 style='color:green;text-align:center;'>Voted Successfully</h5>";
                    } else {
                        echo "<center><H5 style='color:red;text-align:center;'>Samething Went Wrong</h5></center>" . mysqli_error($conn);
                    }

                    $conn = mysqli_connect('localhost', 'root', '', 'voting_system');
                    $Rupdate = "update register set Voted='YES' where FullName='$FullName'";

                    $Rrun_update = mysqli_query($conn, $Rupdate);
                    if ($Rrun_update === true) {
                        // echo "<script> window.open('LoginVoteSuccess.php','_self') </script>";
                        echo "<H5 style='color:green;text-align:center;'>Voted YES</h5>";
                    } else {
                        echo "<center><H5 style='color:red;text-align:center;'>Samething Went Wrong NNOo</h5></center>" . mysqli_error($conn);
                    }
                }

                ?>
                <!-- ============PHP Update=================================== -->
            </div>
        <?php
        } else {
            echo "<br><br>";
            echo "<center style='margin-left: 270px;color:red;'><h3>You Already Voted.</h3></center>";
            echo "<br><br>";
            echo '<a href="Logout.php" style="margin-left: 270px;" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> LogOut</a>';
        }
        //   session_destroy(); 
        ?>
    </center>
</body>

</html>