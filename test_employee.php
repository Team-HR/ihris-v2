<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'controllers/Employee.php';

echo "Fetching employees...\n";
$employee = new Employee();
$employees = $employee->getEmployees();

if ($employees) {
    echo "Found " . count($employees) . " employees.\n";
    // Optional: print first employee to verify structure
    // print_r($employees[0]); 
} else {
    echo "No employees found or connection failed.\n";
}
