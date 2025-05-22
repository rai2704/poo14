<?php 
//Conexão com o banco de dados em PDO
require_once './config/config.inc.php';
class Conexao {
    private static $instance = null;
    private $conn;

    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host=".HOST.";dbname=".DB, USER, PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Conexao();
        }
        return self::$instance->conn;
    }
}
?>
