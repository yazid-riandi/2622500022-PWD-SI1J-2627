
<?php
include "koneksi.php";

$pesan = "";

if (isset($_POST['daftar'])) {

    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if ($nama === "" || $email === "" || $password === "") {
        $pesan = "Semua kolom wajib diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $pesan = "Format email tidak valid!";
    } elseif (strlen($password) < 8) {
        $pesan = "Password minimal 8 karakter!";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO users (nama, email, password) VALUES (?, ?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $hash);

        if (mysqli_stmt_execute($stmt)) {
            $pesan = "Pendaftaran berhasil!";
        } else {
            $pesan = mysqli_stmt_errno($stmt) == 1062
                ? "Email sudah terdaftar!"
                : "Pendaftaran gagal!";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Pendaftaran</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #667eea, #764ba2);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background: white;
    width: 360px;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
}

h2 {
    text-align: center;
    color: #333;
}

input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 7px;
}

button {
    width: 100%;
    padding: 12px;
    background: #667eea;
    color: white;
    border: none;
    border-radius: 7px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background: #5366c9;
}

.pesan {
    text-align: center;
    color: #333;
    font-size: 14px;
}
</style>
</head>

<body>

<div class="container">

    <h2>Form Pendaftaran</h2>

    <?php if ($pesan != ""): ?>
        <p class="pesan">
            <?= htmlspecialchars($pesan) ?>
        </p>
    <?php endif; ?>

    <form method="POST">

        <input type="text"
               name="nama"
               placeholder="Masukkan Nama Lengkap"
               required>

        <input type="email"
               name="email"
               placeholder="Masukkan Email"
               required>

        <input type="password"
               name="password"
               placeholder="Masukkan Password (min. 8 karakter)"
               minlength="8"
               required>

        <button type="submit" name="daftar">
            Daftar Sekarang
        </button>

    </form>

</div>

</body>
</html>
