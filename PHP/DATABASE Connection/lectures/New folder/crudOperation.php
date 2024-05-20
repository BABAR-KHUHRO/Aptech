<?php 

$con = mysqli_connect("localhost","root","","fullstack");

// if($con){
//     echo "connected";
// }
$query = mysqli_query($con,"SELECT * FROM registers");

// var_dump($query)
// print_r()

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD OPERATION</title>
  </head>
  <body>
   
    <table class="table m-5">
        <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>

<?php
    foreach($query as $data){
        ?>
        <tr>
            <td><?php echo $data['id']?></td>
            <td><?php echo $data['name']?></td>
            <td><?php echo $data['email']?></td>
            <td><?php echo $data['password']?></td>
            <td>Action</td>
        </tr>
        <?php
    }
?>
       
    </table>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>