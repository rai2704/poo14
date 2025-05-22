<?php
    require_once PATH . '/config/conexao.php';

    class Categorias {
        private $conn;
        private $id_categoria;
        private $nome;

        public function __construct() {
            $this->conn = Conexao::getInstance();
            $this->id_categoria;
            $this->nome;  
        }

        public function getId_categoria() {
            return $this->id_categoria;
        }
        
        public function setId_categoria($id_categoria) {
            $this->id_categoria = $id_categoria;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function incluir() {
            $sql = "INSERT INTO categoria (nome) VALUES (:nome)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);

            return $stmt->execute();
        }

        public function alterar() {
            $sql = "UPDATE categoria SET nome = :nome WHERE id_categoria = :id_categoria";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':id_categoria', $this->id_categoria);

            return $stmt->execute();
        }

        public function excluir() {
            $sql = "DELETE FROM categoria WHERE id_categoria = :id_categoria";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_categoria', $this->id_categoria);

            return $stmt->execute();
        }

        public function listar(){
            $sql = "SELECT * FROM categoria ORDER BY id_categoria";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }




    }