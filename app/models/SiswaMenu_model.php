<?php
class SiswaMenu_model {
    private $table = 'siswa_menu';
    private $db;
    
    public function __construct() { 
        $this->db = new Database; 
    }
    
    public function getAllSiswaMenu() {
        $query = "SELECT sm.id_siswa_menu, sm.tanggal, 
                         s.nis, s.nama_siswa, s.jenjang, s.kelas, s.jenis_kelamin, s.nama_sekolah,
                         m.nama_menu, m.deskripsi, m.harga
                  FROM " . $this->table . " sm
                  JOIN siswa s ON sm.id_siswa = s.id_siswa
                  JOIN menu_makanan m ON sm.id_menu = m.id_menu
                  ORDER BY sm.id_siswa_menu ASC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function tambahSiswaMenu($data) {
        $query = "INSERT INTO " . $this->table . " (id_siswa, id_menu, tanggal) VALUES (:id_siswa, :id_menu, :tanggal)";
        $this->db->query($query);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->bind('id_menu', $data['id_menu']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusSiswaMenu($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_siswa_menu = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
