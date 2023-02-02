<?php
$url = "localhost";
$username = "root";
$password = "";
$database = "cloudthink";
$init_sec = mysqli_connect($url, $username, $password, $database);
date_default_timezone_set("UTC");
$date = date('Y-m-d H:i:s ', time());
if(isset($_SESSION['cloudcat_data_sec'])){
 $cloudcat_citizen = $_SESSION['cloudcat_data_sec'];
    $query = mysqli_query($init_sec, "SELECT * FROM students_ WHERE unique_id = '$cloudcat_citizen'");
    $array = mysqli_fetch_array($query);
    $username = $array['username'];
    $first_name = $array['first_name'];
    $last_name = $array['last_name'];
    $middlename = $array['middle_name'];
    $registration_number = $array['registration_number'];
    $student_faculty = $array['student_faculty'];
    $level = $array['level'];
    $gender = $array['gender'];
    $student_email = $array['student_email'];
    $student_department = $array['student_department'];
    $student_phone = $array['student_phone'];
    $student_programme = $array['programme'];
    $student_semester = $array['semester'];
    $session = $array['session'];
    $student_access = $array['student_access'];
    $avatar = $array['avatar'];
    if(!$avatar){
        $avatar = 'avatar_23.png';
    }
    $stud_dep = mysqli_query($init_sec, "SELECT department_name FROM data_points_department WHERE unique_id = '$student_department'");
    $arr = mysqli_fetch_array($stud_dep);
    $student_department_name = $arr['department_name']; 
    $stud_pro = mysqli_query($init_sec, "SELECT programme_name FROM data_points_programme WHERE unique_id = '$student_programme'");
    $arr = mysqli_fetch_array($stud_pro);
    $student_programme_name = $arr['programme_name']; 
}