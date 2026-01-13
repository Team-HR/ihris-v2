<?php
include_once 'backend/config/Database.php';
include_once 'backend/libs/EmployeeList.php';

class Plantilla
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getPlantillas()
    {
        $query = "SELECT p.*, e.*, o.* 
                  FROM `tbl_plantilla` p 
                  LEFT JOIN `employee_list` e ON p.empid = e.empid 
                  LEFT JOIN `tbl_office` o ON p.dept_id = o.objid
                  LEFT JOIN `tbl_position` pos ON p.position_id = pos.id
                  ORDER BY p.itemno -- LIMIT 100";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return array_map(function ($plantilla) {
                if (isset($plantilla['empid'])) {
                    $plantilla['full_name'] = $plantilla['lname'] . ', ' . $plantilla['fname'] . ' ' . $plantilla['mname'];
                }

                if (isset($plantilla['dept_id'])) {
                    $plantilla['officename'] = $plantilla['officename'];
                }

                if (isset($plantilla['position_id'])) {
                    $plantilla['position'] = $plantilla['position'];
                }

                return $plantilla;
            }, $results);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function getPlantilla($plantilla_id)
    {
        $query = "SELECT * FROM `tbl_plantilla` WHERE `plantilla_id` = :plantilla_id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['plantilla_id' => $plantilla_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function getEmployeeFromPlantilla($plantilla_id)
    {
        // First get the plantilla record to retrieve the empid
        $plantilla = $this->getPlantilla($plantilla_id);

        if (!$plantilla || empty($plantilla['empid'])) {
            return null;
        }

        // Use EmployeeList class to get employee data
        $employeeList = new EmployeeList();
        return $employeeList->getEmployee($plantilla['empid']);
    }
}
