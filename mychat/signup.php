<!DOCTYPE html>
<htnl>
    <head>
        <title>Create New Account</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/signup.css">
    </head>
    <body>
        <div class="signup-form">
            <form action="" method="POST">
                <div class="form-header">
                <h2>Sign Up</h2>
                <p>Create And Get Connected With Friends</p>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username"
                    autocomplete="off" placeholder="Ishant508"
                    required/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="userpass"
                    autocomplete="off" placeholder="Password"
                    required/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="useremail"
                    autocomplete="off" placeholder="something@site.com"
                    required/>
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <select class="form-control" name="usercountry" required/>
                    <option disabled=" ">Select Country</option>
                    <option >India</option>
                    <option >U.S.A.</option>
                    <option >Pakistan</option>
                    <option >China</option>
                    <option >Australia</option>
                  </select>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name="usergender" required/>
                    <option disabled=" ">Select Gender</option>
                    <option >Male</option>
                    <option >Female</option>
                    <option >Others</option>
                  </select>
                </div>
                <div class="form-group">
                   <label><input type="checkbox" required/>  I accept the<a href="#">Terms of Use</a>&amp;<a href="#">
                       Privacy Policy
                   </a></label>
                </div>
             
                <div class="form-group">
                    <button type="submit" name="signup" 
                    class="btn btn-primary btn-block btn-lg"
                    >SignUp</button>
                </div>
              <?php include "signupuser.php";?>

            </form>
            <div class="text-center small" style="color:#674288">Already have an account
            <a href="../signin.php/">SignIn</a> </div>
        </div>
    </body>
</htnl>