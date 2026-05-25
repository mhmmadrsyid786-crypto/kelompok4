<?php
class Dashboard extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) { header('Location: ' . BASEURL . '/auth'); exit; }

        $data['judul'] = 'Dashboard';
        $data['nama'] = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Admin';
        
        $db = new Database();
        
        $db->query("SELECT COUNT(*) as total FROM siswa");
        $data['total_siswa'] = $db->single()['total'];

        $db->query("SELECT COUNT(*) as total FROM stok_bahan WHERE jumlah_stok <= stok_minimum");
        $data['stok_kritis'] = $db->single()['total'];

        $db->query("SELECT COUNT(*) as total FROM distribusi");
        $data['distribusi_total'] = $db->single()['total'];

        $db->query("SELECT COUNT(*) as total FROM alergi_siswa");
        $data['siswa_alergi'] = $db->single()['total'];

        // JSON Data for Charts
        $db->query("SELECT jenis_kelamin, COUNT(*) as jumlah FROM siswa GROUP BY jenis_kelamin");
        $data['chart_gender'] = json_encode($db->resultSet());

        $db->query("SELECT tingkat_alergi, COUNT(*) as jumlah FROM alergi_siswa GROUP BY tingkat_alergi");
        $data['chart_alergi'] = json_encode($db->resultSet());

        $db->query("SELECT nama_bahan, jumlah_stok FROM stok_bahan LIMIT 6");
        $data['chart_stok'] = json_encode($db->resultSet());

        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
