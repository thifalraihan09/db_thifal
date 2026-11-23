<?php
require_once 'koneksi-buku.php';

$id = $_POST['id_buku'];
$id_kategori = $_POST['id_kategori_buku'];
$judul = mysqli_real_escape_string($conn, $_POST['judul_buku']);
$isi_buku = mysqli_real_escape_string($conn, $_POST['isi_buku']);

// Mengambil foto lama
$sql_foto = "SELECT foto_buku FROM tb_buku WHERE id_buku = '$id'";
$query_foto = mysqli_query($conn, $sql_foto);
$data_foto = mysqli_fetch_assoc($query_foto);

$foto_buku = $data_foto['foto_buku'] ?? '';

// Jika ada foto baru yang diupload
if (!empty($_FILES['foto_buku']['name'])) {

    $foto_buku = $_FILES['foto_buku']['name'];
    $tmp = $_FILES['foto_buku']['tmp_name'];

    $folder = "uploads/";

    // Upload foto baru
    if (move_uploaded_file($tmp, $folder . $foto_buku)) {

        // Menghapus foto lama
        if (!empty($data_foto['foto_buku']) &&
            file_exists($folder . $data_foto['foto_buku'])) {
            unlink($folder . $data_foto['foto_buku']);
        }
    }
}

// Update data buku
$sql = "UPDATE tb_buku SET
        id_kategori_buku = '$id_kategori',
        judul_buku = '$judul',
        isi_buku = '$isi_buku',
        foto_buku = '$foto_buku'
        WHERE id_buku = '$id'";

$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
            alert('Buku berhasil diperbarui!');
            window.location='buku.php';
          </script>";
} else {
    echo "<script>
            alert('Buku gagal diperbarui!');
            window.location='buku.php';
          </script>";
}
?>