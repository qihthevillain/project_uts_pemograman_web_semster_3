<?php
session_status();
include "koneksi.php";
// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
    exit();
}
?>
<div style="display: flex; justify-content: center; align-items: flex-start; min-height: 80vh;">
    <div style="width: 70%; margin-top: 40px; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

        <h2 style="text-align: center; margin-bottom: 20px;">Daftar User</h2>

        <table border="1" cellspacing="0" cellpadding="10" style="width: 100%; border-collapse: collapse; text-align: center;">
            <thead style="background: #a30000; color: white;">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM users ORDER BY id ASC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['email']}</td>
                            <td>
                                <a href='edit_user.php?id={$row['id']}'>Edit</a> |
                                <a href='delete_user.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin hapus?\")'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data user.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<link rel="stylesheet" href="style.css?v=4">