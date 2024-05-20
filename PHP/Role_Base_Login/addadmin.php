<?php 
include "code.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>


  <div class="wrapper mb-0" >

  <form class="p-3 mt-3" method="POST" action="code.php">
<?php
if(isset($_SESSION['success'])){ 
  echo '<div class=" d-flex align-items-center"> <h5 class="bg-success">Account Created Successfully</h4></div> ';
  unset($_SESSION['success']);
}elseif(isset($_SESSION['unsuccess'])){ 
  echo '<div class=" d-flex align-items-center"> <h5 class="bg-success">Something Went Wrong</h4></div> ';
  unset($_SESSION['unsuccess']);
}
  ?>    
  <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="name" id="userName" placeholder="Username" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="userName" placeholder="Email" required>
            </div>
            <button class="btn mt-3" type="submit" name="sp_register" >Add Admin</button>
        </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>