<style>

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
</style>
<?php
session_start();
include("init.php");
if(isset($_SESSION['real2'])){
    $real = $_SESSION['real2'];
}else{
    
}
$query = mysqli_query($init, "SELECT * FROM course_material_ WHERE course = '$real'");
$num = mysqli_num_rows($query);
if($num < 1){
  ?>
  <div>
      <div class='msg'> 
       There are currently no course materials available for this course.
  </div>
  </div>
  <?php
}
while($array = mysqli_fetch_array($query)){
    $uni23981 = $array['unique_id'];
    $material_name = $array['material_name'];
    $material_data = $array['material_data'];
    $material_type = $array['material_type'];
    $deploy_note = $array['deploy_note'];
    $deploy_date = $array['date'];
    ?>
<div class='row_item data2<?php echo $uni23981  ?>' style='display:flex;width:100%;align-items:center;justify-content:space-between'>
    <div  class='row_item_data1' style='width:25%;white-space: nowrap;overflow: hidden; text-overflow: ellipsis;'> <span class='thing_345' ><?php echo $material_name ?> </span> </div>
    <div style='width:20%;  white-space: nowrap;overflow: hidden; text-overflow: ellipsis;' class='row_item_data'><?php echo $material_data ?> </div>
    <div style='width:10%;' class='row_item_data'><?php echo $material_type ?></div>
    <div style='width:25%;' class='row_item_data'><?php echo $deploy_date ?></div>
    <div style='width:5%;' data-rem='<?php echo $uni23981 ?>' class='delete_material row_item_data'><i class='bx bx-trash' ></i></div>
</div>
<?php
}
?>
<script>  
        $(".delete_material").click(function(){
        let rem_data1 = $(this).attr("data-rem");
        let data_hide1 = document.querySelector('.data2'+rem_data1);
        data_hide1.classList.add("noner");
        start_loader();
        $.ajax({
            url:"data_controller.php",
            type:"post",
            async:false,
            data:{
                "rem_data1": rem_data1
            },success:function(data){
                stop_loader();
                show_pop("Data removed");
          
            }
        })
        })
</script>


