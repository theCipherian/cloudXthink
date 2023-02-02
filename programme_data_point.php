<?php
session_start();
include("init.php");
?>
                 <div class="sikes">
                    <div class="label-float">
                        <input id='data_2' type="text" placeholder=" " />
                        <label>Programme</label>
                    </div>
                    <br/>
                   </div>
                    <div id='get_deep' class="button">Submit</div>
                    <script>
                          $("#data_2").focus();
                        $("#get_deep").click(function(){
                            var data_2 = document.getElementById("data_2");
                            if(data_2.value.length < 1 ) {
                                toast.show("Fill all fields");
                            }else{
                                $.ajax({
                                    url:"parser.php",
                                    type:"post",
                                    async:false,
                                    data:{
                                        data_2:data_2.value
                                    },
                                    success:function(data){
                                        show_pop(data);
                                    }
                                })
                            }
                        })
                    </script>