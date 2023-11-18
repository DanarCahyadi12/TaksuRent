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
}
?>