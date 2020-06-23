<!DOCTYPE html>
<htnl>
    <head>
        <title>Login to your account</title>
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
                <h2>Sign In</h2>
                <p>Login to IshantChat</p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"
                    autocomplete="off" placeholder="something@site.com"
                    required/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass"
                    autocomplete="off" placeholder="Password"
                    required/>
                </div>
                <div class="small">Forgot Password<a href="../forgotpass.php/">
                    Click Here
                </a>
                </div>
                <div class="form-group">
                    <button type="submit" name="signin" 
                    class="btn btn-primary btn-block btn-lg"
                    >LogIn</button>
                </div>
              <?php include "signinuser.php";?>

            </form>
            <div class="text-center small" style="color:red">Don't have an account
            <a href="../signup.php/">Click One</a> </div>
        </div>
    </body>
</htnl>