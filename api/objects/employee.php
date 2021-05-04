<?php
class Employee{
  
    // database connection and table name
    private $conn;
    private $table_name = "employee";
  
    // object properties
    public $id;
    public $parent_id;
    public $type;
    public $name;
    public $password;
    public $salary;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
    function read(){
  
        // select all query
        $query = "SELECT * from ". $this->table_name;
    
        // prepare query statement
        $stmt = $this->conn->query($query);

        // execute query

        $row = $stmt->fetch_assoc();

        $this->parent_id = $row['PARENT_ID'];
        $this->type = $row['TYPE'];
        $this->name = $row['NAME'];
        $this->password = $row['PASSWORD'];
        $this->salary = $row['SALARY'];
    }
}
?>