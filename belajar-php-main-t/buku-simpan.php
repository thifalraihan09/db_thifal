
<?php
require_once 'koneksi-buku.php';

$id_kategori = $_POST['id_kategori_buku'];
$judul = mysqli_real_escape_string($conn, $_POST['judul_buku']);
$isi_buku = mysqli_real_escape_string($conn, $_POST['isi_buku']);

// Upload foto buku
$foto_buku = $_FILES['foto_buku']['name'];
$tmp = $_FILES['foto_buku']['tmp_name'];

$folder = "uploads/";

// Pastikan folder uploads tersedia
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

// Proses upload foto
$upload = move_uploaded_file($tmp, $folder . $foto_buku);

if (!$upload) {
    echo "<script>
        alert('Foto buku gagal diupload!');
        window.location='buku-tambah.php';
    </script>";
    exit;
}

// Simpan data buku
$sql = "INSERT INTO tb_buku
        (id_kategori_buku, judul_buku, isi_buku, foto_buku)
        VALUES
        ('$id_kategori', '$judul', '$isi_buku', '$foto_buku')";

$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
        alert('Buku berhasil ditambahkan!');
        window.location='buku.php';
    </script>";
} else {
    echo "<script>
        alert('Buku gagal ditambahkan!');
        window.location='buku-tambah.php';
    </script>";
}
?>
