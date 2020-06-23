<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mychat1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if($conn)
{
//echo "Connection Successful";
?>

<script>

//alert('Connection Successful');
</script>
<?php

}
else
{
    ?>
//echo "Connection Unuccessful";
<script>

//alert('Connection Unuccessful');
</script>
<?php
}


?>