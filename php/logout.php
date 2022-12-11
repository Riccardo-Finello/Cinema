<?php
    session_start();
    if(isset($_SESSION['ID'])){
        session_destroy();
    }
    echo "<script>window.location.href='../php/home.php'</script>";
?>