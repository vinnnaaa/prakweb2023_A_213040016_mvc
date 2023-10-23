<?php

class Kendaraan extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Kendaraan';
        $data['kendaraan'] = $this->model('Kendaraan_model')->getAllKendaraan();
        $this->view('templates/header', $data);
        $this->view('kendaraan/index', $data);
        $this->view('templates/footer');
    }
    
    public function detail($id) {
        $data['judul'] = 'Detail Kendaraan';
        $data['kendaraan'] = $this->model('Kendaraan_model')->getKendaraanById($id);
        $this->view('templates/header', $data);
        $this->view('kendaraan/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if ($this->model('Kendaraan_model')->tambahDataKendaraan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/kendaraan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/kendaraan');
            exit;
        }
    }
    
    public function hapus($id) {
        if ($this->model('Kendaraan_model')->hapusDataKendaraan($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/kendaraan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/kendaraan');
            exit;
        }
    }

    public function getubah() {
        echo json_encode($this->model('Kendaraan_model')->getKendaraanById($_POST['id']));
    }

    public function ubah() {
        if ($this->model('Kendaraan_model')->ubahDataKendaraan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/kendaraan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/kendaraan');
            exit;
        }
    }

    public function cari() {
        $data['judul'] = 'Daftar Kendaraan';
        $data['kendaraan'] = $this->model('Kendaraan_model')->cariDataKendaraan();
        $this->view('templates/header', $data);
        $this->view('kendaraan/index', $data);
        $this->view('templates/footer');
    }
}

?>