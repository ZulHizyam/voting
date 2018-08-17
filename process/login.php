<?php
//Include database connection
require("../includes/connection.php");

//Include class StudentLogin
require("../classes/StudentLogin.php");

if(isset($_POST['submit'])) {
    $stud_id = trim($_POST['stud_id']);

    $loginStud = new StudentLogin($stud_id);
    $rtnLogin = $loginStud->StudLogin();
}

$db->close();