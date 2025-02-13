<?php
session_start();
include 'users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_SESSION['username'];
    $feedback = $_POST['feedback'];
    if (!$feedback) {
        echo "Feedback is required!";
    } else {
        $q = "INSERT INTO feedback (username, feedback) VALUES ('$username', '$feedback')";
        if (mysqli_query($con, $q)) {
            echo "Feedback submitted successfully!";
            header("Location: feedback.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
$feedbackQuery = "SELECT username, feedback FROM feedback";
$feedbackResult = mysqli_query($con, $feedbackQuery);
?>

<html>
<head>
    <title>Feedback</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<header>
    <img src="images/Imamu.png" alt="Logo" height="10%" width="10%" />
    <nav>
        <ul>
        <nav>
        <ul>
          <li><a href="Welcome.html">Welcome</a></li>
          <li><a href="signin.html">Sign In</a></li>
          <li><a href="join.html">Join Us</a></li>
          <li><a href="sabic.html">SABIC station</a></li>

          <li><a href="AboutUs.html">About Us</a></li>
          <li><a href="Feedback.php">Feedback</a></li>
          <li><a href="">Book Tictket</a></li>
        </ul>
      </nav>
        </ul>
    </nav>

    <nav>
        <ul>
            <li class="dropdown">
                <a href="#" class="contact-link">Contact Us</a>
                <ul class="dropdown-menu">
                    <li><a href="mailto:contact@riyadhmetro.com">Email Us</a></li>
                    <li><a href="tel:+1234567890">Call Us</a></li>
                    <li><a href="https://X.com" target="_blank">X</a></li>
                    <li><a href="https://instagram.com" target="_blank">Instagram</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<div class="background">
    <div class="overlay">
        <div class="form-box">
            <h1>Give Feedback</h1>
            <form action="feedback.php" method="POST">
                <textarea id="feedback" name="feedback" style="width: 322px;" placeholder="Enter your feedback"></textarea><br><br>
                <button type="submit" class="btn">Submit Feedback</button>
            </form>
        </div>
        
    <div class="feedback-list">
        <h2>Feedbacks</h2>
        <?php 
        if (mysqli_num_rows($feedbackResult) > 0) {
            
            while ($row = mysqli_fetch_array($feedbackResult)) {
                echo "<div class='feedback-item'>";
                echo "<strong>" . $row[0] . ":</strong>";
                echo "<p>" . $row[1] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No feedbacks available.</p>";
        }
        ?>
    </div>
    </div>

</div>

</body>
</html>

<?php
mysqli_close($con);
?>
