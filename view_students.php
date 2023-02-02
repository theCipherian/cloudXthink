<style>
    .mmmm{
        cursor:pointer;
        text-align:center;
        margin-bottom:2rem;
       padding:2rem;
    }
    .mmmmm{
        cursor:pointer;
        text-align:center;
        margin-bottom:2rem;
       padding:2rem;
    }
</style>
<div class="head_text">View students</div>
<br>
    <div class="note">See and edit students data</div>
    <div class="bubble_gum">
        <span id='get_all'>All</span>
        <span id='get_reg'>No reg. number</span>
    </div>
    <div id='num_view'>
          
    </div>
    <div id='view'>
</div>
<div class='mmmm'>more</div>
<div class='mmmmm'>more</div>
<script>
function clean(){
    var elems = document.querySelectorAll(".bubble_gum span");
    elems.forEach(bn => {
        bn.classList.remove("bb_active");
    });
}
    $(document).ready(function(){
    clean();
    $("#get_all").addClass("bb_active");
    $(".mmmmm").hide();
     $(".mmmm").show();
    var loader = document.querySelector(".lineloader");
    var mmmm = document.querySelector(".mmmm");
    var flag = 0;
    $.ajax({
    type: "GET",
    url: "manage_student_all.php",
    data: {
    'offset':0,
    'limit':3
    },
    beforeSend:function(){
    loader.classList.remove("noner");
    $(".mmmm").hide();
    },
    success:function(data){
    loader.classList.add("noner");
    $(".mmmm").show();
    $('#view').append(data)
    $('#num_view').load("num_stud_count.php");
    flag += 3;
    }
    })
    $(".mmmm").click(function(){
    $.ajax({
    type: "GET",
    url: "manage_student_all.php",
    data: {
    'offset':flag,
    'limit':3,
    },
    beforeSend:function(){
    mmmm.classList.add("noner");
    loader.classList.remove("noner");    
    },
    success:function(data){
    mmmm.classList.remove("noner");
    loader.classList.add("noner");
    $('#view').append(data)
    flag += 3
    }
    })
    })
    })

$("#get_all").click(function(){
    $("#students_90").click();
})
$("#get_reg").click(function(){
      $(".mmmm").hide();
      $(".mmmmm").show();
      
    $('#view').load("four_o_four.php")
clean();
    $("#get_reg").addClass("bb_active");
    var loader = document.querySelector(".lineloader");
    var mmmm = document.querySelector(".mmmmm");
    var flag = 0;
    $.ajax({
    type: "GET",
    url: "manage_student_reg.php",
    data: {
    'offset':0,
    'limit':3
    },
    beforeSend:function(){
    loader.classList.remove("noner");
    $(".mmmmm").hide();
    },
    success:function(data){
    loader.classList.add("noner");
    $(".mmmmm").show();
    $('#view').append(data)
      $('#num_view').load("num_stud_count_reg.php");
    flag += 3;
    }
    })
    $(".mmmmm").click(function(){
    $.ajax({
    type: "GET",
    url: "manage_student_reg.php",
    data: {
    'offset':flag,
    'limit':3,
    },
    beforeSend:function(){
    mmmm.classList.add("noner");
    loader.classList.remove("noner");    
    },
    success:function(data){
    mmmm.classList.remove("noner");
    loader.classList.add("noner");
    $('#view').append(data)
    flag += 3
    }
    })
    })
})
$("#get_sem").click(function(){
$(".other_data_holder").load("manage_semester.php");
clean();
$(this).addClass("bb_active");
})
$("#get_ses").click(function(){
$(".other_data_holder").load("manage_session.php");
clean();
$(this).addClass("bb_active");
})
$("#get_level").click(function(){
$(".other_data_holder").load("manage_level.php");
clean();
$(this).addClass("bb_active");
})
$("#get_faculty").click(function(){
$(".other_data_holder").load("manage_faculty.php");
clean();
$(this).addClass("bb_active");
})

</script>