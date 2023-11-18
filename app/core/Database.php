<?php
class Database{
    private $host = DB_HOST;
    private $dbName = DB_NAME;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $queryIns;
    private $dbh;
    public function __construct(){
        $strConn = 'mysql:host=' . $this->host .";dbname=" .$this->dbName;
        $opt = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
            $this->dbh = new PDO($strConn,$this->user,$this->password,$opt);
        }catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query) {
       $this->queryIns =  $this->dbh->prepare($query);
    }

    public function bind($param,$value,$type=null){
        if(is_null($type)){
            switch($value){
                case is_int($value) : 
                    $type = PDO::PARAM_INT;
                    break;
                case is_string($value) : 
                    $type = PDO::PARAM_STR;
                    break;
                case is_bool($value) : 
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) : 
                    $type = PDO::PARAM_NULL;
                    break;
                }
        }

        $this->queryIns->bindValue($param,$value,$type);

    }

    public function binds(array $datas){
        foreach($datas as $param => $value) {
            $this->bind($param,$value);
        }
    }

    public function execute(){
        $this->queryIns->execute(); return true;
    }

    public function result(){
          return  $this->queryIns->fetch(PDO::FETCH_ASSOC);
    }
    public function results(){
          return  $this->queryIns->fetchAll(PDO::FETCH_ASSOC);
    }
}