<!DOCTYPE html>
<?php 
session_start();
include "header1.php";
include "connection.php";
if(!isset($_SESSION['useremail1']))
{
    header ("location: sigin.php/");
}
else{
?>

<html>
    <head>
        <title>Change Password</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <style>
       body 
       {
      overflow-x:hidden;
       }
    </style>
<body>
<div class="row">
        <div class="col-sm-2">
        </div>
    <?php

    $conn=mysqli_connect("localhost","root","","mychat1")or die("Error");
    $user=$_SESSION['useremail1'];
    $getuser="select * from users1 where useremail='$user'";
    $runuser=mysqli_query($conn,$getuser);
    $row=mysqli_fetch_array($runuser);
    
    $user_name=$row['username'];
    $user_pass=$row['userpass'];

    ?>

    <div class="col-sm-8">
        <form action="" enctype="mutlipart/form-data" method="POST">
            <table class="table table-bordered table-hover">
                <tr align="center">
                    <td colspan="6" class="active"><h2>Change Password</h2></td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Current Password</td>
                    <td>
                        <input type="password" name="current_pass" class="form-control" required placeholder="Current Password" />
                    </td>
                </tr>

                <tr>
                    <td style="font-weight:bold;">New Password</td>
                    <td>
                        <input type="password" name="new_pass" class="form-control" required placeholder="New Password" />
                    </td>
                </tr>

                <tr>
                    <td style="font-weight:bold;">Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_pass" class="form-control" required placeholder="Confirm Password" />
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="6">
                        <input type="submit" name="change" value="Change" class="btn btn-info"/>

                    </td>
                </tr>
            </table>
        </form>
        <?php

        if(isset($_POST['change']))
        {
            $c_pass=$_POST['current_pass'];
            $pass1=$_POST['new_pass'];
            $pass2=$_POST['confirm_pass'];

            $conn=mysqli_connect("localhost","root","","mychat1")or die("Error");
            $user=$_SESSION['useremail1'];
            $getuser="select * from users1 where useremail='$user'";
            $runuser=mysqli_query($conn,$getuser);
            $row=mysqli_fetch_array($runuser);
            
            $user_password=$row['userpass'];

            if($c_pass!=$user_password)
            {
                echo"
                <div class='alert alert-danger'>
                      <strong>Your Old Password didn't match</strong>
                </div>";
            }

            if($pass1!=$pass2)
            {
                echo"
                <div class='alert alert-danger'>
                      <strong>Your New Password didn't match with Confirm Password</strong>
                </div>";
            }
            if(strlen($pass1) < 9 AND strlen($pass2) < 9)
            {
                echo"
                <div class='alert alert-danger'>
                      <strong>Use 9 or more than 9 characters</strong>
                </div>";
            }

            else  if($pass1==$pass2 AND $c_pass==$user_password)
            {

                $update=mysqli_query($conn,"UPDATE users1 SET userpass='$pass1' WHERE useremail='$user'");
                echo"
                <div class='alert alert-danger'>
                      <strong>Your Password is changed</strong>
                </div>";
            }
            

            






        }
        ?>
</div>

<div class="col-sm-2">
</div>
</div>
</body>
</html>

<?php
}
?>