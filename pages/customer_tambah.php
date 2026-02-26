<?php
include "koneksi2.php";

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama_customer'];
    $email  = $_POST['email'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO customer 
        (nama_customer, email, no_hp, alamat)
        VALUES ('$nama','$email','$no_hp','$alamat')");

    header("Location: dashboard2.php?page=customer");
}
?>

<style>
.card{background:#fff;padding:20px;border-radius:6px;box-shadow:0 2px 5px rgba(0,0,0,.1);width:500px}
input,textarea{width:100%;padding:8px;margin-bottom:10px}
.btn{padding:8px 12px;border-radius:4px;color:#fff;border:none;cursor:pointer}
.btn-simpan{background:#27ae60}
.btn-kembali{background:#7f8c8d;text-decoration:none}
</style>

<div class="card">
  <h3>Tambah Customer</h3>

  <form method="post">
    <input type="text" name="nama_customer" placeholder="Nama Customer" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="no_hp" placeholder="No HP" required>
    <textarea name="alamat" placeholder="Alamat" required></textarea>

    <button type="submit" name="simpan" class="btn btn-simpan">Simpan</button>
    <a href="dashboard2.php?page=customer" class="btn btn-kembali">Kembali</a>
  </form>
</div>