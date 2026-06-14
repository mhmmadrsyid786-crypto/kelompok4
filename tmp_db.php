<?php
require 'app/config/config.php';
require 'app/core/Database.php';
$db = new Database();
$db->query('DESCRIBE siswa');
file_put_contents('db_schema_php.json', json_encode($db->resultSet(), JSON_PRETTY_PRINT));
?>
