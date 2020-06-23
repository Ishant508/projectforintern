<!DOCTYPE html>
<?php 
session_start();
include "header.php";
include "connection.php";
if(!isset($_SESSION['useremail1']))
{
    header ("location: sigin.php/");
}
else{
?>

<html>
    <head>
        <title>Upload  Profile Picture</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <style>
         .card
         {
             box-shadow:0 4px 8px 0 rgba(0,0,0,0.2);
             max-width:400px;
             margin:auto;
             text-align:center;
             font-family:arial;

         }
         .card img 
         {
             height:200px;
         }
         .title
         {
             color:grey;
             font-size:18px;
         }
         #button_profile
         {
             border:none;
             outline:0;
             display:inline-block;
             padding:9px;
             color:white;
             background-color: #000;
             text-align:center;
             cursor:pointer;
             width:100%;
             padding:10px;
             font-size:15px;
            
         }
         #update_profile
         {
             position:absolute;
             cursor:pointer;
             padding:10px;
             border-radius: 4px;
             color:white;
             background-color:blue;
             font-size:10px;
         }
         label{
             padding:7px;
             display:table;
             color:#fff;

         }
         input[type="file"]
         {
             display:none;

         }
         
    </style>
<body>

    <?php

    $conn=mysqli_connect("localhost","root","","mychat1")or die("Error");
    $user=$_SESSION['useremail1'];
    $getuser="select * from users1 where useremail='$user'";
    $runuser=mysqli_query($conn,$getuser);
    $row=mysqli_fetch_array($runuser);
    
    $user_name=$row['username'];
    $user_profile=$row['userprofile'];
   // echo"<script>alert('$user_profile')</script>";
    echo "
    <div class='card'>
        <img src='../$user_profile'>
        <h1>$user_name</h1>
        <form method='post' enctype='multipart/form-data'>
          <label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true'></i>Select Profile
          <input type='file' name='u_image' size='60'>
         </label>
         <button id='button_profile' name='update'>&nbsp&nbsp&nbsp<i class='fa fa-heart' aria-hidden='true'></i>Update Profile</button>
        </form>

        </div>   <br><br>
    ";
     
    
    if(isset($_POST['update']))
    {  
        $u_image=$_FILES['u_image']['name'];
       // echo"<script>alert('$u_image')</script>";
        $image_tmp=$_FILES['u_image']['tmp_name'];
        $random_number=rand(1,100);

        if($u_image=='')
        {
            echo"<script>alert('Please Select Profile')</script>";
            echo"<script>window.open('../upload.php/','_self')</script>";
            exit();

        }
        else
        { 
          //  echo"<script>alert('$u_image')</script>";
            move_uploaded_file($image_tmp,"images/$u_image.$random_number");
            $conn=mysqli_connect("localhost","root","","mychat1")or die("Error");
            $sql="UPDATE users1 SET userprofile='images/$u_image.$random_number' WHERE useremail='$user'";
            $run=mysqli_query($conn,$sql);
           
           if($run)
           {
               echo"<script>alert('Your Profile Updated')</script>";
               echo"<script>window.open('../upload.php/','_self')</script>";
           }

        }
    }

    ?>
</body>
</html>

<?php
}
?>