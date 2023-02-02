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
include("init.php");
$cloudcat_mayor = $_SESSION['cloudcat_data'];

$query = mysqli_query($init, "SELECT * FROM departments_  WHERE manager = '$cloudcat_mayor'");
$num = mysqli_num_rows($query);
if($num > 0){
while($array = mysqli_fetch_array($query)){
    $department_name = $array['department_name'];
    $programme_name = $array['programme_name'];
    $semester = $array['semester'];
    $uni3352 = $array['unique_id'];
    ?>
<div class='p-34932' id='<?php echo $uni3352  ?>'>
    <div class='p-34932-1'>
  <i class='bx bx-collection' ></i>
    </div>
    <div class='p-34932-2'>
        <div class='p-34932-2-1' style='letter-spacing:1px;'><?php echo $department_name ?></div>
        <div><?php echo $programme_name ?> - <?php echo $semester ?></div>
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
          url:"data_controller.php",
          type:"post",
          async:false,
          data:{
              "real":data_to_sess,
          },success:function(){
                $("#load_data2").load("department_info.php",function(){
                   stop_loader();
                 })
          }
      })
    })
</script>
<?php
}else{
    ?>
<div class='button ' id='add_to_department'>Add  &nbsp <i class='bx bx-plus'></i></div>
<div class='hash'>
    Add a department to get started
</div>
<script>
        $("#add_to_department").click(function(){
        start_loader();
        $("#data_change_232").text("Add new department");
        $("#get_data_3432").load("add_department.php",function(){
        stop_loader();
        $(".sidepart").removeClass("noner");
        })
    })
</script>
    <?php
}
?>