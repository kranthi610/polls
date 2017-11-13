<?php
 session_start();
if(isset($_SESSION["admin"]))
{


header("Refresh:0;url=admin.php");
}

?>
<html>
<br><br><br><br><p style="color:red;" align="center"><b>Admin Login<b></p>

<form align="center"  method="POST">
username:<input type="text" name="email"><br><br>
password:<input type="password" name="password"><br><br>
<input type="submit">

</form>

</html>





<?php
require('includes/database.php');
if($_POST){
$user=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);

$sql="SELECT email,password  FROM admin_login WHERE email='$user' and password='$password'";


$result = $conn->query($sql);

   


if ($result->num_rows > 0  ) {
    $_SESSION["admin"] = $user;
    
   header("Refresh:0;url=admin.php");
   
        
    }
  
else {
    
    header("Refresh:1; url=admin_login.php");
    die("Wrong credentials");
}

}


?>