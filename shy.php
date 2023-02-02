<style>
    .wrapper{
        display:flex;
        width:100%;
        justify-content:space-evenly;
          flex-wrap: wrap;
          
    }
    .wrapper div{
        width:20rem;
        height:18rem;
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
<?php
session_start();
include("init.php");
$cloudcat_mayor = $_SESSION['cloudcat_data'];
$query = mysqli_query($init, "SELECT id FROM departments_ WHERE manager = '$cloudcat_mayor'");
$students = mysqli_query($init, "SELECT id FROM students_");
$num_one = mysqli_num_rows($query);
$num_two = mysqli_num_rows($students);
?>
<div style='width:100%;height:100%;'>
<div class='wrapper'>
   <div class='hash2 '>
   <?php echo $num_one ?> department(s)
   </div>
   <div class='hash3'>
  <?php  echo $num_two ?> students
   </div>
</div>

<img src="Flame_Design_Science_transparent_by_Icons8.gif" alt="">
</div>