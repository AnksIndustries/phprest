<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../api/config/dbConfig.php';
  
// instantiate database and product object
$database = new Database();
$datb = $database->getConnection();

$id = $_GET['emp_id'];

function getEmpUnder($db,$employeeId){
        $sql = "SELECT c.ID, c.Type, e.name as Reporting_Head, c.name as Employee_Name, c.SALARY from employee e, employee c where e.ID = c.PARENT_ID and e.ID=".$employeeId;
      
        $stmt = $db->query($sql);
        while($rows = $stmt->fetch_assoc()){
            $employeeArr[$rows['ID']] = array(
                "id" => $rows['ID'],
                "type" => $rows['TYPE'],
                "Reporting Head" => $rows['Reporting Head'],
                "Employee Name" => $rows['Employee Name'],
                "SALARY" => $rows['SALARY']
            );
        }
        return $employeeArr;
}

echo $id;

$data = getEmpUnder($datb,$id);
echo json_encode($data);
?>
