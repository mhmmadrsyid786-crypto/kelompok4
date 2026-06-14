<?php
require 'app/config/config.php';
require 'app/core/Database.php';
$db = new Database();
$db->query('DESCRIBE master_sekolah');
file_put_contents('db_schema_sekolah.json', json_encode($db->resultSet(), JSON_PRETTY_PRINT));
?>
