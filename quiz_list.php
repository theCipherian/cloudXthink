<?php
session_start();
include("init_sec.php");
if(isset($_SESSION['real3'])){
    $real3 = $_SESSION['real3'];
}
if(isset($_SESSION['cloudcat_data'])){
    $cloudcat_citizen = $_SESSION['cloudcat_data'];
}
$query = mysqli_query($init_sec, "SELECT * FROM assignment WHERE course = '$real3' ORDER BY id DESC");
$num = mysqli_num_rows($query);
if($num < 1){
?>
<div>
    There are no quizzes for this course yet!
</div>
<?php
}else{
    $num_count = 0;
    while($array = mysqli_fetch_array($query)){
     $num_count++;
     $uni20382 = $array['unique_id'];
     $department = $array['department'];
     $course = $array['course'];
     $assignment_data = $array['assignment_data'];
     $date_data = $array['date'];
     $query_rr = mysqli_query($init_sec, "SELECT id FROM assignment_submission WHERE assignment = '$uni20382' AND student = '$cloudcat_citizen'");
     $is_it = mysqli_num_rows($query_rr);
   ?>
 <div class='row_item'>
    <div style='width:80%' class='row_item_data'><span style='color:#ccc;font-size:1.5rem;padding:10px;font-weight:bold'><?php echo $num_count  ?>.</span> <?php echo $assignment_data ?> </div>
    <?php
     if($is_it > 0){
    ?>
      <div class='row_item_data '> <div style='color:limegreen;border-color:limegreen' class='button'>met &nbsp <i style='color:limegreen' class='bx bx-extension'></i></div> </div>
     <?php
     }else{    
    ?>
    <div class='row_item_data craig' id='<?php echo $uni20382 ?>'> <div class='button'>answer &nbsp <i class='bx bx-extension'></i></div> </div>
    <?php
    }
    ?>
</div>
<?php
}
}
?>
<script>
    $(".craig").click(function(){
        let data_let = $(this).attr("id");
        $.ajax({
            url:"data_controller_sec.php",
            type:"post",
            async:false,
            data:{
                "craig":data_let
            },
        success:function(){
        start_loader();
        $("#data_change_232").text("Answer question");
        $("#get_data_3432").load("answer_quest.php",function(){
        stop_loader();
        $(".sidepart").removeClass("noner");
        })
            }
        })
    })
</script>