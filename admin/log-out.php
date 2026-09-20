<?php
session_start();
session_unset();
session_destroy();
header("Location: form/log-in.php");
exit();
?>