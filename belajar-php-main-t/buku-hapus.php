<?php
require_once 'koneksi-buku.php';

$id = $_GET['id'];

// Mengambil foto buku
$sql_foto = "SELECT foto_buku FROM tb_buku WHERE id_buku = '$id'";
$query_foto = mysqli_query($conn, $sql_foto);

$data_foto = mysqli_fetch_assoc($query_foto);

if (!$data_foto) {
    echo "<script>
            alert('Data buku tidak ditemukan!');
            window.location='buku.php';
          </script>";
    exit;
}

// Menghapus data buku
$sql = "DELETE FROM tb_buku WHERE id_buku = '$id'";
$query = mysqli_query($conn, $sql);

if ($query) {

    // Menghapus foto dari folder uploads
    if (!empty($data_foto['foto_buku'])) {
        $file = "uploads/" . $data_foto['foto_buku'];

        if (file_exists($file)) {
            unlink($file);
        }
    }

    echo "<script>
            alert('Buku berhasil dihapus!');
            window.location='buku.php';
          </script>";

} else {

    echo "<script>
            alert('Buku gagal dihapus!');
            window.location='buku.php';
          </script>";

}
?>