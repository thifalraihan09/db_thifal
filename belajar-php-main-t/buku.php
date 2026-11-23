<?php
require_once 'koneksi-buku.php';

$sql = "SELECT tb_buku.*, tb_kategori_buku.kategori_buku
        FROM tb_buku
        LEFT JOIN tb_kategori_buku
        ON tb_buku.id_kategori_buku = tb_kategori_buku.id_kategori_buku
        ORDER BY tb_buku.id_buku DESC";

$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
</head>

<body>

    <h2>Data Buku</h2>

    <a href="buku-tambah.php">+ Tambah Buku</a>

    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Isi Buku</th>
                <th>Foto Buku</th>
                <th>Created At</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;

            if (mysqli_num_rows($query) > 0) {
                while ($data = mysqli_fetch_assoc($query)) {
                    ?>

                    <tr>
                        <td><?= $no++; ?></td>

                        <td><?= htmlspecialchars($data['kategori_buku']); ?></td>

                        <td><?= htmlspecialchars($data['judul_buku']); ?></td>

                        <td><?= htmlspecialchars($data['isi_buku']); ?></td>


                        <td>
                            <?php if (!empty($data['foto_buku'])) { ?>
                                <img src="uploads/<?= htmlspecialchars($data['foto_buku']); ?>" width="100">
                            <?php } else { ?>
                                Tidak ada foto
                            <?php } ?>
                        </td>

                        <td><?= htmlspecialchars($data['created_at']); ?></td>

                        <td>
                            <a href="buku-edit.php?id=<?= $data['id_buku']; ?>">Edit</a>
                            |
                            <a href="buku-hapus.php?id=<?= $data['id_buku']; ?>"
                                onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>

                    <?php
                }
            } else {
                ?>

                <tr>
                    <td colspan="6">Belum ada data buku.</td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

</body>

</html>