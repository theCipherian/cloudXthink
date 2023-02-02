<style>
.form_holder{
    width:95%;
    max-width:95%;
}
.form_holder textarea{
    width:100%;
    border:2px dashed #ddd;
    margin:1rem;
    border-radius:5px;
    resize:vertical;
    min-height:4rem;
    padding:10px;
}
.form_holder textarea::-webkit-scrollbar{
    background-color:rgba(255, 166, 0, 0.01);
}

.form_holder textarea::-webkit-scrollbar-thumb{
    border-radius:30px;
    background-color:rgba(138, 43, 226, 0.09);
}
.form_holder textarea:focus{
    outline:none;
}
</style>
<?php
session_start();
include("init_sec.php");
if(isset($_SESSION['craig'])){
    $craig = $_SESSION['craig'];
}
$query = mysqli_query($init_sec, "SELECT assignment_data FROM assignment WHERE unique_id = '$craig'");
$num = mysqli_num_rows($query);
if($num < 1){
    echo "Some error occurred!";
}else{
    $array = mysqli_fetch_array($query);
    $quest_text = $array['assignment_data'];
    ?>
     <div style='width:100%;font-size:bold;font-style:italic' class='row_item_data'><span style='color:#ccc;font-size:1.5rem;padding:10px;font-weight:bold'>Q </span> <?php echo $quest_text ?> </div>
<div class='form_holder'>
<textarea name=""  id="assignment_sub" cols="30" rows="10"></textarea>
<div data-get='<?php echo $craig ?>' class='button sub_data'>
Submit
</div>
</div>
<?php
}
?>
<script>
    $(".sub_data").click(function(){
        let data_get = $(this).attr("data-get");
        let data_sub = document.getElementById("assignment_sub");
        if(data_sub.value.length < 1){
            show_pop_wrong("Fill fields");
        }else{
            $.ajax({
                url:"data_controller_sec.php",
                type:"post",
                async:false,
                data:{
                    "assignment":data_get,
                    "ass_data":data_sub.value
                },
                success:function(data){
                    if(data){
                        show_pop("Assignment submitted");
                    }
                }
            })
        }
    })
</script>