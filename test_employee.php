<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'backend/libs/EmployeeList.php';

echo "Fetching employees...\n";
$employee = new EmployeeList();
$employees = $employee->getEmployee(3977);

if ($employees) {
    // echo json_encode($employees);
    // echo "Found " . count($employees) . " employees.\n";
    // Optional: print first employee to verify structure
    print_r($employees);
} else {
    // echo "No employees found or connection failed.\n";
    echo json_encode([]);
}
