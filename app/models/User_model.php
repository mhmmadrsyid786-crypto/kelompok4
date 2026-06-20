<?php
class User_model {
    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUserByUsername($username) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function getAllUsers() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataUser($data) {
        $query = "INSERT INTO " . $this->table . " (nama, username, password, role) VALUES (:nama, :username, :password, :role)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind('role', $data['role']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataUser($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_user = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataUser($data) {
        if(!empty($data['password'])) {
            $query = "UPDATE " . $this->table . " SET nama = :nama, username = :username, password = :password, role = :role WHERE id_user = :id_user";
        } else {
            $query = "UPDATE " . $this->table . " SET nama = :nama, username = :username, role = :role WHERE id_user = :id_user";
        }
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        if(!empty($data['password'])) {
            $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        }
        $this->db->bind('role', $data['role']);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
