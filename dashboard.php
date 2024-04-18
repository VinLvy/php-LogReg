<?php
session_start();

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <?php include "header.html" ?>

    <h1>AMERICAYA</h1>
    <h3>HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO HALO</h3>
    <h2>welcome <?= $_SESSION["username"] ?></h2>

    <form action="dashboard.php" method="POST">
        <button type="submit" name="logout">logout</button>
    </form>
    <?php include "footer.html" ?>
</body>

</html>