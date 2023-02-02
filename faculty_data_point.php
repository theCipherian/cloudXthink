<?php
session_start();
include("init.php");
?>
    <script>
    var prf = '<?php echo $prf ?>';
    </script>
    <div class="sikes">
    <div class="label-float">
        <input id='data_6' type="text" placeholder=" "/>
        <label>Faculty</label>
    </div>
    <br/>
    </div>
    <div id='get_deep' class="button">Submit</div>
    <script>
          $("#data_6").focus();
        $("#get_deep").click(function(){
            var data_6 = document.getElementById("data_6");
            if(data_6.value.length < 1 ) {
                toast.show("Fill all fields");
            }else{
                $.ajax({
                    url:"parser.php",
                    type:"post",
                    async:false,
                    data:{
                        data_6:data_6.value
                    },
                    success:function(data){
                         show_pop(data);
                    }
                })
            }
        })
    </script>