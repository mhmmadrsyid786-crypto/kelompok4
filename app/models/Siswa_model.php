<?php
class Siswa_model {
    private $table = 'siswa';
    private $db;
    public function __construct() { $this->db = new Database; }
    public function getAllSiswa() {
        $this->db->query('SELECT siswa.*, master_sekolah.nama_sekolah FROM ' . $this->table . ' LEFT JOIN master_sekolah ON siswa.id_sekolah = master_sekolah.id_sekolah ORDER BY siswa.nama_siswa ASC');
        return $this->db->resultSet();
    }

    public function tambahDataSiswa($data) {
        $query = "INSERT INTO " . $this->table . " (nis, nama_siswa, id_sekolah, jenis_kelamin) VALUES (:nis, :nama_siswa, :id_sekolah, :jenis_kelamin)";
        $this->db->query($query);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama_siswa', $data['nama_siswa']);
        $this->db->bind('id_sekolah', $data['id_sekolah']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataSiswa($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_siswa = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataSiswa($data) {
        $query = "UPDATE " . $this->table . " SET nis = :nis, nama_siswa = :nama_siswa, id_sekolah = :id_sekolah, jenis_kelamin = :jenis_kelamin WHERE id_siswa = :id_siswa";
        $this->db->query($query);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama_siswa', $data['nama_siswa']);
        $this->db->bind('id_sekolah', $data['id_sekolah']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
