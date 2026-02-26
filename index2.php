<?php
session_start();
include 'koneksi2.php';


if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");

    if ($row = mysqli_fetch_assoc($result)) {

        if ($password == $row['password']) {

            $_SESSION['email'] = $row['email'];
            $_SESSION['name']  = $row['name'];
            $_SESSION['role']  = $row['role'];

            header("Location: dashboard2.php");
            exit;

        } else {
            $error = "Password salah.";
        }

    } else {
        $error = "Email tidak ditemukan.";
    }
}
?>
<body>

<div class="login-card">
    <h2>POLGAN MART</h2>

    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>

    <form method="post">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                   placeholder="Masukkan email anda" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                   placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn">Login</button>
        <button type="reset" class="btn-reset">Batal</button>

    </form>

    <div class="footer">
        <p>© 2026 POLGAN MART</p>
    </div>
</div>

</body>
</html>
<style>
* {
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    margin: 0;
    height: 100vh;
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-card {
    background: #ffffff;
    width: 360px;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.login-card h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 6px;
    font-size: 14px;
    color: #555;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
}

input:focus {
    outline: none;
    border-color: #4e73df;
}

.btn {
    width: 100%;
    padding: 10px;
    background: #4e73df;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 15px;
    cursor: pointer;
    margin-top: 10px;
}

.btn:hover {
    background: #2e59d9;
}

.btn-reset {
    width: 100%;
    padding: 10px;
    margin-top: 8px;
    background: #e74a3b;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.btn-reset:hover {
    background: #c0392b;
}

.error {
    background: #f8d7da;
    color: #842029;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 15px;
    text-align: center;
    font-size: 14px;
}

.footer {
    text-align: center;
    margin-top: 20px;
    font-size: 12px;
    color: #777;
}
</style>

