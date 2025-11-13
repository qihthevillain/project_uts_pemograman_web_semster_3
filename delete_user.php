<?php
include "koneksi.php";
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
    exit();
}

// Pastikan ada id di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query hapus
    $query = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('User berhasil dihapus!'); window.location='index.php?page=masterUser';</script>";
    } else {
        echo "<script>alert('Gagal menghapus user: " . mysqli_error($conn) . "');</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='index.php?page=masterUser';</script>";
}
?>
<link rel="stylesheet" href="style.css?v=4">
