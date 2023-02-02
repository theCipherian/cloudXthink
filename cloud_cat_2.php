<?php
session_start();
include("init.php");
$n=40;
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
$r2 = mt_rand(000000000,999999999);
$material_data = $_POST['material_data'];
$material_data_note = $_POST['material_data_note'];
if(isset($_SESSION['real2'])){
    $data_go = $_SESSION['real2'];
}else{
    
}
$type_of = $_POST['type'];
if($_FILES['file']['name'] != ''){
    $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);    
    $name = $uni.'.'.$extension;
    $location = 'video_uploads/'.$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
    $query = mysqli_query($init, "INSERT INTO course_material_ VALUES ('', '$r2','$data_go','$material_data', '$name', '$type_of','$material_data_note','$date')");
    if($query){
        echo "Data saved";
    }
}
