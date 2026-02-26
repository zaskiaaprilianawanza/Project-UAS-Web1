<?php
include 'koneksi2.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id'");

header("Location: dashboard2.php?page=list_produk");