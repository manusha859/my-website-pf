<?php
$conn = new mysqli("localhost", "root", "", "pinga_users");

if ($conn->connect_error) {
    die("Connection failed");
}

$username = $_POST['username'];
$password = $_POST['password'];

// Check user already exists
$check = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    echo "<h3 style='color:red;text-align:center;'>Username already exists</h3>";
} else {
    // Insert new user
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<h3 style='color:green;text-align:center;'>Signup Successful</h3>";
        echo "<a href='login.html'>Login Now</a>";
    } else {
        echo "Error";
    }
}

$conn->close();
?>