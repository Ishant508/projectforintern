<!DOCTYPE html>
<head>
<?php include 'link.php';?>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:#7FDBFF;}
.main-div{
    width:100%;height:100vh;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}
.center-div{
    width:90%;
    height:80vh;
    background:-webkit-linear-gradient(left,#5DADE2,#00c6ff);
    padding:20px 0 0 0;
    box-shadow:0 10px 20px 0 rgba(0,0,0,.03);
    border-radius:10px;
}
h1{
    font-size:18px;
    color:#000;
    text-align:center;
    margin-top:-20px;
    margin-bottom:20px;
}
table{
    border-collapse:collapse;
    background-color:#fff;
    box-shadow:0 10px 20px 0 rgba(0,0,0,.03);
    border-radius:10px;
    margin:auto;
}
th,td{
    border:1px solid #f2f2f2;
    padding:8px 30px;
    text-align:center;
    color:grey;
}
th{
    text-transform:uppercase;
    font-weight:500;
}
td{
    font-size:13px;
}

</style>


</head>
<body>
<div class="main-div">
    <h1>View On-Going Projects</h1>
      <div class="center-div">
        <div class="table-responsive">
          <table>
             <thread>
               <tr>
                
                 <th>Topic</th>
                 <th>Number of Words</th>
                 <th>Instructions</th>
                 <th>Scheduled Delivery Date</th>
                
               </tr>
             </thread>
             <tbody>

             <?php

               include 'connection.php';

               if (mysqli_connect_errno())
               {
                 echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
               $sql="select * from ishant order by a ASC ";
               $result=mysqli_query($conn,$sql);
               $rowcount=mysqli_num_rows($result);
               $res=mysqli_fetch_array($result);
              
               
              if($rowcount>0)
              {
               do
              {
                ?>
                <tr>
             
                <td><?php echo $res['b']; ?></td>
                <td><?php echo $res['c']; ?></td>
                <td><?php echo $res['d']; ?></td>
                <td><?php echo $res['a']; ?></td>
                </tr>

             <?php
              } while($res=mysqli_fetch_array($result));
            }
              ?>             
             
             </tbody>
          </table>
        </div>

      </div>
</div>
</body>