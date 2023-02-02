<style>
*{
    -webkit-tap-highlight-color: transparent !important;
    user-select:none;
        -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: -moz-none;
    -o-user-select: none;
    user-select: none;
}
    .quantity{
      margin-top:10px;
  position: relative;
}
    *::-webkit-selection {
      background-color:transparent !important;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button
{
  -webkit-appearance: none;
  margin: 0;
}

input[type=number]
{
  -moz-appearance: textfield;
}

.quantity input {
  width: 100%;;
  height: 42px;
  line-height: 1.65;
  float: left;
  display: block;
  padding: 0;
  margin: 0;
  padding-left: 20px;
  border: 1px solid #eee;
}

.quantity input:focus {
  outline: 0;
}

.quantity-nav {
  float: left;
  position: relative;
  height: 42px;
}

.quantity-button {
  position: relative;
  cursor: pointer;
  border-left: 1px solid #eee;
  width: 20px;
  text-align: center;
  color: #333;
  font-size: 13px;
  font-family: "Trebuchet MS", Helvetica, sans-serif !important;
  line-height: 1.7;
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

.quantity-button.quantity-up {
  position: absolute;
  height: 50%;
  top: 0;
  border-bottom: 1px solid #eee;
}

.quantity-button.quantity-down {
  position: absolute;
  bottom: -1px;
  height: 50%;
}
.row_thing .rt1{ 
margin:1rem;
}
.row_thing{
    border-bottom:1px solid #eee;
    padding:1rem;
}
.rt1{
    font-weight:bold;color:black;
}


</style>
<?php
session_start();
include("init.php");
if(isset($_SESSION['real5'])){
    $real5 = $_SESSION['real5'];
}
$query = mysqli_query($init, "SELECT * FROM assignment_submission WHERE assignment = '$real5'");
$num = mysqli_num_rows($query);
if($num < 1){
    echo "There are no submissions for this assignment yet!";
}else{
    while($array = mysqli_fetch_array($query)){
        $uni020821 = $array['unique_id'];
        $student = $array['student'];
        $submission_data = $array['submission_data'];
        $date_934 = $array['date'];
        $students_score = $array['score'];
        if($students_score == ''){
            $students_score = '0';
        }
        $query2 = mysqli_query($init, "SELECT student_name FROM students_ WHERE unique_id = '$student'");
        $area = mysqli_fetch_array($query2);
        $student_name = $area['student_name'];
        ?>
        <div class='row_thing' style='width:100%;flex-wrap: wrap;display:flex;justify-content:space-around'>
        <div style='width:30rem;' class='rt1 row_item_data tooltip'><?php echo $student_name ?>  <span class="tooltiptext3">Students name</span> </div>
        <div class='row_item_data tooltip' style='width:30rem'>  <span class="tooltiptext">Answer</span><?php echo $submission_data  ?></div>
      <div style='width:30rem;display:flex;flex-direction:column;'>
                  <div class="quantity tooltip" >
                      <span class="tooltiptext">Students score</span>
  <input class='data_<?php echo $uni020821 ?>' type="number" min="0" max="100" step="1" value="<?php echo $students_score ?>">
</div>
<div  class='button data340' data-get='<?php echo $uni020821 ?>' >Grade</div>
      </div>
        </div>

        <?php
    }
}
?>
<script>
        jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });
    $(".data340").click(function(){
        let item_main = $(this).attr("data-get");
       let data_share = document.querySelector(".data_"+item_main);
       $.ajax({
           url:"data_controller.php",
           type:"post",
           async:false,
           data:{
               "data_share":data_share.value,
               "data_item":item_main
           },
           success:function(data){
               if(data){
                show_pop("Score changed");
           }
        }
       })
    })
</script>