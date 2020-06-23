<!DOCTYPE html>
<?php 
session_start();

include "connection.php";
if(!isset($_SESSION['useremail1']))
{
    header ("location: sigin.php/");
}
else{
    
?>


<html>
    <head>
        <title>IshantChat-Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    </head>
    <body>
        <div class="container main-section">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                    <div class="input-group searchbox">
                        <div class="input-group-btn">
                            <center><a href="findfriends.php/">
                            <button class="btn btn-default search-icon"
                            name="searchuser" type="submit">
                           Add new user</button></a></center>
                        </div>
                    </div>
                    <div class="left-chat">
                        <ul>
                            <?php include "getusersdata.php";?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                    <div class="row">
                        <!-- Information of who is logged in-->

                       
                       <?php
                        $conn=mysqli_connect("localhost","root","","mychat1");
                        $user=$_SESSION['useremail1'];
                       // echo"<script>alert('{$user}');</script>";
                        $getuser="select * from users1 where useremail='$user'";
                        $runuser=mysqli_query($conn,$getuser);
                        $row=mysqli_fetch_array($runuser);
                        
                        $user_id=$row['userid'];
                        $user_name=$row['username'];
                       // echo"<script>alert('$user_name')</script>";
                       // $_SESSION['useremail']=false;
                        
                        ?>
                        <!-- getting data of user on which  user click-->
                        <?php
                        
                        if(isset($_GET['username']))
                        {
                            global $conn;
                            $getusername=$_GET['username'];
                          //  echo"<script>alert('$getusername')</script>";
                           if($getusername=="")
                           {
                            $getusername=$user_name;
                           }

                            $getuser="select * from users1 where username='$getusername'";
                       
                            
                            $runuser=mysqli_query($conn,$getuser);
                            $rowuser=mysqli_fetch_array($runuser);
                            $username=$rowuser['username'];
                            $userprofileimage=$rowuser['userprofile'];
                          //  echo"<script>alert('$username   $userprofileimage')</script>";
                        }
                       // echo"<script>alert('$user_name')</script>";
                        $totalmessages="select * from userschat where(
                            senderusername='$user_name' AND receiverusername=
                            '$username') OR (receiverusername='$user_name'
                            AND senderusername='$username'
                            )";
                            $runmessages=mysqli_query($conn,$totalmessages);
                            $total=mysqli_num_rows($runmessages);
                         
                          echo "
                           <div class='col-md-12 right-header'>
                            <div class='right-header-img'>
                            <img src='$userprofileimage'>
                            </div> 
                               " ?>
                            <div class="right-header-detail">
                                <form method="post">
                                    <p><?php echo "$username"; ?></p>
                                    <span><?php echo $total  ; ?>messages</span>&nbsp &nbsp
                                    <button name="logout" class="btn btn-danger">Logout</button>
                                </form>
                                <?php
                                if(isset($_POST['logout']))
                                {
                                    $updatemsg=mysqli_query($conn,"UPDATE users1 SET login='Offline'
                                    WHERE username='$user_name'");
                                                   echo "<script>window.open('logout.php/','_self')</script>";
                                    exit();
                                }
                                ?>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                            <?php
                            $updatemsg=mysqli_query($conn,"UPDATE userschat SET
                            msgstatus='read' WHERE senderusername='$username' 
                            AND receiverusername='$user_name'");
                           
                            $selmsg="select * from userschat where 
                            (senderusername='$user_name' AND receiverusername='$username')
                            OR (senderusername='$username' AND receiverusername='$user_name') ORDER by 1 ASC";
                            $runmes=mysqli_query($conn,$selmsg);
                            while($row=mysqli_fetch_array($runmes))
                            {
                                $senderusername=$row['senderusername'];
                                $receiverusername=$row['receiverusername'];
                                $msgcontent=$row['msgcontent'];
                                $msgdate=$row['msgdate'];
                            
                            ?>
                            <ul>
                                <?php
                                if($user_name===$senderusername AND $username===$receiverusername)
                                {  echo "
                                    <li>
                                        <div class='rightside-right-chat'>
                                            <span>$senderusername<small>  $msgdate</small></span>
                                            <br><br>
                                            <p>$msgcontent</p>
                                        </div>
                                    </li>
                                    ";
                                }
                                else  if($username===$senderusername AND $user_name===$receiverusername)
                                {  echo "
                                    <li>
                                        <div class='rightside-left-chat'>
                                            <span>$senderusername<small>  $msgdate</small></span>
                                            <br> <br>
                                            <p>$msgcontent</p>
                                        </div>
                                    </li>
                                    ";
                                    
                                }
                                ?>
                            </ul>
                                <?php
                            }   
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 right-chat-textbox">
                            <form method="post">
                                <input autocomplete="off" type="text" name="msgcontent"
                                placeholder="Write your message......">
                              <!--  <button class="btn" name="submit"><i class="fa fa-facebook" aria-hidden="true"></i></button>-->
                              <button class="btn" name="submit">
                             <i class="fa fa-telegram" aria-hidden="true"></i>
                        </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST['submit']))
        {
            $msg=$_POST['msgcontent'];
            $message=$msg;
            if($msg="")
            {
                echo "
                <div class='alert alert-danger'>
                    <strong><center>Message wasunable to send</center></strong>
                </div>
                ";
            }
            else if(strlen($msg)>100)
            {
                echo "
                <div class='alert alert-danger'>
                    <strong><center>Messageis too long.Only characters less than 100</center></strong>
                </div>
                ";
            }
            else{
                $ress="insert into userschat(senderusername,receiverusername,
                msgcontent,msgstatus,msgdate) values('$user_name','$username'
                ,'$message','unread',NOW())";
                $runinsert=mysqli_query($conn,$ress);
                echo "<script>window.open('home.php?username=$username','_self')</script>";

            }
        }
        ?> 
        <script>
           $('#scrolling_to_bottom').animate((
               scrolling: $('#scrolling_to_bottom').get(0).scrollHeight),1000);
           ))
       </script>
       
       <script type="text/javascript">
       $(document).ready(function(){
           var height=$(window).height();
           $('.left-chat').css('height',(height-92)+'px');
           $('.right-header-contentChat').css('height',(height-163)+'px');
       });
       </script>
    </body>
</html>
<?php
    }

    ?>
