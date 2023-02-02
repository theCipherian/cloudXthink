<?php
session_start();
include("init.php");

$query = mysqli_query($init, "SELECT id FROM students_ WHERE registration_number = 'NOT ASSIGNED'");
$all = mysqli_num_rows($query);

?>

<div class="note"><?php echo "$all student(s)"; ?></div>

<?php

?>
