<?php
session_start();
include("init.php");
?>
<style>
      .custom-select{
        margin:5px !important;
        min-width:10rem !important;
        margin-right:5rem !important;
    }
    .non{
        display:none !important;
        opacity:0;
        visibility:hidden;
    }
    .cway{
        animation:cway 1.5s ease;
        background-color:#fff;
    }
    @keyframes cway{
        0%{
          transform:scale(0.95);
        }
        100%{
        transform:scale(1);
        }
    }
</style>
<div class="note">
    Create new course
</div>
<div class='sikes'>
<div class='button' id='add_to_course'>Create &nbsp <i class='bx bx-plus'></i></div>
</div>
    <div  style='border-bottom:1px solid #ddd;' class='cway non'>
     <div class="label-float" style=''>
        <input id='data_90' type="text" placeholder="Enter course name"/>
        <label>Enter course name</label>
    </div>
    <div class="sikes" style='align-items:center !important'>
   
   
<select style='' name="sources" id="sources" class="data_91 custom-select sources" placeholder="Set faulty">
    <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_faculty");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $fac_uni = $arr['unique_id'];
         $faculty_name = $arr['faculty_name'];
         ?>
            <option value="<?php echo $fac_uni  ?>"><?php echo "$faculty_name"; ?> </option>
           <?php
         }
        }
        ?>
</select>
  
<select style='width:100%;position:static !important;' name="sources" id="sources" class="data_92 custom-select sources" placeholder="Set department">
      <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_department");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $dp_uni = $arr['unique_id'];
         $department_name = $arr['department_name'];
         ?>
            <option value="<?php echo $dp_uni  ?>"><?php echo "$department_name"; ?> </option>
           <?php
         }
        }
        ?>
</select>
<select style='width:100%;position:static !important;' name="sources" id="sources" class="data_93 custom-select sources" placeholder="Set programme">
 <?php
    $query = mysqli_query($init, "SELECT * FROM data_points_programme");
    $is_it = mysqli_num_rows($query);
    if($is_it > 0){
        while($arr = mysqli_fetch_array($query)){
        $pro_uni = $arr['unique_id'];
        $programme_name = $arr['programme_name'];
        ?>
        <option value="<?php echo $pro_uni  ?>"><?php echo "$programme_name"; ?> </option>
        <?php
        }
    }
 ?>
</select>
<select style='width:100%;position:static !important;' name="sources" id="sources" class="data_94 custom-select sources" placeholder="Set level">
        <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_level");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $lev_uni = $arr['unique_id'];
         $level_name = $arr['level_name'];
         ?>
            <option value="<?php echo $lev_uni  ?>"><?php echo "$level_name"; ?> </option>
           <?php
         }
        }
        ?>
</select>

<select style='width:100%;position:static !important;' name="sources" id="sources" class="data_95 custom-select sources" placeholder="Set session">
        <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_session");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $ses_uni = $arr['unique_id'];
         $session_name = $arr['session_name'];
         ?>
            <option value="<?php echo $ses_uni  ?>"><?php echo "$session_name"; ?> </option>
           <?php
         }
        }
        ?>
</select>
<select style='width:100%;position:static !important;' name="sources" id="sources" class="data_96 custom-select sources" placeholder="Set semester">
        <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_semester");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $sem_uni = $arr['unique_id'];
         $semester_name = $arr['semester_name'];
         ?>
            <option value="<?php echo $sem_uni  ?>"><?php echo "$semester_name"; ?> </option>
           <?php
         }
        }
        ?>
</select>
    </div>
    <div id='set_course' class="button">Submit</div>
</div>
</div>
<div class="note">
   View and modify courses
</div>
<select style='width:100%;position:static !important;' name="sources" id="sources" class="data_80 custom-select sources" placeholder="Select faulty">
    <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_faculty");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $fac_uni = $arr['unique_id'];
         $faculty_name = $arr['faculty_name'];
         ?>
            <option value="<?php echo $fac_uni  ?>"><?php echo "$faculty_name"; ?> </option>
           <?php
         }
        }
        ?>
</select>
<select style='width:100%;position:static !important;' name="sources" id="sources" class="data_81 custom-select sources" placeholder="Select department">
      <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_department");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $dp_uni = $arr['unique_id'];
         $department_name = $arr['department_name'];
         ?>
            <option value="<?php echo $dp_uni  ?>"><?php echo "$department_name"; ?> </option>
           <?php
         }
        }
        ?>
    </select>
    <select style='width:100%;position:static !important;' name="sources" id="sources" class="data_82 custom-select sources" placeholder="Select programme">
    <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_programme");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
            while($arr = mysqli_fetch_array($query)){
            $pro_uni = $arr['unique_id'];
            $programme_name = $arr['programme_name'];
            ?>
            <option value="<?php echo $pro_uni  ?>"><?php echo "$programme_name"; ?> </option>
            <?php
            }
        }
    ?>
    </select>
    <select style='width:100%;position:static !important;' name="sources" id="sources" class="data_83 custom-select sources" placeholder="Select level">
        <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_level");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $lev_uni = $arr['unique_id'];
         $level_name = $arr['level_name'];
         ?>
            <option value="<?php echo $lev_uni  ?>"><?php echo "$level_name"; ?> </option>
           <?php
         }
        }
        ?>
    </select>
    <select style='width:100%;position:static !important;' name="sources" id="sources" class="data_84 custom-select sources" placeholder="Select session">
        <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_session");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $ses_uni = $arr['unique_id'];
         $session_name = $arr['session_name'];
         ?>
            <option value="<?php echo $ses_uni ?>"><?php echo "$session_name"; ?> </option>
           <?php
         }
        }
        ?>
    </select>
    <select style='width:100%;position:static !important;' name="sources" id="sources" class="data_85 custom-select sources" placeholder="Select semester">
        <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_semester");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $sem_uni = $arr['unique_id'];
         $semester_name = $arr['semester_name'];
         ?>
            <option value="<?php echo $sem_uni  ?>"><?php echo "$semester_name"; ?> </option>
           <?php
         }
        }
        ?>
</select>
<div id='resolve' class="button">Resolve</div>
<br>
<script>
$("#resolve").click(function(){
    var data11 = document.querySelector(".data_80");
    var data12 = document.querySelector(".data_81");
    var data13 = document.querySelector(".data_82");
    var data14 = document.querySelector(".data_83");
    var data15 = document.querySelector(".data_84");
    var data16 = document.querySelector(".data_85");
    $.ajax({
        url:"manage_courses.php",
        type:"post",
        async:false,
        data:{
            "data7":data11.value,
            "data8":data12.value,
            "data9":data13.value,
            "data10":data14.value,
            "data11":data15.value,
            "data12":data16.value,
        },success:function(){
           start_loader();
            $("#load_data2").load("courses_data.php",function(){
            stop_loader();
            })
        }
    })
})
$("#set_course").click(function(){
    var data0 = document.getElementById("data_90");
    var data1 = document.querySelector(".data_91");
    var data2 = document.querySelector(".data_92");
    var data3 = document.querySelector(".data_93");
    var data4 = document.querySelector(".data_94");
    var data5 = document.querySelector(".data_95");
    var data6 = document.querySelector(".data_96");
    if(data0.value == ''){
        show_pop_wrong("Fill all fields")
    }else{
        $.ajax({
            url:"parser.php",
            type:"post",
            async:false,
            data:{
                "data0":data0.value,
                "data1":data1.value,
                "data2":data2.value,
                "data3":data3.value,
                "data4":data4.value,
                "data5":data5.value,
                "data6":data6.value
            },success:function(data){
               show_pop(data)
            }
        })
    }
})


    $("#add_to_course").click(function(){
        $(".cway").removeClass("non");
        $("#data_90").focus();
    })
    $(".custom-select").each(function() {
    var classes = $(this).attr("class"),
    id      = $(this).attr("id"),
    name    = $(this).attr("name");
    var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
    template += '</div></div>';
    $(this).wrap('<div class="custom-select-wrapper"></div>');
    $(this).hide();
    $(this).after(template);
});
$(".custom-option:first-of-type").hover(function() {
  $(this).parents(".custom-options").addClass("option-hover");
}, function() {
  $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom-select-trigger").on("click", function() {
  $('html').one('click',function() {
    $(".custom-select").removeClass("opened");
  });
  $(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});
$(".custom-option").on("click", function() {
  $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
  $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  $(this).addClass("selection");
  $(this).parents(".custom-select").removeClass("opened");
  $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
});
    </script>
<?php
if(isset($_POST['data7'], $_POST['data8'], $_POST['data9'], $_POST['data10'], $_POST['data11'], $_POST['data12'])){
   $_SESSION['faculty'] = $_POST['data7'];
   $_SESSION['department'] = $_POST['data8'];
   $_SESSION['programme'] = $_POST['data9'];
   $_SESSION['level'] = $_POST['data10'];
   $_SESSION['session'] = $_POST['data11'];
   $_SESSION['semester'] = $_POST['data12'];
}

?>