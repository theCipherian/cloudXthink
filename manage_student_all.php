<?php
session_start();
include("init.php");
?>
<?php
if(isset($_GET['offset'], $_GET['limit'])){
    $limit = $_GET['limit'];
    $offset = $_GET['offset'];
    }
    
$query = mysqli_query($init, "SELECT unique_id, first_name, middle_name, last_name, student_email FROM students_ ORDER BY id DESC LIMIT {$limit} OFFSET {$offset}");
?>
<?php
while($arr = mysqli_fetch_array($query)){
    $stud_id = $arr['unique_id'];
    $firstname = $arr['first_name'];
    $middlename = $arr['middle_name'];
    $lastname = $arr['last_name'];
    $stud_email = $arr['student_email'];
    ?>
     <div style='display:flex;align-items:center;padding:1rem;border-bottom:1px solid #eee'>
         <div style='margin:1rem;min-width:50%;'><?php echo "$firstname $middlename $lastname" ?></div>
         <div data-target='<?php echo $stud_id ?>' class="button call_me">View details</div>
     </div>
   <?php
 }
?>
<script>
    $(".call_me").click(function(){
        var stud = $(this).attr("data-target");
        $.ajax({
            url:"parser.php",
            type:"post",
            async:false,
            data:{
                "stud":stud
            },success:function(){
         $("#data_change_232").text("Edit student data");
        start_loader();
        $(".sidepart").removeClass("noner");
          $("#get_data_3432").load("sdm.php",function(){
            stop_loader();
            })
        }
    })
    })
</script>