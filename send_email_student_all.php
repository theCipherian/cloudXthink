<?php
session_start();
include("init.php");
?>
    <div class="">
     <div class="label-float">
    <input id='data_4' type="text" placeholder="Enter subject"/>
    <label>Enter subject</label>
    </div>
     <div class="label-float">
    <input id='data_5' type="text" placeholder="Enter title"/>
    <label>Enter title</label>
    </div>
    <textarea class='writeup' name="" placeholder='Write email' id="data_6" cols="30" rows="10"></textarea>
    <br/>
    </div>
    <div id='get_deep' class="button">Submit</div>
    <script>
    $("#data_3").focus();
    $("#get_deep").click(function(){
    var data_4 = document.getElementById("data_4");
    var data_5 = document.getElementById("data_5");
    var data_6 = document.getElementById("data_6");
    if(data_4.value.length < 1 || data_5.value.length < 1 || data_6.value.length < 1) {
        toast.show("Fill all fields");
    }else{
        $.ajax({
            url:"parser.php",
            type:"post",
            async:false,
            data:{
                subject2:data_4.value,
                title2:data_5.value,
                text2:data_6.value
            },
            success:function(data){
                show_pop(data);
            }
        })
    }
})
</script>