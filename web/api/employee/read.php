<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/dbConfig.php';
include_once '../objects/employee.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$employee = new Employee($db);
  
// query products

$employee->id = isset($_POST['id']) ? $_POST['id'] : die();
$employee->password = isset($_POST['password']) ? $_POST['password'] : die();

$employee->read();

// check if more than 0 record found
if($employee->name!=NULL){
  
    $employee_item=array(
        "ID" => $employee->id,
        "PARENT_ID" => $employee->parent_id,
        "TYPE" => $employee->type,
        "NAME" => $employee->name,
        "PASSWORD" => $employee->password,
        "SALARY" => $employee->salary
    );
    
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($employee_item);
}else {
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No employee found")
    );
}