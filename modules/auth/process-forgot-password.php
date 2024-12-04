<?php
include_once "../../includes/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Cari user berdasarkan email
    $stmt = safeQuery($conn, "SELECT * FROM users WHERE email = ?", [$email]);
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $reset_token = generateToken();
        $expiry_time = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token berlaku 1 jam

        // Update token dan waktu kedaluwarsa
        safeQuery($conn, "UPDATE users SET reset_token = ?, token_expiry = ? WHERE email = ?", [$reset_token, $expiry_time, $email]);

        // Kirim email (contoh sederhana)
        $reset_link = "http://localhost:8000/modules/auth/reset-password.php?token=$reset_token";
        mail($email, "Reset Password", "Klik tautan berikut untuk reset password Anda: $reset_link");

        echo "Email reset password telah dikirim.";
    } else {
        echo "Email tidak ditemukan.";
    }
}
?>
