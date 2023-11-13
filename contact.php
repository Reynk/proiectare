<?php
session_start();
include 'dbConnect.php';
/* define the sql query and then use it to perform a query and assign the result */
$sql = "SELECT * FROM events";
$result = mysqli_query($dbConnection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Event Tickets</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav>
        <ul class="nav-links">
            <li><a href="mainPage.php">Home</a></li>
            <li><a href="tickets.php">Tickets</a></li>
            <li><a href="order.php">Order history</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <ul class="login">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" value="Login">
            </form>
        </ul>
        <div id="registerPopup" class="popup">
            <form action="register.php" method="post">
                <h2>Register</h2>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" value="Register">
            </form>
        </div>
    </nav>
</header>

<main class="pagina-ctc">

    <h1>We'd love to hear from you!</h1>

</main>


    <div class="contact-box">
        <h2>Contact Information</h2>
        <span>Email: RRZ@gmail.com</span> <br>
        <span>Address: Str. Teodor Mihali, Cluj-Napoca, Romania</span> <br>
        <span>Telephone: 0751622683</span> <br>
        <span>Additional Information: You can contact us by sending an email to the adress, or by calling.</span> <br>
        <br>
    </div>

<div class="submit-box">
    <h2>Contact Form</h2>
    <span> Contact us! Complete this form and we will get back to you in approx 48 hours. </span> <br>
    <span> If you still have questions, feel free to send an email to the specified adress. </span>

    <form action="submit.php" method="post">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="input-1" name="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="input-1" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="input-1" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="input-1" name="phone">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="input-1" name="message" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" id="input-1" name="country">
        </div>

        <br>
        <button class="custom-button" type="submit">Submit</button> <br>
    </form>
</div>

<footer class="footer">
    <p>&copy; 2023 RRZ Tickets</p>
</footer>

</body>
</html>';
