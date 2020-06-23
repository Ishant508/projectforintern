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
        <title>Account Settings</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        
        <div class="row">
        <div class="col-sm-2">
        </div>
        <?php
        $user=$_SESSION['useremail1'];
        $getuser="select * from users1 where useremail='$user'";
        $runuser=mysqli_query($conn,$getuser);
        $row=mysqli_fetch_array($runuser);
        

        $user_id=$row['userid'];
        $user_name=$row['username'];
        $user_pass=$row['userpass'];
        $user_email=$row['useremail'];
        $user_profile=$row['userprofile'];
        $user_country=$row['usercountry'];
        $user_gender=$row['usergender'];
        ?>
        <div class="col-sm-8">
        <form action="" method="post" enctype=multipart/form-data">
        <table class="table table-bordered table-hover">
        <tr align="center">
          <td colspan="6" class="active"><h2>Change Account Settings</h2></td> 
        </tr>
            <td style="font-weight:bold;">Change Your Username</td>
            <td>
           <input type="text" name="u_name" class="form-control" required value="
           <?php echo $user_name; ?>">
            </td>
        </tr>

        <tr><td></td><td><a class="btn btn-default" style="text-decoration:none;
        font-size:15px;" href="../upload.php/"><i class="fa fa-user" aria-hidden="true"></i>
         Change Profile</a></td>
        </tr>
        <tr>
          <td style="font-weight:bold;">Change Your Email</td>
          <td>
            <input type="email" name="u_email" class="form-control" required value="<?php echo $user_email;?>"/>
          </td>
        </tr>
         
         <tr>
          <td style="font-weight:bold;">Country</td>
          <td>
             <select class="form-control" name="u_country">
               <option><?php echo $user_country; ?></option>
               <option>USA</option>
               <option>UK</option>
               <option>UAE</option>
               <option>Afganistan</option>
               <option>India</option>

             </select>
          </td>
         </tr>

         <tr>
          <td style="font-weight:bold;">Gender</td>
          <td>
             <select class="form-control" name="u_gender">
               <option><?php echo $user_gender; ?></option>
               <option>Male</option>
               <option>Female</option>
               <option>Others</option>
             
               
             </select>
          </td>
         </tr>

          <tr>
             <td style="font-weight:bold;">Forgotten Password</td>
             <td>
                <button type="button" class="btn btn-default" data-toggle="modal"
                data-target="#myModal">Forgotten Password</button>

                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button> 

                      </div>
                      <div class="modal-body">
                        <form action="recovery.php?id=<?php echo ' &user_id'; ?>"
                         method="post" id="f">
                          <strong>What is your School Best Friend Name?</strong>
                          <textarea class="form-control" cols="83" rows="4" name="content" placeholder
                          ="Someone"></textarea><br>
                          <input class="btn btn-default" type="submit" name="sub" value="Submit" style="width:100px;"> 
                          <br><br>
                          <pre>Answer the above question we will ask you this question if you forgot your <br>
                          Password.</pre><br><br>
                        </form>

                   
                        <?php
                          
                        if(isset($_POST['sub']))
                        {
                          $bfn=$_POST['content'];
                          if($bfn==' ')
                          {
                          echo "<script>alert('Please Enter Something.')</script>";
                          echo "<script>window.open('../accountsettings.php/','_self')</script>";
                          exit();

                          }
                          else
                          {
                            $update="update users1 set forgottenanswer='$bfn'
                            where useremail='$user'";
                            $run=mysqli_query($conn,$update);
                            if($run)
                            {
                              echo "<script>alert('Working')</script>";
                              echo "<script>window.open('../accountsettings.php/','_self')</script>";
                            }
                            else
                            {
                              echo "<script>alert('Error While Updating Information.')</script>";
                              echo "<script>window.open('../accountsettings.php/','_self')</script>";
                            }
                          }
                        }
                        ?>
                      </div>
                         <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                    </div>
                  </div>
                </div>
            </td>
          </tr>
          
          <tr> <td></td><td><a class="btn btn-default" style="text-decoration:none; font-size: 15px; width:150px;"
             href = "../changepassword.php/"><i class="fa fa-key fa-fw" aria-hidden="true">Change Password</i></td>
    
          </tr>
          <tr align="center">
            <td colspan="6">
                <input type="submit" value="Update" name="update" class="btn btn-info">
            </td>
          </tr>
            

        </table>
        </form>

        <?php
           if(isset($_POST['update']))
           {
             $user_name=$_POST['u_name'];
             $email=$_POST['u_email'];
             $u_gender=$_POST['u_gender'];
             $u_country=$_POST['u_country'];
             

             $update="update users1 set username='$user_name',useremail='$email',usergender='$u_gender'
             , usercountry='$u_country' where userid='$user_id'";
             $sql=mysqli_query($conn,$update);
             if($sql)
             {
           
               echo "<script>window.open('../accountsettings.php/','_self')</script>";
             }
        
           }


        ?>
        </div>

        <div class="col-sm-2"
          </div>
        </div>
</body>
</html>
<?php
}
?>