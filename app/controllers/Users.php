<?php

class Users extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        $data['judul'] = 'Data Users';
        $data['users'] = $this->model('User_model')->getAllUsers();

        $this->view('templates/header', $data);
        $this->view('users/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            header('Location: ' . BASEURL . '/users');
            exit;
        } else {
            header('Location: ' . BASEURL . '/users');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            header('Location: ' . BASEURL . '/users');
            exit;
        } else {
            header('Location: ' . BASEURL . '/users');
            exit;
        }
    }

    public function ubah()
    {
        if ($this->model('User_model')->ubahDataUser($_POST) > 0) {
            header('Location: ' . BASEURL . '/users');
            exit;
        } else {
            header('Location: ' . BASEURL . '/users');
            exit;
        }
    }
}
