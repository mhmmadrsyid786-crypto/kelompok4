<?php
class Log extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }
        if($_SESSION['role'] !== 'admin') { header('Location: ' . BASEURL . '/dashboard'); exit; }
        $data['judul'] = 'Log Aktivitas';
        $data['log'] = $this->model('Log_model')->getAllLogs();
        
        $this->view('templates/header', $data);
        $this->view('log/index', $data);
        $this->view('templates/footer');
    }
}
