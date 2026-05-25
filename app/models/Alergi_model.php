<?php
class Alergi_model {
    private $table = 'master_alergi';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllAlergi() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataAlergi($data) {
        $query = "INSERT INTO " . $this->table . " (nama_alergi, deskripsi) VALUES (:nama_alergi, :deskripsi)";
        $this->db->query($query);
        $this->db->bind('nama_alergi', $data['nama_alergi']);
        $this->db->bind('deskripsi', $data['deskripsi']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataAlergi($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_alergi = :id_alergi";
        $this->db->query($query);
        $this->db->bind('id_alergi', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataAlergi($data) {
        $query = "UPDATE " . $this->table . " SET
                    nama_alergi = :nama_alergi,
                    deskripsi = :deskripsi
                  WHERE id_alergi = :id_alergi";

        $this->db->query($query);
        $this->db->bind('nama_alergi', $data['nama_alergi']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('id_alergi', $data['id_alergi']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
