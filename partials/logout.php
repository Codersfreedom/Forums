<?php

session_start();
session_unset();
session_destroy();
header('location:/forums/index.php');
exit;


?>