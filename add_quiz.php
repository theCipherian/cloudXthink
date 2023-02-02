<form class='course_add'>
<input type="text" id='quiz_data' placeholder='assignment question'>
<div class='button' id='add_quiz'>Done</div>
</form>
<div>
    <img src="Flame_Design_Science_transparent_by_Icons8.gif" alt="">
</div>
<script>
    $("#add_quiz").click(function(){
      let quiz_data = document.getElementById("quiz_data");
      if(quiz_data.value.length < 1){
          show_pop_wrong("Fill field");
      }else{
      start_loader();
      $.ajax({
          url:"data_controller.php",
          type:"post",
          async:false,
          data:{
              "quiz_data":quiz_data.value
          },success:function(){
              quiz_data.value = "";
              stop_loader();
              show_pop("Assignment added");
          }
      })
      }
    })
</script>