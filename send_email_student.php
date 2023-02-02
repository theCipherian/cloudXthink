<?php
session_start();
include("init.php");
?>
    <div class="">
    <div class="label-float">
    <input id='data_3' type="text" placeholder="Enter email address"/>
    <label>Enter email address</label>
    </div>
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
    var data_3 = document.getElementById("data_3");
    var data_4 = document.getElementById("data_4");
    var data_5 = document.getElementById("data_5");
    var data_6 = document.getElementById("data_6");
    if(data_3.value.length < 1 || data_4.value.length < 1 || data_5.value.length < 1 || data_6.value.length < 1) {
        toast.show("Fill all fields");
    }else{
        $.ajax({
            url:"parser.php",
            type:"post",
            async:false,
            data:{
                email:data_3.value,
                subject:data_4.value,
                title:data_5.value,
                text:data_6.value
            },
            success:function(data){
                show_pop(data);
            }
        })
    }
})
</script>