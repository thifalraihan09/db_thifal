<?php
require_once 'koneksi-buku.php';

$sql = "SELECT * FROM tb_kategori_buku ORDER BY kategori_buku ASC";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>
<body>

    <h2>Tambah Buku</h2>

    <form method="POST" action="buku-simpan.php" enctype="multipart/form-data">

        <label>Kategori</label>
        <br>
        <select name="id_kategori_buku" required>
            <option value="">-- Pilih Kategori --</option>

            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                <option value="<?= $data['id_kategori_buku']; ?>">
                    <?= htmlspecialchars($data['kategori_buku']); ?>
                </option>
            <?php } ?>

        </select>

        <br><br>

        <label>Judul Buku</label>
        <br>
        <input type="text" name="judul_buku" required>

        <br><br>

        <label>Isi Buku</label>
        <br>
        <textarea name="isi_buku" rows="10" cols="50" required></textarea>

        <br><br>

        <label>Foto Buku</label>
        <br>
        <input type="file" name="foto_buku" accept="image/*" required>

        <br><br>

        <button type="submit" name="simpan">Simpan</button>
        <a href="buku.php">Kembali</a>

    </form>

</body>
</html>
