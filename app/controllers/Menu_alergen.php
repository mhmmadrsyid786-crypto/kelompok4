<?php
class Menu_alergen extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }
        $data['judul'] = 'Menu Alergen';
        $data['menu_alergen'] = $this->model('MenuAlergen_model')->getAllMenuAlergen();
        
        // Data untuk dropdown modal
        $data['menu'] = $this->model('Menu_model')->getAllMenu();
        $data['master_alergi'] = $this->model('Alergi_model')->getAllAlergi();

        $this->view('templates/header', $data);
        $this->view('menu_alergen/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if($this->model('MenuAlergen_model')->tambahDataMenuAlergen($_POST) > 0) {
            $this->model('Log_model')->catatLog("Menambahkan pemetaan alergen pada menu");
            header('Location: ' . BASEURL . '/menu_alergen');
            exit;
        } else {
            header('Location: ' . BASEURL . '/menu_alergen');
            exit;
        }
    }

    public function hapus($id) {
        if($this->model('MenuAlergen_model')->hapusDataMenuAlergen($id) > 0) {
            $this->model('Log_model')->catatLog("Menghapus pemetaan menu alergen ID: " . $id);
            header('Location: ' . BASEURL . '/menu_alergen');
            exit;
        } else {
            header('Location: ' . BASEURL . '/menu_alergen');
            exit;
        }
    }

    public function ubah() {
        if($this->model('MenuAlergen_model')->ubahDataMenuAlergen($_POST) > 0) {
            $this->model('Log_model')->catatLog("Mengubah pemetaan menu alergen ID: " . $_POST['id_menu_alergen']);
            header('Location: ' . BASEURL . '/menu_alergen');
            exit;
        } else {
            header('Location: ' . BASEURL . '/menu_alergen');
            exit;
        }
    }
}
