<?php 


class Transaksi_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function create($datas) {
        $query = 'INSERT INTO transaksi (nama_lengkap, jaminan, sim, tanggal_disewa, tanggal_dikembalikan, lama_sewa,status, harga_sewa, id_motor, id_penyewa) VALUES(:nama_lengkap, :jaminan, :sim. :tanggal_disewa,:tanggal_dikembalikan,:lama_sewa,:status,:harga_sewa,:id_motor,:id_penyewa)';
        $this->db->query($query);
        $this->db->binds($datas);
        return $this->db->execute();
        

    }
}
?>