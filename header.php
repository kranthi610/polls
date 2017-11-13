<?php 

if($_POST){
session_unset(); 


session_destroy();

 header("Refresh:0;url=admin_login.php");
}?>

<form method="post">

<input type="submit" name="logout" value="logout">
</form>

<form method="post">


<?php

if(strpos($_SERVER['REQUEST_URI'],"admin.php")){
echo "<a href='polls.php'>View Polls</a>";
}
else
{
	echo "<a href='admin.php'>Add POLL</a>";
}

?>