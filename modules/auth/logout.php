<?php
include_once "../../includes/config.php";
session_start();

if (isset($_SESSION['user_id'])) {
    logActivity($conn, $_SESSION['user_id'], "Manual Logout");
}


// logout.php
session_start();
session_unset();
session_destroy();
header("Location: index.php");  // Redirect ke halaman utama setelah logout
exit();

?>
