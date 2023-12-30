<?php
session_start();
session_destroy();
header("Location: galery.php");
exit();
?>
