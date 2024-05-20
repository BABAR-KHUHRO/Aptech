<?php
require 'config.php';
if (isset($_SESSION['login_id'])) {
    header('Location: home.php');
    exit;
}
require 'google-api/vendor/autoload.php';
// Creating new google client instance
$client = new Google_Client();
// Enter your Client ID
$client->setClientId('');
// Enter your Client Secrect
$client->setClientSecret('');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/Fullstack\ProjectPhpVersion8/index.php');
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");
if (isset($_GET['code'])) :
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token["error"])) {
        $client->setAccessToken($token['access_token']);
        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);
        //$db_connection = mysqli_connect('localhost', 'root', '', 'fullstack');
        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `users` WHERE `google_id`='$id'");
        if (mysqli_num_rows($get_user) > 0) {
            $_SESSION['login_id'] = $id;
            header('Location: home.php');
            exit;
        } else {
            // if user not exists we will insert the user
            $insert = mysqli_query($db_connection, "INSERT INTO `users`(`google_id`,`name`,`email`,`profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");
            if ($insert) {
                $_SESSION['login_id'] = $id;
                header('Location: home.php');
                exit;
            } else {
                echo "Sign up failed!(Something went wrong).";
            }
        }
    } else {
        header('Location: index.php');
        exit;
    }

else :
    // Google Login Url = $client->createAuthUrl(); 
?>


    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="shortcut icon" href="Images/download (2).jpeg" type="image/x-icon">
        <title>Login Form</title>
        <link rel="stylesheet" href="style.css">

        <style>
            *,
            *::before,
            *::after {
                box-sizing: border-box;
                -webkit-box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f7f7ff;
                padding: 10px;
                margin: 0;
            }

            ._container {
                max-width: 400px;
                background-color: #ffffff;
                padding: 20px;
                margin: 0 auto;
                border: 1px solid #cccccc;
                border-radius: 2px;
            }

            ._container.btn {
                text-align: center;
            }

            .heading {
                text-align: center;
                color: #4d4d4d;
                text-transform: uppercase;
            }

            .login-with-google-btn {
                transition: background-color 0.3s, box-shadow 0.3s;
                padding: 12px 16px 12px 42px;
                border: none;
                border-radius: 3px;
                box-shadow: 0 -1px 0 rgb(0 0 0 / 4%), 0 1px 1px rgb(0 0 0 / 25%);
                color: #ffffff;
                font-size: 14px;
                font-weight: 500;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
                background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
                background-color: #4a4a4a;
                background-repeat: no-repeat;
                background-position: 12px 11px;
                text-decoration: none;
            }

            .login-with-google-btn:hover {
                box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25);
            }

            .login-with-google-btn:active {
                background-color: #000000;
            }

            .login-with-google-btn:focus {
                outline: none;
                box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25), 0 0 0 3px #c8dafc;
            }

            .login-with-google-btn:disabled {
                filter: grayscale(100%);
                background-color: #ebebeb;
                box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 1px 1px rgba(0, 0, 0, 0.25);
                cursor: not-allowed;
            }
        </style>
    </head>

    <body>


        <div class="wrapper">
            <div class="logo">
                <img src="Images/download (2).jpeg" alt="">
            </div>
            <div class="text-center mt-4 name">
                LOGIN FORM
            </div>
            <form class="p-3 mt-3" method="POST" action="code.php">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="email" name="email" id="userName" placeholder="Email">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="pwd" placeholder="Password">
                </div>
                <button class="btn mt-3" type="submit" name="login">Login</button>
            </form>
            <div class="text-center fs-6">
                <a href="forgetPassword.php">Forget password?</a> or <a href="register.php">Sign up</a>

                <a type="button" class="login-with-google-btn" href="<?php echo $client->createAuthUrl(); ?>">
                    Sign in with Google
                </a>
            </div>
        </div>


        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </body>

    </html>
<?php endif; ?>