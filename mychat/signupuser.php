<?php
include "connection.php";
if(isset($_POST['signup']))
{
    $name=$_POST['username'];
    $pass=$_POST['userpass'];
    $email=$_POST['useremail'];
    $country=$_POST['usercountry'];
    $gender=$_POST['usergender'];
    $rand=rand(1,2);
    $p=$name;
    if($name="")
    {
      echo "<script>alert('We can not verify your name ')</script>";
    }
    if(strlen($pass)<8)
    {
        echo "<script>alert('Password should be minimum 8 characters')</script>";

    }

    $ress="select * from users1 where useremail='$email'";
    $result=mysqli_query($conn,$ress)or die("Error");
    $rows=mysqli_num_rows($result);
    if($rows==1)
    {
       echo "<script>alert('Email already exits,try another one!')</script>";
       echo "<script>window.open('../signup.php',_self')</script>";
       exit();
    }
   
     if($rand==1)
    {
      $profilepic="images/back.jpg";
    }
    else if($rand==2)
    {
      $profilepic="images/kohli.jpg";
    }

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql="INSERT INTO users1(username,userpass,useremail,userprofile,usercountry,
     usergender) VALUES('$p','$pass','$email','$profilepic','$country','$gender')";
    $res1=mysqli_query($conn,$sql);
    if($res1)
    {
      echo "<script>alert('Congratulations {$p} ,your account has been created successfully')</script>";
      echo "<script>window.open('../signin.php/','_self')</script>";
    }
    else 
    {
      echo "<script>alert('Registration failed,try again')</script>";
      echo "<script>window.open('signup.php/','_self')</script>";
    }



  $conn->close();

}

?>