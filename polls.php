<?php
session_start(); 
if(!isset($_SESSION["admin"]))
{


header("Refresh:0;url=admin_login.php");
}
require ('includes\database.php');
include('header.php');
$today = $today = date("Y-m-d");

$question_id = '';
$polls = "SELECT a.id, a.question,a.posted_date,a.expiry_date, b.question_id,b.choice1,b.choice2,b.choice3,b.choice4
      FROM question a, choices b WHERE a.id = b.question_id ";
$question_result = $conn->query($polls);
if ($question_result->num_rows > 0) {

    // output data of each row
   while($row = $question_result->fetch_assoc()) {
   	    echo "<br><br>".$row['question']."&nbsp;&nbsp;&nbsp;Posted:".date("F j, Y", strtotime($row['posted_date']))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expiry:"."&nbsp;&nbsp;&nbsp;".date("F j, Y", strtotime($row['expiry_date']));
        $question_id = $row['question_id'];
        $choice_1 = $row['choice1'];
        $choice_2 = $row['choice2'];
        $choice_3 = $row['choice3'];
        $choice_4 = $row['choice4'];
        include('results.php');
        
    }
} else {
    echo "0 results";
}
?>