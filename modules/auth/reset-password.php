<?php include_once "../../includes/config.php"; ?>

<h2>Reset Password</h2>
<?php
$token = $_GET['token'] ?? '';
if (!$token) {
    die("Token tidak valid.");
}

// Verifikasi token
$stmt = safeQuery($conn, "SELECT * FROM users WHERE reset_token = ? AND token_expiry > NOW()", [$token]);
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Token tidak valid atau telah kedaluwarsa.");
}
?>

<form action="process-reset-password.php" method="POST">
    <input type="hidden" name="token" value="<?= $token; ?>">
    <input type="password" name="new_password" placeholder="Password baru" required>
    <button type="submit">Reset Password</button>
</form>
