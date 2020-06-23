<?php session_start();?>
<?php
include "connection.php";
if(isset($_POST['signin']))
{
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $selectuser="select * from users1 where useremail='$email' AND
    userpass='$pass'";
    $query=mysqli_query($conn,$selectuser);
    $checkuser=mysqli_num_rows($query);
    if($checkuser==1)
    {
      $_SESSION['useremail1']=$email;     
      $updatemsg=$conn->query("UPDATE users1 SET login='Online' 
      where useremail='$email'");
       $user=$_SESSION["useremail1"];
      // echo"<script>alert('$user')</script>";
       $getuser="select * from users1 where useremail='$user'";
       $res=mysqli_query($conn,$getuser);
       $row=mysqli_fetch_array($res);
       $username=$row['username'];
       session_regenerate_id(true);
       echo "<script>window.open('../home.php?username=$username','_self')</script>";
       session_write_close();
       
    }
    else 
    {
        echo "
        <div class='alert alert-danger'>
        <strong>Check your email and password</strong>
        </div>";
    }

}
?>
