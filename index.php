<?php
include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midtrans | We Are Visionary Journeys</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <a href="#" class="nav-brand">
                MidTrans
            </a>
            <ul class="nav-menu">
                <a href="#" id="home">Home</a>
                <a href="#" id="about">About</a>
            </ul>
        </nav>
        <div>
            <button id="login">Login</button>
            <button id="signup">Get Started</button>
        </div>
    </header>
    <main>
        <div id="trains">
            <button id="left"><i class="fi fi-sr-angle-left"></i></button>
            <div id="train-1" class="train show">
                <img src="assets/QX.png" alt="" srcset="">
                <h2 class="train-name">QUANTUM EXPRESS</h2>
                <p class="train-desc">This train reflects reliability and efficiency in the future. Designed with
                    cutting-edge quantum computing technology, the Quantum Express offers high stability, punctuality,
                    and top-notch security. With remarkable adaptability, this train provides a reliable and
                    unprecedentedly precise travel experience.</p>
            </div>
            <div id="train-2" class="train hide" style="display:none;">
                <img src="assets/SJ.png" alt="" srcset="">
                <h2 class="train-name">STELLAR <br> JET</h2>
                <p class="train-desc">This Train Embodies speed and comfort in the future. powered by state-of-the-art
                    technology, the Stellar Jet enables super-fast inter-city travel with exceptional comfort. Equipped
                    with luxurious amenities and advanced navigation systems, it's the top choice for efficient and
                    futuristic.</p>
            </div>
            <div id="train-3" class="train hide" style="display:none;">
                <img src="assets/GT.png" alt="" srcset="">
                <h2 class="train-name">GALACTIC TRAX</h2>
                <p class="train-desc">As a representation of global connectivity in the future, the Galactic Trax takes
                    passengers on transcontinental journeys with remarkable comfort and speed. With the latest
                    advancements in energy systems and ergonomic design, this train delivers an extraordinary travel
                    experience across the galaxy, offering unprecedented mobility freedom.</p>
            </div>
            <button id="right"><i class="fi fi-sr-angle-right"></i></button>
        </div>
        <!-- <form action="" method="post" id="service"></form> -->
    </main>
    <form id="login-card" class="hide">
        <div class="form-control">
            <h3 align="center">Login</h3>
        </div>
        <div class="form-control">
            <label for="login-name">Username</label>
            <input type="text" name="login-name" id="login-name" placeholder="Jhon Doe">
        </div>
        <div class="form-control">
            <label for="login-pass">Password</label>
            <input type="password" name="login-pass" id="login-pass" placeholder="123456">
        </div>
        <div class="form-control">
            <input type="submit" value="Login" name="login-submit" id="login-submit">
        </div>
        <div class="form-control">
            <p align="center">don't have an account? <a href="#" id="signup2">Sign Up</a></p>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="index.js"></script>
</body>

</html>