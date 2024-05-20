<?php 
session_start();

if(!isset($_SESSION['student_id'])){
    // header('location:index.php');
    echo "<script>
      alert('Please Login First')
      location.assign('index.php')
    </script>";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>MCQS</title>
  </head>
  <body>
  
  <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-outline-danger btn-sm" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
  </li>
</ul>

    <h1 class="bg-warning p-3 text-center">MID TERM EXAM</h1>
    <div class="container">
        <div class="row">
            <div class="col-12 shadow">
                <form action="code.php" method="post">
                    <div class="col-12 mb-3">
                        <label for="">Q1:What Is Abbrivation Of PHP?</label><br>
                        <input type="radio" name="Q1" value="correct">Option1
                        <input type="radio" name="Q1" value="wrong">Option2
                        <input type="radio" name="Q1" value="wrong">Option3
                        <input type="radio" name="Q1" value="wrong">Option4
                    </div>


                    <div class="col-12 mb-3">
                        <label for="">Q2:What Is Abbrivation Of PHP?</label><br>
                        <input type="radio" name="Q2" value="correct">Option1
                        <input type="radio" name="Q2" value="wrong">Option2
                        <input type="radio" name="Q2" value="wrong">Option3
                        <input type="radio" name="Q2" value="wrong">Option4
                    </div>


                    <div class="col-12 mb-3">
                        <label for="">Q3:What Is Abbrivation Of PHP?</label><br>
                        <input type="radio" name="Q3" value="correct">Option1
                        <input type="radio" name="Q3" value="wrong">Option2
                        <input type="radio" name="Q3" value="wrong">Option3
                        <input type="radio" name="Q3" value="wrong">Option4
                    </div>

                    <button class="btn btn-success" type="submit" name="exam">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>