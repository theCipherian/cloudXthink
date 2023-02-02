<?php
session_start();
include("init.php");
if(isset($_SESSION['cloudcat_data'])){
    $cloudcat_mayor = $_SESSION['cloudcat_data'];
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
if(isset($_POST['real'])){
    $_SESSION['real'] = $_POST['real'];
}


if(isset($_POST['real2'])){
    $_SESSION['real2'] = $_POST['real2'];
}


if(isset($_POST['real5'])){
    $_SESSION['real5'] = $_POST['real5'];
}

if(isset($_POST['data_share'], $_POST['data_item'])){
    $data_share = $_POST['data_share'];
    $data_item = $_POST['data_item'];
    $query = mysqli_query($init, "UPDATE assignment_submission  SET score = '$data_share' WHERE unique_id = '$data_item'");
     echo "yup";
 }

if(isset($_SESSION['real'])){
    $real = $_SESSION['real'];
}

if(isset($_SESSION['real2'])){
    $real2 = $_SESSION['real2']; 
}

if(isset($_POST['quiz_data'])){
    $quiz_data = $_POST['quiz_data'];
    $query = mysqli_query($init, "INSERT INTO assignment VALUES ('','$rand_id', '$real','$real2', '$quiz_data', '$date')");
    
}


if(isset($_POST['username_change'])){
    $username_change = $_POST['username_change'];
    if($username !== ''){
    $query = mysqli_query($init, "UPDATE administrators_ SET admin_name = '$username_change' WHERE unique_id = '$cloudcat_mayor'");
    if($query){
        echo "yup";
    }else{
       
    }
}
}


if(isset($_POST['avatar_change'])){
    $avatar_change = $_POST['avatar_change'];
    $query = mysqli_query($init, "UPDATE administrators_ SET avatar = '$avatar_change' WHERE unique_id = '$cloudcat_mayor'");
    if($query){
        echo "yup";
    }else{

    }
}
if(isset($_POST['dpt_data'],$_POST['sms_data'], $_POST['prog_data'])){
    $dpt_data = $_POST['dpt_data'];
    $sms_data = $_POST['sms_data'];
    $prog_data = $_POST['prog_data'];
    $query = mysqli_query($init, "INSERT INTO departments_ VALUES ('$cloudcat_mayor','$dpt_data', '$prog_data', '$sms_data','','$rand_id')");
    if($query){
        echo "yup";
    }
}
if(isset($_POST['dpt_data1'],$_POST['sms_data1'], $_POST['prog_data1'])){
    $dpt_data1 = $_POST['dpt_data1'];
    $sms_data1 = $_POST['sms_data1'];
    $prog_data1 = $_POST['prog_data1'];
    $query = mysqli_query($init, "UPDATE departments_ SET  department_name = '$dpt_data1', programme_name = '$prog_data1', semester =  '$sms_data1' WHERE unique_id = '$real'");
    if($query){    
    }    
}
if(isset($_POST['rem'])){
    $query = mysqli_query($init, "DELETE FROM departments_ WHERE unique_id = '$real'");
}
if(isset($_POST['course_data'])){
$course_data = $_POST['course_data'];
$query = mysqli_query($init, "INSERT INTO courses_ VALUES ('', '$rand_id', '$course_data','$programme_name1','$real', '$semester1', '$date')");
}
if(isset($_POST['rem_data'])){
    $rem_course  = $_POST['rem_data'];
    $query = mysqli_query($init, "DELETE FROM courses_ WHERE unique_id = '$rem_course'");
}
if(isset($_POST['rem_data1'])){
    $rem_material  = $_POST['rem_data1'];
    $query = mysqli_query($init, "DELETE FROM course_material_ WHERE unique_id = '$rem_material'");
}
if(isset($_POST['edit_ident'], $_POST['edit_form_data'])){
    $data_ident = $_POST['edit_ident'];
    $data_value = $_POST['edit_form_data'];
    $query = mysqli_query($init, "UPDATE courses_ SET course_name = '$data_value' WHERE unique_id = '$data_ident'");
    if($query){
        echo"TRUE";
    }else{
        echo"FALSE";
    }
}
if(isset($_POST['student_name'], $_POST['student_faculty'], $_POST['student_department'], $_POST['student_programme'], $_POST['student_phone'], $_POST['student_email'], $_POST['student_access'], $_POST['student_semester'])){
    $student_name = $_POST['student_name'];
    $student_faculty = $_POST['student_faculty'];
    $student_department = $_POST['student_department'];
    $student_programme = $_POST['student_programme'];
    $student_phone = $_POST['student_phone'];
    $student_email = $_POST['student_email'];
    $student_access = $_POST['student_access'];
    $student_semester = $_POST['student_semester'];
    $query = mysqli_query($init, "INSERT INTO students_ VALUES ('','$rand_id','','$student_name','$uni','$student_faculty','$student_department','$student_programme','$student_phone','$student_email','$student_access','$student_semester','avatar_22.png','$date')");      
        if($query){
            echo "Student added";
        } 
}
if(isset($_POST['data_res'], $_POST['level'], $_POST['session'], $_POST['semester'])){
    $data_res = $_POST['data_res'];
    $level = $_POST['level'];
    $session = $_POST['session'];
    $semester = $_POST['semester'];
    $query = mysqli_query($init, "SELECT * FROM registrations_ WHERE unique_id = '$data_res'");
    $array = mysqli_fetch_array($query);
    $faculty = $array['faculty'];
    $department = $array['department'];
    $programme = $array['programme'];
    $first_name = $array['first_name'];
    $middle_name = $array['middle_name'];
    $last_name = $array['last_name'];
    $gender = $array['gender'];
    $student_email = $array['email_address'];
    $query_email = mysqli_query($init, "SELECT * FROM students_ WHERE student_email = '$student_email'");
    $is_it = mysqli_num_rows($query_email);
    if($is_it > 0){
        echo "Email adddress already exists";
        exit;
    }
    $home_address = $array['home_address'];
    $phone_number = $array['phone_number'];
    $whatsapp_number = $array['whatsapp_number'];
    $institutions = $array['institutions_attended'];
    $certification_id = $array['certifications_id'];
    $resolved = $array['resolved'];
    $date_enrolled = $array['date'];
    $query2 = mysqli_query($init, "UPDATE registrations_ SET resolved = 'true' WHERE unique_id = '$data_res'");
    $query3 = mysqli_query($init, "INSERT INTO students_ VALUES ('','$rand_id','user','$first_name','$middle_name','$last_name','NOT ASSIGNED','$uni','$faculty','$department','$programme','$session','$level','$phone_number','$whatsapp_number','$student_email','$gender','$home_address','allowed','$semester','avatar_22.png','$date')");
    if($query3){
        echo "resolved";
    }
}
?> 