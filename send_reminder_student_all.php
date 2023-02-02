<?php
session_start();
include("init.php");
?>
    <div class="sikes" style='padding:1rem'>
       <textarea  class='writeup' name="" id="data_3" placeholder='Write notification' cols="30" rows="10"></textarea>
    <br/>
    </div>
    <div id='get_deep' class="button">Submit</div>
    <script>
          $("#data_3").focus();
$("#get_deep").click(function(){
    var data_3 = document.getElementById("data_3");
    if(data_3.value.length < 1 ) {
        toast.show("Fill all fields");
    }else{
        $.ajax({
            url:"parser.php",
            type:"post",
            async:false,
            data:{
                run_3:data_3.value
            },
            success:function(data){
                show_pop(data);
            }
        })
    }
})
</script>