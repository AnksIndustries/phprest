<?php
class Database{
  
    // specify your own database credentials
    private $host = "remotemysql.com";
    private $db_name = "ykx2ArmHGC";
    private $username = "ykx2ArmHGC";
    private $password = "9D6RD6SYPP";
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
