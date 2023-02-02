<?php
session_start();
include("init.php");
?>
<style>
    .nio{
        display:flex;
        align-items:center;
        padding:1rem;
           border-bottom:1px solid #eee;
    }
    .nio div{
        margin:10px;
        font-size:1.2rem;
     
    }
    .bx-trash{
        font-size:1.5rem; 
        color:grey;
        cursor:pointer;
    }
</style>
<?php
if(isset($_POST['sdd'])){
$dep_data = $_POST['sdd'];
$query = mysqli_query($init, "SELECT * FROM data_points_faculty WHERE unique_id = '$dep_data'");
$num = mysqli_num_rows($query);
if($num < 1){
    ?>
      <div style='padding:1rem;'> No data </div>
   <?php
}else{
    $arr = mysqli_fetch_array($query);
    $dep_name = $arr['faculty_name'];
    ?>
    <div class="note">
        Warning - Data points are tied through out platform. Deleting a data point deletes every data associated! 
    </div>
    <div class='nio'>
        <div data-target = '<?php echo $dep_data ?>' class='remove_d'><i class='bx bx-trash' ></i></div>
        <div class='nio<?php echo $dep_data  ?>'><?php  echo $dep_name ?></div>
    </div> 
    <div class="label-float">
<input id='data_1' type="text" value='<?php echo $dep_name ?>' placeholder=""/>
<label>Edit data</label>
</div>
<div data-target='<?php echo $dep_data ?>' class="button change_data">submit</div>
    <?php
 }
 }
?>
<script>
  $(".change_data").click(function(){
    var data = $(this).attr("data-target");
    var dep_data = document.querySelector(".nio"+data);
    var data_value = document.getElementById("data_1");
    if(data_value.value == ''){
        show_pop_wrong("Enter data");
    }else{
          $.ajax({
          url:"show_data_faculty.php",
          type:"post",
          async:false,
          data:{
              "data_1": data,
              "data_2": data_value.value
          },success:function(){
              show_pop("Processing");
            dep_data.textContent = data_value.value;
          }
      })
    }
    
  })
  $(".remove_d").click(function(){
    var data = $(this).attr("data-target");
    $(".bg-pop").removeClass("noner");
    var greencard = document.querySelector(".greencard");
    $(".greencard").unbind("click").click(function(){
      $.ajax({
          url:"show_data_faculty.php",
          type:"post",
          async:false,
          data:{
              "del_sdd": data
          },success:function(){
              show_pop("data point deleted");
                 $(".bg-pop").addClass("noner");
              $(".view_data_9").load("show_data_faculty.php");
          }
      })
   })
   
})

    $(".redcard").click(function(){
        $(".bg-pop").addClass("noner");
    })
</script>
<?php
 if(isset($_POST['del_sdd'])){
     $del = $_POST['del_sdd'];
     $query = mysqli_query($init, "DELETE FROM data_points_faculty WHERE unique_id = '$del'");
 }
 if(isset($_POST['data_1'], $_POST['data_2'])){
     $data1 = $_POST['data_1'];
     $data2 = $_POST['data_2'];
     $query = mysqli_query($init, "UPDATE data_points_faculty SET faculty_name = '$data2' WHERE unique_id = '$data1'");
 }
?>