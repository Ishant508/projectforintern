<?php
  
    function searchuser()
    {
        if(isset($_GET['search_btn']))
        {
            $searchquery=$_GET['searchquery'];
            $getuser="select * from users1 where username like '%$searchquery%' or usercountry like '%$searchquery%'";
        }
        else
        {
            $getuser="SELECT * FROM users1 order by  usercountry,username DESC LIMIT 5";
        }
        $conn=mysqli_connect("localhost","root","","mychat1")or die("Error");
        $runuser=mysqli_query($conn,$getuser);
        while($rowuser=mysqli_fetch_array($runuser))
        {
            $username=$rowuser['username'];
            $userprofile=$rowuser['userprofile'];
            $country=$rowuser['usercountry'];
            $gender=$rowuser['usergender'];
            
            echo "
            <div class='card'>
            <img src='../$userprofile'>
            <h1>$username</h1>
            <p class='title'>$country</p>
            <p>$gender</p>
            <form method='post'>
            <p><button name='add'>Chat With $username</button?</p>
            </form>

            </div>
            ";
            if(isset($_POST['add']))
            {
                echo "<script>window.open('../home.php?username=$username','_self')</script>";
            }
        }
    }
?>