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
        $sql = "WITH EPR AS
        (
          SELECT     ID, TYPE , NAME as `Employee Name`, SALARY
          FROM       employee
          WHERE      ID = ".$employeeId."
          UNION ALL
          SELECT     p.PARENT_ID as P_ID, p.NAME as `Reporting Head`
          FROM       employee p
          INNER JOIN EPR
                  ON EPR.ID = P_ID
        )
      SELECT ID, TYPE, `Reporting Head`,`Employee Name`,SALARY  FROM EPR";
      
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