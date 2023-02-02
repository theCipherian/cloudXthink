<?php
session_start();
include("init.php");
?>
<div class="head_text">Send email</div>
<br>
    <div class="note"> Send by ?</div>
    <div class="bubble_gum">
        <span id='send_s'>Student</span>
        <span id='send_a'>All students</span>
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

$("#send_s").click(function(){
$(".other_data_holder").load("send_email_student.php");
clean();
$("#send_s").addClass("bb_active");
})
$("#send_a").click(function(){
$(".other_data_holder").load("send_email_student_all.php");
clean();
$(this).addClass("bb_active");
})
$("#send_s").click();
</script>