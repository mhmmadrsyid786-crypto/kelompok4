<?php
require 'app/config/config.php';
require 'app/core/Database.php';
$db = new Database();
$db->query('SELECT id_siswa, nis, nama_siswa FROM siswa LIMIT 5');
echo json_encode($db->resultSet(), JSON_PRETTY_PRINT);
?>
