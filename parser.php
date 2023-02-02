<?php
session_start();
include("init.php");
if(!isset($_SESSION['init'])){
  ?>
<?php
}else{

 }
 $uniq_id = mt_rand(00000000,99999999);
 function x($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

if(isset($_POST['data_1'])){
    $data1 = $_POST['data_1'];
    $query = mysqli_query($init, "SELECT id FROM data_points_department WHERE department_name = '$data1'");
    $is_it = mysqli_num_rows($query);
    if($is_it > 0){
        echo "Already exists";
        exit;
    }else{
       $uniq = mt_rand(0000000,9999999);
       $query = mysqli_query($init, "INSERT INTO data_points_department VALUES ('','$uniq','$data1')");
       if($query){
           echo "Data added";
           exit;
       }
    }
}
if(isset($_POST['data_2'])){
    $data2 = $_POST['data_2'];
    $query = mysqli_query($init, "SELECT id FROM data_points_programme WHERE programme_name = '$data2'");
    $is_it = mysqli_num_rows($query);
    if($is_it > 0){
        echo "Already exists";
        exit;
    }else{
       $uniq = mt_rand(0000000,9999999);
       $query = mysqli_query($init, "INSERT INTO data_points_programme VALUES ('','$uniq','$data2')");
       if($query){
           echo "Data added";
           exit;
       }
    }
}
if(isset($_POST['data_3'])){
    $data3 = $_POST['data_3'];
    $query = mysqli_query($init, "SELECT id FROM data_points_semester WHERE semester_name = '$data3'");
    $is_it = mysqli_num_rows($query);
    if($is_it > 0){
        echo "Already exists";
        exit;
    }else{
       $uniq = mt_rand(0000000,9999999);
       $query = mysqli_query($init, "INSERT INTO data_points_semester VALUES ('','$uniq','$data3')");
       if($query){
           echo "Data added";
           exit;
       }
    }
}
if(isset($_POST['data_4'])){
    $data4 = $_POST['data_4'];
    $query = mysqli_query($init, "SELECT id FROM data_points_session WHERE session_name = '$data4'");
    $is_it = mysqli_num_rows($query);
    if($is_it > 0){
        echo "Already exists";
        exit;
    }else{
       $uniq = mt_rand(0000000,9999999);
       $query = mysqli_query($init, "INSERT INTO data_points_session VALUES ('','$uniq','$data4')");
       if($query){
           echo "Data added";
           exit;
       }
    }
}
if(isset($_POST['data_5'])){
    $data5 = $_POST['data_5'];
    $query = mysqli_query($init, "SELECT id FROM data_points_level WHERE level_name = '$data5'");
    $is_it = mysqli_num_rows($query);
    if($is_it > 0){
        echo "Already exists";
        exit;
    }else{
       $uniq = mt_rand(0000000,9999999);
       $query = mysqli_query($init, "INSERT INTO data_points_level VALUES ('','$uniq','$data5')");
       if($query){
           echo "Data added";
           exit;
       }
    }
}
if(isset($_POST['data_6'])){
    $data6 = $_POST['data_6'];
    $query = mysqli_query($init, "SELECT id FROM data_points_faculty WHERE faculty_name = '$data6'");
    $is_it = mysqli_num_rows($query);
    if($is_it > 0){
        echo "Already exists";
        exit;
    }else{
       $uniq = mt_rand(0000000,9999999);
       $query = mysqli_query($init, "INSERT INTO data_points_faculty VALUES ('','$uniq','$data6')");
       if($query){
           echo "Data added";
           exit;
       }
    }
}
if(isset($_POST['data0'], $_POST['data1'], $_POST['data2'], $_POST['data3'], $_POST['data4'], $_POST['data5'], $_POST['data6'])){
    $data0  = $_POST['data0'];
    $data1 = $_POST['data1'];
    $data2 = $_POST['data2'];
    $data3 = $_POST['data3'];
    $data4 = $_POST['data4'];
    $data5 = $_POST['data5'];
    $data6 = $_POST['data6'];

    $query = mysqli_query($init, "SELECT id FROM courses_ WHERE course_name= '$data0' AND faculty = '$data1' AND department = '$data2' AND programme = '$data3' AND level = '$data4' AND session = '$data5' AND semester = '$data6'");
    $is_it = mysqli_num_rows($query);
    if($is_it > 0){
        echo "already exists";
        exit;
    }else{
        $query = mysqli_query($init, "INSERT INTO courses_ VALUES ('','$uniq_id','$data0','$data1','$data3','$data2','$data6','$data5','$data4','$date')");
        if($query){
            echo "successful";
        }
    }
}

if(isset($_POST['run_1'], $_POST['run_2'])){
    $run1 = $_POST['run_1'];
    $run2 = $_POST['run_2'];
    $query = mysqli_query($init, "INSERT INTO notifications VALUES ('','$uniq_id','$run2','$run1','$date')");
    echo "Notification sent";
}
if(isset($_POST['run_3'])){
    $run1 = $_POST['run_3'];
    $query = mysqli_query($init, "INSERT INTO notifications VALUES ('','$uniq_id','$run1','all','$date')");
    echo "Notification sent";
}
if(isset($_POST['subject2'], $_POST['title2'], $_POST['text2'])){
    $data2 = $_POST['subject2'];
    $data3 = $_POST['title2'];
    $data4 = $_POST['text2'];
    $subject = $data2;
    $all = mysqli_query($init, "SELECT student_email FROM students_");
    while($all_for = mysqli_fetch_array($all)){
        $data1 = $all_for['student_email'];
            $message = "
            <div style='border-radius:15px;height:200%;padding:2rem;'>
            <h3 style='color:#9b59b6;'>".$data3."</h3>
            <p style='padding:1rem;margin:5px;color:grey;font-weight:1.6rem;'>".$data4."</p>
            </div>
            ";
            require_once "PHPMailer/PHPMailer.php";
            require_once "PHPMailer/SMTP.php";
            require_once "PHPMailer/Exception.php";
            $mail =  new PHPMailer\PHPMailer\PHPMailer();
            //SMTP Settings
            $mail->isSMTP();
            $mail->Host = "crudefinance.xyz";
            $mail->SMTPAuth = true;
            $mail->Username = "team@crudefinance.xyz";
            $mail->Password = 'E]o~sU6fg7^l';
            $mail->Port = 465; //587
            $mail->SMTPSecure = "ssl"; //ssl
            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom('team@crudefinance.xyz', 'Crudefinance');
            $mail->addAddress("$data1");
            $mail->Subject = $data2;
            $mail->Body = $message;
            if($mail->send()){
                    echo "email sent";
                exit;
        }
    }
}

if(isset($_POST['stud'])){
    $_SESSION['stud'] = $_POST['stud'];   
}

if(isset($_POST['firstname'],$_POST['lastname'],$_POST['middlename'],$_POST['email'],$_POST['regnum'],$_POST['faculty'],$_POST['department'],$_POST['programme'],$_POST['session'],$_POST['level'], $_POST['semester'],$_POST['phone'],$_POST['whatsapp_number'], $_POST['gender'],$_POST['residence'])){
    $stud = $_SESSION['stud'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $email = $_POST['email'];
    $regnum = $_POST['regnum'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $programme = $_POST['programme'];
    $session = $_POST['session'];
    $semester = $_POST['semester'];
    $level = $_POST['level'];
    $phone = $_POST['phone'];
    $whatsapp_number = $_POST['whatsapp_number'];
    $gender = $_POST['gender'];
    $residence = $_POST['residence'];
    $query = mysqli_query($init, "UPDATE students_ SET first_name = '$firstname', middle_name = '$middlename', last_name = '$lastname', registration_number = '$regnum', student_faculty = '$faculty', student_department = '$department', programme = '$programme', session = '$session', semester = '$semester', level = '$level', student_phone = '$phone', whatsapp_number = '$whatsapp_number', student_email = '$email', gender = '$gender', residence = '$residence' WHERE unique_id = '$stud'");
    echo "Updated";
}