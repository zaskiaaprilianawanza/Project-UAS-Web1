<?php
include 'koneksi2.php';

$filter = "";

if (isset($_POST['filter'])) {
    $dari  = $_POST['dari'];
    $sampai = $_POST['sampai'];

    $filter = "WHERE tanggal BETWEEN '$dari' AND '$sampai'";
}

$data = mysqli_query($conn, "
    SELECT transaksi.*, customer.nama_customer, barang.nama_barang
    FROM transaksi
    JOIN customer ON transaksi.id_customer = customer.id_customer
    JOIN barang ON transaksi.id_barang = barang.id_barang
    $filter
    ORDER BY tanggal DESC
");

$total_semua = 0;
?>

<style>
.card {
    background: white;
    padding: 20px;
    border-radius: 6px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.btn {
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 4px;
    color: white;
    font-size: 14px;
    border: none;
    cursor: pointer;
}

.btn-tambah {
    background: #27ae60;
}

.btn-hapus {
    background: #c0392b;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

th {
    background: #f8f8f8;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>Laporan Transaksi</h3>
    </div>

    <!-- Filter Tanggal -->
    <form method="POST" style="margin-bottom:15px;">
        Dari :
        <input type="date" name="dari" required>
        Sampai :
        <input type="date" name="sampai" required>
        <button type="submit" name="filter" class="btn btn-tambah">Filter</button>
        <a href="dashboard2.php?page=laporan" class="btn btn-hapus">Reset</a>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Customer</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>

        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($data)) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['nama_customer']; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td>Rp <?= number_format($row['total'],0,',','.'); ?></td>
        </tr>
        <?php 
            $total_semua += $row['total'];
        ?>
        <?php endwhile; ?>

        <tr>
            <th colspan="5">Total Keseluruhan</th>
            <th>Rp <?= number_format($total_semua,0,',','.'); ?></th>
        </tr>
    </table>
</div>