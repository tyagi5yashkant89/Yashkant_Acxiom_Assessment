<?php
// Start the session
session_start();
include("db.php");

$msg = "";
if(isset($_POST) && isset($_POST["username"]) && isset($_POST["pwd"])){
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    // login
    $rows = $db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    if($rows->num_rows > 0){
        $row = $rows->fetch_assoc();
        $un = $row["username"];
        $pwd = $row["password"];
        $isAdmin = $row["isAdmin"];
        if(md5($password) == md5($pwd)){
            $_SESSION["username"] = $username;
            $_SESSION["loggedin"] = true;
            $_SESSION["isAdmin"] = $isAdmin;
            if ( $isAdmin ) {
                header("Location: admin");
            }
            else {
                header("Location: user");
            }
        }
        else{
            $msg = "Invalid username or password";
        }
    }
    else{
        $msg = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS to center the form on the screen */
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="username" class="form-control" id="username" placeholder="Enter Username"
                                    name="username">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                    name="pwd">
                            </div>
                            <?php
                             echo $msg;
                            ?>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>