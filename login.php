<?php
$conn = new mysqli("localhost", "root", "", "pinga_users");

$message = "";

if ($conn->connect_error) {
    die("Connection failed");
}

// LOGIN
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $message = "<p style='color:lightgreen;'>Login Successful</p>";
    } else {
        $message = "<p style='color:red;'>Invalid Login</p>";
    }
}

// SIGNUP
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        $message = "<p style='color:red;'>Username already exists</p>";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            $message = "<p style='color:lightgreen;'>Signup Successful</p>";
        }
    }
}
?>