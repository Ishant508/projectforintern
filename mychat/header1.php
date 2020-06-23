<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
            <a class="navbar-brand href="#">
                <?php 
                $conn=mysqli_connect("localhost","root","","mychat1");
                $user=$_SESSION['useremail1'];
                $getuser="select * from users1 where useremail='$user'";
                $runuser=mysqli_query($conn,$getuser);
                $row=mysqli_fetch_array($runuser);
                $user_name=$row['username'];
                echo "<a class='navbar-brand' href='../home.php?username=$user_name'>IshantChat</a>";
                ?>
            </a>
            <ul class="navbar-nav">
                <li><a style="color:white;text-decoration:none;font-size:20px;" href="../accountsettings.php/">Settings</a></li>
            </ul>
        </nav> <br>