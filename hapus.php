<?php
include "koneksi.php";

$id_todo = $_GET['id_todo'];

$sql = "DELETE FROM todo WHERE id_todo = '$id_todo' ";
$query = mysqli_query($koneksi, $sql);

if($query) {
    header ("location:index.php?Hapus berhasil");
    exit;
} else {
    header ("location:index.php?Hapus gagal");
    exit;
}
?>