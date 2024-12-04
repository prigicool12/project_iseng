<?php
session_start();
include_once('../../includes/config.php');
include_once('../../includes/functions.php');

// Memeriksa apakah form registrasi sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi input
    if (empty($name) || empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Semua kolom harus diisi!";
    } elseif ($password !== $confirm_password) {
        $error = "Password dan konfirmasi password tidak cocok!";
    } else {
        // Periksa apakah username atau email sudah terdaftar
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Username atau email sudah terdaftar!";
        } else {
            // Enkripsi password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert data pengguna baru ke database
            $stmt = $conn->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $username, $email, $hashed_password);
            if ($stmt->execute()) {
                // Redirect ke halaman login setelah registrasi sukses
                $_SESSION['user_id'] = $stmt->insert_id; // Set session untuk user baru
                header("Location: login.php"); // Redirect ke halaman login
                exit();
            } else {
                $error = "Terjadi kesalahan, coba lagi nanti.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <main>
        <div class="login-container">
            <h2>Registrasi Pengguna Baru</h2>

            <?php if (isset($error)): ?>
                <div class="error"><?= $error ?></div>
            <?php endif; ?>

            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                </div>
                <button type="submit" class="login-btn">Daftar</button>
            </form>
        </div>
    </main>
    

    <?php
    include_once('../../includes/footer.php');
    ?>
</body>
</html>
