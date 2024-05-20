<?php 

function Session(){
    session_start();
}
Session(); // Session Active

function connection(){
     $con = mysqli_connect("localhost","root","","fullstack");
     return $con;
}
function SelectAllData($table){
    $query = mysqli_query(connection(),"Select * FROM $table");
    return $query;
}
//Code for register.php starts from here 
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
//Code for register.php ends here 



// Register Code

//Code for login.php starts from here 

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query(connection(),"Select * FROM registers WHERE email = '$email' AND password = '$password'");
    $qr=SelectAllData("registers");

    if(mysqli_num_rows($query) > 0){
        // Convert Into Array
        $data = mysqli_fetch_assoc($query);
        if($data['status'] == "verified"){
            // echo "Verified";
            if($data['role'] == "super admin"){
                // isset($_POST['login']);
                isset($superAdmin['superAdmin']);
                // $_SESSION['role1']='superadmin';
                $_SESSION['name'] = $data['name'];
                echo $_SESSION['name'];
                header('location:./superadmin/static/index.php');
              
            }
            else if($data['role'] == "admin"){
                isset($Admin['superAdmin']);
                // $_SESSION['role1']='admin';
                $_SESSION['name'] = $data['name'];
                echo $data['name'];
                header('location:./superadmin/static/index.php');
            }
            else{
                echo $data['name'];
            }
        }else{
            echo "Unverified Account";
        }
    }else{
        echo "Email Or Password Not Correct";
    }   
    }

//Code for login.php ends from here 


// SuperAdmin Adding admin

if(isset($_POST['sp_register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = mysqli_query(connection(),"INSERT INTO registers(name,email,password,role,status)VALUES('$name','$email','test123','admin','verified')");
//true
    if($query){
        $_SESSION['success'] = "Account Created Successfully";
        header('location:addadmin.php');
    }
    else{
        $_SESSION['unsuccess'] = "Something Went wrong";
        header('location:addadmin.php');
    }
}



?>
