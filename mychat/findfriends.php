<!DOCTYPE html>
<?php 
session_start();
include "findfriendsfunction.php";
include "connection.php";
if(!isset($_SESSION['useremail1']))
{
    header ("location: sigin.php/");
}
else{
?>

<html>
    <head>
        <title>Search For Friends</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/findpeople.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
            <a class="navbar-brand href="#">
                <?php 
                $user=$_SESSION['useremail1'];
                $getuser="select * from users1 where useremail='$user'";
                $runuser=mysqli_query($conn,$getuser);
                $row=mysqli_fetch_array($runuser);
                $user_name=$row['username'];
                echo "<a class='navbar-brand' href='../home.php?username=$user_name'>IshantChat</a>";
                ?>
            </a>
            <ul class="navbar-nav">
                <li><a style="color:white;text-decoration:none;font-size:20px;"href="../accountsettings.php/">Settings</a></li>
            </ul>
        </nav> <br>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <form class="searchform" action="">
                    <input class="search" type="text" name="searchquery" placeholder="Search Friends" autocomplete="off"required/>
                    <button class="btn" type="submit" name="search_btn">Search</button>
                </form>
            </div>
            <div class="col-sm-4">
           </div>
          </div><br><br>
          <?php searchuser(); ?>
        
    </body>
</html>
<?php
    }

    ?>