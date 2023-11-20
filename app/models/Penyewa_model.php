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
    public function findOneByEmail($email) {
        $this->db->query('SELECT * FROM penyewa WHERE email = :email');
        $this->db->bind('email',$email);
        $this->db->execute();
        return $this->db->result();
    }
    public function findOneByUsername($username) {
        $this->db->query('SELECT * FROM penyewa WHERE username = :username');
        $this->db->bind('username',$username);
        $this->db->execute();
        return $this->db->result();
    }
    public function findOneByTelpon($telpon) {
        $this->db->query('SELECT * FROM penyewa WHERE no_telpon= :no_telpon');
        $this->db->bind('no_telpon',$telpon);
        $this->db->execute();
        return $this->db->result();
    }
    public function createPenyewa($datas) {
        $this->db->query('INSERT INTO penyewa (username,email,password,no_telpon,alamat) VALUES (:username, :email, :password, :no_telpon,:alamat)');
        $this->db->binds($datas);   
        return $this->db->execute();

    }
}