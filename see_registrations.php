<style>
    .row_item{
        display:flex;
        width:100%;
        justify-content:space-evenly;
        height:9rem;
        align-items:center;
        padding:1rem;
        overflow-x:scroll;
        overflow-y:hidden;

    }
    .row_item::-webkit-scrollbar{
        background-color:transparent;
    }
    .row_item::-webkit-scrollbar-thumb{
       border-radius:30px;
       background-color:rgba(138, 43, 226, 0.09);
    }
    .row_item_data2{
        text-transform:lowercase;
        color:black !important;
        font-weight:bold;
    }
    .row_item_data i{
        font-size:2rem;
        color: grey;
        cursor:pointer;
    }
    *{
        user-select:text !important;
    }
    .row_item_data{
      margin-right:10px;
    }
    .ko7{
        color:#9b59b6 !important;
    }
    select{
        border:2px solid #eee;
        padding:0px !important;
        height:3rem;
         font-family: 'Maven Pro', sans-serif;
        width:max-content !important;
    }
    select:focus{
        border:2px solid #eee;
        padding:0px !important;
    }
    .active_button{
        border-color:limegreen !important;
    }
</style>
<?php
session_start();
include("init.php");
$query = mysqli_query($init, "SELECT * FROM registrations_ WHERE resolved != 'true' ORDER BY date DESC");
$num = mysqli_num_rows($query);
if($num < 1){
  ?>
  <div>
      <div class='msg'> 
       There are currently no registered students
  </div>
  </div>
  <?php
}
while($array = mysqli_fetch_array($query)){
    $uni239341 = $array['unique_id'];
    $faculty = $array['faculty'];
    $department = $array['department'];
    $programme = $array['programme'];
    $first_name = $array['first_name'];
    $middle_name = $array['middle_name'];
    $last_name = $array['last_name'];
    $email_address = $array['email_address'];
    $gender = $array['gender'];
    $home_address = $array['home_address'];
    $phone_number = $array['phone_number'];
    $whatsapp_number = $array['whatsapp_number'];
    $institutions = $array['institutions_attended'];
    $certification_id = $array['certifications_id'];
    $resolved = $array['resolved'];
    $date_enrolled = $array['date'];
    $query2 = mysqli_query($init, "SELECT * FROM data_points_faculty WHERE unique_id = '$faculty'");
    $arr = mysqli_fetch_array($query2);
    $faculty_name = $arr['faculty_name'];
    $query3 = mysqli_query($init, "SELECT * FROM data_points_department WHERE unique_id = '$department'");
    $arr = mysqli_fetch_array($query3);
    $department_name = $arr['department_name'];
    $query4 = mysqli_query($init, "SELECT * FROM data_points_programme WHERE unique_id = '$programme'");
    $arr = mysqli_fetch_array($query4);
    $programme_name = $arr['programme_name'];
    ?>
    <div class='row_item data4<?php echo $uni239341  ?>' style='border-bottom: none !important;display:flex;width:100%;align-items:center;justify-content:space-between'>
    <div  class='row_item_data' style='width:10rem;min-width:10rem'> <div data-get='<?php echo $uni239341  ?> ' style='font-size:11px !important;' class='button <?php if($resolved == 'true'){echo "active_button";}  ?> get_resolution'>Resolved</div></div>
    <div class="row_item_data " style='min-width:max-content;'><select class='level<?php echo $uni239341  ?>'  placeholder='Select level' name="" id="">
        <option value="Select level">Select level</option>
                <?php
        $query5 = mysqli_query($init, "SELECT * FROM data_points_level");
        $is_it = mysqli_num_rows($query5);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query5)){
         $lev_uni = $arr['unique_id'];
         $level_name = $arr['level_name'];
         ?>
            <option value="<?php echo $lev_uni  ?>"><?php echo "$level_name"; ?> </option>
           <?php
         }
        }
        ?>
    </select> </div>
    <div class="row_item_data" style='min-width:max-content;' ><select class='semester<?php echo $uni239341  ?>' placeholder='Select semester' name="" id="">
        <option value="Select level">Select semester</option>
              <?php
        $query6 = mysqli_query($init, "SELECT * FROM data_points_semester ORDER BY semester_name ASC");
        $is_it = mysqli_num_rows($query6);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query6)){
         $sem_uni = $arr['unique_id'];
         $semester_name = $arr['semester_name'];
         ?>
            <option value="<?php echo $sem_uni  ?>"><?php echo "$semester_name"; ?> </option>
           <?php
         }
        }
        ?>
    </select> </div>
    <div class="row_item_data" style='min-width:max-content;' ><select class='session<?php echo $uni239341  ?>' placeholder='Select session' name="" id="">
        <option value="Select level">Select session</option>
        <?php
        $query7 = mysqli_query($init, "SELECT * FROM data_points_session");
        $is_it = mysqli_num_rows($query7);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query7)){
         $ses_uni = $arr['unique_id'];
         $session_name = $arr['session_name'];
         ?>
            <option value="<?php echo $ses_uni ?>"><?php echo "$session_name"; ?> </option>
           <?php
         }
        }
        ?>
    </select> </div>
    <div  class='row_item_data' style='min-width:max-content'> Names(<span class='ko7' ><?php echo "$first_name $middle_name $last_name"; ?></span>) </div>
    <div style='min-width:max-content;background-color:#fff' class='row_item_data'> Faculty(<span class='ko7'><?php echo $faculty_name ?></span>) </div>
    <div style='min-width:max-content;background-color:#fff' class='row_item_data'>Department(<span class='ko7'><?php echo $department_name ?></span>) </div>
    <div style='min-width:max-content;background-color:#fff' class='row_item_data'>Programme(<span class='ko7'><?php echo $programme_name ?></span> )</div>
    <div style='min-width:max-content;' class='row_item_data'>  Email(<span class='ko7'><?php echo $email_address ?></span>)</div>
    <div style='min-width:max-content;' class='row_item_data'>  Gender(<span class='ko7'><?php echo $gender ?></span>)</div>
    <div style='min-width:max-content;' class='row_item_data'>Residence(<span class='ko7'><?php echo $home_address ?></span>)</div>
    <div style='min-width:max-content;' class='row_item_data'>Phone(<span class='ko7'><?php echo $phone_number ?></span>)</div>
    <div style='min-width:max-content' class='row_item_data'>Whatsapp(<span class='ko7'><?php echo $whatsapp_number ?></span>)</div>
    <div style='min-width:max-content' class='row_item_data'>Institutions(<span class='ko7'><?php echo $institutions ?></span>)</div>
    <div style='min-width:max-content' class='row_item_data'>Date(<span class='ko7'><?php echo $date_enrolled ?></span>)</div>
</div>
<?php
}
?>
<script>
     show_pop = (text) => {
            $(".changes_pop").removeClass("noner");
            $("#text_34322").text(text);
            setTimeout(() => {
                $(".changes_pop").addClass("noner");
            }, (1500));
        }
    $(".get_resolution").click(function(){
        let data_res = $(this).attr("data-get");
         $(this).addClass("active_button")
        let rem_hide = document.querySelector(".data4"+data_res);
        var level = document.querySelector(".level"+data_res).value;
        var semester = document.querySelector(".semester"+data_res).value;
        var session = document.querySelector(".session"+data_res).value;
        $.ajax({
            url:"data_controller.php",
            type:"POST",
            async:false,
            data:{
                "data_res":data_res,
                "level":level,
                "semester":semester,
                "session":session
            },success:function(data){
             show_pop(data);
            }
        })
    })
</script>



