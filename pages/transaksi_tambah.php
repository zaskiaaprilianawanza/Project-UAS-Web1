<?php
include 'koneksi2.php';

if (isset($_POST['simpan'])) {

    $id_customer = $_POST['id_customer'];
    $id_barang   = $_POST['id_barang'];
    $tanggal     = $_POST['tanggal'];
    $jumlah      = $_POST['jumlah'];

    $barang = mysqli_fetch_assoc(mysqli_query($conn,
        "SELECT harga FROM barang WHERE id_barang='$id_barang'"
    ));

    $total = $jumlah * $barang['harga'];

    $insert = mysqli_query($conn,
        "INSERT INTO transaksi (id_customer,id_barang,tanggal,jumlah,total)
         VALUES ('$id_customer','$id_barang','$tanggal','$jumlah','$total')"
    );

    if ($insert) {
        echo "<script>
                alert('Data berhasil ditambahkan');
                window.location='dashboard2.php?page=transaksi';
              </script>";
    } else {
        echo "Query error: " . mysqli_error($conn);
    }
}

$customer = mysqli_query($conn, "SELECT * FROM customer");
$barang   = mysqli_query($conn, "SELECT * FROM barang");
?>

<style>
    .card {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        max-width: 720px;
        margin-right: auto;
        margin-left: 0;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    }

    .card h3 {
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 6px;
    }

    select, input {
        width: 100%;
        background-color: white;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    input:focus, select:focus {
        outline: none;
        border-color: #3498db;
    }

    .btn {
        padding: 10px 16px;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-tambah {
        background: #27ae60;
    }

    .btn-tambah:hover {
        background: #219150;
    }

    .btn-hapus {
        background: #c0392b;
    }

    .btn-hapus:hover {
        background: #a93226;
    }
</style>

<div class="card">
<h3>Tambah Transaksi</h3>

<form method="POST">

<div class="form-group">
<label>Customer</label>
<select name="id_customer" required>
<option value="">-- Pilih Customer --</option>
<?php while($c = mysqli_fetch_assoc($customer)) : ?>
<option value="<?= $c['id_customer']; ?>">
<?= $c['nama_customer']; ?>
</option>
<?php endwhile; ?>
</select>
</div>

<div class="form-group">
<label>Barang</label>
<select name="id_barang" required>
<option value="">-- Pilih Barang --</option>
<?php while($b = mysqli_fetch_assoc($barang)) : ?>
<option value="<?= $b['id_barang']; ?>">
<?= $b['nama_barang']; ?>
</option>
<?php endwhile; ?>
</select>
</div>

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tanggal" required>
</div>

<div class="form-group">
<label>Jumlah</label>
<input type="number" name="jumlah" required>
</div>

<button type="submit" name="simpan" class="btn btn-tambah">Simpan</button>
<a href="dashboard2.php?page=transaksi" class="btn btn-hapus">Batal</a>

</form>
</div>