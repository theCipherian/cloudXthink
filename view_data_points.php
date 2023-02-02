<div class="head_text">Manage data points</div>
<br>
    <div class="note">See and edit existing data points. </div>
    <div class="bubble_gum">
        <span id='get_dep'>Department</span>
        <span id='get_faculty'>Faculty</span>
        <span id='get_pro'>Programme</span>
        <span id='get_sem'>Semester</span>
        <span id='get_ses'>Session</span>
        <span id='get_level'>Level</span>
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
$(".other_data_holder").load("manage_department.php");
clean();
$("#get_dep").addClass("bb_active");
})
$("#get_dep").click();
$("#get_pro").click(function(){
$(".other_data_holder").load("manage_programme.php");
clean();
$(this).addClass("bb_active");
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