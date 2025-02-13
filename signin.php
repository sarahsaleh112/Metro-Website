<?php
include 'users.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$username || !$password) {
        echo "All fields are required!";
    } else {
        $result = mysqli_query($con, "SELECT * FROM users WHERE Name='$username' AND Password='$password'");
        if (mysqli_num_rows($result) > 0) {// Check if any rows were returned from the query
            $_SESSION['username'] = $username;

            header("Location: welcome2.html");
            exit();
        } else {
            echo "Invalid username or password.";
        }
        mysqli_close($con);
    }
}
?>
