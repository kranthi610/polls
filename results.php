<?php
require ('includes\database.php');
$results  = "SELECT count(choice_id) as choice1_result from votes WHERE choice_id=1 and question_id='$question_id'";
$result = $conn->query($results);
$row = $result->fetch_assoc();
echo "<br>".$choice_1.": ".$row['choice1_result']."<br>";
$results  = "SELECT count(choice_id) as choice2_result from votes WHERE choice_id=2 and question_id='$question_id'";
$result = $conn->query($results);
$row = $result->fetch_assoc();
echo $choice_2.": ".$row['choice2_result']."<br>";
$results  = "SELECT count(choice_id) as choice3_result from votes WHERE choice_id=3 and question_id='$question_id'";
$result = $conn->query($results);
$row = $result->fetch_assoc();
echo $choice_3.": ".$row['choice3_result']."<br>";
$results  = "SELECT count(choice_id) as choice4_result from votes WHERE choice_id=4 and question_id='$question_id'";
$result = $conn->query($results);
$row = $result->fetch_assoc();
echo $choice_4.": ".$row['choice4_result'];
?>