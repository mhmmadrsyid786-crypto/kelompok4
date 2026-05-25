<?php
class MenuAlergen_model {
    private $db;
    public function __construct() { $this->db = new Database; }
    public function getAllMenuAlergen() {
        $query = "SELECT menu_alergen.*, menu_makanan.nama_menu, master_alergi.nama_alergi 
                  FROM menu_alergen 
                  JOIN menu_makanan ON menu_alergen.id_menu = menu_makanan.id_menu
                  JOIN master_alergi ON menu_alergen.id_alergi = master_alergi.id_alergi";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function tambahDataMenuAlergen($data) {
        $query = "INSERT INTO menu_alergen (id_menu, id_alergi) 
                  VALUES (:id_menu, :id_alergi)";
        $this->db->query($query);
        $this->db->bind('id_menu', $data['id_menu']);
        $this->db->bind('id_alergi', $data['id_alergi']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMenuAlergen($id) {
        $query = "DELETE FROM menu_alergen WHERE id_menu_alergen = :id_menu_alergen";
        $this->db->query($query);
        $this->db->bind('id_menu_alergen', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMenuAlergen($data) {
        $query = "UPDATE menu_alergen SET
                    id_menu = :id_menu,
                    id_alergi = :id_alergi
                  WHERE id_menu_alergen = :id_menu_alergen";

        $this->db->query($query);
        $this->db->bind('id_menu', $data['id_menu']);
        $this->db->bind('id_alergi', $data['id_alergi']);
        $this->db->bind('id_menu_alergen', $data['id_menu_alergen']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
