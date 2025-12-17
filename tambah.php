<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['id_user'])){
     header("location:login.php?Login dulu");
     exit;
}

$id_user = $_SESSION['id_user'];
$category = mysqli_query($koneksi, "SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambah.css">
    <title>tambah</title>
</head>
<body>
    <nav class="navbar">
        <a href="index.php">Todolist</a>

        <div class="menu">
            <a href="profil.php">Profil</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="card">
        <h1>Tambah Tugas</h1>

        <form action="P_tambah.php" method="POST">
            <label for="">Judul</label><br>
            <input type="text" name="title" id=""><br><br>

            <label for="">Deskripsi</label><br>
            <textarea name="description" id=""></textarea><br><br>

            <label for="">Kategori</label><br>
            <select name="id_category" id="">
                <?php while($k = mysqli_fetch_assoc($category)) { ?>
                    <option value="<?= $k['id_category']; ?>"><?= $k['category']; ?></option>
                <?php } ?>
            </select><br><br>

            <label for="">Status</label><br>
            <select name="status" id="">
                <option value="pending">Pending</option>
                <option value="done">Done</option>
            </select><br><br>
            
            <input type="hidden" name="id_user" value="<?= $id_user ?>">
            <button type="submit">Tambah</button>
        </form>
    </div>
</body>
</html>