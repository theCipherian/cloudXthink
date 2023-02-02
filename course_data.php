<?php
session_start();
include("init_sec.php");
if(isset($_SESSION['courses_all'])){
    $course_all = $_SESSION['courses_all'];
}else{
  $course_all = '';
}
?>
<style>
    .wrapper{
        display:flex;
        width:100%;
        justify-content:space-evenly;
          flex-wrap: wrap;
          
    }
    .wrapper div{
        width:10rem;
        height:4rem;
        display:flex;
        margin:10px;
        align-items:center;
        justify-content:center;
        border-radius:8px;
    }
    .hash2{
 background-color:rgba(255,255,0,0.50);
  font-weight:bold;
    border:2px dashed black;

    }
    .hash2:hover{
 
    }
    .hash3{
  background-color:rgba(255,255,0,0.40);
  font-weight:bold;
    border:2px dashed black;

    }
    .hash3:hover{
    
    }
    .hash4{
 background-color:rgba(255,255,0,0.30);
  font-weight:bold;
  border:2px dashed black;
    }
</style>
<div style='width:100%;height:100%;'>
<div class='wrapper'>
   <div class='hash2 '>
      <?php 
       if($course_all !== ''){
      echo "$course_all courses"; 
       }else{
         ?>
          <div class='hash'>
            You have no courses yet
          </div>
         <?php
       }
      ?> 
   </div>

    <!-- <div class='row_item_data'><div class='button '>Assignment &nbsp<i class='bx bx-right-arrow-alt'></i></div></div> -->
</div>

<img src="Flame_Design_Science_transparent_by_Icons8.gif" alt="">
</div>