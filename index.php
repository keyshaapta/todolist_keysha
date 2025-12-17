<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['id_user'])){
     header("location:login.php?Login dulu");
     exit;
}

$id_user = $_SESSION['id_user'];
if(isset($_GET['filter_category']) ) {
    $kategori_id = $_GET['filter_category'];
    $query = mysqli_query($koneksi, "SELECT t.*, c.*
            FROM todo t
            LEFT JOIN category c ON t.id_category = c.id_category
            WHERE id_user = '$id_user' AND 
            t.id_category = '$kategori_id'
            ORDER BY t.id_todo DESC") ;
 
} else if(isset($_GET['status']) && $_GET['status'] != ""){
    $status = $_GET['status'];
    $query = mysqli_query($koneksi, "SELECT t.*, c.*
            FROM todo t
            LEFT JOIN category c ON t.id_category = c.id_category
            WHERE id_user = '$id_user' AND 
            t.status = '$status'
            ORDER BY t.id_todo DESC") ;
 
} else {
     $query = mysqli_query($koneksi,"SELECT t.*, c.* 
            FROM todo t
            LEFT JOIN category c ON t.id_category = c.id_category
            WHERE id_user = '$id_user'
            ORDER BY t.id_todo DESC");
}



$categori = mysqli_query($koneksi, "SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>index</title>
</head>
<body>
    <nav class="navbar">
        <a href="index.php">Todolist</a>

        <div class="menu">
            <a href="profil.php">Profil</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="mix">
    <div class="filter">
    <form method="GET">
        <div class="k">
        <label for="">Filter Kategori : </label>
        <select name="filter_category" onchange="this.form.submit()">
            <option value="">Semua</option>
            <?php while($k = mysqli_fetch_assoc($categori)) { ?>
                <option value="<?= $k['id_category']; ?>">
                    <?= $k['category']; ?>
                </option>
            <?php } ?>
        </select>
        </div>

    </form>
    </div>

    <div class="filter">
    <form method="GET">

        <div class="s">
            <label for="">Filter status : </label>
            <select name="status" onchange="this.form.submit()">
                <option value="">pilih status</option>
                <option value="pending" <?= ($_GET['status'] ?? "") == "pending" ? 'selected' : '' ?>>Pending</option>
                <option value="done"  <?= ($_GET['status'] ?? "") == "done" ? 'selected' : '' ?>>Done</option>
            </select>
        </div>
    </form>
    </div>
    </div>

    <div class="add">
        <a href="tambah.php"><button>[+] Tambah</button></a>
    </div>


<div class="cnt">
<div class="c-todo">
    <?php while($todo = mysqli_fetch_assoc(result: $query)) { ?>
        <div class="card" style="<?= $todo['status'] == 'done' ? 'dark' : 'light' ?>" >
            <h2 style="<?= $todo['status'] == 'done' ? 'text-decoration:line-through' : '' ?>"><?= $todo['title']; ?></h2>
            <small style="<?= $todo['status'] == 'done' ? 'text-decoration:line-through' : '' ?>"><?= $todo['description']; ?></small>
            <p style="<?= $todo['status'] == 'done' ? 'text-decoration:line-through' : '' ?>"><b>Kategori : </b><?= $todo['category']; ?></p>
            <p style="<?= $todo['status'] == 'done' ? 'text-decoration:line-through' : '' ?>"><b>Status : </b><?= $todo['status']; ?></p>

        <div class="bt">
            <div class="edit">
                <a href="edit.php?id_todo=<?= $todo['id_todo']; ?>"><button>Edit</button></a>
            </div>

            <div class="hapus">
                <a href="hapus.php?id_todo=<?= $todo['id_todo']; ?>"><button>Hapus</button></a>
            </div>
        </div>
        </div>
    <?php } ?>
</div>
</div>

</body>
</html>