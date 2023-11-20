<?php 

class Admin_model{
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function addAdmin($datas) {
        $this->db->query('INSERT INTO users(username, email, level, password) VALUES (:username, :email, :level, :password)');
        $this->db->bind('username', $datas['username']);
        $this->db->bind('email', $datas['email']);
        $this->db->bind('level', $datas['level']);
        $this->db->bind('password', $datas['password']);
        $this->db->execute();
    }

    public function findOneByEmailOrUsername($emailOrUsername) {
        $this->db->query('SELECT * FROM users WHERE email = :emailOrUsername OR username = :emailOrUsername');
        $this->db->bind('emailOrUsername',$emailOrUsername);
        $this->db->execute();
        return $this->db->result();
    }
}