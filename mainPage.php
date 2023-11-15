<?php 
session_start();
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
    <style>
       
    </style>
</head>
<body>
<header>
    <nav>
        <ul class="nav-links">
            <li><a href="mainPage.php">Home</a></li>
            <li><a href="tickets.php">Tickets</a></li>
            <?php if(isset($_SESSION['username'])) { ?>
                            <li><a href="order.php">Order history</a></li>
            <?php } ?>
            <li><a href="contact.php">Contact</a></li>
        </ul>
            <ul class="logout">
                <?php if (isset($_SESSION['username'])) { ?>
                    <form action="logout.php" method="post">
                        <input type="submit" value="Logout" class="custom-button">
                    </form>
                <?php } else { ?>
                    <h2>Login</h2>
                    <form action="login.php" method="post">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username"><br><br>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password"><br><br>
                        <input type="submit" value="Login" class="custom-button">
                    </form>
                </ul>
                <div id="registerPopup" class="popup">
                    <form action="register.php" method="post">
                        <h2>Register</h2>
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username"><br><br>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password"><br><br>
                        <input type="submit" value="Register" class="custom-button">
                    </form>
                </div>
            <?php } ?>
        </div>
    </nav>
</header>
<div class="bg-image">
    <div class="content"  style="padding-top: 10px;">
        <h1 class="rainbow" style="height: auto;">Welcome the the Rizz Hub!</h1>
        
        <h3 class="rainbow2"><p>

        <h3 class="rainbow2"><p id="p1">Elevating Your Experience!</p>

        <h3 class="rainbow2"><p id="p1">Welcome to RizzHub, your premier destination for hassle-free ticket purchases.</p>
            <br><br><br>       
        <h3 class="rainbow2"><p id="p1">Here's why RizzHub stands out:</p>
    
     

        <h3 class="rainbow2"><p id="p1">Diverse Selection: From local gigs to global sensations, find tickets for all your favorite events.</p>
            
        <h3 class="rainbow2"><p id="p1">Easy & Secure: Navigate our user-friendly site with ease, and trust our secure payment process.</p>
            
        <h3 class="rainbow2"><p id="p1">Real-Time Availability: Stay updated with live event availability, ensuring you never miss out.</p>
            
        <h3 class="rainbow2"><p id="p1">Responsive Support: Our customer support team is ready to assist you promptly and professionally.</p>
            
        <h3 class="rainbow2"><p id="p1">Exclusive Offers: Enjoy exclusive deals and promotions, making your ticket-buying experience even better.</p>
            
        <h3 class="rainbow2"><p id="p1">Mobile-Friendly: Purchase tickets on the go with our mobile-responsive site.</p>
            
        <h3 class="rainbow2"><p id="p1">RizzHub: Your Simple Solution to Unforgettable Experiences!</p>
        </div></div>

            <div class="footer">
                <p id="p1">&copy; 2023 RRZ Tickets</p>
            </div>

</body>
</html>

