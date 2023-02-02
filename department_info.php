<div style='display:flex;'>
<div class='button ' id='edit_courses'>Courses  &nbsp <i class='bx bx-book' ></i></div>
</div>
<div class='load_av_departments'>

</div>
<script>


    $(".load_av_departments").load("department_data.php");
    $("#edit_courses").click(function(){
        $(".load_av_departments").load("courses_data.php");
    })


    $("#remove_department").click(function(){
          $.ajax({
          url:"data_controller.php",
          type:"post",
          async:false,
          data:{
              "rem":"rem"
          },success:function(data){
              stop_loader();
              show_pop("Data removed");
             $("#load_data2").load("shy.php");
                $("#load_data1").load("department_lists.php");
          }
      })
    })


</script>