<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin Result</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='adminPanel.css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src='main.js'></script>
</head>

<body>
    <?php include 'adminPanelnav.php'; ?>

    <div class="content">
        <h2 style="text-align: center;font-weight: bolder;">Result Progress :</h2>
        <br>
        <hr>
        <!-- ===========php================================ -->
        <?php
        $select = "select * from nominee";
        $run = mysqli_query($conn, $select);

        while ($row_user = mysqli_fetch_array($run)) {
            $nFullName = $row_user['FullName'];
            $nPartyName = $row_user['PartyName'];
            $nVotes = $row_user['Votes'];
        ?>
            <!-- ===========php================================ -->
            <h4 style="text-transform: capitalize;"><b><?php echo $nPartyName ?> :</b></h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped" style="width:<?php echo $nVotes ?>%"><?php echo $nVotes ?></div>
            </div><br>
        <?php }

        $conn = mysqli_connect('localhost', 'root', '', 'voting_system');
        $select = "select MAX(Votes)as MAX from nominee";
        $run = mysqli_query($conn, $select);
        $row_user = mysqli_fetch_array($run);
        $rVotes = $row_user['MAX'];
        if($rVotes>0){
        ?>
        <hr>
        <?php echo date('r'); ?>
        <h2 style="text-align: center;font-weight: bolder;">Declared Winner :</h2>
        <hr>
        <table class="table table-hover" style="overflow-x:auto;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Party Name</th>
                    <th>Votes</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $select = "select * from nominee where Votes='$rVotes'";
            $run = mysqli_query($conn, $select);
            $s = 0;
            while ($row_user = mysqli_fetch_array($run)) {
                $FullName = $row_user['FullName'];
                $PartyName = $row_user['PartyName'];
                $Votes = $row_user['Votes'];
                $Image = $row_user['Image'];
                $Status = $row_user['Status'];
                $s++;
            ?>
                <tbody>
                    <tr style="text-transform: capitalize;">
                        <td><?php echo $s; ?></td>
                        <td><?php echo $FullName; ?></td>
                        <td><?php echo $PartyName; ?></td>
                        <td><?php echo $Votes; ?></td>
                        <td><img src="upload/<?php echo $Image; ?>" style="width: 100px;height: 100px; border-radius: 50%;"></td>
                        <td><?php echo $Status; ?></td>
                        <td><a href="adminResult.php?dcl=<?php echo $PartyName ?>" class="btn btn-primary" title="Declared"><i class="fa fa-bullhorn"></i></a>
                            <a href="adminResult.php?udcl=<?php echo $PartyName ?>" class="btn btn-danger" title="UnDeclared"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        <!-- <td><a href="result.php?show=<?php //echo $PartyName ?>" class="btn btn-primary" title="Declared"><i class="fa fa-bullhorn"></i></a></td> -->
                    </tr>
                <?php }
            }else{
                echo "<div style='color:red;text-align:center;'>NO WINNER</div>" . mysqli_error($conn);
            } ?>
                </tbody>
        </table>
        <!-- =========================declared======================= -->
        <?php
        if (isset($_GET['dcl'])) {
            $dcl_PartyName = $_GET['dcl'];
            $update = "update nominee set Status='ON' where PartyName='$dcl_PartyName'";
            $nrun_dcl = mysqli_query($conn, $update);
            if ($nrun_dcl === true) {
                echo "<div style='color:green;text-align:center;'> Declared Winner Successfully </div> ";
            } else {
                echo "<div style='color:red;text-align:center;'>Try Again</div>" . mysqli_error($conn);
            }
        }
        ?>
        <!-- =========================declared======================= -->

        <!-- =========================Undeclared======================= -->
        <?php
        if (isset($_GET['udcl'])) {
            $udcl_PartyName = $_GET['udcl'];
            $update = "update nominee set Status='OFF' where PartyName='$udcl_PartyName'";
            $nrun_dcl = mysqli_query($conn, $update);
            if ($nrun_dcl === true) {
                echo "<div style='color:green;text-align:center;'>UnDeclared Winner Successfully</div> ";
            } else {
                echo "<div style='color:red;text-align:center;'>Try Again</div>" . mysqli_error($conn);
            }
        }
        ?>
        <!-- =========================Undeclared======================= -->



    </div>
</body>

</html>