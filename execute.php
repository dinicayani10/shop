<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $command = $_POST['command'];

    // Pastikan hanya perintah tertentu yang diizinkan (opsional untuk keamanan)
    $allowed_commands = ['ls', 'pwd', 'whoami'];
    $is_allowed = false;

    foreach ($allowed_commands as $allowed) {
        if (strpos($command, $allowed) === 0) {
            $is_allowed = true;
            break;
        }
    }

    if (!$is_allowed) {
        echo "<h3>Error:</h3> <pre>Command not allowed.</pre>";
        exit;
    }

    // Jalankan perintah Bash
    $output = shell_exec($command);
    echo "<h3>Command:</h3> <pre>$command</pre>";
    echo "<h3>Output:</h3> <pre>$output</pre>";
}
?>
