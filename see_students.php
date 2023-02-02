<style>
    .row_item{
        display:flex;
        width:100%;
        justify-content:space-evenly;
        height:6rem;
        align-items:center;
        padding:1rem;
        overflow-x:scroll;
        overflow-y:hidden;

    }
    .row_item::-webkit-scrollbar{
        background-color:transparent;
    }
    .row_item::-webkit-scrollbar-thumb{
       border-radius:30px;
       background-color:rgba(138, 43, 226, 0.09);
    }
    .row_item_data2{
        text-transform:lowercase;
        color:black !important;
        font-weight:bold;
    }
    .row_item_data i{
        font-size:2rem;
        color: grey;
        cursor:pointer;
    }
    *{
        user-select:text !important;
    }
</style>
<?php
session_start();
include("init.php");
$query = mysqli_query($init, "SELECT * FROM students_");
$num = mysqli_num_rows($query);
if($num < 1){
  ?>
  <div>
      <div class='msg'> 
       There are currently no registered students
  </div>
  </div>
  <?php
}
while($array = mysqli_fetch_array($query)){
    $uni089341 = $array['unique_id'];
    $student_name = $array['student_name'];
    $student_passkey = $array['student_passkey'];
    $student_faculty = $array['student_faculty'];
    $student_department  = $array['student_department'];
    $student_phone = $array['student_phone'];
    $student_email = $array['student_email'];
    $student_access = $array['student_access'];
    $semester = $array['semester'];
    $enrolled_on = $array['enrolled_on'];
    ?>
    <div class='row_item data3<?php echo $uni089341 ?>' style='border-bottom: none !important;display:flex;width:100%;align-items:center;justify-content:space-between'>
    <div style='min-width:20rem;' class='row_item_data'><?php echo $student_name ?></div>
    <div style='min-width:20rem;' class='row_item_data'><?php echo $student_passkey ?></div>
    <div style='min-width:20rem;' class='row_item_data'><?php echo $student_faculty ?></div>
    <div style='min-width:20rem;' class='row_item_data'><?php echo $student_department ?></div>
    <div style='min-width:20rem;' class='row_item_data'><?php echo $student_phone ?></div>
    <div style='min-width:20rem;' class='row_item_data'><?php echo $student_email ?></div>
    <div style='min-width:20rem;' class='row_item_data'><?php echo $student_access ?></div>
    <div style='min-width:20rem;' class='row_item_data'><?php echo $semester ?></div>
</div>
<?php
}
?>



