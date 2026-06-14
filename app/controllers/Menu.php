<?php

class Menu extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }

        $data['judul'] = 'Menu Makanan';
        $data['menu'] = $this->model('Menu_model')->getAllMenu();
        
        $this->view('templates/header', $data);
        $this->view('menu/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if($this->model('Menu_model')->tambahDataMenu($_POST) > 0) {
            $this->model('Log_model')->catatLog("Menambahkan data menu baru: " . $_POST['nama_menu']);
            $_SESSION['flash'] = 'Berhasil ditambahkan';
        } else {
            $_SESSION['flash'] = 'Gagal ditambahkan';
        }
        header('Location: ' . BASEURL . '/menu');
        exit;
    }

    public function hapus($id) {
        if($this->model('Menu_model')->hapusDataMenu($id) > 0) {
            $this->model('Log_model')->catatLog("Menghapus data menu ID: " . $id);
            $_SESSION['flash'] = 'Berhasil dihapus';
        } else {
            $_SESSION['flash'] = 'Gagal dihapus';
        }
        header('Location: ' . BASEURL . '/menu');
        exit;
    }

    public function ubah() {
        if($this->model('Menu_model')->ubahDataMenu($_POST) > 0) {
            $this->model('Log_model')->catatLog("Mengubah data menu ID: " . $_POST['id_menu']);
            $_SESSION['flash'] = 'Berhasil diubah';
        } else {
            $_SESSION['flash'] = 'Gagal diubah';
        }
        header('Location: ' . BASEURL . '/menu');
        exit;
    }
}
