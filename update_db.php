<?php
require_once 'app/config/config.php';
require_once 'app/core/Database.php';

$db = new Database;

// 1. Tambahkan kolom jenjang jika belum ada
try {
    $db->query("ALTER TABLE master_sekolah ADD COLUMN jenjang ENUM('TK','SD','SMP','SMA','SMK') DEFAULT 'SD' AFTER nama_sekolah");
    $db->execute();
    echo "Kolom jenjang berhasil ditambahkan.\n";
} catch (Exception $e) {
    echo "Kolom jenjang mungkin sudah ada: " . $e->getMessage() . "\n";
}

// 2. Update data masing-masing sekolah
$updates = [
    1 => 'TK',
    2 => 'SD',
    3 => 'SMP',
    4 => 'SMA',
    5 => 'SMK'
];

foreach ($updates as $id => $jenjang) {
    $db->query("UPDATE master_sekolah SET jenjang = :jenjang WHERE id_sekolah = :id");
    $db->bind('jenjang', $jenjang);
    $db->bind('id', $id);
    $db->execute();
}
echo "Data jenjang sekolah berhasil diupdate.\n";

// 3. Kita juga perlu menambahkan enum SMA di menu_makanan jika belum ada, supaya aman.
try {
    $db->query("ALTER TABLE menu_makanan MODIFY COLUMN jenjang ENUM('TK','SD','SMP','SMA','SMK') NOT NULL");
    $db->execute();
    echo "Enum jenjang di menu_makanan diperbarui.\n";
} catch (Exception $e) {
    echo "Gagal ngupdate enum menu_makanan: " . $e->getMessage() . "\n";
}
