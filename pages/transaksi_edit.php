<?php
include 'koneksi2.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT * FROM transaksi WHERE id_transaksi='$id'"
));

$customer = mysqli_query($conn, "SELECT * FROM customer");
$barang   = mysqli_query($conn, "SELECT * FROM barang");

if (isset($_POST['update'])) {

    $id_customer = $_POST['id_customer'];
    $id_barang   = $_POST['id_barang'];
    $tanggal     = $_POST['tanggal'];
    $jumlah      = $_POST['jumlah'];

    $harga = mysqli_fetch_assoc(mysqli_query($conn,
        "SELECT harga FROM barang WHERE id_barang='$id_barang'"
    ));

    $total = $jumlah * $harga['harga'];

    $update = mysqli_query($conn,
        "UPDATE transaksi SET
         id_customer='$id_customer',
         id_barang='$id_barang',
         tanggal='$tanggal',
         jumlah='$jumlah',
         total='$total'
         WHERE id_transaksi='$id'"
    );

    if ($update) {
        echo "<script>
                alert('Data berhasil diupdate');
                window.location='dashboard2.php?page=transaksi';
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}
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
<h3>Edit Transaksi</h3>

<form method="POST">

<div class="form-group">
<label>Customer</label>
<select name="id_customer" required>
<?php while($c = mysqli_fetch_assoc($customer)) : ?>
<option value="<?= $c['id_customer']; ?>"
<?= ($c['id_customer']==$data['id_customer'])?'selected':''; ?>>
<?= $c['nama_customer']; ?>
</option>
<?php endwhile; ?>
</select>
</div>

<div class="form-group">
<label>Barang</label>
<select name="id_barang" required>
<?php while($b = mysqli_fetch_assoc($barang)) : ?>
<option value="<?= $b['id_barang']; ?>"
<?= ($b['id_barang']==$data['id_barang'])?'selected':''; ?>>
<?= $b['nama_barang']; ?>
</option>
<?php endwhile; ?>
</select>
</div>

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required>
</div>

<div class="form-group">
<label>Jumlah</label>
<input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" required>
</div>

<button type="submit" name="update" class="btn btn-tambah">Update</button>
<a href="dashboard2.php?page=transaksi" class="btn btn-hapus">Batal</a>

</form>
</div>