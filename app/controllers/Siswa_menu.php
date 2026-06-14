<?php
class Siswa_menu extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }
        
        $data['judul'] = 'Penjadwalan Menu Siswa';
        $data['siswa_menu'] = $this->model('SiswaMenu_model')->getAllSiswaMenu();
        
        // Fetch data for the form dropdowns
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['menu'] = $this->model('Menu_model')->getAllMenu();
        
        $this->view('templates/header', $data);
        $this->view('siswa_menu/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if($this->model('SiswaMenu_model')->tambahSiswaMenu($_POST) > 0) {
            $this->model('Log_model')->catatLog("Menjadwalkan menu untuk siswa");
            $_SESSION['flash_success'] = 'Relasi Siswa & Menu berhasil dijadwalkan!';
        } else {
            $_SESSION['flash_error'] = 'Gagal menyimpan data ke database.';
        }
        header('Location: ' . BASEURL . '/siswa_menu');
        exit;
    }

    public function hapus($id) {
        if($this->model('SiswaMenu_model')->hapusSiswaMenu($id) > 0) {
            $this->model('Log_model')->catatLog("Menghapus jadwal menu siswa ID: " . $id);
            $_SESSION['flash_success'] = 'Data penjadwalan berhasil dihapus!';
        } else {
            $_SESSION['flash_error'] = 'Data gagal dihapus.';
        }
        header('Location: ' . BASEURL . '/siswa_menu');
        exit;
    }

    public function ubah() {
        if($this->model('SiswaMenu_model')->ubahSiswaMenu($_POST) > 0) {
            $this->model('Log_model')->catatLog("Mengubah jadwal menu siswa ID: " . $_POST['id_siswa_menu']);
            $_SESSION['flash_success'] = 'Relasi Siswa & Menu berhasil diubah!';
        } else {
            $_SESSION['flash_error'] = 'Tidak ada perubahan atau gagal mengubah data.';
        }
        header('Location: ' . BASEURL . '/siswa_menu');
        exit;
    }
}
