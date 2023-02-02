<form class='department_add'>
<input type="text" id='department_data' placeholder='department'>
<input type="text" id='semester_data' placeholder='semester'>
<input type="text" id='programme_data' placeholder='programme'>
<div class='button ' id='add_to_department_1'>Done  </div>
</form>

<div>
    <img src="Flame_Design_Science_transparent_by_Icons8.gif" alt="">
</div>

<script>
    $("#add_to_department_1").click(function(){
      let department_data = document.getElementById("department_data");
      let semester_data = document.getElementById("semester_data");
      let programme_data = document.getElementById("programme_data");
      if(department_data.value.length < 1 || semester_data.value.length < 1 || programme_data.value.length < 1){
          show_pop_wrong("Fill all fields");
      }else{
      start_loader();
      $.ajax({
          url:"data_controller.php",
          type:"post",
          async:false,
          data:{
              "dpt_data":department_data.value,
              "sms_data":semester_data.value,
              "prog_data": programme_data.value
          },success:function(data){
              department_data.value = "";
              semester_data.value = "";
              programme_data.value = "";
              stop_loader();
              if(data){
               show_pop("Data saved");
                $("#load_data1").load("department_lists.php");
              }else{
                  show_pop_wrong("Some error occured");
              }
          
          }
      })
      }
    })
</script>