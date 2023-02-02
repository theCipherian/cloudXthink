<?php
session_start();
include("init_sec.php");
$cloudcat_mayor = $_SESSION['cloudcat_data_sec'];
if(isset($_SESSION['courses_all'])){
    $course_all = $_SESSION['courses_all'];
}
$query_one = mysqli_query($init_sec, "SELECT course_status FROM course_status_ WHERE student = '$cloudcat_citizen'  AND course_status = 'unfinished'");
$is_it_one = mysqli_num_rows($query_one);
$query_two = mysqli_query($init_sec, "SELECT course_status FROM course_status_ WHERE student = '$cloudcat_citizen'  AND course_status = 'completed'");
$is_it_two = mysqli_num_rows($query_two);

?>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ['completed', 'all', 'unfinished'],
        datasets: [{
            label: '# of Votes',
            data: [<?php echo $is_it_two;  ?>, <?php echo $course_all;  ?>,  <?php echo $is_it_one;  ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
               
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>