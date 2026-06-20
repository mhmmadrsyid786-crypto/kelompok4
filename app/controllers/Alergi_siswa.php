<?php
class Alergi_siswa extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }
        $data['judul'] = 'Alergi Siswa';
        $data['alergi_siswa'] = $this->model('AlergiSiswa_model')->getAllAlergiSiswa();
        
        // Data untuk dropdown modal
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['master_alergi'] = $this->model('Alergi_model')->getAllAlergi();
        
        $this->view('templates/header', $data);
        $this->view('alergi_siswa/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        $this->verifyCsrfToken(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '');
        if($this->model('AlergiSiswa_model')->tambahDataAlergiSiswa($_POST) > 0) {
            $this->model('Log_model')->catatLog("Menambahkan intoleransi alergi untuk siswa");
            header('Location: ' . BASEURL . '/alergi_siswa');
            exit;
        } else {
            header('Location: ' . BASEURL . '/alergi_siswa');
            exit;
        }
    }

    public function hapus($id) {
        if($this->model('AlergiSiswa_model')->hapusDataAlergiSiswa($id) > 0) {
            $this->model('Log_model')->catatLog("Menghapus intoleransi alergi ID: " . $id);
            header('Location: ' . BASEURL . '/alergi_siswa');
            exit;
        } else {
            header('Location: ' . BASEURL . '/alergi_siswa');
            exit;
        }
    }

    public function ubah() {
        if($this->model('AlergiSiswa_model')->ubahDataAlergiSiswa($_POST) > 0) {
            $this->model('Log_model')->catatLog("Mengubah intoleransi alergi ID: " . $_POST['id_alergi_siswa']);
            header('Location: ' . BASEURL . '/alergi_siswa');
            exit;
        } else {
            header('Location: ' . BASEURL . '/alergi_siswa');
            exit;
        }
    }
}
