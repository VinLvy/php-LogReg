<?php
include "connection.php";
session_start();

$register_mssg = "";

if (isset($_SESSION["is_login"])) {
    header("location: dashboard.php");
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hash_pw = hash("sha256", $password);

    try {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash_pw ')";

        if ($db->query($sql)) {
            $register_mssg = "Akun berhasil didaftarkan";
        } else {
            $register_mssg = "Pendaftaran gagal";
        }
    } catch (mysqli_sql_exception) {
        $register_mssg = "username sudah digunakan";
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
    <h3>DAFTAR AKUN</h3>
    <i><?= $register_mssg ?></i>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username" />
        <input type="password" placeholder="password" name="password" />
        <button type="submit" name="register">Daftar Sekarang</button>
    </form>
    <?php include "footer.html" ?>
</body>

</html>