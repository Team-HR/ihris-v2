<?php
include_once 'backend/config/Database.php';

class Office
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getOffices()
    {
        $query = "SELECT * FROM `tbl_office`";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Convert office names to uppercase
            return array_map(function ($office) {
                if (isset($office['office_name'])) {
                    $office['office_name'] = strtoupper($office['office_name']);
                }
                return $office;
            }, $results);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function getOffice($objid)
    {
        $query = "SELECT * FROM `tbl_office` WHERE `objid` = :objid";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['objid' => $objid]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}
