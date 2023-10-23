<?php

class Kendaraan_model {
    private $table = 'kendaraan';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllKendaraan() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKendaraanById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataKendaraan($data) {
        $query = 'INSERT INTO kendaraan( `model`, `merek`, `tahun`, `deskripsi`) VALUES( :model, :merek, :tahun, :deskripsi)';
        $this->db->query($query);
        $this->db->bind('model', $data['model']);
        $this->db->bind('merek', $data['merek']);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('deskripsi', $data['deskripsi']);


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKendaraan($id) {
        $query = 'DELETE FROM kendaraan WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataKendaraan($data) {
        $query = 'UPDATE kendaraan SET
                    model = :model,
                    merek = :merek,
                    tahun = :tahun,
                    deskripsi = :deskripsi
                  WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('model', $data['model']);
        $this->db->bind('merek', $data['merek']);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataKendaraan() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM kendaraan WHERE model LIKE :keyword OR merek LIKE :keyword OR tahun LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
