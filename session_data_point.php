<?php
session_start();
include("init.php");
?>
    <div class="sikes">
    <div class="label-float">
        <input id='data_4' type="text" placeholder=" "/>
        <label>Session</label>
    </div>
    <br/>
    </div>
    <div id='get_deep' class="button">Submit</div>
    <script>
          $("#data_4").focus();
        $("#get_deep").click(function(){
            var data_4 = document.getElementById("data_4");
            if(data_4.value.length < 1 ) {
                toast.show("Fill all fields");
            }else{
                $.ajax({
                    url:"parser.php",
                    type:"post",
                    async:false,
                    data:{
                        data_4:data_4.value
                    },
                    success:function(data){
                       show_pop(data);
                    }
                })
            }
        })
    </script>