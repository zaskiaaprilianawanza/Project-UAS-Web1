<?php
include "koneksi2.php";
$data = mysqli_query($conn, "SELECT * FROM customer");
?>

<style>
.card{background:#fff;padding:20px;border-radius:6px;box-shadow:0 2px 5px rgba(0,0,0,.1)}
.card-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:15px}
.btn{padding:8px 12px;border-radius:4px;color:#fff;text-decoration:none;font-size:14px}
.btn-tambah{background:#27ae60}
.btn-edit{background:#2980b9}
.btn-hapus{background:#c0392b}
table{width:100%;border-collapse:collapse}
th,td{padding:10px;border-bottom:1px solid #ddd;text-align:center}
th{background:#f8f8f8}
</style>

<div class="card">
  <div class="card-header">
    <h3>Data Customer</h3>
    <a href="dashboard2.php?page=customer_tambah" class="btn btn-tambah">+ Tambah Customer</a>
  </div>

  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>No HP</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>

    <?php $no=1; while($c=mysqli_fetch_assoc($data)): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $c['nama_customer'] ?></td>
      <td><?= $c['email'] ?></td>
      <td><?= $c['no_hp'] ?></td>
      <td><?= $c['alamat'] ?></td>
      <td>
        <a href="dashboard2.php?page=customer_edit&id=<?= $c['id_customer'] ?>" class="btn btn-edit">Edit</a>
        <a href="dashboard2.php?page=customer_hapus&id=<?= $c['id_customer'] ?>"
           class="btn btn-hapus"
           onclick="return confirm('Hapus customer?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>