<?php 

class Penyewa_model{
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function findOneByEmailOrUsername($emailOrUsername) {
        $this->db->query('SELECT * FROM penyewa WHERE email = :emailOrUsername OR username = :emailOrUsername');
        $this->db->bind('emailOrUsername',$emailOrUsername);
        $this->db->execute();
        return $this->db->result();
    }
}