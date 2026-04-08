<?php
session_start();
include 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo "Fill all fields";
        exit;
    }

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            echo "SUCCESS";
        } else {
            echo "Wrong password";
        }
    } else {
        echo "User not found";
    }

    exit;
}
?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&family=Changa+One:ital@0;1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="icon" type="image/png" href="icon.png">
    </head>
    <body>
        <h1>CINEBOOK</h1>
        <ul class="menu">
            <a href="index.php"><li>Home</li></a>
            <a href="movies.php"><li>Movies</li></a>
            <a href="theatres.php"><li>Theatres</li></a>
            <a href="login.php"><li class="active">Login</li></a>
        </ul>
        <br>
        <br>
        <div class="login-page">
            <h2 class="h21">Login</h2>
            <br>
            <br>
            <div class="input-box">
                <label for="email">   Email</label>
                <input type="email" id="email" name="email" required>   
            </div>
            <br>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button onclick="login()">LOGIN</button>
            <br>
            <br>
            <div class="createaccount">
                <a href="register.php">Create new account</a>
            </div>   
        </div>
        <div class="poster poster1"></div>
        <div class="poster poster2"></div>
        <div class="poster poster3"></div>
        <div class="poster poster4"></div>
        <div class="poster poster5"></div>
        <div class="poster poster6"></div>
        <div class="poster poster7"></div>
        <div class="poster poster8"></div>
        <div class="poster poster9"></div>
        <div class="poster poster10"></div>



    </body>  
    <script>
        function login() {
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;

            fetch("login.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `email=${email}&password=${password}`
            })
            .then(res => res.text())
            .then(data => {
                if (data === "SUCCESS") {
                    window.location.href = "index.php";
                } else {
                    alert(data);
                }
            });
        }
    </script> 
</html>