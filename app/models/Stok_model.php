<?php
class Stok_model {
    private $table = 'stok_bahan';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllStok() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function updateStok($data) {
        $query = "UPDATE " . $this->table . " SET jumlah_stok = :jumlah_stok, tanggal_expired = :tanggal_expired WHERE id_bahan = :id_bahan";
        $this->db->query($query);
        $this->db->bind('jumlah_stok', $data['jumlah_stok']);
        $this->db->bind('tanggal_expired', $data['tanggal_expired']);
        $this->db->bind('id_bahan', $data['id_bahan']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
