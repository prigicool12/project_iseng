<?php
session_start();
include_once('../../includes/config.php');  // Memasukkan koneksi database
include_once('../../includes/functions.php');  // Memasukkan fungsi untuk aktivitas log

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa kredensial
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan ID pengguna ke dalam sesi
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Log aktivitas login
            logActivity($conn, $user['id'], "User logged in");

            // Redirect ke halaman utama setelah login berhasil
            header('Location: ../public/index.php');
            exit();
        } else {
            $error_message = "Password salah!";
        }
    } else {
        $error_message = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>

<main>
    <div class="login-container">
        <h2>Login</h2>

        <?php if (isset($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>

        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</main>

<?php
// meng-include footer
include_once('../../includes/footer.php');
?>

</body>
</html>
