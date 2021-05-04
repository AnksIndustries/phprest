<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "grayroutes";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        $this->conn = new mysqli($this->host,$this->username,$this->password,$this->db_name);

    if ($this->conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }
  
        return $this->conn;
    }
}
?>