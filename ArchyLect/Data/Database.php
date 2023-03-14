<?php
class Database {
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->db = 'betajf';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';
    }

    function connect(){
        try {
            $Connection = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            $Options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $Pdo = new PDO($Connection, $this->user, $this->password, $Options);
            return $Pdo;
        }catch(PDOException $e){
            print_r("Error connection: ".$e ->getMessage());
        }
    }
}
?>