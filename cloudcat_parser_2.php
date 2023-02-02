<?php
session_start();
include("init.php");
if(isset($_POST['email_verify'], $_POST['password_verify'])){
    $email = $_POST['email_verify'];
    $password = $_POST['password_verify'];
    $query = mysqli_query($init, "SELECT * FROM administrators_ WHERE admin_email = '$email' AND admin_passkey  = '$password'");
    $is_it = mysqli_num_rows($query);
    if($is_it < 1){
        echo "nah";
    }else{
         $arr = mysqli_fetch_array($query);
        $_SESSION['cloudcat_data'] = $arr['unique_id'];
        echo "yup";
    }
   
}
?>