<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit Nominee</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Register.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div class="registerform">
        <h1>Edit Nominee Form</h1>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'voting_system');
        if (isset($_GET['nedit'])) {
            $edit_FullName = $_GET['nedit'];

            $select = "select * from nominee where FullName='$edit_FullName'";
            $run = mysqli_query($conn, $select);

            $row_user = mysqli_fetch_array($run);
            $eFullName = $row_user['FullName'];
            $ePartyName = $row_user['PartyName'];
            $eImage = $row_user['Image'];
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <img src="upload/<?php echo $eImage; ?>" alt="Admin" class="rounded-circle" width="150"><br>
            <input type="text" name="FullName" value="<?php echo $edit_FullName; ?>" required placeholder="Enter Full Name">
            <input type="text" name="PartyName" value="<?php echo $ePartyName; ?>" required placeholder="Enter Party Name"><br>
            <input type="file" name="Image" value="<?php echo $eImage; ?>" accept="image/*"> <br>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'voting_system');
    if (isset($_POST['submit'])) {
        $FullName = $_POST['FullName'];
        $PartyName = $_POST['PartyName'];
        $Image = $_FILES['Image']['name'];
        $tmp_name = $_FILES['Image']['tmp_name'];

        if (empty($Image)) {
            $Image = $eImage;
        }
        $update = "update nominee set FullName='$FullName',PartyName='$PartyName',Image='$Image' where FullName='$edit_FullName'";

        $run_update = mysqli_query($conn, $update);
        if ($run_update === true) {
            echo "<H5 style='color:green;text-align:center;'>Successfully Updated</h5>";
            move_uploaded_file($tmp_name, "upload/$Image");
        } else {
            echo "<center><H5 style='color:red;text-align:center;'>Not Inseted</h5></center>" . mysqli_error($conn);
        }
    }
    ?>
    <button class="open-button" onclick="back()">Back</button>

    <script>
        function back() {
            window.location = "admintable.php";
        }
    </script>
</body>

</html>