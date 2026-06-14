<?php

class Auth extends Controller {
    public function index() {
        if(isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        $data['judul'] = 'Login';
        $this->view('auth/login', $data);
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password']; // dalam real case, gunakan password_verify

        $userModel = $this->model('User_model');
        $user = $userModel->getUserByUsername($username);

        if($user && $user['password'] === $password) {
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];
            $this->model('Log_model')->catatLog("Login ke dalam sistem");
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            $_SESSION['flash'] = 'Username atau Password salah';
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function logout() {
        if(isset($_SESSION['user_id'])) {
            $this->model('Log_model')->catatLog("Logout dari sistem");
        }
        session_destroy();
        header('Location: ' . BASEURL);
        exit;
    }
}
