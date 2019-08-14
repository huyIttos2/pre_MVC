<?php


class DBConnect
{
    public $dsn;
    public $username;
    public $password;
    public function __construct()
    {
        $this->dsn="mysql:host=localhost;dbname=student_manager";
        $this->username ="root";
        $this->password ="password";
    }
    public function connect(){
        $conn = null;
        try{
            $conn = new PDO($this->dsn,$this->username,$this->password);
        }catch (PDOException $exception){
            $exception->getMessage();
        }
        return $conn;
    }
}