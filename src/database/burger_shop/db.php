<?php

class Database 
{
    // private $host = '192.168.100.34';
    private $host = 'localhost';
    private $db = 'projects_burger_machine';
    private $uid = 'root';
    private $pwd = '';
    private $conn;

    public function read($q){
        try {
            $this->conn = null;
            $this->conn = new PDO('mysql:host='.$this->host.'; dbname='.$this->db, $this->uid, $this->pwd, [PDO::ATTR_EMULATE_PREPARES=>false]); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sth = $this->conn->prepare($q);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
        var_dump($e->getMessage());

            return 0;
        }
    }

    public function update($q){
        try {
            $this->conn = null;
            $this->conn = new PDO('mysql:host='.$this->host.'; dbname='.$this->db, $this->uid, $this->pwd, [PDO::ATTR_EMULATE_PREPARES=>false]); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sth = $this->conn->prepare($q);
            $sth->execute();
            return 1;
        } catch (PDOException $e) {
            return 0;
        }
    }



    
}
