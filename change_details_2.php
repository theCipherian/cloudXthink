<style>
    .change_form{
        margin:1rem;
        display:flex;
        width:100%;
        height:max-content;
        align-items:start;
    }
    .avatar_holder{
        display:flex;
        width:110px;
        height:max-content;
        flex-wrap:wrap;
        background-color:rgba(0,0,0,0.01);
        padding:1rem;
        border-radius:20px;

    }
    .avatar_holder img{
      width:50px;
      height:50px;
       animation:clock 3s ease;
      transition:.2s ease;
      margin:1rem;
    }
    .avatar_holder img:hover{
        transform:scale(1.2);
        transition:.2s ease;
        cursor:pointer;
    }
</style>
<div style='margin:1rem;'>
    <h3>Pick an avatar</h3>
</div>
<div class='change_form'>
<div class='avatar_holder'>
 <img src="avatar_1.png" alt="">
 <img src="avatar_2.png" alt="">
 <img src="avatar_3.png" alt="">
 <img src="avatar_4.png" alt="">
 <img src="avatar_5.png" alt="">
 <img src="avatar_6.png" alt="">
 <img src="avatar_7.png" alt="">
 <img src="avatar_8.png" alt="">
 <img src="avatar_9.png" alt="">
 <img src="avatar_10.png" alt="">
 <img src="avatar_11.png" alt="">
 <img src="avatar_12.png" alt="">
 <img src="avatar_13.png" alt="">
 <img src="avatar_14.png" alt="">
 <img src="avatar_15.png" alt="">
 <img src="avatar_16.png" alt="">
 <img src="avatar_17.png" alt="">
 <img src="avatar_18.png" alt="">
 <img src="avatar_19.png" alt="">
 <img src="avatar_20.png" alt="">
 <img src="avatar_21.png" alt="">
 <img src="avatar_23.png" alt="">
 <img src="avatar_24.png" alt="">
</div>
<div style='width:100%;height:100%;'>
<form class='department_add'>
<p style='text-align:right;width:95%'>Update username</p>
<input type="text" id='username_data' placeholder='username'>
<div class='button ' id='update_username_data_1'>Done  </div>
</form>
</div>
</div>
<script>
    $(".avatar_holder img").click(function(){
        let img_data = $(this).attr("src");
             $.ajax({
                url:"data_controller_sec.php",
                type:"post",
                data:{
                    "avatar_change":img_data
                },success:function(data){
                    if(data){
                        show_pop("Avatar changed");
                        $(".clock").attr("src",img_data)
                    }else{
                        show_pop_wrong("Some error occured");
                    }
                }
            })
    })
    $("#update_username_data_1").click(function(){
        let username_data = document.getElementById("username_data");
        if(username_data.value.length < 1){
            show_pop_wrong("Fill field");
        }else{
            $.ajax({
                url:"data_controller_sec.php",
                type:"post",
                data:{
                    "username_change":username_data.value
                },success:function(data){
                    if(data){
                        show_pop("Username changed");
                        $("#username_23").text(username_data.value);
                        username_data.value = "";
                    }else{
                        show_pop_wrong("Some error occured");
                    }
                }
            })
        }
    })
</script>