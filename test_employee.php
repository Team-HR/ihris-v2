<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'backend/libs/EmployeeListController.php';

echo "Fetching employees...\n";
$employee = new EmployeeListController();
$employees = $employee->getEmployees();

if ($employees) {
    // echo json_encode($employees);
    // echo "Found " . count($employees) . " employees.\n";
    // Optional: print first employee to verify structure
    print_r($employees[0]);
} else {
    // echo "No employees found or connection failed.\n";
    echo json_encode([]);
}
