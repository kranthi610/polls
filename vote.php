<form method="post">
<?php echo $row['question']; ?>
<BR>
<input type="hidden" name="question_id" value="<?php echo $row['question_id'];?>">
<input type="radio" name="choice" value="1"> <?php echo $row['choice1']; ?><br>
<input type="radio" name="choice" value="2"> <?php echo $row['choice2']; ?><br>
<input type="radio" name="choice" value="3"> <?php  echo $row['choice3']; ?><br>
<input type="radio" name="choice" value="4">  <?php  echo $row['choice4']; ?><br>
<input type="submit" value="vote">
</form>
