<?php
include 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&family=Changa+One:ital@0;1&family=Doto:wght@100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="icon" type="image/png" href="Images/icon.png">
    </head>
    <body>
        <form method="POST" action="register.php" class="createacc">
            <h4>NAME<input type="text" name="name" placeholder="Name" required class="incre"></h4>
            <h4>EMAIL<input type="email" name="email" placeholder="Email" required class="incre"></h4>
            <h4>PASSWORD<input type="password" name="password" placeholder="Password" required class="incre"></h4>

            <button type="submit">Create Account</button>

            
        </form>
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
</html>