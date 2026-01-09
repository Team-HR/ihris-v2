<?php
include_once 'backend/config/Database.php';

class EmployeeList
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getEmployees()
    {
        $query = "SELECT * FROM employee_list";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function getEmployee($empid)
    {
        $query = "SELECT * FROM employee_list WHERE empid = :empid";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['empid' => $empid]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}
