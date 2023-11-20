<?php 


class Transaksi_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function create($datas) {
        $query = 'INSERT INTO transaksi (nama_lengkap, jaminan, sim, tanggal_disewa, tanggal_dikembalikan, lama_sewa,status, harga_sewa, id_motor, id_penyewa) VALUES(:nama_lengkap, :jaminan, :sim, :tanggal_disewa,:tanggal_dikembalikan,:lama_sewa,:status,:harga_sewa,:id_motor,:id_penyewa)';
        $this->db->query($query);
        $this->db->binds($datas);
        return $this->db->execute();
        

    }

    public function getTransaction($id) {
        $query = 'SELECT transaksi.*, motor.nama FROM transaksi INNER JOIN motor ON motor.id = transaksi.id_motor WHERE id_penyewa = :id_penyewa ';
        $this->db->query($query);
        $this->db->bind('id_penyewa', $id);
        $this->db->execute();
        return $this->db->results();
    }

    public function getMany() {
        $query = 'SELECT transaksi.*, motor.nama FROM transaksi INNER JOIN motor ON motor.id = transaksi.id_motor';
        $this->db->query($query);
        $this->db->execute();
        return $this->db->results();
    }
}
?>