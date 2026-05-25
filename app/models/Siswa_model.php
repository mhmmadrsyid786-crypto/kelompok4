<?php
class Siswa_model {
    private $table = 'siswa';
    private $db;
    public function __construct() { $this->db = new Database; }
    public function getAllSiswa() {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY nama_siswa ASC');
        return $this->db->resultSet();
    }

    public function tambahDataSiswa($data) {
        $query = "INSERT INTO " . $this->table . " (nis, nama_siswa, jenjang, kelas, jenis_kelamin) VALUES (:nis, :nama_siswa, :jenjang, :kelas, :jenis_kelamin)";
        $this->db->query($query);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama_siswa', $data['nama_siswa']);
        $this->db->bind('jenjang', $data['jenjang']);
        $this->db->bind('kelas', $data['kelas']);
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
        $query = "UPDATE " . $this->table . " SET nis = :nis, nama_siswa = :nama_siswa, jenjang = :jenjang, kelas = :kelas, jenis_kelamin = :jenis_kelamin WHERE id_siswa = :id_siswa";
        $this->db->query($query);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama_siswa', $data['nama_siswa']);
        $this->db->bind('jenjang', $data['jenjang']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
