<?php
include "db.php";

// ============== TAMBAH SUPPLIER ==============
if (isset($_POST['add'])) {
    $supplier_id = $_POST['supplier_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $query = "INSERT INTO suppliers (supplier_id, name, phone, address)
              VALUES ('$supplier_id', '$name', '$phone', '$address')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('✅ Supplier berhasil ditambahkan!'); window.location='index.php?page=masterSupplier';</script>";
    } else {
        echo "<p style='color:red;'>Gagal menambahkan supplier: " . mysqli_error($conn) . "</p>";
    }
}

// ============== UPDATE SUPPLIER ==============
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $query = "UPDATE suppliers 
              SET name='$name', phone='$phone', address='$address'
              WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('✅ Data supplier berhasil diperbarui!'); window.location='index.php?page=masterSupplier';</script>";
    } else {
        echo "<p style='color:red;'>Gagal memperbarui supplier: " . mysqli_error($conn) . "</p>";
    }
}

// ============== HAPUS SUPPLIER ==============
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM suppliers WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('🗑️ Supplier berhasil dihapus!'); window.location='index.php?page=masterSupplier';</script>";
    } else {
        echo "<p style='color:red;'>Gagal menghapus supplier: " . mysqli_error($conn) . "</p>";
    }
}

// ============== TAMPILKAN DATA SUPPLIER ==============
$result = mysqli_query($conn, "SELECT * FROM suppliers ORDER BY id ASC");
?>

<div class="container" style="width:80%; margin:50px auto; text-align:center;">
    <h2>🏭 Daftar Supplier Alfamart</h2>

    <!-- TABEL SUPPLIER -->
    <table border="1" cellpadding="10" cellspacing="0" 
           style="width:100%; border-collapse:collapse; margin-top:20px; background:#fff;">
        <thead style="background:#9d0008; color:white;">
            <tr>
                <th>No</th>
                <th>ID Supplier</th>
                <th>Nama Supplier</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <form method="POST">
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['supplier_id']); ?></td>
                    <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']); ?>"></td>
                    <td><input type="text" name="phone" value="<?= htmlspecialchars($row['phone']); ?>"></td>
                    <td><input type="text" name="address" value="<?= htmlspecialchars($row['address']); ?>"></td>
                    <td>
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit" name="update" 
                                style="background:#28a745; color:white; border:none; padding:5px 10px; border-radius:5px;">Simpan</button>
                        <a href="index.php?page=masterSupplier&delete=<?= $row['id']; ?>" 
                           onclick="return confirm('Yakin mau hapus supplier ini?');"
                           style="background:#dc3545; color:white; border:none; padding:5px 10px; border-radius:5px; text-decoration:none;">Hapus</a>
                    </td>
                </form>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <!-- FORM TAMBAH SUPPLIER DI BAWAH -->
    <div style="margin-top:30px; background:#f8f9fa; padding:15px; border-radius:8px;">
        <h3>➕ Tambah Supplier Baru</h3>
        <form method="POST" style="display:flex; justify-content:center; flex-wrap:wrap; gap:10px;">
            <input type="text" name="supplier_id" placeholder="ID Supplier (misal: SUP006)" required>
            <input type="text" name="name" placeholder="Nama Supplier" required>
            <input type="text" name="phone" placeholder="Telepon" required>
            <input type="text" name="address" placeholder="Alamat" required>
            <button type="submit" name="add" 
                    style="background:#007bff; color:white; border:none; padding:8px 15px; border-radius:6px; cursor:pointer;">Tambah</button>
        </form>
    </div>
</div>

<link rel="stylesheet" href="style.css?v=4">
