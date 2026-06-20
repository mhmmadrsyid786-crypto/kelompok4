<?php
class Siswa extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }
        $data['judul'] = 'Data Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['sekolah'] = $this->model('MasterSekolah_model')->getAllSekolah();
        
        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        $this->verifyCsrfToken(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '');
        if($this->model('Siswa_model')->tambahDataSiswa($_POST) > 0) {
            $this->model('Log_model')->catatLog("Menambahkan data siswa baru: " . $_POST['nama_siswa']);
            $_SESSION['flash'] = 'Berhasil ditambahkan';
        } else {
            $_SESSION['flash'] = 'Gagal ditambahkan';
        }
        header('Location: ' . BASEURL . '/siswa');
        exit;
    }

    public function hapus($id) {
        if($this->model('Siswa_model')->hapusDataSiswa($id) > 0) {
            $this->model('Log_model')->catatLog("Menghapus data siswa ID: " . $id);
            $_SESSION['flash'] = 'Berhasil dihapus';
        } else {
            $_SESSION['flash'] = 'Gagal dihapus';
        }
        header('Location: ' . BASEURL . '/siswa');
        exit;
    }

    public function ubah() {
        if($this->model('Siswa_model')->ubahDataSiswa($_POST) > 0) {
            $this->model('Log_model')->catatLog("Mengubah data siswa ID: " . $_POST['id']);
            $_SESSION['flash'] = 'Berhasil diubah';
        } else {
            $_SESSION['flash'] = 'Gagal diubah';
        }
        header('Location: ' . BASEURL . '/siswa');
        exit;
    }

    public function import() {
        if(isset($_FILES['file_csv']['name']) && $_FILES['file_csv']['name'] != '') {
            $id_sekolah = $_POST['id_sekolah'];
            $file = $_FILES['file_csv']['tmp_name'];
            $handle = fopen($file, "r");
            
            $dataSiswa = [];
            $row = 0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if(count($data) == 1 && strpos($data[0], ';') !== false) {
                    $data = explode(';', $data[0]);
                }
                
                $row++;
                if($row == 1) continue;
                
                $nis = isset($data[0]) ? trim($data[0]) : '';
                $nama = isset($data[1]) ? trim($data[1]) : '';
                $jk = isset($data[2]) ? trim($data[2]) : 'L';
                
                if($jk != 'L' && $jk != 'P') {
                    $jk = strtoupper(substr($jk, 0, 1));
                    if($jk != 'L' && $jk != 'P') $jk = 'L';
                }

                if(!empty($nis) && !empty($nama)) {
                    $dataSiswa[] = [
                        'nis' => $nis,
                        'nama_siswa' => $nama,
                        'jenis_kelamin' => $jk
                    ];
                }
            }
            fclose($handle);

            $inserted = $this->model('Siswa_model')->importBatchSiswa($dataSiswa, $id_sekolah);
            if($inserted > 0) {
                $this->model('Log_model')->catatLog("Mengimpor data siswa massal sebanyak " . $inserted . " baris data");
                $_SESSION['flash'] = 'Berhasil diimport (' . $inserted . ' data baru)';
            } else {
                $_SESSION['flash'] = 'Kegagalan import (Mungkin format salah atau semua NIS sudah ada)';
            }
        } else {
            $_SESSION['flash'] = 'File CSV gagal diunggah';
        }
        header('Location: ' . BASEURL . '/siswa');
        exit;
    }
}
