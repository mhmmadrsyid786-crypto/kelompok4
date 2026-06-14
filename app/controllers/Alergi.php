<?php

class Alergi extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }

        $data['judul'] = 'Master Alergi';
        $data['alergi'] = $this->model('Alergi_model')->getAllAlergi();
        
        $this->view('templates/header', $data);
        $this->view('alergi/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if($this->model('Alergi_model')->tambahDataAlergi($_POST) > 0) {
            $this->model('Log_model')->catatLog("Menambahkan master alergi baru: " . $_POST['nama_alergi']);
            header('Location: ' . BASEURL . '/alergi');
            exit;
        } else {
            header('Location: ' . BASEURL . '/alergi');
            exit;
        }
    }

    public function hapus($id) {
        if($this->model('Alergi_model')->hapusDataAlergi($id) > 0) {
            $this->model('Log_model')->catatLog("Menghapus master alergi ID: " . $id);
            header('Location: ' . BASEURL . '/alergi');
            exit;
        } else {
            header('Location: ' . BASEURL . '/alergi');
            exit;
        }
    }

    public function ubah() {
        if($this->model('Alergi_model')->ubahDataAlergi($_POST) > 0) {
            $this->model('Log_model')->catatLog("Mengubah master alergi ID: " . $_POST['id_alergi']);
            header('Location: ' . BASEURL . '/alergi');
            exit;
        } else {
            header('Location: ' . BASEURL . '/alergi');
            exit;
        }
    }
}
