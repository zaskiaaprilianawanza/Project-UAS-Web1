<?php
include 'koneksi2.php';

$id = $_GET['id'];

$hapus = mysqli_query($conn,
    "DELETE FROM transaksi WHERE id_transaksi='$id'"
);

if ($hapus) {
    echo "<script>
            alert('Data berhasil dihapus');
            window.location='dashboard2.php?page=transaksi';
          </script>";
} else {
    echo mysqli_error($conn);
}
?>