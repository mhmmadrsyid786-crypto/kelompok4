<?php
class AlergiSiswa_model {
    private $db;
    public function __construct() { $this->db = new Database; }
    public function getAllAlergiSiswa() {
        $query = "SELECT alergi_siswa.*, siswa.nama_siswa, master_alergi.nama_alergi, master_sekolah.nama_sekolah 
                  FROM alergi_siswa 
                  JOIN siswa ON alergi_siswa.id_siswa = siswa.id_siswa
                  JOIN master_alergi ON alergi_siswa.id_alergi = master_alergi.id_alergi
                  LEFT JOIN master_sekolah ON alergi_siswa.id_sekolah = master_sekolah.id_sekolah";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function tambahDataAlergiSiswa($data) {
        $this->db->query("SELECT id_sekolah FROM siswa WHERE id_siswa = :id_siswa");
        $this->db->bind('id_siswa', $data['id_siswa']);
        $siswa = $this->db->single();
        $id_sekolah = $siswa ? $siswa['id_sekolah'] : 0;

        $query = "INSERT INTO alergi_siswa (id_siswa, id_alergi, id_sekolah, catatan) 
                  VALUES (:id_siswa, :id_alergi, :id_sekolah, :catatan)";
        $this->db->query($query);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->bind('id_alergi', $data['id_alergi']);
        $this->db->bind('id_sekolah', $id_sekolah);
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
        $this->db->query("SELECT id_sekolah FROM siswa WHERE id_siswa = :id_siswa");
        $this->db->bind('id_siswa', $data['id_siswa']);
        $siswa = $this->db->single();
        $id_sekolah = $siswa ? $siswa['id_sekolah'] : 0;

        $query = "UPDATE alergi_siswa SET
                    id_siswa = :id_siswa,
                    id_alergi = :id_alergi,
                    id_sekolah = :id_sekolah,
                    catatan = :catatan
                  WHERE id_alergi_siswa = :id_alergi_siswa";

        $this->db->query($query);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->bind('id_alergi', $data['id_alergi']);
        $this->db->bind('id_sekolah', $id_sekolah);
        $this->db->bind('catatan', $data['catatan']);
        $this->db->bind('id_alergi_siswa', $data['id_alergi_siswa']); 

        $this->db->execute();
        return $this->db->rowCount();
    }
}
