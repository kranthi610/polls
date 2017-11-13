<?php
session_start();
if(!isset($_SESSION["admin"]))
{


header("Refresh:0;url=admin_login.php");
}
require ('includes\database.php');
include('header.php');
?>



<html>


<label for="question">Question</label>
<input type="text" name="question">

<label for="choice1">Choice 1</label>
<input type="text" name="choice1">

<label for="choice2">Choice 2</label>
<input type="text" name="choice2">

<label for="choice3">Choice 3</label>
<input type="text" name="choice3">

<label for="choice4">Choice 4</label>
<input type="text" name="choice4">

<label for="expiry_date">Choice 4</label>
<input type="date" name="expiry_date">

<button type="submit" name="polls">Post Question</button>
</form>
</html>

<?php
 
if(isset($_POST['polls'])){

$question = mysqli_real_escape_string($conn, $_POST['question']);
$posted_date = date("Y-m-d H:i:s");
$expiry_date = mysqli_real_escape_string($conn, $_POST['expiry_date']);
$choice1 = mysqli_real_escape_string($conn, $_POST['choice1']);
$choice2 = mysqli_real_escape_string($conn, $_POST['choice2']);
$choice3 = mysqli_real_escape_string($conn, $_POST['choice3']);
$choice4 = mysqli_real_escape_string($conn, $_POST['choice4']);

$insert_question = "INSERT INTO question (question, posted_date, expiry_date)
VALUES ('$question', '$posted_date', '$expiry_date')";

if ($conn->query($insert_question) === TRUE) {
    
    $reg_date = date("Y-m-d H:i:s");
    $insert_choice = "INSERT INTO choices (question_id, choice1,choice2,choice3,choice4,reg_date)
VALUES ('$conn->insert_id', '$choice1', '$choice2','$choice3', '$choice4','$reg_date')";
        if ($conn->query($insert_choice) === TRUE) {
        	echo "New record created successfully";
        }
        else{echo "Error: " . $insert_choice . "<br>" . $conn->error;}

} else {
    echo "Error: " . $insert_question . "<br>" . $conn->error;
}  
header("Location: http://localhost/polls/index.php");
}



?>