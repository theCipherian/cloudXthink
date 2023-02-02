<style>
     .p-34932-2{
        width:100%;
        display:flex !important;
        flex-direction:row !important;
        align-items:center;
    }
    .cvn{
        width:60%;
    }
    
    .p-34932{
        justify-content:space-evenly !important;
        display:flex;
       
    }
    .bx-collection, .bx-exit{
        margin:10px;
    }
</style>
<div class='p-34932' >
    <div class='p-34932-1'>
  <i class='bx bx-collection' ></i>
    </div>
    <div class='p-34932-2'>
        <div class="cvn">Add data points</div>
    <div  class=""><div  class="button" id='add_data_point'>Create</div></div>
    </div>
</div>
<div class='p-34932' >
    <div  class='p-34932-1'>
  <i class='bx bx-collection' ></i>
    </div>
    <div class='p-34932-2'>
      <div class="cvn">Manage courses</div>
    <div id='manage_courses' class=""><div class="button">Manage</div></div>
    </div>
</div>
<div class='p-34932' >
    <div class='p-34932-1'>
  <i class='bx bx-collection' ></i>
    </div>
    <div class='p-34932-2'>
      <div class="cvn">View data points</div>
    <div id='view_points' class=""><div class="button">View</div></div>
    </div>
</div>
<div class='p-34932' >
    <div class='p-34932-1'>
  <i class='bx bx-collection'></i>
    </div>
    <div class='p-34932-2'>
      <div class="cvn">Send mail</div>
    <div id='send_email' class=""><div class="button">Send</div></div>
    </div>
</div>
<div class='p-34932' >
    <div class='p-34932-1'>
  <i class='bx bx-collection' ></i>
    </div>
    <div class='p-34932-2'>
      <div class="cvn">Send reminder</div>
    <div id='send_reminder' class=""><div class="button">Send</div></div>
    </div>
</div>
<div class='p-34932' >
    <div class='p-34932-1'>
  <i class='bx bx-exit' ></i>
    </div>
    <div class='p-34932-2'>
      <div id='logout' class="ac_1">logout</div>
    </div>
</div>
<script>
  $("#logout").click(function(){
    window.location.href = 'terminate_2.php';
  })
      $(".button").click(function(){         
        var button = document.querySelectorAll(".button");
        button.forEach((btn) => {
        btn.classList.remove("button_active");
        this.classList.add("button_active");
        })
      })
    $("#add_data_point").click(function(){ 
        $("#change_89v1").text("Actions");
        $("#change_89v2").text("Data points");
        start_loader();
            $("#load_data2").load("data_points.php",function(){
              $("#get_dep").click();
              stop_loader();   
        })  
    })
    $("#send_reminder").click(function(){ 
        $("#change_89v1").text("Actions");
        $("#change_89v2").text("Send reminders");
        start_loader();
            $("#load_data2").load("send_reminder.php",function(){
              stop_loader();   
        })  
    })
    $("#send_email").click(function(){ 
        $("#change_89v1").text("Actions");
        $("#change_89v2").text("Send email");
        start_loader();
            $("#load_data2").load("send_email.php",function(){
              stop_loader();   
        })  
    })
    $("#manage_courses").click(function(){
        $("#change_89v1").text("Actions");
        $("#change_89v2").text("Manage courses");
        start_loader();
            $("#load_data2").load("manage_courses.php",function(){
            stop_loader();
        })  
    })

    $("#view_points").click(function(){
        $("#change_89v1").text("Actions");
        $("#change_89v2").text("Manage data points");
        start_loader();
            $("#load_data2").load("view_data_points.php",function(){
            stop_loader();
        })  
    })
    
</script>