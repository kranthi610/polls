<?php
//sort code for uploading or moving file to server
if (isset($_POST["submit"]))
{
  
        


   // foreach ($_FILES['files']['name'] as $filename) 
    //{
  echo '<pre>';
      print_r($_FILES['files']);
      echo '</pre>';
     // $temp=$target;
     // $tmp=$_FILES['files']['tmp_name'][$count];
     // $count=$count + 1;
     // $temp=$temp.basename($filename);
     // move_uploaded_file($tmp,$temp);
     // $temp='';
//$tmp='';
    //}
 
}
?>


<form method="post" action="" enctype="multipart/form-data">
  <input type="file" name="files[]" id="files"  multiple/>
  <input type="submit" name="submit"/>
</form> 