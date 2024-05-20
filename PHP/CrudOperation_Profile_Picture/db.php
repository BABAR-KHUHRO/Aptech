<form method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Enter Your Name" name="name"><br>
    <input type="text" placeholder="Enter Your Email" name="email"><br>
    <input type="text" placeholder="Enter Your Password" name="password"><br>
    <input type="text" placeholder="Enter Your Address" name="address"><br>
    <input type="text"  onclick="this.type='file'" placeholder="Upload Profile Pic" name="profilePic"><br>
    <!-- <label for="">Company Joining Detail:</label><br>
    <input type="text" onclick="this.type='date'" placeholder="Comapny_start_date"><br>
    <input type="text" onclick="this.type='date'" placeholder="Comapny_end_date"><br> -->

    <input type="submit" name="login">
</form>

<?php   

if(isset($_POST['login'])){
    $con = mysqli_connect("localhost","root","","fullstack");
//    print_r($_FILES);
    // Get File
    $file_name = $_FILES['profilePic']['name'];
    $file_size = $_FILES['profilePic']['size']; // bytes
    echo $file_tmp_name = $_FILES['profilePic']['tmp_name'];
    $file_type = pathinfo($file_name,PATHINFO_EXTENSION); //2 para

    $destination = "profile_images/".$file_name;

    if($file_size <= 2000000){
        
        //Type must be image
        if($file_type == 'jpg' || $file_type == 'png'){
            
            // File Move
            if(move_uploaded_file($file_tmp_name,$destination)){
                //Query

                $query =  mysqli_query($con,"INSERT INTO users (name,email,password,address,profile_image)VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."','".$_POST['address']."','$file_name')");

                   if($query){
                        echo "<script>
                            alert('Data Inserted Successfully')
                        </script>";
                    }

            }else{
                echo "<script>
         alert('Profile Not Uploaded')
    </script>";
            }
        }else{
            echo "<script>
         alert('Upload Only jpg Image')
    </script>";
        }

    }else{
         echo "<script>
         alert('File Size Must Be Less Then 2MB')
    </script>";
    }


//    $con = mysqli_connect("localhost","root","","fullstack");
//     //Insert Query
//     // '".$_POST['name']."'

//    $query =  mysqli_query($con,"INSERT INTO users (name,email,password,address)VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."','".$_POST['address']."')");


//    if($query){
//     echo "<script>
//         alert('Data Inserted Successfully')
//     </script>";
//    }

}


?>

