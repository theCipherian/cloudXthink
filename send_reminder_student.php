<?php
session_start();
include("init.php");
?>
    <div class="">
    <div class="label-float">
    <input id='data_3' type="text" placeholder=""/>
    <label>Enter reg. number</label>
    </div>
    <textarea class='writeup' name="" placeholder='Write notification' id="data_4" cols="30" rows="10"></textarea>
    <br/>
    </div>
    <div id='get_deep' class="button">Submit</div>
    <script>
    $("#data_3").focus();
    $("#get_deep").click(function(){
    var data_3 = document.getElementById("data_3");
    var data_4 = document.getElementById("data_4");
    if(data_3.value.length < 1 ) {
        toast.show("Fill all fields");
    }else{
        $.ajax({
            url:"parser.php",
            type:"post",
            async:false,
            data:{
                run_1:data_3.value,
                run_2:data_4.value
            },
            success:function(data){
                show_pop(data);
            }
        })
    }
})
</script>