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
</style>
<?php
session_start();
include("init.php");
if(isset($_SESSION['real'])){
    $real = $_SESSION['real'];
}else{
    
}
$query = mysqli_query($init, "SELECT * FROM departments_ WHERE unique_id = '$real'");
$num = mysqli_num_rows($query);

if($num < 1){
  ?>
  <script>
      $("#remove_department").addClass("noner");
    $(".load_av_departments").load("shy.php");
    $("#edit_courses").addClass("noner");
    $(".add_to_department").addClass("noner");
  </script>

  <?php
}
while($array = mysqli_fetch_array($query)){
    $department_name = $array['department_name'];
    $programme_name = $array['programme_name'];
    $semester = $array['semester'];
    $uni3352 = $array['unique_id'];
    ?>
<div class='row_item'>
    <div class='row_item_data1 '> <span class='thing_345' ><?php echo $department_name ?> </span> </div>
    <div class='row_item_data'><?php echo $programme_name ?> </div>
    <div class='row_item_data'><?php echo $semester ?></div>
</div>
<?php
}

?>
<div>
    <form method='post' class='form_2934'>
        <div> 
            <label for="department_name">Edit department name</label>
            <textarea type="text" id='department_name'><?php echo $department_name ?></textarea>
        </div>
        <div> 
            <label for="programme_name"> Edit programme name</label>
            <textarea type="text" id='programme_name'><?php echo $programme_name  ?></textarea>
        </div>
        <div> 
            <label for="semester_name">Edit semester name</label>
            <textarea type="text" id='semester_name'><?php  echo $semester ?></textarea>
        </div>
        <div class='button ' id='edit_data_32'>Done  </div>
    </form>
</div>

<script>
    $("#edit_data_32").click(function(){
        let department_name = document.getElementById("department_name");
        let programme_name = document.getElementById("programme_name");
        let semester = document.getElementById("semester_name");

         start_loader();
      $.ajax({
          url:"data_controller.php",
          type:"post",
          async:false,
          data:{
              "dpt_data1":department_name.value,
              "sms_data1":semester.value,
              "prog_data1": programme_name.value
          },success:function(data){
              stop_loader();
              show_pop("Data saved");
             $("#load_data2").load("department_info.php");
                $("#load_data1").load("department_lists.php");
          }
      })

    })
                $(".button").click(function(){
 var button = document.querySelectorAll(".button");
   button.forEach((btn) => {
     btn.classList.remove("button_active");
     this.classList.add("button_active");
   })
    })
</script>
