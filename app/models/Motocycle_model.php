<?php 
class Motocycle_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findManyMotocycle() {
        $this->db->query('SELECT * FROM motor');
        $this->db->execute();
        return $this->db->results();
    }

    public function searchMotocycles($query) {
        $this->db->query("SELECT * FROM motor WHERE nama LIKE '%$query%'");
        $this->db->execute();
        return $this->db->results();
    
    }


    public function getDetailMotocycle($id) {
        $this->db->query('SELECT * FROM motor WHERE id = :id');
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->result();
    }


    public function addMotocycles($datas) {
        $this->db->query('INSERT INTO motor (merk, tipe, nama, cc, transmisi, harga, url, id_admin, status) 
        VALUES(:merek, :tipe, :nama, :cc, :transmisi, :harga, :url, :id_admin, :status ) ');
        $this->db->bind('merek', $datas['merek']);
        $this->db->bind('tipe', $datas['tipe']);
        $this->db->bind('nama', $datas['nama']);
        $this->db->bind('cc', $datas['cc']);
        $this->db->bind('transmisi', $datas['transmisi']);
        $this->db->bind('harga', $datas['harga']);
        $this->db->bind('status', $datas['status']);
        $this->db->bind('id_admin', $datas['id_admin']);
        $this->db->bind('url', $datas['url']);
        return $this->db->execute();
    }
    public function updateMotocycle($datas) {
        $this->db->query('UPDATE motor SET merk = :merek, tipe = :tipe, nama = :nama, cc = :cc, transmisi = :transmisi, harga = :harga, id_admin = :id_admin, status = :status, url = :url WHERE id = :id');
        $this->db->bind('merek', $datas['merek']);
        $this->db->bind('tipe', $datas['tipe']);
        $this->db->bind('nama', $datas['nama']);
        $this->db->bind('cc', $datas['cc']);
        $this->db->bind('transmisi', $datas['transmisi']);
        $this->db->bind('harga', $datas['harga']);
        $this->db->bind('status', $datas['status']);
        $this->db->bind('id_admin', $datas['id_admin']);
        $this->db->bind('url', $datas['url']);
        $this->db->bind('id', $datas['id']); // ID motor yang akan diupdate
        var_dump($datas);
        return $this->db->execute();
    }
    

    public function updateMotocycleToRented($id) {
        $this->db->query('UPDATE motor SET status = 1 WHERE id = :id');
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->result();
    }
}
?>