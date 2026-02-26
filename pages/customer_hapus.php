<?php
include "koneksi2.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM customer WHERE id_customer='$id'");

header("Location: dashboard2.php?page=customer");