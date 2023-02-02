<?php
session_start();
include("init.php");
$r2 = mt_rand(000000000,999999999);
$material_data = $_POST['material_data'];
$material_data_note = $_POST['material_data_note'];
if(isset($_SESSION['real2'])){
    $data_go = $_SESSION['real2'];
}else{
    
}
$type_of = $_POST['type'];
$data_yt = $_POST['data_yt'];
    $query = mysqli_query($init, "INSERT INTO course_material_ VALUES ('', '$r2','$data_go','$material_data', '$data_yt', '$type_of','$material_data_note','$date')");
    if($query){
        echo "Data saved";
    }

