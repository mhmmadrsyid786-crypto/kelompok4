<?php
class SiswaMenu_model {
    private $table = 'siswa_menu';
    private $db;
    
    public function __construct() { 
        $this->db = new Database; 
    }
    
    public function getAllSiswaMenu() {
        $query = "SELECT sm.id_siswa_menu, sm.tanggal, sm.id_siswa, sm.id_menu,
                         s.nis, s.nama_siswa, s.jenis_kelamin,
                         ms.nama_sekolah, ms.alamat_sekolah, m.jenjang,
                         m.nama_menu, m.deskripsi, m.harga
                  FROM " . $this->table . " sm
                  JOIN siswa s ON sm.id_siswa = s.id_siswa
                  LEFT JOIN master_sekolah ms ON s.id_sekolah = ms.id_sekolah
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

    public function ubahSiswaMenu($data) {
        $query = "UPDATE " . $this->table . " SET id_siswa = :id_siswa, id_menu = :id_menu, tanggal = :tanggal WHERE id_siswa_menu = :id_siswa_menu";
        $this->db->query($query);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->bind('id_menu', $data['id_menu']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('id_siswa_menu', $data['id_siswa_menu']);
        $this->db->execute();
        $rowCount = $this->db->rowCount();
        
        // Update alamat_sekolah optionally
        if(isset($data['alamat_sekolah']) && !empty($data['alamat_sekolah'])) {
            // Get id_sekolah from the selected siswa
            $this->db->query("SELECT id_sekolah FROM siswa WHERE id_siswa = :id_siswa");
            $this->db->bind('id_siswa', $data['id_siswa']);
            $siswa = $this->db->single();
            
            if($siswa) {
                $this->db->query("UPDATE master_sekolah SET alamat_sekolah = :alamat_sekolah WHERE id_sekolah = :id_sekolah");
                $this->db->bind('alamat_sekolah', $data['alamat_sekolah']);
                $this->db->bind('id_sekolah', $siswa['id_sekolah']);
                $this->db->execute();
                $rowCount += $this->db->rowCount();
            }
        }
        
        return $rowCount;
    }
}
