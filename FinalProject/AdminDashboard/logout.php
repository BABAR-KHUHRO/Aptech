<?php
session_start();

//Session Remove
// unset($_SESSION['adminName']); //Remove Only Particular Session
//session_unset(); //Remove Only Particular Session 
session_destroy();   //All Session Remove

header('location:../index.php');
