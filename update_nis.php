<?php
require 'app/config/config.php';
require 'app/core/Database.php';

$db = new Database();

// Get all students
$db->query("SELECT id_siswa FROM siswa");
$students = $db->resultSet();

$updated = 0;
$years = ['020', '021', '022'];

foreach ($students as $siswa) {
    $prefix = $years[array_rand($years)];
    $random_digits = str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
    $new_nis = $prefix . $random_digits;
    
    $db->query("UPDATE siswa SET nis = :nis WHERE id_siswa = :id");
    $db->bind('nis', $new_nis);
    $db->bind('id', $siswa['id_siswa']);
    $db->execute();
    $updated += $db->rowCount();
}

echo "Successfully updated " . count($students) . " students with new NIS format.";
?>
