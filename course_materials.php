<style>

    .row_item_data1{
        text-transform:uppercase;
    color:black;
        font-weight:bold;
    }
    .row_item_data i{
        font-size:2rem;
        color: grey;
        cursor:pointer;
    }
    .thing_345{
    border-radius:7px;
    height:3rem;
    background-color:rgba(255,255,0,0.30);
    display:flex;
    width:max-content;
    padding:1rem;
    align-items:center;
    justify-content:center;

}
.button{
    font-size:12px;
}
.button i{
    font-size:13px;
}
.button_active{
    border-color:limegreen;
    color:limegreen;
}
</style>
<?php
session_start();
include("init_sec.php");
$real3 = $_SESSION['real3'];
$query_one = mysqli_query($init_sec, "SELECT course_status FROM course_status_ WHERE student = '$cloudcat_citizen' AND course = '$real3'");
$is_it = mysqli_num_rows($query_one);
if($is_it){
    $arr = mysqli_fetch_array($query_one);
    $course_status_peek = $arr['course_status'];
}

?>
<div style='display:flex;align-items:center;border-bottom:1px solid #ddd;padding-bottom:2rem'>
<div class='button btn_click <?php if($course_status_peek == 'unfinished'){ echo "button_active";}  ?>' id='unfinished'>unfinished</div>
<div class='button btn_click <?php if($course_status_peek == 'completed'){ echo "button_active";}  ?>'' id='completed'>complete</div>
<?php
$query = mysqli_query($init_sec, "SELECT id FROM assignment WHERE course = '$real3'");
$num = mysqli_num_rows($query);
if($num > 0){
    ?>
<div class='button tooltip' id='view_quiz'>View Asg.mt <span class="tooltiptext">View assignment</span></div>
    <?php
}

?>
</div>
<?php
if(isset($_SESSION['real3'])){
    $real3 = $_SESSION['real3'];
    $query = mysqli_query($init_sec, "SELECT * FROM course_material_ WHERE course = '$real3'");
     while($array = mysqli_fetch_array($query)){
         $uni2232 = $array['unique_id'];
         $material_name = $array['material_name'];
         $material_data = $array['material_data'];
         $material_type = $array['material_type'];
         $material_deploy_note = $array['deploy_note'];
         $material_deploy_date = $array['date'];
     ?>
<div class='row_item ' id='<?php echo $uni2232 ?>' >
        <div class='row_item_data' style='width:5%'>
        <?php
           if($material_type == 'ebook_link'){
               ?>
<i class='bx bx-book tooltip'> <span class="tooltiptext">ebook lecture</span></i>
               <?php
           }elseif ($material_type == 'yt_link') {
               ?>
<i class='bx bx-video tooltip' > <span class="tooltiptext">video lecture</span></i>
               <?php
           }elseif ($material_type == 'video') {
               ?>
<i class='bx bx-video tooltip' > <span class="tooltiptext">video lecture</span></i>
               <?php
           }elseif ($material_type == 'text') {
               ?>
<i class='bx bx-book tooltip'> <span class="tooltiptext">ebook lecture</span> </i>
               <?php
           }
           ?>
     
     </div>
    <div class='row_item_data1 ' style='width:30%;text-transform:lowercase'> <span class='thing_345' ><?php echo $material_name ?></span> </div>
    <div class='row_item_data bg_s'><?php echo $material_deploy_note ?></div>
    <div class='row_item_data'><div class='button '>View &nbsp  <i class='bx bx-right-arrow-alt'></i></div></div>
</div>
     <?php
        }
     
}else{
    
}?>
<script>
    $(".row_item").click(function(){
        let data_to = $(this).attr("id");
            start_loader();
            $.ajax({
                url:"data_controller_sec.php",
                type:"post",
                async:false,
                data:{
                    "data_to":data_to
                },success:function(){
                   $("#load_data2").load("material_data.php",function(){
                    stop_loader();
                    })
                }
            })
    })
    $(".btn_click").click(function(){
 var button = document.querySelectorAll(".btn_click");
   button.forEach((btn) => {
     btn.classList.remove("button_active");
     this.classList.add("button_active");
   })
    })
   $("#unfinished").click(function(){
      start_loader();
            $.ajax({
                url:"data_controller_sec.php",
                type:"post",
                async:false,
                data:{
                    "unfinished":"unfinished"
                },success:function(){
                    stop_loader();
                }
            })
   })
   $("#completed").click(function(){
      start_loader();
            $.ajax({
                url:"data_controller_sec.php",
                type:"post",
                async:false,
                data:{
                    "completed":"completed"
                },success:function(){
                    stop_loader();
                }
            })
   })
   $("#view_quiz").click(function(){
        $("#change_89v2").text("Assigment");
        start_loader();
            $("#load_data2").load("quiz_list.php",function(){
            stop_loader();
            })
   })
</script>