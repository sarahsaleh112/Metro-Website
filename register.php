<?php
include 'users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $year = $_POST['year'];
    $major = $_POST['major'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    if (!$name || !$year || !$major || !$age || !$password) {
        echo "All fields are required!";
    } else {
        $q = "INSERT INTO users (Name, Year, Major, Age, Password) VALUES ('$name', '$year', '$major', '$age', '$password')";
        if (mysqli_query($con, $q)) {
            header("Location: signin.html");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
        mysqli_close($con);
    }
}
?>
