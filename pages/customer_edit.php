<?php
include "koneksi2.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM customer WHERE id_customer='$id'");
$c = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama   = $_POST['nama_customer'];
    $email  = $_POST['email'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE customer SET
        nama_customer='$nama',
        email='$email',
        no_hp='$no_hp',
        alamat='$alamat'
        WHERE id_customer='$id'");

    header("Location: dashboard2.php?page=customer");
}
?>

<style>
.card{background:#fff;padding:20px;border-radius:6px;box-shadow:0 2px 5px rgba(0,0,0,.1);width:500px}
input,textarea{width:100%;padding:8px;margin-bottom:10px}
.btn{padding:8px 12px;border-radius:4px;color:#fff;border:none;cursor:pointer}
.btn-update{background:#2980b9}
.btn-kembali{background:#7f8c8d;text-decoration:none}
</style>

<div class="card">
  <h3>Edit Customer</h3>

  <form method="post">
    <input type="text" name="nama_customer" value="<?= $c['nama_customer'] ?>" required>
    <input type="email" name="email" value="<?= $c['email'] ?>" required>
    <input type="text" name="no_hp" value="<?= $c['no_hp'] ?>" required>
    <textarea name="alamat" required><?= $c['alamat'] ?></textarea>

    <button type="submit" name="update" class="btn btn-update">Update</button>
    <a href="dashboard2.php?page=customer" class="btn btn-kembali">Kembali</a>
  </form>
</div>