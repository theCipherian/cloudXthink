<?php
session_start();
include("init.php");
?>
    <div class="sikes">
    <div class="label-float">
        <input id='data_5' type="text" placeholder=" "/>
        <label>Level</label>
    </div>
    <br/>
    </div>
    <div id='get_deep' class="button">Submit</div>
    <script>
          $("#data_5").focus();
        $("#get_deep").click(function(){
            var data_5 = document.getElementById("data_5");
            if(data_5.value.length < 1 ) {
                toast.show("Fill all fields");
            }else{
                $.ajax({
                    url:"parser.php",
                    type:"post",
                    async:false,
                    data:{
                        data_5:data_5.value
                    },
                    success:function(data){
                         show_pop(data);
                    }
                })
            }
        })
    </script>