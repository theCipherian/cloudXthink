<?php
session_start();
include("init_sec.php");
if(isset($_SESSION['cloudcat_data_sec'])){
    $cloudcat_citizen = $_SESSION['cloudcat_data_sec'];
}
$n=12;
function rand_id($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = ''; 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

$uni = rand_id($n);
$rand_id = mt_rand(00000000,99999999);
if(isset($_POST['real3'])){
    $_SESSION['real3'] = $_POST['real3'];
    $course_session = $_SESSION['real3'];
    $query_one = mysqli_query($init_sec, "SELECT unique_id FROM course_status_ WHERE student = '$cloudcat_citizen' AND course = '$course_session'");
    $is_it = mysqli_num_rows($query_one);
    if($is_it < 1){
    $query = mysqli_query($init_sec, "INSERT INTO course_status_ VALUES ('','$rand_id','$cloudcat_citizen','unfinished','$course_session','$date')");
}
}
if(isset($_SESSION['real3'])){
    $course_session = $_SESSION['real3'];
}

if(isset($_POST['data_to'])){
    $_SESSION['material_data'] = $_POST['data_to'];
}


if(isset($_POST['craig'])){
    $_SESSION['craig'] = $_POST['craig'];
}


if(isset($_POST['assignment'], $_POST['ass_data'])){
    $assignment = $_POST['assignment'];
    $ass_data = $_POST['ass_data'];
    $query = mysqli_query($init_sec, "INSERT INTO  assignment_submission VALUES ('', '$rand_id', '$assignment', '$cloudcat_citizen','$ass_data','$date')");
    echo "yes";  
}


if(isset($_POST['avatar_change'])){
    $avatar_change = $_POST['avatar_change'];
    $query = mysqli_query($init_sec, "UPDATE students_ SET avatar = '$avatar_change' WHERE unique_id = '$cloudcat_citizen'");
    if($query){
        echo "yup";
    }else{
    }
}

if(isset($_POST['unfinished'])){
    $query = mysqli_query($init_sec, "UPDATE course_status_  SET course_status = 'unfinished' WHERE student = '$cloudcat_citizen' AND course = '$course_session'");
}

if(isset($_POST['completed'])){
    $query = mysqli_query($init_sec, "UPDATE course_status_  SET course_status = 'completed' WHERE student = '$cloudcat_citizen' AND course = '$course_session'");
}

if(isset($_POST['username_change'])){
    $username_change = $_POST['username_change'];
    if($username !== ''){
    $query = mysqli_query($init_sec, "UPDATE students_ SET username = '$username_change' WHERE unique_id = '$cloudcat_citizen'");
    if($query){
        echo "yup";
    }else{
    }
}
}