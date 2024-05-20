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
    <link rel="shortcut icon" href="Images/download (2).jpeg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <script>
        // Sector
        //id    $("#email")
        //class $(".email")
        // Tag  $("email")
        $(document).ready(function() { //anonymous Function // Call Back 
            // console.log($("#email"))
            $("#email").keyup(function() {
                var email = $("#email").val();

                $.ajax({
                    type: "post",
                    url: "code.php",
                    data: {
                        "EmailCheck": email
                    },
                    success: function(res) {
                        $("#msg").html(res)
                    }
                })
            })


        })
        // console.log(document)
    </script>

</head>

<body>


    <div class="wrapper">
        <div class="logo">
            <img src="Images/download (2).jpeg" alt="">
        </div>
        <div class="text-center mt-4 name">
            REGISTER FORM
        </div>

        <?php
        if (isset($_SESSION['success'])) {
        ?>
            <div class="alert alert-success" role="alert">
                Account Created Successfully
            </div>
        <?php
            unset($_SESSION['success']);
        }

        ?>
        <p id="msg"></p>

        <form class="p-3 mt-3" method="POST" action="code.php">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="userName" id="userName" placeholder="Username" required>
            </div>


            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" required>
            </div>
            <button class="btn mt-3" type="submit" name="register">Register</button>
        </form>
        <div class="text-center fs-6">
            already account created <a href="index.php">Login</a>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>