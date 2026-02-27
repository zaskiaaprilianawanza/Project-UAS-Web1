<?php
include 'koneksi2.php';

$email = $_SESSION['email'];

$data = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT * FROM user WHERE email='$email'"
));

if (isset($_POST['update'])) {

    $name  = $_POST['name'];
    $email_baru = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($conn,
        "UPDATE user SET
         name='$name',
         email='$email_baru',
         password='$password'
         WHERE id='".$data['id']."'"
    );

    $_SESSION['email'] = $email_baru;

    echo "<script>
            alert('Profile berhasil diupdate');
            window.location='dashboard2.php?page=profile';
          </script>";
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

input {
    width: 100%;
    background-color: white;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

input:focus {
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
<h3>My Profile</h3>

<form method="POST">

<div class="form-group">
<label>Name</label>
<input type="text" name="name" value="<?= $data['name']; ?>" required>
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" value="<?= $data['email']; ?>" required>
</div>

<div class="form-group">
<label>Password</label>
<input type="text" name="password" value="<?= $data['password']; ?>" required>
</div>

<button type="submit" name="update" class="btn btn-tambah">Update Profile</button>
<a href="dashboard2.php?page=home" class="btn btn-hapus">Kembali</a>

</form>
</div>