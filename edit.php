<?php
session_start();
include "koneksi.php";

$id_todo = $_GET['id_todo'];

$sql = "SELECT * FROM todo WHERE id_todo = '$id_todo' ";

$query = mysqli_query($koneksi, $sql);
$todo = mysqli_fetch_assoc($query);

$category = mysqli_query($koneksi, "SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambah.css">
    <title>edit</title>
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

        <form action="P_edit.php" method="POST">
            <input type="hidden" name="id_todo" value="<?= $id_todo ?>">

            <label for="">Judul</label><br>
            <input type="text" name="title" id="" value="<?= $todo['title']; ?>"><br><br>

            <label for="">Deskripsi</label><br>
            <textarea name="description" id=""><?= $todo['description'] ?></textarea><br><br>

            <label for="">kategori</label><br>
            <select name="id_category" id="">
                <?php while($k = mysqli_fetch_assoc($category)) { ?>
                    <option value="<?= $k['id_category']; ?>"
                    <?= $todo['id_category'] == $k['id_category'] ? 'selected' : '' ?>>
                    <?= $k['category']; ?>
                </option>
                <?php } ?>
            </select><br><br>

            <label for="">Status</label><br>
            <select name="status" id="">
                <option value="pending" value="<?= $todo['status'] == 'Pending' ? 'selected' : '' ?>">Pending</option>
                <option value="done" value="<?= $todo['status'] == 'Done' ? 'selected' : '' ?>">Done</option>
            </select><br><br>

            <button type="submit">Edit</button>
        </form>
    </div>
</body>
</html>