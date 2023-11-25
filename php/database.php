<?php 
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);
?>
<?php
    class dataConex {
        private $hostname = "localhost";
        private $dbname = "base23";
        private $username = "root";
        private $password = "Socram.5052387";
        
        public function conexion() {
            try {
                $PDO = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname,$this->username,$this->password);
                return $PDO;
            } catch (PDOException $ex) {
                return $ex->getMessage();
            }
        }
    }
?>