<?php 

class Users_model {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function findOneByEmailOrUsername($emailOrUsername) {
        $this->db->query('SELECT * FROM users WHERE email = :emailOrUsername OR username = :emailOrUsername');
        $this->db->bind('emailOrUsername',$emailOrUsername);
        $this->db->execute();
        return $this->db->result();
    }
    public function findOneByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind('email',$email);
        $this->db->execute();
        return $this->db->result();
    }
    public function findOneByUsername($username) {
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind('username',$username);
        $this->db->execute();
        return $this->db->result();
    }

    public function create($datas) {
        $this->db->query('INSERT INTO users (username,email,level,password) VALUES (:username, :email,:role, :password)');
        $this->db->binds($datas);   
        return $this->db->execute();

    }

}