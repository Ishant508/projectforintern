<!DOCTYPE html>
<htnl>
    <head>
        <title>Forgot Password</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/signin.css">
    </head>
    <body>
        <div class="signin-form">
            <form action="" method="POST">
                <div class="form-header">
                <h2>Forgot Password</h2>
                <p>IshantChat</p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"
                    autocomplete="off" placeholder="something@site.com"
                    required/>
                </div>
                <div class="form-group">
                    <label>Best Friend Name</label>
                    <input type="text" class="form-control" name="bf"
                    autocomplete="off" placeholder="Someone.."
                    required/>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" 
                    class="btn btn-primary btn-block btn-lg"
                    >Submit</button>
                </div>

            </form>
            <div class="text-center small" style="color:red">Back to Signin?
            <a href="../signinp.php/">Click One</a> </div>
        </div>
        <?php
            session_start();
            include "connection.php";
            if(isset($_POST['submit']))
            {  
                $email=$_POST['email'];
               $_SESSION['useremail1']=$email;
             
                $best=$_POST['bf'];
                $select="select * from users1 where useremail='$email'
                AND forgottenanswer='$best'";
                $conn = new mysqli($servername, $username, $password, $dbname);
                $run=mysqli_query($conn,$select);
                $check=mysqli_num_rows($run);
                if($check==1)
                {
                    echo "<script>window.open('../createpassword.php/','_self')</script>";

                }
                else
                {
                    echo "<script>alert('Your best friend name or email is incorrect')</script>";
                    echo "<script>window.open('../forgotpass.php/','_self')</script>";
                }
                
              
                  
            }
        ?>
    </body>
</htnl>