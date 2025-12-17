<?php
session_start();
include "koneksi.php";

$id_user = $_SESSION['id_user'];
$user = "SELECT * FROM user WHERE id_user = '$id_user' ";
$query = mysqli_query($koneksi, $user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css">
    <title>profil</title>
</head>
<body>
    <div class="profil">
        <?php while($user = mysqli_fetch_assoc($query)) { ?>
            <p><b>Nama Lengkap : </b><?= $user['name'] ?></p>
            <p><b>Email : </b><?= $user['email'] ?></p>
            <p><b>Username : </b><?= $user['username'] ?></p>
            <p><b>Password : </b><?= $user['password'] ?></p>
            <p><b>Tanggal Lahir : </b><?= $user['birth_date'] ?></p>
        </form>
        <?php } ?>

        <a href="index.php"><button>Kembali</button></a>
    </div>
</body>
</html>