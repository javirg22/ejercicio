<?php
class Database {
    private $host = "127.0.0.1";
    private $db_name = "apiTask";
    private $username = "root"; // Cambia esto si tienes un usuario diferente.
    private $password = "Tokio2324";     // Cambia esto si tienes una contraseña.
    public $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error en la conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}