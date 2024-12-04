<?php
include_once "../../includes/config.php";

$result = $conn->query("SELECT l.id, u.username, l.activity, l.activity_time, l.ip_address 
                        FROM user_logs l 
                        JOIN users u ON l.user_id = u.id 
                        ORDER BY l.activity_time DESC");

?>

<h2>Log Aktivitas Pengguna</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Aktivitas</th>
            <th>Waktu</th>
            <th>IP Address</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($log = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $log['id']; ?></td>
                <td><?= $log['username']; ?></td>
                <td><?= $log['activity']; ?></td>
                <td><?= $log['activity_time']; ?></td>
                <td><?= $log['ip_address']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
