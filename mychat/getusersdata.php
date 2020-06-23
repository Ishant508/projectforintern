<?php
include "connection.php";
$conn=mysqli_connect("localhost","root","","mychat1");
$user="select * from users1";
$runuser=mysqli_query($conn,$user);
while($rowuser=mysqli_fetch_array($runuser))
{
    $userid=$rowuser['userid'];
    $username=$rowuser['username'];
    $userprofile=$rowuser['userprofile'];
    $login=$rowuser['login'];
     echo"
     <li>
     <div class='chat-left-img'>
     <img src='$userprofile'>
     </div>
     <div class='chat-left-detail'>  
     <p><a href='home.php?username=$username'>$username</a></p>";
    if($login=='Online')
    {
        echo "<span><i class='fa fa-circle' aria-hidden='true'></i>Online</span>";
    }
   else
    {
        echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i>Offline</span>";
    }

   
    
    echo "
    </div>
    </li>";
}
?>