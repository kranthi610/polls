
<?php
require ('includes\database.php');
$today = date("Y-m-d");
$choice_1 = '';
$choice_2 = '';
$choice_3 = '';
$choice_4 = '';
$polls = "SELECT a.id, a.question, b.question_id,b.choice1,b.choice2,b.choice3,b.choice4
      FROM question a, choices b WHERE a.id = b.question_id and a.expiry_date>'$today'";
$result = $conn->query($polls);

if ($result->num_rows > 0) {

    // output data of each row
   while($row = $result->fetch_assoc()) {
        $choice_1 = $row['choice1'];
        $choice_2 = $row['choice2'];
        $choice_3 = $row['choice3'];
        $choice_4 = $row['choice4'];
        include('vote.php');
    }
} else {
    echo "0 results";
}
if($_POST){
$reg_date = date("Y-m-d H:i:s");
$choice_id = $_POST['choice'];
$question_id = $_POST['question_id'];


$insert_vote = "INSERT INTO votes (question_id, choice_id, reg_date)
VALUES ('$question_id', '$choice_id', '$reg_date')";

if ($conn->query($insert_vote) === TRUE) {
    
    
        	echo "Thanks for voting <br<br><h1>Results</h1>";

} else {
    echo "Error: " . $insert_vote . "<br>" . $conn->error;
}  

include('results.php');

}
?>