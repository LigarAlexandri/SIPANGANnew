<?php
class User {
    private $conn;
    private $table = 'user';

    public $id_user;
    public $username;
    public $password;
    public $nama;
    public $foto;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function authenticate() {
        $query = "SELECT * FROM " . $this->table . " WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("ss", $this->username, $this->password);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->id_user = $row['id_user'];
            $this->nama = $row['nama'];
            $this->foto = $row['foto'];
            return true;
        }

        return false;
    }
}
?>
