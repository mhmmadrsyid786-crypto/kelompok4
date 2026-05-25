<?php
class Distribusi_model {
    private $db;
    public function __construct() { $this->db = new Database; }
    public function getAllDistribusi() {
        $query = "SELECT distribusi.*, siswa.nama_siswa, menu_makanan.nama_menu, users.nama AS nama_petugas
                  FROM distribusi 
                  JOIN siswa ON distribusi.id_siswa = siswa.id_siswa
                  JOIN menu_makanan ON distribusi.id_menu = menu_makanan.id_menu
                  JOIN users ON distribusi.id_petugas = users.id_user";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function tambahDataDistribusi($data) {
        $query = "INSERT INTO distribusi (tanggal, id_siswa, id_menu, jumlah_porsi, total_kalori, id_petugas, status) 
                  VALUES (:tanggal, :id_siswa, :id_menu, :jumlah_porsi, :total_kalori, :id_petugas, :status)";
        $this->db->query($query);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->bind('id_menu', $data['id_menu']);
        $this->db->bind('jumlah_porsi', $data['jumlah_porsi']);
        $this->db->bind('total_kalori', $data['total_kalori']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('status', $data['status']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataDistribusi($id) {
        $query = "DELETE FROM distribusi WHERE id_distribusi = :id_distribusi";
        $this->db->query($query);
        $this->db->bind('id_distribusi', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataDistribusi($data) {
        $query = "UPDATE distribusi SET
                    tanggal = :tanggal,
                    id_siswa = :id_siswa,
                    id_menu = :id_menu,
                    jumlah_porsi = :jumlah_porsi,
                    total_kalori = :total_kalori,
                    id_petugas = :id_petugas,
                    status = :status
                  WHERE id_distribusi = :id_distribusi";

        $this->db->query($query);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->bind('id_menu', $data['id_menu']);
        $this->db->bind('jumlah_porsi', $data['jumlah_porsi']);
        $this->db->bind('total_kalori', $data['total_kalori']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('id_distribusi', $data['id_distribusi']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
