<?php
require 'function.php';

$id = $_GET["id"];

if (
    mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id = $id")
) {
    echo "<script>
      alert('Data peminjaman dihapus!');
      document.location.href = '../admin/index.php';
    </script>";
} else {
    echo "<script>
      alert('Data peminjaman gagal dihapus!');
      document.location.href = '../admin/index.php';
    </script>";
}
