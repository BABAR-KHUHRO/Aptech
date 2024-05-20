<form method="post">
    <input type="text" placeholder="Enter Your Name" name="name"><br>
    <input type="text" placeholder="Enter Your Email" name="email"><br>
    <input type="text" placeholder="Enter Your Password" name="password"><br>
    <input type="text" placeholder="Enter Your Address" name="address"><br>

    <input type="submit" name="login">
</form>

<?php   

if(isset($_POST['login'])){
   
   $con = mysqli_connect("localhost","root","","fullstack");
    //Insert Query
    // '".$_POST['name']."'

   $query =  mysqli_query($con,"INSERT INTO users (name,email,password,address)VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."','".$_POST['address']."')");


   if($query){
    echo "<script>
        alert('Data Inserted Successfully')
    </script>";
   }

}


?>

