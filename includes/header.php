<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<header>
    <nav class="navbar">
        <!-- Menu Navigasi -->
        <ul class="navbar-menu">
            <li><a href="../public/index.php#home">Home</a></li>
            <li><a href="../public/index.php#about">About</a></li>
            <li><a href="../public/index.php#services">Services</a></li>
            <li><a href="../public/index.php#contact">Contact</a></li>
        </ul>
        
        <!-- Tombol Login/Logout -->
        <ul class="navbar-right">
            <?php if (!isset($_SESSION['user_id'])): ?>
                <!-- Jika belum login, tampilkan tombol Login -->
                <li><a href="../modules/auth/login.php" class="login-btn">Login</a></li>
            <?php else: ?>
                <!-- Jika sudah login, tampilkan tombol Logout -->
                <li><a href="../modules/auth/logout.php" class="login-btn">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>


<script>
document.addEventListener('DOMContentLoaded', () => {
    const warningTime = 540000; // 9 menit dalam milidetik
    const logoutTime = 600000; // 10 menit dalam milidetik

    let warningTimer = setTimeout(() => {
        alert("Anda akan logout otomatis dalam 1 menit karena tidak ada aktivitas.");
    }, warningTime);

    let logoutTimer = setTimeout(() => {
        window.location.href = '/modules/auth/logout.php';
    }, logoutTime);

    // Reset timer jika ada aktivitas pengguna
    document.addEventListener('mousemove', resetTimers);
    document.addEventListener('keydown', resetTimers);

    function resetTimers() {
        clearTimeout(warningTimer);
        clearTimeout(logoutTimer);
        warningTimer = setTimeout(() => {
            alert("Anda akan logout otomatis dalam 1 menit karena tidak ada aktivitas.");
        }, warningTime);
        logoutTimer = setTimeout(() => {
            window.location.href = '/modules/auth/logout.php';
        }, logoutTime);
    }
});
</script>

