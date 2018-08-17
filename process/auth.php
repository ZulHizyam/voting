<?php
//Create authentication

//Start session
session_start();
    if(!isset($_SESSION['STUD_ID ']) && empty($_SESSION['STUD_ID'])) {
        header('Location:index.php');
    }

?>


    