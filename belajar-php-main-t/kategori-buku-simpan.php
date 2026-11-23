<?php
require_once 'koneksi-buku.php';

$kategori = $_POST['kategori_buku'];

$sql = "INSERT INTO tb_kategori_buku (kategori_buku)
        VALUES ('$kategori')";

$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
            alert('Kategori berhasil ditambahkan!');
            window.location='kategori-buku.php';
          </script>";
} else {
    echo "<script>
            alert('Kategori gagal ditambahkan!');
            window.location='kategori-buku.php';
          </script>";
}
?>