<form method="post">
    <input type="text" placeholder="Enter Your Name" name="name"><br>
    <input type="text" placeholder="Enter Your Email" name="email"><br>
    <input type="text" placeholder="Enter Your Password" name="password"><br>
    <input type="text" placeholder="Enter Your Address" name="address"><br>

    <input type="submit" name="login">
</form>

<?php   

// $_POST[] Associative Array
if(isset($_POST['login'])){
    // echo "btn Working";

    //  print_r($_POST);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    echo $name.'<br> '.$email.'<br> '.$password.'<br> '.$address;
}


// $first_name ="Abc";
// $name = "Ali";

// echo "Student Name ".$name
// Concatenate .
//output
// Case Non Sensitive
//     ECHO "Hello World <br>";
//     Print ("Print Method <br>");
// echo "<h1>Hello World</h1>";

// echo "<script>
//     alert('JavaScript Working')
// </script>";

?>

<!-- <table border="1">
    <th>Name</th>
    <th>Email</th>
</table> -->