<?php
session_start();
include("init.php");
session_destroy();
?>
<script>
    window.location.href = 'cloudcat_passage.php'
</script>