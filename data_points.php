<div class="head_text">Create data point</div>
<br>
    <div class="note"> Create data points for resourse allocation and deposition</div>
    <div class="bubble_gum">
        <span id='get_dep'>Department</span>
        <span id='get_pro'>Programme</span>
        <span id='get_sem'>Semester</span>
        <span id='get_ses'>Session</span>
        <span id='get_level'>level</span>
        <span id='get_faculty'>faculty</span>
    </div>
    <div class="other_data_holder">
</div>
<script>
function clean(){
    var elems = document.querySelectorAll(".bubble_gum span");
    elems.forEach(bn => {
        bn.classList.remove("bb_active");
    
    });
  
}
$("#get_dep").click(function(){
$(".other_data_holder").load("department_data_point.php");
clean();
$("#get_dep").addClass("bb_active");
})
$("#get_pro").click(function(){
$(".other_data_holder").load("programme_data_point.php");
clean();
$(this).addClass("bb_active");
})
$("#get_sem").click(function(){
$(".other_data_holder").load("semester_data_point.php");
clean();
$(this).addClass("bb_active");
})
$("#get_ses").click(function(){
$(".other_data_holder").load("session_data_point.php");
clean();
$(this).addClass("bb_active");
})
$("#get_level").click(function(){
$(".other_data_holder").load("level_data_point.php");
clean();
$(this).addClass("bb_active");
})
$("#get_faculty").click(function(){
$(".other_data_holder").load("faculty_data_point.php");
clean();
$(this).addClass("bb_active");
})

</script>