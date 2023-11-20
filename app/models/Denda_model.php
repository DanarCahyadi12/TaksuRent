<?php 

class Denda_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getManyById($id) {
        $query = "SELECT transaksi.nama_lengkap, transaksi.tanggal_disewa,denda.* FROM transaksi INNER JOIN denda ON transaksi.id = denda.id_transaksi WHERE transaksi.id_penyewa = :id_penyewa";
        $this->db->query($query);
        $this->db->bind('id_penyewa', $id);
        $this->db->execute();
        return $this->db->results();
    }
}