<?php 

namespace   App\Model;

use PDO;
use PDOException;
class Model {

    protected $connection;

    public function __construct() {
    if (!isset($connection)) {
        global $dbHost , $dbPass,$dbUsername,$dbName;
        $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
        try {
            $this->connection = new PDO("mysql:host=".$dbHost.";dbname", $dbName,$dbUsername,$dbPass,$option);
        } catch (PDOException $e) {
            echo "there is some problem connection ". $e->getMessage() ;
        }
        }
    }

    public function __destruct(){
        $this->connection = null;
    }

    protected function query($query,$value =null) {
        try {
            if ($value == null) {
               return $this->connection->query($query);
            }else{
                $stmt = $this->connection->prepare($query);
                $stmt->execute($value);
                return $stmt;
            }
        } catch (PDOException $e) {
            echo "there is some problem query ". $e->getMessage() ;
        }
    }

    protected function execute($query ,$value = null){
        try {
           if ($value == null) {
             $this->connection->exec($query);
           }else{
             $stmt = $this->connection->prepare($query);
             $stmt->execute($value);
           }
           return true;
        } catch (PDOException $e) {
            echo "there is some problem in connection ". $e->getMessage() ;
            return false;
        }
    }

    protected function closeConnection(){
        $this->connection = null;
    }
}