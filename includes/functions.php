<?php
// Fungsi untuk membuat query aman (prepared statements)
function safeQuery($conn, $query, $params = []) {
    $stmt = $conn->prepare($query);
    if ($params) {
        $types = '';
        foreach ($params as $param) {
            $types .= (is_int($param) ? 'i' : 's'); // Tentukan tipe berdasarkan jenis data
        }
        $stmt->bind_param($types, ...$params); // Bind parameter dengan tipe yang sesuai
    }
    $stmt->execute();
    return $stmt;
}

// Fungsi untuk menghasilkan token unik
function generateToken($length = 64) {
    return bin2hex(random_bytes($length / 2));
}

// Fungsi untuk mencatat aktivitas pengguna
function logActivity($conn, $user_id, $activity) {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    safeQuery($conn, "INSERT INTO user_logs (user_id, activity, ip_address) VALUES (?, ?, ?)", [$user_id, $activity, $ip_address]);
}
?>
