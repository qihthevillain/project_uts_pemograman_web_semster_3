<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login_input = trim($_POST["email"]); 
    $password = trim($_POST["password"]);
    if (empty($login_input) || empty($password)) {
        echo "<script>alert('Email/Username dan Password wajib diisi!'); window.location='index.php?page=login';</script>";
        exit;
    }
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $login_input, $login_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
       
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];

            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Password salah!'); window.location='index.php?page=login';</script>";
        }
    } else {
        echo "<script>alert('Email atau Username tidak ditemukan!'); window.location='index.php?page=login';</script>";
    }

    $stmt->close();
}
$conn->close();
?>
<link rel="stylesheet" href="style.css?v=4">