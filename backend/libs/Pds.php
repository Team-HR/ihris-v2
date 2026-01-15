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


    // public function updatedPds($empid, $data)
    // {
    //     $query = "UPDATE `employee_list` SET 
    //         `objid` = :objid, 
    //         `dtrno` = :dtrno, 
    //         `empno` = :empno, 
    //         `lname` = :lname, 
    //         `fname` = :fname, 
    //         `mname` = :mname, 
    //         `extname` = :extname, 
    //         `apptstatus_objid` = :apptstatus_objid, 
    //         `position` = :position, 
    //         `officeposition_objid` = :officeposition_objid, 
    //         `department_objid` = :department_objid, 
    //         `officesection_objid` = :officesection_objid, 
    //         `assignedoffice_objid` = :assignedoffice_objid, 
    //         `active` = :active, 
    //         `emp_no` = :emp_no, 
    //         `dept_id` = :dept_id, 
    //         `position_id` = :position_id, 
    //         `section_id` = :section_id, 
    //         `assigned_officeid` = :assigned_officeid, 
    //         `birthdate` = :birthdate, 
    //         `placebirth` = :placebirth, 
    //         `birth_date` = :birth_date, 
    //         `place_birth` = :place_birth, 
    //         `gender` = :gender, 
    //         `sex` = :sex, 
    //         `civilstatus` = :civilstatus, 
    //         `civil_status` = :civil_status, 
    //         `citizen_objid` = :citizen_objid, 
    //         `citizenship` = :citizenship, 
    //         `height` = :height, 
    //         `weight` = :weight, 
    //         `bloodtype` = :bloodtype, 
    //         `blood_type` = :blood_type, 
    //         `gsisidno` = :gsisidno, 
    //         `gsisid_no` = :gsisid_no, 
    //         `pagibigno` = :pagibigno, 
    //         `pagibig_no` = :pagibig_no, 
    //         `philhealthno` = :philhealthno, 
    //         `philhealth_no` = :philhealth_no, 
    //         `sssno` = :sssno, 
    //         `sss_no` = :sss_no, 
    //         `residential_address` = :residential_address, 
    //         `residential_zipcode` = :residential_zipcode, 
    //         `reszipcode` = :reszipcode, 
    //         `residential_telno` = :residential_telno, 
    //         `permanent_address` = :permanent_address, 
    //         `permanent_zipcode` = :permanent_zipcode, 
    //         `permanent_telno` = :permanent_telno, 
    //         `emailaddress` = :emailaddress, 
    //         `email_address` = :email_address, 
    //         `cellphone_no` = :cellphone_no, 
    //         `agency_employee_no` = :agency_employee_no, 
    //         `tinno` = :tinno, 
    //         `tin_no` = :tin_no, 
    //         `orig_appt_date` = :orig_appt_date, 
    //         `origapptdate` = :origapptdate, 
    //         `lastpromo_date` = :lastpromo_date, 
    //         `lastpromodate` = :lastpromodate, 
    //         `years_service` = :years_service, 
    //         `salary_id` = :salary_id, 
    //         `salary_objid` = :salary_objid, 
    //         `step_no` = :step_no, 
    //         `stepno` = :stepno, 
    //         `contact_person` = :contact_person, 
    //         `contact_no` = :contact_no, 
    //         `sectionid` = :sectionid, 
    //         `reshouseno` = :reshouseno, 
    //         `resstreet` = :resstreet, 
    //         `ressubdivision` = :ressubdivision, 
    //         `resbarangay` = :resbarangay, 
    //         `rescity` = :rescity, 
    //         `resprovince` = :resprovince, 
    //         `permhouseno` = :permhouseno, 
    //         `permstreet` = :permstreet, 
    //         `permsubdivision` = :permsubdivision, 
    //         `permbarangay` = :permbarangay, 
    //         `permcity` = :permcity, 
    //         `permprovince` = :permprovince, 
    //         `permzipcode` = :permzipcode, 
    //         `permtelno` = :permtelno, 
    //         `cellno` = :cellno
    //         WHERE `empid` = :empid";

    //     try {
    //         $stmt = $this->conn->prepare($query);
    //         $data['empid'] = $empid;
    //         return $stmt->execute($data);
    //     } catch (PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //         return false;
    //     }
    // }


    public function updateBio($empid, $data)
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
            -- `civil_status` = :civil_status
            -- `citizen_objid` = :citizen_objid, 
            `citizenship` = :citizenship,
            `height` = :height, 
            `weight` = :weight, 
            `bloodtype` = :bloodtype,
            `bloodtype` = :bloodtype,
            `blood_type` = :blood_type
            -- `residential_address` = :residential_address, 
            -- `residential_zipcode` = :residential_zipcode, 
            -- `reszipcode` = :reszipcode, 
            -- `residential_telno` = :residential_telno, 
            -- `permanent_address` = :permanent_address, 
            -- `permanent_zipcode` = :permanent_zipcode, 
            -- `permanent_telno` = :permanent_telno, 
            -- `emailaddress` = :emailaddress, 
            -- `email_address` = :email_address, 
            -- `cellphone_no` = :cellphone_no, 
            -- `agency_employee_no` = :agency_employee_no, 
            -- `tinno` = :tinno, 
            -- `tin_no` = :tin_no, 
            -- `contact_person` = :contact_person, 
            -- `contact_no` = :contact_no, 
            -- `reshouseno` = :reshouseno, 
            -- `resstreet` = :resstreet, 
            -- `ressubdivision` = :ressubdivision, 
            -- `resbarangay` = :resbarangay, 
            -- `rescity` = :rescity, 
            -- `resprovince` = :resprovince, 
            -- `permhouseno` = :permhouseno, 
            -- `permstreet` = :permstreet, 
            -- `permsubdivision` = :permsubdivision, 
            -- `permbarangay` = :permbarangay, 
            -- `permcity` = :permcity, 
            -- `permprovince` = :permprovince, 
            -- `permzipcode` = :permzipcode, 
            -- `permtelno` = :permtelno, 
            -- `cellno` = :cellno
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
        $query = "UPDATE `employee_list` SET 
            `gsisidno` = :gsisidno, 
            `pagibigno` = :pagibigno, 
            `philhealthno` = :philhealthno, 
            `sssno` = :sssno
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
