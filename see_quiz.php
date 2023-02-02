<?php
session_start();
include("init.php");
if(isset($_SESSION['real2'])){
    $real3 = $_SESSION['real2'];
}
$query = mysqli_query($init, "SELECT * FROM assignment WHERE course = '$real3' ORDER BY id DESC");
$num = mysqli_num_rows($query);
if($num < 1){
    ?>

<div>
    There are no assignments for this course yet!
</div>
<?php
}else{
    while($array = mysqli_fetch_array($query)){
     $uni20382 = $array['unique_id'];
     $department = $array['department'];
     $course = $array['course'];
     $assignment_data = $array['assignment_data'];
     $date_data = $array['date'];
    ?>
 <div class='row_item'>
    <div style='width:80%' class='row_item_data'> <?php echo $assignment_data ?> </div>
    <div class='row_item_data'> <div id='<?php echo $uni20382 ?>' class='button data-get'>View <i style='font-size:unset !important' class='bx bx-right-arrow-alt'></i></div> </div>
</div>

<?php
}
}
?>
<script>
       $(".data-get").click(function(){
        let data_get  = $(this).attr("id");
        start_loader();
        $.ajax({
        url:"data_controller.php",
        type:"post",
        async:false,
        data:{
            "real5":data_get
        },success:function(){
        $("#data_change_2322").text("Assginment answers");
        $("#get_data_34322").load("quiz_answers.php",function(){
        stop_loader();
        })
        }
        })
        })
</script>