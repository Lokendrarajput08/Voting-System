
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Admin Panel</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='adminPanel.css'>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
  <?php include 'adminPanelnav.php'; ?>

  <!-- ============User TAble=============================== - -->

  <div class="content" >
    <div style="overflow-x:auto;">
      <h2 style="text-align: center;font-weight: bolder;">User Data Table:</h2>
      <hr>

      <?php
      $conn = mysqli_connect('localhost', 'root', '', 'voting_system');
      if (isset($_GET['del'])) {
        $del_email = $_GET['del'];
        $delete = "delete from register where Email='$del_email'";
        $run_del = mysqli_query($conn, $delete);
        if ($run_del === true) {
          echo "<div style='color:green;text-align:center;'>Record Deleted Successfully </div> ";
        } else {
          echo "<div style='color:red;text-align:center;'>Try Again</div>";
        }
      }
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Password</th>
            <th>Voted Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'voting_system');
        $select = "select * from register";
        $run = mysqli_query($conn, $select);

        while ($row_user = mysqli_fetch_array($run)) {
          $FullName = $row_user['FullName'];
          $MobileNo = $row_user['MobileNo'];
          $Email = $row_user['Email'];
          $DOB = $row_user['DOB'];
          $Password = $row_user['Password'];
          $Voted=$row_user['Voted'];

        ?>
          <tbody>
            <tr>
              <td style="text-transform: capitalize;"><?php echo $FullName; ?></td>
              <td><?php echo $MobileNo; ?></td>
              <td><?php echo $Email; ?></td>
              <td><?php echo $DOB; ?></td>
              <td><?php echo $Password; ?></td>
              <td><?php echo $Voted; ?></td>
              <td>
                <a href="EditUser.php?edit=<?php echo $Email; ?>" class="btn btn-primary" title="Edit"><i class="fas fa-pen"></i></a>
                <a href="admintable.php?del=<?php echo $Email; ?>" class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
      </table>
    </div>
    <!-- </div> -->
    <!-- ==========end ==user TAble=============================== -->
    <br>
    <hr style="border:solid 1px black;background-color: blue;"><br>
    <!-- ============Nominee TAble=============================== -->
    <!-- <div class="content" style="overflow-x:auto;"> -->
    <div style="overflow-x:auto;">
    <h2 style="text-align: center;font-weight: bolder;">Nominee Data Table :</h2>
    
    <?php
    if (isset($_GET['ndel'])) {
      $ndel_FullName = $_GET['ndel'];
      $ndelete = "delete from nominee where FullName='$ndel_FullName'";
      $nrun_del = mysqli_query($conn, $ndelete);
      if ($nrun_del === true) {
        echo "<div style='color:green;text-align:center;'>Record Deleted Successfully </div> ";
      } else {
        echo "<div style='color:red;text-align:center;'>Try Again</div>";
      }
    }
    ?>

    <hr>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Party Name</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php
      $select = "select * from nominee";
      $run = mysqli_query($conn, $select);

      while ($row_user = mysqli_fetch_array($run)) {
        $nFullName = $row_user['FullName'];
        $nPartyName = $row_user['PartyName'];
        $nImage = $row_user['Image'];
      ?>

        <tbody>
          <tr style="text-transform: capitalize;">
            <td><?php echo $nFullName; ?></td>
            <td><?php echo $nPartyName; ?></td>
            <td><img src="upload/<?php echo $nImage; ?>" style="width: 100px;height: 100px; border-radius: 50%;"></td>
            <td>
              <a href="EditNominee.php?nedit=<?php echo $nFullName; ?>" class="btn btn-primary" title="Edit"><i class="fas fa-pen"></i></a>
              <a href="admintable.php?ndel=<?php echo $nFullName; ?>" class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
  </div>
  <!-- ===========end =Nominee TAble=============================== -->
  </div>

</body>

</html>