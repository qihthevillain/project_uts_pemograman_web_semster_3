<?php
include "db.php";

// ============== TAMBAH PRODUK ==============
if (isset($_POST['add'])) {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $barcode = $_POST['barcode'];
    $price = $_POST['price'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO products (product_id, name, barcode, price, stok)
              VALUES ('$product_id', '$name', '$barcode', '$price', '$stok')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('✅ Produk berhasil ditambahkan!'); window.location='index.php?page=masterProduct';</script>";
    } else {
        echo "<p style='color:red;'>Gagal menambahkan produk: " . mysqli_error($conn) . "</p>";
    }
}

// ============== UPDATE PRODUK ==============
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $barcode = $_POST['barcode'];
    $price = $_POST['price'];
    $stok = $_POST['stok'];

    $query = "UPDATE products 
              SET name='$name', barcode='$barcode', price='$price', stok='$stok'
              WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('✅ Data berhasil diperbarui!'); window.location='index.php?page=masterProduct';</script>";
    } else {
        echo "<p style='color:red;'>Gagal memperbarui data: " . mysqli_error($conn) . "</p>";
    }
}

// ============== HAPUS PRODUK ==============
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM products WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('🗑️ Produk berhasil dihapus!'); window.location='index.php?page=masterProduct';</script>";
    } else {
        echo "<p style='color:red;'>Gagal menghapus produk: " . mysqli_error($conn) . "</p>";
    }
}

// ============== TAMPILKAN DATA PRODUK ==============
$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id ASC");
?>

<div class="container" style="width:80%; margin:50px auto; text-align:center;">
    <h2>📦 Daftar Produk Alfamart</h2>

    <!-- TABEL PRODUK -->
    <table border="1" cellpadding="10" cellspacing="0" 
           style="width:100%; border-collapse:collapse; margin-top:20px; background:#fff;">
        <thead style="background:#9d0008; color:white;">
            <tr>
                <th>No</th>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Barcode</th>
                <th>Harga (Rp)</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <form method="POST">
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['product_id']); ?></td>
                    <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']); ?>"></td>
                    <td><input type="text" name="barcode" value="<?= htmlspecialchars($row['barcode']); ?>"></td>
                    <td><input type="number" name="price" value="<?= htmlspecialchars($row['price']); ?>" style="width:90px;"></td>
                    <td><input type="number" name="stok" value="<?= htmlspecialchars($row['stok']); ?>" style="width:70px;"></td>
                    <td>
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit" name="update" 
                                style="background:#28a745; color:white; border:none; padding:5px 10px; border-radius:5px;">Simpan</button>
                        <a href="index.php?page=masterProduct&delete=<?= $row['id']; ?>" 
                           onclick="return confirm('Yakin mau hapus produk ini?');"
                           style="background:#dc3545; color:white; border:none; padding:5px 10px; border-radius:5px; text-decoration:none;">Hapus</a>
                    </td>
                </form>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <!-- FORM TAMBAH PRODUK DI BAWAH -->
    <div style="margin-top:30px; background:#f8f9fa; padding:15px; border-radius:8px;">
        <h3>➕ Tambah Produk Baru</h3>
        <form method="POST" style="display:flex; justify-content:center; flex-wrap:wrap; gap:10px;">
            <input type="text" name="product_id" placeholder="ID Produk (misal: PRD006)" required>
            <input type="text" name="name" placeholder="Nama Produk" required>
            <input type="text" name="barcode" placeholder="Barcode" required>
            <input type="number" name="price" placeholder="Harga" required>
            <input type="number" name="stok" placeholder="Stok" required>
            <button type="submit" name="add" 
                    style="background:#007bff; color:white; border:none; padding:8px 15px; border-radius:6px; cursor:pointer;">Tambah</button>
        </form>
    </div>
</div>
<link rel="stylesheet" href="style.css?v=4">