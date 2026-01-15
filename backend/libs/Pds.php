<?php
include_once 'backend/config/Database.php';

class Pds
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getPds($empid)
    {
        $query = "SELECT * FROM `employee_list` WHERE `empid` = :empid";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['empid' => $empid]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function updatePersonal($empid, $data)
    {
        $query = "UPDATE `employee_list` SET 
            `lname` = :lname, 
            `fname` = :fname, 
            `mname` = :mname, 
            `extname` = :extname,
            `birthdate` = :birthdate,
            `placebirth` = :placebirth, 
            `birth_date` = :birthdate, 
            `place_birth` = :placebirth,
            `gender` = :gender,
            `sex` = :sex,
            `civilstatus` = :civilstatus,
            `citizenship` = :citizenship,
            `height` = :height, 
            `weight` = :weight, 
            `bloodtype` = :bloodtype,
            `bloodtype` = :bloodtype,
            `blood_type` = :blood_type,
            `residential_address` = :residential_address, 
            `residential_zipcode` = :residential_zipcode, 
            `reszipcode` = :reszipcode, 
            `residential_telno` = :residential_telno, 
            `permanent_address` = :permanent_address, 
            `permanent_zipcode` = :permanent_zipcode, 
            `permanent_telno` = :permanent_telno,
            `contact_person` = :contact_person, 
            `contact_no` = :contact_no
            WHERE `empid` = :empid";

        try {
            $stmt = $this->conn->prepare($query);
            $data['empid'] = $empid;
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function updateProfessional($empid, $data)
    {
        // Check if empid exists
        $checkQuery = "SELECT count(*) FROM `employee_list` WHERE `empid` = :empid";
        $stmt = $this->conn->prepare($checkQuery);
        $stmt->execute(['empid' => $empid]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $query = "UPDATE `employee_list` SET 
            `gsisidno` = :gsisidno, 
            `pagibigno` = :pagibigno, 
            `philhealthno` = :philhealthno, 
            `sssno` = :sssno,
            `tinno` = :tinno
            WHERE `empid` = :empid";
        } else {
            $query = "INSERT INTO `employee_list` 
            (`empid`, `gsisidno`, `pagibigno`, `philhealthno`, `sssno`, `tinno`) 
            VALUES (:empid, :gsisidno, :pagibigno, :philhealthno, :sssno, :tinno)";
        }

        try {
            $stmt = $this->conn->prepare($query);
            $data['empid'] = $empid;
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function updateFamily($empid, $data)
    {
        $query = "UPDATE `employee_family_background` SET 
            `spouse_lname` = :spouse_lname, 
            `spouse_fname` = :spouse_fname, 
            `spouse_mname` = :spouse_mname, 
            `spouseextname` = :spouse_extname
            WHERE `empid` = :empid";

        try {
            $stmt = $this->conn->prepare($query);
            $data['empid'] = $empid;
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
