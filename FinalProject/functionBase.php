<?php

//Normal Function
//Return 
//Argument Parameter
// function Hello()
// {
//     return 5 + 5;
// }

// $basicSalry = Hello(); // Call A Function

// echo $basicSalry + 5000;

function Connection()
{
    $con = mysqli_connect("localhost", "root", "", "fullstack");
    return $con;
}

function SelectAllData($table)
{
    $query = mysqli_query(Connection(), "SELECT * FROM $table");
    return $query;
}

$SelectData = SelectAllData('users');
$SelectExam = SelectAllData('exam');
$SelectRegisters = SelectAllData('registers');

// print_r($SelectRegisters);
// print_r($SelectExam);
// print_r($SelectData);
