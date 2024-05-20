<?php 

function Session(){
    session_start();
}
Session(); // Session Active

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
// function LoginData($table,$email,$password){
//     $query = mysqli_query(connection(),"Select * FROM $table WHERE email = $email AND password=$password");
//     return $query;
// }

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
        $_SESSION['success'] = "Account Created Successfully";
        header('location:register.php');
    }
}

// Register Code

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query(connection(),"Select * FROM registers WHERE email = '$email' AND password = '$password'");

    //mysqli_num_rows() // 1 , 0
    // var_dump($query);
    // Convert Into Associative Array
    
    if(mysqli_num_rows($query) > 0){
        // Convert Into Array
        $data = mysqli_fetch_assoc($query);

        if($data['status'] == "verified"){
            // echo "Verified";
            if($data['role'] == "super admin"){
                echo "Super Admin";
            }else if($data['role'] == "admin"){
                echo "Admin";
            }else{
                echo "User";
            }
        }else{
            echo "Unverified Account";
        }
    }else{
        echo "Email Or Password Not Correct";
    }   
    
    



}

?>