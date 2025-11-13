<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple PHP Auth System</title>
    <link rel="stylesheet" href="style.css?v=5">
    <style>
        /* Tambahan styling untuk nav agar rata tengah */
        nav {
            background-color: #0e0078ff; /* warna merah tua seperti di gambar */
            padding: 10px 0;
            text-align: center; /* ini yang membuat isi di tengah */
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin: 0 15px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: yellow;
        }

        h1 {
            text-align: center;
            color: white;
            margin-top: 20px;
        }

        body {
            background-color: #0a0a0a;
            color: white;
            font-family: Arial, sans-serif;
            background-image: url('your-background-image.jpg'); /* opsional */
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <h1>QIH THE VILLAIN</h1>

    <nav>
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Jika SUDAH login -->
            <a href="index.php">Home</a> |
            <a href="index.php?page=dashboard">Dashboard</a> |
            <a href="index.php?page=masterProduct">Master Product</a> |
            <a href="index.php?page=masterUser">Master User</a> |
            <a href="index.php?page=masterSupplier">Master Supplier</a> |
            <a href="index.php?page=logout">Logout</a>
        <?php else: ?>
            <!-- Jika BELUM login -->
            <a href="index.php?page=home">Home</a> |
            <a href="index.php?page=login">Login</a> |
            <a href="index.php?page=register">Register</a>
        <?php endif; ?>
    </nav>

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        if ($page == "login") {
            include "login.php";
        } elseif ($page == "register") {
            include "register.php";
        } elseif ($page == "dashboard") {
            include "dashboard.php";
        } elseif ($page == "masterProduct") {
            include "master_Product.php";
        } elseif ($page == "masterUser") {
            include "user.php";
        } elseif ($page == "masterSupplier") {
            include "master_supplier.php";
        } elseif ($page == "data") {
            if (isset($_SESSION['user_id'])) {
                include "data.php";
            } else {
                echo "<p style='color:red;'>Access denied! Please login first.</p>";
            }
        } elseif ($page == "logout") {
            include "logout.php";
        } else {
            echo "<h2>Pilih login atau register der!!!</h2>";
        }
    } else {
        if (isset($_SESSION['user_id'])) {
            echo "<h2 style='text-align:center;'>Selamat datang, <span style='color:red;'>" . htmlspecialchars($_SESSION['username']) . "</span> 👋</h2>";
        } else {
            echo "<h2>Welcome 👋</h2><p>Please select Login or Register from the menu above.</p>";
        }
    }
    ?>
</body>
</html>
<link rel="stylesheet" href="style.css?v=4">