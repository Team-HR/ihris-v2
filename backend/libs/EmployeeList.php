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

    public function updateEmployee($empid, $data)
    {
        if (empty($data)) {
            return false;
        }

        $fields = [];
        foreach ($data as $key => $value) {
            $fields[] = "$key = :$key";
        }

        $query = "UPDATE employee_list SET " . implode(', ', $fields) . " WHERE empid = :empid";

        $data['empid'] = $empid;

        try {
            $stmt = $this->conn->prepare($query);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            // Log error or handle it as needed
            // echo "Error: " . $e->getMessage();
            throw $e;
        }
    }
}
