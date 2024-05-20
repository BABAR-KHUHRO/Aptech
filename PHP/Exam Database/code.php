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


    $blockForExam = mysqli_query(connection(),"SELECT registers.*,exam.* 
FROM registers
INNER JOIN exam ON registers.id = exam.student_id WHERE email = '$email'");

if(mysqli_num_rows($blockForExam) > 0){
    echo "<script>
        alert('Already Exam Done')
        location.assign('index.php')
    </script>";
}else{
        if(mysqli_num_rows($query) > 0){
                // Convert Into Array
                $data = mysqli_fetch_assoc($query);

                $_SESSION['student_id'] = $data['id'];
                header('location:dashboard.php');
            }else{
                echo "<script>
                    alert('Email Or Password Not Correct')
                    location.assign('index.php')
                </script>";
            }   
}

}

// Get Exam Data
if(isset($_POST['exam'])){
    error_reporting(0);
   $q1 = $_POST['Q1'];
   $q2 = $_POST['Q2'];
   $q3 = $_POST['Q3'];

   $totalMarks =0;
   $correctAnswers = 0;
   $wrongAnswers = 0;

   if($q1 == "correct"){
    $totalMarks +=2;
    $correctAnswers +=1;
   }else{
    $wrongAnswers+= 1;
   }


   if($q2 == "correct"){
    $totalMarks +=2;
    $correctAnswers +=1;
   }else{
    $wrongAnswers+= 1;
   }


   if($q3 == "correct"){
    $totalMarks +=2;
    $correctAnswers +=1;
    // $correctAnswers = $correctAnswers + 1;
   }else{
    $wrongAnswers+= 1;
   }


   echo "TotalMarks :".$totalMarks."<br>";
   echo "Total Correct Answer :".$correctAnswers."<br>";
   echo "Total Wrong Answer :".$wrongAnswers."<br>";

   $user_id = $_SESSION['student_id'];

   $query = mysqli_query(connection(),"INSERT INTO exam (student_id,total_marks,correct_answer,wrong_answer)VALUES('$user_id','$totalMarks','$correctAnswers','$wrongAnswers')");


   if($query){

    //  echo "<script>
    //         alert('Exam Submitted Successfully'+)

    //     </script>";

    ?>
        <script>
            alert('Exam Submitted Successfully <br> Your Total Marks :'+ <?php echo $totalMarks ?>)
            location.assign('logout.php')
        </script>
    <?php 
   }

}
?>
