<?php
session_start();
include("init.php");
?>
<div class="sikes">
<div class="label-float">
<input id='data_1' type="text" placeholder=" " />
<label>Department</label>
</div>
<br/>
</div>
<div id='get_deep' class="button">Submit</div>
<script>
     $("#data_1").focus();
$("#get_deep").click(function(){
    var data_1 = document.getElementById("data_1");
    if(data_1.value.length < 1 ) {
        toast.show("Fill all fields");
    }else{
        $.ajax({
            url:"parser.php",
            type:"post",
            async:false,
            data:{
                data_1:data_1.value
            },
            success:function(data){
                show_pop(data);
            }
        })
    }
})
</script>