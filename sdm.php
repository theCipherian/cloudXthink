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
</style>
<?php
if(isset($_SESSION['stud'])){
    $stud = $_SESSION['stud'];
    $query = mysqli_query($init, "SELECT * FROM students_ WHERE unique_id = '$stud'");
    $arr = mysqli_fetch_array($query);
    $stud_id = $arr['unique_id'];
    $firstname = $arr['first_name'];
    $middlename = $arr['middle_name'];
    $lastname = $arr['last_name'];
    $stud_email = $arr['student_email'];
    $registration_number = $arr['registration_number'];
    $student_faculty = $arr['student_faculty'];
    $student_department = $arr['student_department'];
    $programme = $arr['programme'];
    $session = $arr['session'];
    $level = $arr['level'];
    $semester = $arr['semester'];
    $student_phone = $arr['student_phone'];
    $whatsapp_number = $arr['whatsapp_number'];
    $student_email = $arr['student_email'];
    $gender = $arr['gender'];
    $residence = $arr['residence'];
    ?>
    <div class="">
    <div class="label-float">
    <input id='firstn' type="text" placeholder="Enter firstname" value = '<?php echo $firstname ?>'/>
    <label>firstname</label>
    </div>
    <div class="label-float">
    <input id='lastn' type="text" placeholder="Enter lastname" value = '<?php echo $lastname ?>'/>
    <label>lastname</label>
    </div>
    <div class="label-float">
    <input id='middlen' type="text" placeholder="Enter middlename" value = '<?php echo $middlename ?>'/>
    <label>middlename</label>
    </div>
    <div class="label-float">
    <input id='email' type="text" placeholder="Enter student email" value = '<?php echo $stud_email ?>'/>
    <label>student email</label>
    </div>
    <div class="label-float">
    <input id='regnum' type="text" placeholder="Enter student regnum." value = '<?php echo $registration_number ?>'/>
    <label>student regnum</label>
    </div>
   <div>
       <select style='width:100%;position:static !important;' name="sources" id="sources" class="faculty custom-select sources" placeholder="Select faulty">
    <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_faculty");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $fac_uni = $arr['unique_id'];
         $faculty_name = $arr['faculty_name'];
         ?>
            <option <?php  if($fac_uni == $student_faculty){echo "selected='selected'";}  ?>  value="<?php echo $fac_uni  ?>"><?php echo "$faculty_name"; ?> </option>
           <?php
         }
        }
        ?>
</select>
   </div>
   <div>
       <select style='width:100%;position:static !important;' name="sources" id="sources" class="department custom-select sources" placeholder="Select department">
      <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_department ORDER BY department_name ASC");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $dp_uni = $arr['unique_id'];
         $department_name = $arr['department_name'];
         ?>
            <option <?php  if($dp_uni == $student_department){echo "selected='selected'";}  ?>  value="<?php echo $dp_uni  ?>"><?php echo "$department_name"; ?> </option>
           <?php
         }
        }
        ?>
</select>
   </div>
   <div>
     <select style='width:100%;position:static !important;' name="sources" id="sources" class="programme custom-select sources" placeholder="Select programme">
    <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_programme");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
            while($arr = mysqli_fetch_array($query)){
            $pro_uni = $arr['unique_id'];
            $programme_name = $arr['programme_name'];
            ?>
            <option <?php  if($pro_uni == $programme){echo "selected='selected'";}  ?> value="<?php echo $pro_uni  ?>"><?php echo "$programme_name"; ?> </option>
            <?php
            }
        }
    ?>
    </select>
   </div>
   <div>
         <select style='width:100%;position:static !important;' name="sources" id="sources" class="session custom-select sources" placeholder="Select session">
        <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_session");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $ses_uni = $arr['unique_id'];
         $session_name = $arr['session_name'];
         ?>
            <option <?php  if($ses_uni == $session){echo "selected='selected'";}  ?>  value="<?php echo $ses_uni ?>"><?php echo "$session_name"; ?> </option>
           <?php
         }
        }
        ?>
    </select>
   </div>
    <div>
    <select style='width:100%;position:static !important;' name="sources" id="sources" class="level custom-select sources" placeholder="Select level">
        <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_level");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $lev_uni = $arr['unique_id'];
         $level_name = $arr['level_name'];
         ?>
            <option <?php  if($lev_uni == $level){echo "selected='selected'";}  ?> value="<?php echo $lev_uni  ?>"><?php echo "$level_name"; ?> </option>
           <?php
         }
        }
        ?>
    </select>
    </div>
     <div>
    <select style='width:100%;position:static !important;' name="sources" id="sources" class="semester custom-select sources" placeholder="Select semester">
        <?php
        $query = mysqli_query($init, "SELECT * FROM data_points_semester ORDER BY semester_name ASC");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
         while($arr = mysqli_fetch_array($query)){
         $sem_uni = $arr['unique_id'];
         $semester_name = $arr['semester_name'];
         ?>
            <option <?php  if($sem_uni == $semester){echo "selected='selected'";}  ?> value="<?php echo $sem_uni  ?>"><?php echo "$semester_name"; ?> </option>
           <?php
         }
        }
        ?>
   </select>
     </div>
     <div class="label-float">
    <input id='phone' type="text" placeholder="Enter student phone" value = '<?php echo $student_phone ?>'/>
    <label>student phone</label>
    </div>
     <div class="label-float">
    <input id='whatsapp' type="text" placeholder="Enter whatsapp num." value = '<?php echo $whatsapp_number ?>'/>
    <label>whatsapp number</label>
    </div>
    <div>
        <select style='width:100%;position:static !important;' name="sources" id="sources" class="gender custom-select sources" placeholder="Select gender">
         <?php  
          if($gender == 'Male'){
              ?>
              <option selected='selected'  value="Male"> Male </option>
              <option  value="Female"> Female </option>
              <?php
          }elseif($gender == 'Female'){
              ?>
              <option selected='selected'  value="Female"> Female </option>
              <option  value="Male"> Male </option>
              <?php
          }
         
         ?> 
    </select>
    </div>
    <div>
    <div class="label-float">
    <input id='residence' type="text" placeholder="Enter student residence" value = '<?php echo $residence ?>'/>
    <label>student residence</label>
    </div>
    </div>
    </div>
    <div  id='get_deep' class="button">Submit</div>
    <script>
    $("#data_3").focus();
    $("#get_deep").click(function(){
    var firstname = document.getElementById("firstn");
    var lastname = document.getElementById("lastn");
    var middlename = document.getElementById("middlen");
    var email = document.getElementById("email");
    var regnum = document.getElementById("regnum");
    var faculty = document.querySelector(".faculty");
    var department = document.querySelector(".department");
    var programme = document.querySelector(".programme");
    var session = document.querySelector(".session");
    var level = document.querySelector(".level");
    var semester = document.querySelector(".semester");
    var phone = document.getElementById("phone");
    var whatsapp_number = document.getElementById("whatsapp");
    var gender = document.querySelector(".gender");
    var residence = document.getElementById("residence");
        $.ajax({
            url:"parser.php",
            type:"post",
            async:false,
            data:{
                firstname:firstname.value,
                lastname:lastname.value,
                middlename:middlename.value,
                email:email.value,
                regnum:regnum.value,
                faculty:faculty.value,
                department:department.value,
                programme:programme.value,
                session:session.value,
                level:level.value,
                semester:semester.value,
                phone:phone.value,
                whatsapp_number:whatsapp_number.value,
                gender:gender.value,
                residence:residence.value
            },
            success:function(data){
                show_pop(data);
            }
        });
});
//    $(".custom-select").each(function() {
//     var classes = $(this).attr("class"),
//     id      = $(this).attr("id"),
//     name    = $(this).attr("name");
//     var template =  '<div class="' + classes + '">';
//       template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
//       template += '<div class="custom-options">';
//       $(this).find("option").each(function() {
//         template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
//       });
//     template += '</div></div>';
//     $(this).wrap('<div class="custom-select-wrapper"></div>');
//     $(this).hide();
//     $(this).after(template);
// });
// $(".custom-option:first-of-type").hover(function() {
//   $(this).parents(".custom-options").addClass("option-hover");
// }, function() {
//   $(this).parents(".custom-options").removeClass("option-hover");
// });
// $(".custom-select-trigger").on("click", function() {
//   $('html').one('click',function() {
//     $(".custom-select").removeClass("opened");
//   });
//   $(this).parents(".custom-select").toggleClass("opened");
//   event.stopPropagation();
// });
// $(".custom-option").on("click", function() {
//   $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
//   $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
//   $(this).addClass("selection");
//   $(this).parents(".custom-select").removeClass("opened");
//   $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
// });
    </script>
</script>
    <?php
}else{
    ?>
   <div class="note"> NO DATA </div>
    <?php
}