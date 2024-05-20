<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <form method="post">
                    <input class="form-control mb-3" type="text" name="name" placeholder="Full Name">

                    <input class="form-control mb-3" type="text" name="adress" placeholder="Address">

                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female <br>

                    <label for="">Select City</label>
                    <select name="city" id="">
                        <option value="khi">KARACHI</option>
                        <option value="hyd">HYDERABAD</option>
                        <option value="jam">JAMSHORO</option>
                    </select>
                    

                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>

</html>

<?php 

if(isset($_POST['submit'])){
    $con = mysqli_connect("localhost","root","","fullstack");

    $name = $_POST['name'];
    $city = $_POST['city'];
   

    $query = mysqli_query($con,"INSERT INTO registers(name,city)VALUES('$name','$city')");
}


?>