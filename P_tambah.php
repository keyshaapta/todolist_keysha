<?php
include "koneksi.php";

$title = $_POST['title'];
$description = $_POST['description'];
$id_category = $_POST['id_category'];
$status = $_POST['status'];
$id_user = $_POST['id_user'];

$sql = "INSERT INTO todo (title, description, id_category, status, id_user)
        VALUES ('$title', '$description', '$id_category', '$status', '$id_user')";
$query = mysqli_query($koneksi, $sql);

if($query) {
    header ("location:index.php?Tambah berhasil");
    exit;
} else {
    header ("location:tambah.php?Tambah gagal");
    exit;
}
?>