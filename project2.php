<!DOCTYPE html>
<html>
<head>
 <?php include 'link.php';?>
</head>
</html>
<body>
<div class="container-register">
       <div class="row">
         <div class="col-md-3 register-left">
             <h4>Welcome</h4>
            <p>Check Filled Form</p>        
           <a href="display.php">Check Form</a> <br/>
         </div>  
            <div  class="col-md-9 register-right">
             <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel"
               aria-labellebdy="hame-tab">
               <h3 class="register-heading">Add Project</h3>
           <form action="" method="POST">
           <div class="row register-form">
             <div class ="col-md-6">
                <div class="form-group">
                   <input type="text" class="form-control" placeholder=" Enter Topic 
                        " name="topicname" value="" required/>
                </div>
                <div class="form-group" >
                   <input type="tel" class="form-control" placeholder="Enter Number of Word
                      " name="word" value="" required/>
                      </div>
                   <div class="form-group">
                   <input type="text" class="form-control" placeholder="Additional Information
                       " name="" value="" >

                </div> <input type="submit" class="btnRegister" name="submit1"
                value="Register"
                       />
                     </div>
                   </div>
                 </div>
                </div>
             </div>
           </div>
           </form>
</div>
</body>
<?php   include 'connection.php';
if(isset($_POST["submit1"]))
{
  $t=$_POST['topicname'];
  $w=$_POST['word'];
  if($w>1000)
  { ?>
        <script>
        alert("Maximum allowed words are 1000 only");
        </script>
         <?php
  }
else
{
 date_default_timezone_set('Asia/Kolkata');
 if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 $sql2="select *from ishant ";
 $result2=mysqli_query($conn,$sql2);
 $rowcount=mysqli_num_rows($result2);
 $res2=mysqli_fetch_array($result2);
 $currentdate=date('Y-m-d');
               $mysqli = new mysqli('localhost', 'root', '', 'ish');
               if($mysqli->connect_errno>0)
               {
                die("Connection to MySQL-server failed!"); 
                }
                $arryear = array();//to store results
               //to execute query
                $executingFetchQuery = $mysqli->query("SELECT `a` FROM  ishant");
                if($executingFetchQuery)
                {
                while($arr = $executingFetchQuery->fetch_assoc())
                {
                $arryear[] = $arr['a'];//storing values into an array
                 }
               }
               
                $executingFetchQuery = $mysqli->query("SELECT `c` FROM  ishant");
                if($executingFetchQuery)
                {
                while($arr = $executingFetchQuery->fetch_assoc())
                {
                $arryword[] = $arr['c'];//storing values into an array
                 }
               }
 if($rowcount==0)
  {
    $D=$currentdate;
  }      
  else
  {
    $p=$currentdate;
    while($p)
    {
      $sum=0;
      for($i=0;$i<$rowcount;$i++)
      { 
        if($arryear[$i]==$p)
        {
          $sum=$sum+$arryword[$i];
         }
      }
      if($sum+$w<1000)
      {
        $D=$p;
        break;
      }
      else
      {
        $date=strtotime("+1 day",strtotime($p));
        $p=date("Y-m-d",$date);
      }
    }

  }       

  $i="ABCXYZ";

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "INSERT INTO ishant (a,b,c,d)
         VALUES ('$D', '$t', '$w','$i')";


 if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
}
}
?>