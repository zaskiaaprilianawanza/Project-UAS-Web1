<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index2.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard POLGANMART</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f4f4f4;
        }
 
        /* Sidebar */
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #2c3e50;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
        }
 
        .sidebar h2 {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
 
        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
        }
 
        .sidebar a:hover {
            background: #34495e;
        }
 
        /* Header */
        .header {
            height: 60px;
            background: white;
            padding: 10px 20px;
            margin-left: 220px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }
 
        .profile-btn {
            cursor: pointer;
            padding: 8px 15px;
            border-radius: 20px;
            background: #3498db;
            color: white;
        }
 
        /* Dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }
 
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background: white;
            min-width: 150px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }
 
        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }
 
        .dropdown-content a:hover {
            background: #f0f0f0;
        }
 
        /* Content */
        .content {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
 
</head>
 
<body>
 
    <div class="sidebar">
    <h2>Dashboard</h2>
    <a href="dashboard2.php?page=home">Home</a>
    <a href="dashboard2.php?page=list_produk">List Produk</a>
    <a href="dashboard2.php?page=customer">Customer</a>
    <a href="dashboard2.php?page=transaksi">Transaksi</a>
    <a href="dashboard2.php?page=laporan">Laporan</a>
</div>

<div class="header">
    <div class="dropdown">
        <div class="profile-btn" onclick="toggleMenu()">Profile ▾</div>
        <div class="dropdown-content" id="profileMenu">
            <a href="dashboard2.php?page=profile">My Profile</a>
            <a href="logout2.php">Logout</a>
        </div>
    </div>
</div>

<div class="content">
    <?php
$page = isset($_GET['page']) ? $_GET['page'] : '';

/* ================= LIST PRODUK ============== */
if ($page == 'tambah') {
    include 'pages/tambah.php';
}
elseif ($page == 'list_produk') {
    include 'pages/list_produk.php';
}
elseif ($page == 'edit') {
    include 'pages/edit.php';
}
elseif ($page == 'hapus') {
    include 'pages/hapus.php';
}

/* ================= CUSTOMER ================= */

elseif ($page == 'customer') {
    include 'pages/customer.php';
}
elseif ($page == 'customer_tambah') {
    include 'pages/customer_tambah.php';
}
elseif ($page == 'customer_edit') {
    include 'pages/customer_edit.php';
}
elseif ($page == 'customer_hapus') {
    include 'pages/customer_hapus.php';
}

/* ================= TRANSAKSI ================= */

elseif ($page == 'transaksi') {
    include 'pages/transaksi.php';
}
elseif ($page == 'transaksi_tambah') {
    include 'pages/transaksi_tambah.php';
}
elseif ($page == 'transaksi_edit') {
    include 'pages/transaksi_edit.php';
}
elseif ($page == 'transaksi_hapus') {
    include 'pages/transaksi_hapus.php';
}

/* =============== LAPORAN =================== */
elseif ($page == 'laporan'){
    include 'pages/laporan.php';
}

/* ============ PROFILE ============== */

elseif ($page == 'profile') {
    include 'pages/profile.php';
}

else {
    echo "<h3>Selamat datang di Dashboard</h3>";
}
?>


</div>
 
    <script>
        function toggleMenu() {
            var menu = document.getElementById("profileMenu");
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        }
 
        // Menutup dropdown jika klik di luar
        window.onclick = function(event) {
            if (!event.target.matches('.profile-btn')) {
                document.getElementById("profileMenu").style.display = "none";
            }
        }
    </script>
 
</body>
 
</html>