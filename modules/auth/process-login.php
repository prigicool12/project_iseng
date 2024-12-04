<?php
include_once "../../includes/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = safeQuery($conn, "SELECT * FROM users WHERE username = ?", [$username]);
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../../public/index.php");
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }
}

// Implementasi Log process-login
if (password_verify($password, $user['password'])) {
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['last_activity'] = time(); // Waktu aktivitas terakhir
    logActivity($conn, $user['id'], "Login");
    header("Location: ../../public/index.php");
} else {
    echo "Password salah.";
}


?>
