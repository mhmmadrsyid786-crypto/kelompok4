<?php
class Distribusi extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }
        $data['judul'] = 'Distribusi';
        $data['distribusi'] = $this->model('Distribusi_model')->getAllDistribusi();
        
        // Data dropdown
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['menu'] = $this->model('Menu_model')->getAllMenu();
        $data['users'] = $this->model('User_model')->getAllUsers();

        $this->view('templates/header', $data);
        $this->view('distribusi/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        $this->verifyCsrfToken(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '');
        if($this->model('Distribusi_model')->tambahDataDistribusi($_POST) > 0) {
            $this->model('Log_model')->catatLog("Menambahkan data distribusi / pengiriman");
            header('Location: ' . BASEURL . '/distribusi');
            exit;
        } else {
            header('Location: ' . BASEURL . '/distribusi');
            exit;
        }
    }

    public function hapus($id) {
        if($this->model('Distribusi_model')->hapusDataDistribusi($id) > 0) {
            $this->model('Log_model')->catatLog("Menghapus data distribusi ID: " . $id);
            header('Location: ' . BASEURL . '/distribusi');
            exit;
        } else {
            header('Location: ' . BASEURL . '/distribusi');
            exit;
        }
    }

    public function ubah() {
        if($this->model('Distribusi_model')->ubahDataDistribusi($_POST) > 0) {
            $this->model('Log_model')->catatLog("Mengubah data distribusi ID: " . $_POST['id_distribusi']);
            header('Location: ' . BASEURL . '/distribusi');
            exit;
        } else {
            header('Location: ' . BASEURL . '/distribusi');
            exit;
        }
    }
}
