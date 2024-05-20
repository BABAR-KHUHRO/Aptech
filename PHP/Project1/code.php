<?php 

function connection(){
     $con = mysqli_connect("localhost","root","","fullstack");
     return $con;
//     $salry = 80000;
//    return $salry;
}
// $finalSalry = connection();
// echo $finalSalry + 5000;

function SelectAllData($table){
    $query = mysqli_query(connection(),"Select * FROM $table");
    return $query;
}

//$FetchDataFromRegisters = SelectAllData("registers");

// print_r($FetchDataFromRegisters);

//$FetchDataFromEmp = SelectAllData("emp");

// print_r($FetchDataFromEmp);



if(isset($_POST['register'])){
    
    $name = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = "user";

    $query = mysqli_query(connection(),"INSERT INTO registers(name,email,password,role)VALUES('$name','$email','$password','$role')");

//true
    if($query){
        echo "<script>
            alert('Account Created Successfully')
            location.assign('register.php')
        </script>";
    }

}

?>