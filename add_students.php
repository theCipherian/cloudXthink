<?php
session_start();
include("init.php");
$cloudcat_mayor = $_SESSION['cloudcat_data'];

$query = mysqli_query($init, "SELECT * FROM departments_  WHERE manager = '$cloudcat_mayor' ORDER BY id DESC");
$num = mysqli_fetch_array($query);
if($num < 1){
?>
<div style='text-align:center;'>
    You can't add students yet. Create a department.
</div>
<?php
exit;
}
?>
<div class='button' id='see_students'>students &nbsp <i class='bx bx-right-arrow-alt'></i></div>
<form class='department_add'>
<input type="text" id='student_name' placeholder='Student name'>
<input type="text" id='student_faculty' placeholder='Student faculty'>
<!-- <input type="text" id='student_department' placeholder='Student department'> -->
<select  id="student_department">
<?php
$query = mysqli_query($init, "SELECT department_name FROM departments_ WHERE manager = '$cloudcat_mayor'");
$is_it = mysqli_num_rows($query);
if($is_it > 0){
  while($array = mysqli_fetch_array($query)){
    $department_name1 = $array['department_name'];
    ?>
    <option value="<?php echo $department_name1  ?>"><?php echo $department_name1  ?></option>

<?php
  }
}
?>
</select>
<input type="text" id='student_programme' placeholder='Student programme'>
<input type="text" id='student_phone' placeholder='Student phone'>
<input type="text" id='student_email' placeholder='Student email'>
<input type="text" id='student_access' placeholder='Student access'>
<input type="text" id='student_semester' placeholder='Semester'>
<div class='button ' id='add_to_students_1'>Done  </div>
</form>
<div>
    <img src="Flame_Design_Science_transparent_by_Icons8.gif" alt="">
</div>
<script>
    $("#add_to_students_1").click(function(){
      let student_name = document.getElementById("student_name");
      let student_faculty = document.getElementById("student_faculty");
      let student_department = document.getElementById("student_department");
      let student_programme = document.getElementById("student_programme");
      let student_phone = document.getElementById("student_phone");
      let student_email = document.getElementById("student_email");
      let student_access = document.getElementById("student_access");
      let student_semester = document.getElementById("student_semester");
      if(student_name.value.length < 1  || student_faculty.value.length < 1 || student_department.value.length < 1 || student_programme.value.length < 1 || student_phone.value.length < 1 || student_email.value.length < 1 || student_access.value.length < 1 || student_semester.value.length < 1){
          show_pop_wrong("Fill all fields");
      }else{
      start_loader();
      $.ajax({
          url:"data_controller.php",
          type:"post",
          async:false,
          data:{
            "student_name":student_name.value,
            "student_faculty": student_faculty.value,
            "student_department":student_department.value,
            "student_programme":student_programme.value,
            "student_phone":student_phone.value,
            "student_email":student_email.value,
            "student_access":student_access.value,
            "student_semester":student_semester.value
          },success:function(data){
            student_name.value = "";
            student_faculty.value = "";
            student_department.value = "";
            student_programme.value = "";
            student_phone.value = "";
            student_email.value = "";
            student_access.value = "";
            student_semester.value = "";
            stop_loader();
            show_pop(data);
            // $("#load_data1").load("department_lists.php");
          }
      })
      }
    })
        $("#see_students").click(function(){
        start_loader();
        $("#data_change_23222").text("Students");
        $("#get_data_343222").load("see_students.php",function(){
        stop_loader();
        $(".sidepart3").removeClass("noner");
        })
        })
</script>