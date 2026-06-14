<?php
class Log_model {
    private $db;
    public function __construct() { $this->db = new Database; }
    public function getAllLogs() {
        $query = "SELECT log_aktivitas.*, users.nama 
                  FROM log_aktivitas 
                  JOIN users ON log_aktivitas.id_user = users.id_user 
                  ORDER BY waktu ASC";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function catatLog($aktivitas) {
        if(isset($_SESSION['user_id'])) {
            $query = "INSERT INTO log_aktivitas (id_user, aktivitas) VALUES (:id_user, :aktivitas)";
            $this->db->query($query);
            $this->db->bind('id_user', $_SESSION['user_id']);
            $this->db->bind('aktivitas', $aktivitas);
            $this->db->execute();
            return $this->db->rowCount();
        }
        return 0;
    }
}
