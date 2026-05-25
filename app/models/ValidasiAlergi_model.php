<?php
class ValidasiAlergi_model {
    private $db;
    public function __construct() { $this->db = new Database; }
    public function getAllValidasi() {
        $query = "SELECT validasi_alergi.*, distribusi.tanggal, siswa.nama_siswa, menu_makanan.nama_menu
                  FROM validasi_alergi 
                  JOIN distribusi ON validasi_alergi.id_distribusi = distribusi.id_distribusi
                  JOIN siswa ON distribusi.id_siswa = siswa.id_siswa
                  JOIN menu_makanan ON distribusi.id_menu = menu_makanan.id_menu";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}
