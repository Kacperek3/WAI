<?php
session_start();
session_destroy();
header("Location: ../View/galery.php");
exit();
?>
