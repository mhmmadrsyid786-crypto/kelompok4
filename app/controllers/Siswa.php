<?php
class Siswa extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }
        $data['judul'] = 'Data Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        
        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if($this->model('Siswa_model')->tambahDataSiswa($_POST) > 0) {
            $_SESSION['flash'] = 'Berhasil ditambahkan';
        } else {
            $_SESSION['flash'] = 'Gagal ditambahkan';
        }
        header('Location: ' . BASEURL . '/siswa');
        exit;
    }

    public function hapus($id) {
        if($this->model('Siswa_model')->hapusDataSiswa($id) > 0) {
            $_SESSION['flash'] = 'Berhasil dihapus';
        } else {
            $_SESSION['flash'] = 'Gagal dihapus';
        }
        header('Location: ' . BASEURL . '/siswa');
        exit;
    }

    public function ubah() {
        if($this->model('Siswa_model')->ubahDataSiswa($_POST) > 0) {
            $_SESSION['flash'] = 'Berhasil diubah';
        } else {
            $_SESSION['flash'] = 'Gagal diubah';
        }
        header('Location: ' . BASEURL . '/siswa');
        exit;
    }
}
