<?php
include "connect.php";

session_start();

if (!isset($_SESSION["u_id"])) {
    header("location: index.php");
    exit();
} else {
    $user_id = $_SESSION["u_id"];

    $getUser = "SELECT * FROM tbl_user WHERE u_id='$user_id' ORDER BY u_id DESC LIMIT 1";
    $resultGetUser = mysqli_query($connect, $getUser);

    if (mysqli_num_rows($resultGetUser) > 0) {
        $user = mysqli_fetch_assoc($resultGetUser);
    }
}
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
                <li><a href="#" id="home">Home</a></li>
                <li><a href="#" id="about">About</a></li>
            </ul>
        </nav>
        <div id="nav-button">
            <button id="login">Login</button>
            <button id="signup">Get Started</button>
        </div>
    </header>
    <main>
        <div id="trains">
            <button type="button" id="left"><i class="fi fi-sr-angle-left"></i></button>
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
            <button type="button" id="right"><i class="fi fi-sr-angle-right"></i></button>
        </div>
        <!-- <form action="" method="post" id="service"></form> -->
    </main>
    <div id="frame" class="hide"></div>
    <!-- <form action="" method="post">
        <input type="submit" value="back" name="submit">
        <?php
        if (isset($_POST["submit"])) {
            session_unset();
            session_destroy();
            header("location: index.php");
            exit();
        }
        ?>
    </form> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="index.js"></script>
</body>

</html>