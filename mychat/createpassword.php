<!DOCTYPE html>
<htnl>
    <head>
        <title>Create New Password</title>
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
                <h2>Create New Password</h2>
                <p>IshantChat</p>
                </div>
                <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" class="form-control" name="pass1"
                    autocomplete="off" placeholder="Password"
                    required/>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="pass2"
                    autocomplete="off" placeholder="Confirm Password"
                    required/>
                </div>
                <div class="form-group">
                    <button type="submit" name="change" 
                    class="btn btn-primary btn-block btn-lg"
                    >Change</button>
                </div>

            </form>
    
        </div>
        <?php
        
        session_start();
        include "connection.php";
        if(isset($_POST['change']))
        {
            $pass1=$_POST['pass1'];
            $pass2=$_POST['pass2'];
            
            $user=$_SESSION['useremail1'];

            if($pass1!=$pass2)
            {
                echo"
                <div class='alert alert-danger'>
                   <strong>Your New Password Not match with Confirm Password</strong>
                </div>
                ";

            }
            if(strlen($pass1)<9 AND strlen($pass2)<9)
            {
                echo"
                <div class='alert alert-danger'>
                   <strong>Use 9 or more than 9 characters</strong>
                </div>
                ";
            }
            if($pass1==$pass2)
            {
                $update=mysqli_query($conn,"UPDATE users1 SET userpass='$pass1' WHERE useremail='$user' ");
                session_destroy();
                echo "<script>alert('Go Ahead and Signin')</script>";
                echo "<script>window.open('../signin.php/','_self')</script>";

            }
        }
        ?>
    </body>
</htnl>