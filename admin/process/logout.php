<?php
//Start session
session_start();

session_destroy();
header("location: http://localhost/latest/admin/index.php");
exit();