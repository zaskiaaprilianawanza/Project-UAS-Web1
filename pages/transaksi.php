<?php
include 'koneksi2.php';

$data = mysqli_query($conn, "
    SELECT transaksi.*, barang.nama_barang, customer.nama_customer
    FROM transaksi
    JOIN barang ON transaksi.id_barang = barang.id_barang
    JOIN customer ON transaksi.id_customer = customer.id_customer
");

if (!$data) {
    die("Query error: " . mysqli_error($conn));
}
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
    }

    .btn-tambah { background: #27ae60; }
    .btn-edit { background: #2980b9; }
    .btn-hapus { background: #c0392b; }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    th { background: #f8f8f8; }
</style>

<div class="card">
    <div class="card-header">
        <h3>List Transaksi</h3>
        <a href="dashboard2.php?page=transaksi_tambah" class="btn btn-tambah">
            + Tambah Transaksi
        </a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Barang</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($data)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_customer']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td>Rp <?= number_format($row['total'], 0, ',', '.'); ?></td>
                <td>
                    <a href="dashboard2.php?page=transaksi_edit&id=<?= $row['id_transaksi']; ?>"
                       class="btn btn-edit">Edit</a>

                    <a href="dashboard2.php?page=transaksi_hapus&id=<?= $row['id_transaksi']; ?>"
                       class="btn btn-hapus"
                       onclick="return confirm('Yakin hapus data?')">
                       Hapus
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>