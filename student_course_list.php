<style>
    .p-34932-2{
        width:80%;
    }
    .hash{
        text-align:center;
        width:max-content;
        height:max-content;
        padding:10px;
        color:black;
        font-weight:bold;
            background-color:rgba(255,255,0,0.30);
    }
</style>
<?php
session_start(); 
include("init_sec.php");
$cloudcat_mayor = $_SESSION['cloudcat_data_sec'];


$bquery = mysqli_query($init_sec, "SELECT * FROM courses_ WHERE faculty = '$student_faculty' AND programme = '$student_programme' AND semester = '$student_semester' AND department = '$student_department' AND level = '$level' AND session = '$session'");
$num_course = mysqli_num_rows($bquery);
if($num_course > 0){
$_SESSION['courses_all'] = $num_course;
while($barray = mysqli_fetch_array($bquery)){
     $buni3352 = $barray['unique_id'];
     $course_name = $barray['course_name'];
     $course_programme = $barray['programme'];
     $course_department = $barray['department'];
     $course_semester = $barray['semester'];
     $course_date = $barray['date'];
     $sem = mysqli_query($init_sec, "SELECT semester_name FROM data_points_semester WHERE unique_id = '$course_semester'");
     $arr = mysqli_fetch_array($sem);
     $sem_name = $arr['semester_name'];
     $materials = mysqli_query($init_sec, "SELECT * FROM course_material_ WHERE course = '$buni3352'");
     $num_materials = mysqli_num_rows($materials);
    ?>
<div class='p-34932' id='<?php echo $buni3352 ?>'>
    <div class='p-34932-1'>
  <i class='bx bx-collection' ></i>
    </div>
    <div class='p-34932-2'>
        <div class='p-34932-2-1' style='letter-spacing:1px;'><?php echo $course_name ?></div>
        <div><?php echo "$num_materials material(s)" ?> - <?php echo $sem_name ?></div>
    </div>
</div>

<?php
}

?>
<script>
    $(".p-34932").click(function(){
        let data_to_sess = $(this).attr("id");
        start_loader();
        $.ajax({
            url:"data_controller_sec.php",
            type:"post",
            async:false,
            data:{
                "real3":data_to_sess,
            },success:function(){
                    $("#load_data2").load("course_materials.php",function(){
                    stop_loader();
                    })
                       if($(".p-34927-1").css('position') == 'fixed'){
           $(".p-34927-1").addClass("noner");
        }
            }
        })
    })
</script>

<?php
}else{
    ?>

<div class='hash'>
   You have no courses yet
</div>

    <?php
}
?>