<?php
include "connect.php";

session_start();

$getKeberangkatan = "";

if (isset($_GET['s']) || isset($_GET['from']) || isset($_GET['to'])) {
    $service = $_GET["s"] == "" ? "" : "t.t_type='" . $_GET["s"] . "'";
    $from = $_GET["from"] == "" ? "" : ($service == "" ? "k.from_s='" . $_GET["from"] . "'" : " AND k.from_s='" . $_GET["from"] . "'");
    $to = $_GET["to"] == "" ? "" : ($from == "" ? "k.to_S='" . $_GET["to"] . "'" : " AND k.to_S='" . $_GET["to"] . "'");

    $sql = $service . $from . $to;
    if ($service || $from || $to) {
        $getKeberangkatan = "SELECT * FROM tbl_keberangkatan as k, tbl_train as t WHERE k.t_id=t.t_id AND " . $sql;
        $resultKeberangkatan = mysqli_query($connect, $getKeberangkatan);

        if ($resultKeberangkatan) {
        }
    }
}


if (isset($_POST["login-submit"])) {
    $login_name = $_POST["login-name"];
    $login_pass = $_POST["login-pass"];

    $getUser = "SELECT * FROM tbl_user WHERE u_name='$login_name' AND u_pass='$login_pass' ORDER BY u_id ASC LIMIT 1";
    $resultGetUser = mysqli_query($connect, $getUser);

    if (mysqli_num_rows($resultGetUser) > 0) {
        $user_login = mysqli_fetch_assoc($resultGetUser);
        $_SESSION["u_id"] = $user_login["u_id"];
        header("location: dashboard.php");
        exit();
    } else {
        $loginError = "<p align='center'>User Not Found!</p>";
    }
}

if (isset($_POST["signup-submit"])) {
    $signup_name = $_POST["signup-name"];
    $signup_pass = $_POST["signup-pass"];
    $signup_confirm_pass = $_POST["confirm-signup-pass"];

    if ($signup_pass != $signup_confirm_pass) {
        $signupError = "<p align='center'>Password does not match</p>";
    } else {
        $insertUser = "INSERT INTO tbl_user(u_name, u_pass, u_register_date) VALUES ('$signup_name', '$signup_pass', NOW())";
        $resultInsertUser = mysqli_query($connect, $insertUser);

        if ($resultInsertUser) {
            $getUser1 = "SELECT * FROM tbl_user WHERE u_name='$signup_name' AND u_pass='$signup_pass' ORDER BY u_id DESC LIMIT 1";
            $resultGetUser1 = mysqli_query($connect, $getUser1);

            if (mysqli_num_rows($resultGetUser1) > 0) {
                $user_signup = mysqli_fetch_assoc($resultGetUser1);
                $_SESSION["u_id"] = $user_signup["u_id"];
                header("location: dashboard.php");
                exit();
            } else {
                $signupError = "<p align='center'>User Not Found!</p>";
            }
        }
    }
}

$getTrain = "SELECT t_type FROM tbl_train GROUP BY t_type;";
$getStation = "SELECT * FROM tbl_station ORDER BY s_name ASC;";
$resultGetTrain = mysqli_query($connect, $getTrain);
$resultGetStation = mysqli_query($connect, $getStation);
$resultGetStation1 = mysqli_query($connect, $getStation);


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
        <div id="service">
            <h2>Booking</h2>
            <form action="" method="POST">
                <div class="container">
                    <div class="form-control">
                        <label for="services">Services</label>
                        <select name="services" id="services" required>
                            <option value="" selected>All Services</option>
                            <?php if (mysqli_num_rows($resultGetTrain) > 0) { ?>
                                <?php while ($train = mysqli_fetch_assoc($resultGetTrain)) { ?>
                                    <option value="<?= $train['t_type'] ?>">
                                        <?= $train['t_type'] ?>
                                    </option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="container">
                        <div class="form-control">
                            <label for="from">From</label>
                            <select name="from" id="from" required>
                                <option value=""> From</option>
                                <?php if (mysqli_num_rows($resultGetStation) > 0) { ?>
                                    <?php while ($station = mysqli_fetch_assoc($resultGetStation)) { ?>
                                        <option value="<?= $station['s_id'] ?>">
                                            <?= $station['s_name'] ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-control">
                            <label for="to">To</label>
                            <select name="to" id="to" required>
                                <option value=""> To</option>
                                <?php if (mysqli_num_rows($resultGetStation1) > 0) { ?>
                                    <?php while ($station1 = mysqli_fetch_assoc($resultGetStation1)) { ?>
                                        <option value="<?= $station1['s_id'] ?>">
                                            <?= $station1['s_name'] ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <!-- <div class="container">
                        <div class="form-control">
                            <label for="departure-date">Departure Date</label>
                            <input type="date" name="departure-date" id="departure-date" required>
                        </div>
                        <div class="form-control">
                            <label for="time">Time</label>
                            <input type="time" name="time" id="time" required>
                        </div>
                    </div> -->
                    <div class="form-control">
                        <button type="submit" id="search">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <?php if ($getKeberangkatan != "") { ?>
            <div class="table">
                <table border="2">
                    <tr>
                        <th>No</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Service</th>
                        <th>From Date</th>
                        <th>to Date</th>
                        <th>Time</th>
                    </tr>
                    <?php if (mysqli_num_rows($resultKeberangkatan)) { ?>
                        <?php $i = 0 ?>
                        <?php while ($row = mysqli_fetch_assoc($resultKeberangkatan)) { ?>
                            <tr>
                                <td>
                                    <?= ++$i ?>
                                </td>
                                <td>
                                    <?= $row["from_s"] ?>
                                </td>
                                <td>
                                    <?= $row["to_S"] ?>
                                </td>
                                <td>
                                    <?= $row["t_type"] ?>
                                </td>
                                <td>
                                    <?= $row["from_date"] ?>
                                </td>
                                <td>
                                    <?= $row["to_date"] ?>
                                </td>
                                <td>
                                    <?= $row["from_time"] ?>
                                    <?= $row["to_time"] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
    </main>
    <div id="frame" class="hide"></div>
    <form method="POST" id="login-card" class="hide">
        <div class="form-control">
            <h3 align="center">Login</h3>
        </div>
        <div class="form-control">
            <label for="login-name">Username</label>
            <input type="text" name="login-name" id="login-name" placeholder="Your Name" required>
        </div>
        <div class="form-control">
            <label for="login-pass">Password</label>
            <input type="password" name="login-pass" id="login-pass" placeholder="*********" required>
        </div>
        <div class="form-control">
            <input type="submit" value="Login" name="login-submit" id="login-submit">
            <?php if (isset($loginError)) {
                echo $loginError;
            } ?>
        </div>
        <div class="form-control">
            <p align="center">don't have an account? <a href="#" id="signup2">Sign Up</a></p>
        </div>
    </form>
    <form method="POST" id="signup-card" class="hide">
        <div class="form-control">
            <h3 align="center">Sign Up</h3>
        </div>
        <div class="form-control">
            <label for="signup-name">Username</label>
            <input type="text" name="signup-name" id="signup-name" placeholder="Your Name" required>
        </div>
        <div class="form-control">
            <label for="signup-pass">Password</label>
            <input type="password" name="signup-pass" id="signup-pass" placeholder="*********" required>
        </div>
        <div class="form-control">
            <label for="confirm-signup-pass">Confirm Password</label>
            <input type="password" name="confirm-signup-pass" id="confirm-signup-pass" placeholder="*********" required>
        </div>
        <div class="form-control">
            <input type="submit" value="Create Account" name="signup-submit" id="signup-submit">
            <?php if (isset($signupError)) {
                echo $signupError;
            } ?>
        </div>

        <div class="form-control">
            <p align="center">have an account? <a href="#" id="login2">login</a></p>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="index.js"></script>
</body>

</html>