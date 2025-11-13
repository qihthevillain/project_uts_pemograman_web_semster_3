<?php
include "koneksi.php";
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
    exit();
}

// Cek apakah ada ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "<script>alert('User tidak ditemukan!'); window.location='index.php?page=masterUser';</script>";
        exit();
    }
}

// Update data
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $update = "UPDATE users SET username='$username', email='$email' WHERE id='$id'";
    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php?page=masterUser';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<div style="display: flex; justify-content: center; align-items: flex-start; min-height: 80vh;">
    <div style="width: 400px; margin-top: 40px; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <h2 style="text-align:center;">Edit User</h2>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" value="<?= $user['username']; ?>" required style="width:100%; padding:8px; margin-bottom:10px;">

            <label>Email:</label>
            <input type="email" name="email" value="<?= $user['email']; ?>" required style="width:100%; padding:8px; margin-bottom:10px;">

            <button type="submit" name="update" style="width:100%; padding:10px; background:#a30000; color:white; border:none; border-radius:6px;">Simpan Perubahan</button>
        </form>
    </div>
</div>
<link rel="stylesheet" href="style.css?v=4">