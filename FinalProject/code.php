<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
function Session()
{
    session_start();
}
Session(); // Session Active

function connection()
{
    $con = mysqli_connect("localhost", "root", "", "fullstack");
    return $con;
}


function SelectAllData($table)
{
    $query = mysqli_query(connection(), "Select * FROM $table");
    return $query;
}


if (isset($_POST['register'])) {

    $name = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = "user";

    $query = mysqli_query(connection(), "INSERT INTO registers(name,email,password,role)VALUES('$name','$email','$password','$role')");

    //true
    if ($query) {
        $_SESSION['success'] = "Account Created Successfully";
        header('location:register.php');
    }
}

// Login Code

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query(connection(), "Select * FROM registers WHERE email = '$email' AND password = '$password'");

    //mysqli_num_rows() // 1 , 0
    // var_dump($query);
    // Convert Into Associative Array

    if (mysqli_num_rows($query) > 0) {
        // Convert Into Array
        // var_dump($query);
        // die();
        $data = mysqli_fetch_assoc($query);



        if ($data['status'] == "verified") {
            // echo "Verified";
            if ($data['role'] == "super admin") {
                echo "Super Admin";
            } else if ($data['role'] == "Admin") {
                // Create Session Variable
                $_SESSION['adminName'] = $data['name'];
                header('location:AdminDashboard/public.php?index');
            } else {
                $_SESSION['user_id'] = $data['id'];
                header('location:index.php');
            }
        } else {
            echo "<script>
                alert('Unverified Account')
                location.assign('index.php')
            </script>";
        }
    } else {
        echo "Email Or Password Not Correct";
    }
}


// Email Already Exists Method

if (isset($_POST['EmailCheck'])) {
    $email = $_POST['EmailCheck'];

    $query =  mysqli_query(connection(), "SELECT * FROM registers WHERE email = '$email'");


    //    Check No Of Rows 
    if (mysqli_num_rows($query) > 0) {
        echo "<div class='alert alert-danger' role='alert'>
                        Email Already Exists
                    </div>";
    }
}


// Add Category


if (isset($_POST['addCategory'])) {

    $file_name = $_FILES['c_image']['name'];
    $file_size = $_FILES['c_image']['size']; // bytes
    $file_tmp_name = $_FILES['c_image']['tmp_name'];
    $file_type = pathinfo($file_name, PATHINFO_EXTENSION); //2 para

    $destination = "AdminDashboard/img/" . $file_name;

    if ($file_size <= 2000000) {

        //Type must be image
        if ($file_type == 'jpg' || $file_type == 'png') {

            // File Move
            if (move_uploaded_file($file_tmp_name, $destination)) {
                //Query


                $query =  mysqli_query(connection(), "INSERT INTO category(c_name,c_image)VALUES('" . $_POST['c_name'] . "','$file_name')");

                if ($query) {
                    echo "<script>
                            alert('Category Inserted Successfully')
                            location.assign('AdminDashboard/public.php?category')
                        </script>";
                }
            } else {
                echo "<script>
         alert('Category Not Uploaded')
         location.assign('AdminDashboard/public.php?category')
    </script>";
            }
        } else {
            echo "<script>
         alert('Upload Only jpg Image')
         location.assign('AdminDashboard/public.php?category')
    </script>";
        }
    } else {
        echo "<script>
         alert('File Size Must Be Less Then 2MB')
         location.assign('AdminDashboard/public.php?category')
    </script>";
    }
}


// Add Product

if (isset($_POST['addProduct'])) {

    $file_name = $_FILES['p_image']['name'];
    $file_size = $_FILES['p_image']['size']; // bytes
    $file_type = pathinfo($file_name, PATHINFO_EXTENSION); //2 para

    // $destination = "AdminDashboard/img/" . $file_name;

    if ($file_size <= 2000000) {

        //Type must be image
        if ($file_type == 'jpg' || $file_type == 'png' || $file_type == 'jpeg') {


            // Query
            $file_tmp_name = $_FILES['p_image']['tmp_name'];
            $fileContent = file_get_contents($file_tmp_name);
            $imageEncoded = base64_encode($fileContent);

            $query =  mysqli_query(connection(), "INSERT INTO product(p_name,p_desc,p_price,p_qty,p_type,category_id,p_image)VALUES('" . $_POST['p_name'] . "','" . $_POST['p_desc'] . "','" . $_POST['p_price'] . "','" . $_POST['p_qty'] . "','" . $_POST['p_type'] . "','" . $_POST['p_category'] . "','$imageEncoded')");

            if ($query) {
                echo "<script>
                            alert('Product Inserted Successfully')
                            location.assign('AdminDashboard/public.php?product')
                        </script>";
            }
        } else {
            echo "<script>
         alert('Upload Only jpg Image')
         location.assign('AdminDashboard/public.php?product')
    </script>";
        }
    } else {
        echo "<script>
         alert('File Size Must Be Less Then 2MB')
         location.assign('AdminDashboard/public.php?product')
    </script>";
    }
}

// Forget Password 


if (isset($_POST['forgetPassword'])) {
    $email = $_POST['email'];
    $randomNumbers = rand(1, 9999999);
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'talibmari123@gmail.com';                     //SMTP username
        $mail->Password   = 'mccpmhswkyfffsty';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('talibmari123@gmail.com', 'Talib Hussain');
        $mail->addAddress($email, $email);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Reset Password Verification";
        $mail->Body    = "<h1>Reset Password Code <b>" . $randomNumbers . "</b></h1>";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        mysqli_query(connection(), "INSERT INTO forgepassword(code,email)VALUES('$randomNumbers','" . $_POST['email'] . "')");

        echo '<script>
            alert("Code Has Been Sent To Mail")
            location.assign("CodeVerification.php")
        </script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


// verify_code

if (isset($_POST['verify_code'])) {

    $code = $_POST['code'];

    $query = mysqli_query(connection(), "SELECT * FROM forgepassword WHERE code = '$code'");

    $data = mysqli_fetch_assoc($query);

    $_SESSION['email'] = $data['email'];

    if ($query) {
        echo '<script>
            alert("Code Verified Successfully")
            location.assign("ResetPassword.php")
        </script>';
    } else {
        echo '<script>
            alert("Code Verified Failed")
            location.assign("CodeVerification.php")
        </script>';
    }
}


// Confirm Password
if (isset($_POST['confirmPassword'])) {
    $email = $_SESSION['email'];
    $password = $_POST['password'];
    $retypePassword = $_POST['retypePassword'];

    if ($password == $retypePassword) {
        $query =  mysqli_query(connection(), "UPDATE registers SET password = '$password ' WHERE email = '$email'");

        if ($query) {


            mysqli_query(connection(), "DELETE FROM forgepassword WHERE email = '$email'");
            unset($_SESSION['email']);
            echo '<script>
            alert("Password Successfully Reset")
            location.assign("index.php")
        </script>';
        }
    } else {
        echo '<script>
            alert("Confirm Password Not Match")
            location.assign("ResetPassword.php")
        </script>';
    }
}



// add To Cart


if (isset($_POST['addCart'])) {
    echo "Working";
}
