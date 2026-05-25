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
}
