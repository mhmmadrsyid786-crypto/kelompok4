<?php
class AlergiSiswa_model {
    private $db;
    public function __construct() { $this->db = new Database; }
    public function getAllAlergiSiswa() {
        $query = "SELECT alergi_siswa.*, siswa.nama_siswa, master_alergi.nama_alergi 
                  FROM alergi_siswa 
                  JOIN siswa ON alergi_siswa.id_siswa = siswa.id_siswa
                  JOIN master_alergi ON alergi_siswa.id_alergi = master_alergi.id_alergi";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function tambahDataAlergiSiswa($data) {
        $query = "INSERT INTO alergi_siswa (id_siswa, id_alergi, tingkat_alergi, catatan) 
                  VALUES (:id_siswa, :id_alergi, :tingkat_alergi, :catatan)";
        $this->db->query($query);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->bind('id_alergi', $data['id_alergi']);
        $this->db->bind('tingkat_alergi', $data['tingkat_alergi']);
        $this->db->bind('catatan', $data['catatan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataAlergiSiswa($id) {
        $query = "DELETE FROM alergi_siswa WHERE id_alergi_siswa = :id_alergi_siswa";
        $this->db->query($query);
        $this->db->bind('id_alergi_siswa', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataAlergiSiswa($data) {
        $query = "UPDATE alergi_siswa SET
                    id_siswa = :id_siswa,
                    id_alergi = :id_alergi,
                    tingkat_alergi = :tingkat_alergi,
                    catatan = :catatan
                  WHERE id_alergi_siswa = :id_alergi_siswa";

        $this->db->query($query);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->bind('id_alergi', $data['id_alergi']);
        $this->db->bind('tingkat_alergi', $data['tingkat_alergi']);
        $this->db->bind('catatan', $data['catatan']);
        $this->db->bind('id_alergi_siswa', $data['id_alergi_siswa']); // bind to id_alergi_siswa hidden input

        $this->db->execute();
        return $this->db->rowCount();
    }
}
