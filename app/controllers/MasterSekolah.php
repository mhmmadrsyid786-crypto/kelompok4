<?php
class MasterSekolah extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }
        $data['judul'] = 'Data Master Sekolah';
        $data['sekolah'] = $this->model('MasterSekolah_model')->getAllSekolah();
        
        $this->view('templates/header', $data);
        $this->view('master_sekolah/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        $this->verifyCsrfToken(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '');
        if($this->model('MasterSekolah_model')->tambahDataSekolah($_POST) > 0) {
            $this->model('Log_model')->catatLog("Menambahkan master sekolah: " . $_POST['nama_sekolah']);
            $_SESSION['flash'] = 'Berhasil ditambahkan';
        } else {
            $_SESSION['flash'] = 'Gagal ditambahkan';
        }
        header('Location: ' . BASEURL . '/mastersekolah');
        exit;
    }

    public function hapus($id) {
        if($this->model('MasterSekolah_model')->hapusDataSekolah($id) > 0) {
            $this->model('Log_model')->catatLog("Menghapus master sekolah ID: " . $id);
            $_SESSION['flash'] = 'Berhasil dihapus';
        } else {
            $_SESSION['flash'] = 'Gagal dihapus';
        }
        header('Location: ' . BASEURL . '/mastersekolah');
        exit;
    }

    public function ubah() {
        if($this->model('MasterSekolah_model')->ubahDataSekolah($_POST) > 0) {
            $this->model('Log_model')->catatLog("Mengubah master sekolah ID: " . $_POST['id_sekolah']);
            $_SESSION['flash'] = 'Berhasil diubah';
        } else {
            $_SESSION['flash'] = 'Gagal diubah';
        }
        header('Location: ' . BASEURL . '/mastersekolah');
        exit;
    }
}
