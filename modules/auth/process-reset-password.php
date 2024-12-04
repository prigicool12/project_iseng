<?php
include_once "../../includes/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Update password berdasarkan token
    $stmt = safeQuery($conn, "UPDATE users SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?", [$new_password, $token]);

    if ($stmt->affected_rows > 0) {
        echo "Password berhasil diubah.";
    } else {
        echo "Gagal memperbarui password.";
    }
}
?>
