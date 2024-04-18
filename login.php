<?php
include "connection.php";
session_start();

$login_mssg = "";

if (isset($_SESSION["is_login"])) {
    header("location: dashboard.php");
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hash_pw = hash("sha256", $password);

    $sql = "SELECT * FROM users WHERE username ='$username' AND password ='$hash_pw'";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION["username"] = $data["username"];
        $_SESSION["is_login"] = true;

        header("location: dashboard.php");

        //$data = $result->fetch_assoc();
        //echo "Akun anda bernama " . $data["username"];
    } else {
        $login_mssg = "Akun tidak ditemukan";
    }
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hai</title>
</head>

<body>
    <?php include "header.html" ?>
    <h3>LOGIN</h3>
    <i><?= $login_mssg ?></i>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username" />
        <input type="password" placeholder="password" name="password" />
        <button type="submit" name="login">Login Sekarang</button>
    </form>
    <?php include "footer.html" ?>
</body>

</html>