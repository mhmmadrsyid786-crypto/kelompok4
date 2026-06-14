<?php
class Menu_model {
    private $table = 'menu_makanan';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllMenu() {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY nama_menu ASC');
        return $this->db->resultSet();
    }

    public function tambahDataMenu($data) {
        $query = "INSERT INTO " . $this->table . " (nama_menu, jenjang, kategori, kalori, protein, deskripsi) VALUES (:nama_menu, :jenjang, :kategori, :kalori, :protein, :deskripsi)";
        $this->db->query($query);
        $this->db->bind('nama_menu', $data['nama_menu']);
        $this->db->bind('jenjang', $data['jenjang']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('kalori', $data['kalori']);
        $this->db->bind('protein', $data['protein']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMenu($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_menu = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMenu($data) {
        $query = "UPDATE " . $this->table . " SET nama_menu = :nama_menu, jenjang = :jenjang, kategori = :kategori, kalori = :kalori, protein = :protein, deskripsi = :deskripsi WHERE id_menu = :id_menu";
        $this->db->query($query);
        $this->db->bind('nama_menu', $data['nama_menu']);
        $this->db->bind('jenjang', $data['jenjang']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('kalori', $data['kalori']);
        $this->db->bind('protein', $data['protein']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('id_menu', $data['id_menu']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
