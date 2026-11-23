<?php
require_once 'koneksi-buku.php';

$id = $_POST['id_kategori_buku'];
$kategori = mysqli_real_escape_string($conn, $_POST['kategori']);

$sql = "UPDATE tb_kategori_buku
        SET kategori_buku = '$kategori'
        WHERE id_kategori_buku = '$id'";

$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
            alert('Kategori berhasil diperbarui!');
            window.location='kategori-buku.php';
          </script>";
} else {
    echo "<script>
            alert('Kategori gagal diperbarui!');
            window.location='kategori-buku.php';
          </script>";
}
?>


