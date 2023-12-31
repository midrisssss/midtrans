<?php
include "connect.php";

session_start();

if (!isset($_SESSION["u_id"])) {
    // header("location: index.php");
    // exit();
    echo "gagal";
} else {
    $user_id = $_SESSION["u_id"];
    echo "anjay";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        <?= $user_id ?>
    </h1>
    <form action="" method="post">
        <input type="submit" value="back" name="submit">
        <?php
        if (isset($_POST["submit"])) {
            session_unset();
            session_destroy();
            header("location: index.php");
            exit();
        }
        ?>
    </form>
</body>

</html>