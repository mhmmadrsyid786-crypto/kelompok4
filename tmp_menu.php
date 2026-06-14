<?php
require 'app/config/config.php';
require 'app/core/Database.php';
$db = new Database();
$db->query('DESCRIBE menu_makanan');
file_put_contents('db_schema_menu.json', json_encode($db->resultSet(), JSON_PRETTY_PRINT));
$db->query('DESCRIBE siswa_menu');
file_put_contents('db_schema_siswa_menu.json', json_encode($db->resultSet(), JSON_PRETTY_PRINT));
?>
