<style>
    .row_item{
        display:flex;
        width:100%;
        justify-content:space-evenly;
        height:6rem;
        align-items:center;
        padding:1rem;
        border-bottom:1px solid #ddd;
    }
    .row_item_data1{
        text-transform:uppercase;
    color:blueviolet;
        font-weight:bold;
    }
    .row_item_data i{
        font-size:2rem;
        color: grey;
        cursor:pointer;
    }
    .msg{
        width:max-content;
        height:max-content;
        padding:1rem;
        border-radius:10px;
        margin-bottom:10px;
        color:blueviolet;
      background-color:rgba(255,255,0,0.30);

    }
    .header_text{
        margin:1rem;
        width:max-content;
        height:max-content;
        padding:1rem;
          color:black;
          border-radius:5px;
          font-weight:bold;
      background-color:rgba(255,255,0,0.30);
    }
    .noner{
        display:none !important;
    }
</style>
<?php
session_start();
include("init.php");
$faculty = $_SESSION['faculty'];
$department = $_SESSION['department'];
$programme = $_SESSION['programme'];
$level = $_SESSION['level'];
$session = $_SESSION['session'];
$semester = $_SESSION['semester'];
$query = mysqli_query($init, "SELECT * FROM courses_ WHERE department = '$department' AND programme = '$programme' AND faculty = '$faculty' AND level = '$level' AND session = '$session' AND semester = '$semester' ORDER BY id DESC");
$num = mysqli_num_rows($query);
if($num < 1){
    ?>
<div style='width:100%;height:100%;margin:2rem;'>
<div class='note'> 
    Course dosent exist.
</div>
</div>
<script>
       $("#add_to_courses").click(function(){
        start_loader();
        $("#data_change_232").text("Add new course");
        $("#get_data_3432").load("add_course.php",function(){
        stop_loader();
        $(".sidepart").removeClass("noner");
        })
    })
</script>
  <?php
}else{
    ?>
    <?php
        $faculty_data = mysqli_query($init, "SELECT faculty_name FROM data_points_faculty WHERE unique_id = '$faculty'");
        $data = mysqli_fetch_array($faculty_data);
        $name_to_name1 = $data['faculty_name'];
        ?>
       <div style='display:flex;align-items:center'>
     <div class='header_text'>
       <?php echo $name_to_name1 ?>
     </div>
       </div>
    <?php
    while($array = mysqli_fetch_array($query)){
    $course = $array['course_name'];
    $programme = $array['programme'];
    $department = $array['department'];
    $semester = $array['semester'];
    $uni33533 = $array['unique_id'];
    $date934 = $array['date'];
    ?>
    <div class='row_item data<?php echo $uni33533 ?>' >
    <div style='width:40%' class='row_item_data '> <span class='thing_345 vb<?php echo  $uni33533  ?>' ><?php echo $course ?> </span> </div>
    <div class='row_item_data row_item_data_2 d<?php echo $uni33533  ?>'><?php echo $date934 ?> </div>
    <div class='row_item_data delete_course row_item_data_3 c<?php echo $uni33533 ?>'  data-rem='<?php echo $uni33533  ?>'> <i class='bx bx-trash' ></i></div>
    <div class='row_item_data row_item_data_4 incheck vbc<?php echo $uni33533 ?>' data-get='<?php echo $uni33533  ?>'> <i class='bx bx-pencil' ></i></div>
    <div class='row_item_data row_item_data_5 addcheck o<?php echo $uni33533  ?>' data-get='<?php echo $uni33533  ?>'> <i data-get='<?php echo $uni33533  ?>' class='portal bx bx-list-plus'></i></div>
    <div style='width:50%;display:flex;align-items:center;' class='row_item_data j<?php echo $uni33533  ?> noner'>
    <textarea type="text" class='textarea' style='min-width:10rem;' id='course_name_edit<?php echo $uni33533  ?>'><?php echo $course  ?></textarea>
    <div class='button edit_course_name'  data-get='<?php echo $uni33533  ?>'>Done  </div>
    </div>
    </div>
    <?php
    }
?>
<script>
    $(".portal").click(function(){
        data_go = $(this).attr("data-get");
        $.ajax({
        url:"data_controller.php",
        type:"post",
        async:false,
        data:{
            "real2":data_go,
        },success:function(){
        }
      })
        start_loader();
        $("#data_change_232").text("Course materials");
        $("#get_data_3432").load("add_course_material.php",function(){
        stop_loader();
        $(".sidepart").removeClass("noner");
        })
     })
     $(".edit_course_name").click(function(){
        let taker = $(this).attr("data-get");
        let renamed = document.querySelector(".vb"+taker);
        let data_get = document.getElementById("course_name_edit"+taker);
        if(data_get.value.length < 1){
            show_pop_wrong("Can't be empty");
        }else{
        
        $.ajax({
            url:"data_controller.php",
            type:"post",
            async:false,
            data:{
                "edit_ident": taker,
                "edit_form_data":data_get.value
            },success:function(data){
                renamed.textContent = data_get.value;
                 $(".d"+taker).removeClass("noner");
        $(".c"+taker).removeClass("noner");
        $(".j"+taker).addClass("noner");
        $(".o"+taker).removeClass("noner");
        $(".vbc"+taker).removeClass("noner");
             
            }
        })
        }
    })



    
    $(".incheck").click(function(){
        let taker = $(this).attr("data-get");
        $(".d"+taker).addClass("noner");
        $(".c"+taker).addClass("noner");
        $(".j"+taker).removeClass("noner");
        $(".o"+taker).addClass("noner");
        $(this).addClass("noner");
    })
       $("#add_to_courses").click(function(){
        start_loader();
        $("#data_change_232").text("Add new course");
        $("#get_data_3432").load("add_course.php",function(){
        stop_loader();
        $(".sidepart").removeClass("noner");
        })
    })
    $(".delete_course").click(function(){
        $(".bg-pop").removeClass("noner");
         let rem_data = $(this).attr("data-rem");
        var green  = document.querySelector(".greencard");
        green.addEventListener("click",function(){
        let data_hide = document.querySelector('.data'+rem_data);
        data_hide.classList.add("noner");
        start_loader();
        $.ajax({
            url:"data_controller.php",
            type:"post",
            async:false,
            data:{
                "rem_data": rem_data
            },success:function(data){
                stop_loader();
                show_pop("Data removed");
                $(".bg-pop").addClass("noner");
            //   $(".load_av_departments").load("courses_data.php");
            }
        })
    })
            })
        $(".button").click(function(){
        var button = document.querySelectorAll(".button");
        button.forEach((btn) => {
        btn.classList.remove("button_active");
        this.classList.add("button_active");
        })
        })
          $(".redcard").click(function(){
          $(".bg-pop").addClass("noner");
        })
</script>
<?php
}
?>