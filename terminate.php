<?php
session_start();
include("init_sec.php");
session_destroy();
?>
<script>
    window.location.href = 'cloudcat_passage1.php'
</script>