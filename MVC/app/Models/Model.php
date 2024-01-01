<?php
namespace App\Models;
use PDO;
use PDOException;


class Model{
    private $usename;
    private $password ;
    private $servername;   
    private $database;
    protected $table;

    public function pdo(){
        $this ->username = config('database.username');
        $this ->password = config('database.password');
        $this ->servername = config('database.servername');
        $this ->database = config('database.database');
        try {
            $conn = new PDO("mysql:host=". $this-> servername."; 
            dbname=" . $this->database, $this->username, 
            $this-> password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        }
    }
 