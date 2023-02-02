<?php
session_start();
include("init.php");

$query = mysqli_query($init, "SELECT id FROM students_");
$all = mysqli_num_rows($query);

?>

<div class="note"><?php echo "$all student(s)"; ?></div>

<?php

?>
