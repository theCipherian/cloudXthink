<?php
session_start();
include("init.php");
?>
<div class='' style='padding:1rem;'>
   <select style='width:100%;position:static !important;' name="sources" id="sources" class="points_change custom-select sources" placeholder="Select programme">
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
<div class="button manage">manage</div>
<div class='view_data_9'>

</div>
    </div>
<script>
   $(".manage").click(function(){
         var sdd = document.querySelector(".points_change").value;
         $.ajax({
             url:"show_data_programme.php",
             type:"post",
             async:false,
             data:{
                 "sdd":sdd
             },success:function(data){
                  $(".view_data_9").html(data);
             }
         })
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