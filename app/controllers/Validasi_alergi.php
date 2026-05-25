<?php
class Validasi_alergi extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }
        $data['judul'] = 'Validasi Alergi';
        $data['validasi'] = $this->model('ValidasiAlergi_model')->getAllValidasi();
        
        $this->view('templates/header', $data);
        $this->view('validasi_alergi/index', $data);
        $this->view('templates/footer');
    }
}
