<?php
class libDB{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=portfolio2;charset=utf8","p_user","p0rtfo1io",[PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
    }

    public function getPDO(){
        return $this->pdo;
    }
}
?>