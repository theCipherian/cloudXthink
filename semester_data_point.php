<?php
session_start();
include("init.php");
?>
    <script>
    var prf = '<?php echo $prf ?>';
    </script>
    <div class="sikes">
    <div class="label-float">
    <input id='data_3' type="text" placeholder=""/>
    <label>Semester</label>
    </div>
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
                data_3:data_3.value
            },
            success:function(data){
                show_pop(data);
            }
        })
    }
})
</script>