<?php

require ('database.php');


// sql to create table


$question_table = "CREATE TABLE question (
id BIGINT(255)  UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
question text(255) NOT NULL,

posted_date TIMESTAMP NOT NULL,
expiry_date date NOT NULL
)";
if ($conn->query($question_table) === TRUE) {
    echo "Table Questions created successfully";
} else {
    die($conn->error);
}
$choice_table = "CREATE TABLE choices (
id BIGINT(255)  UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
question_id BIGINT(255) NOT NULL,
choice1 VARCHAR(255) NOT NULL,
choice2 VARCHAR(255) NOT NULL,
choice3 VARCHAR(255) NOT NULL,
choice4 VARCHAR(255) NOT NULL
)";

if ($conn->query($choice_table) === TRUE) {
    echo "Table choices created successfully";
} else {
    die($conn->error);
}
$votes_table = "CREATE TABLE votes (
id BIGINT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
question_id BIGINT(255) NOT NULL,
choice_id BIGINT(255) NOT NULL,

reg_date TIMESTAMP
)";




if ($conn->query($votes_table) === TRUE) {
    echo "Table votes created successfully";
} else {
    die($conn->error);
}


?>