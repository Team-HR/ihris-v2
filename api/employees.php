<?php

/**
 * 
 * @param int $empid
 * @return json
 * 
 * URLS:
 *  /api/employees?empid=<empid>
 *  /api/employees
 * 
 * USAGE (e.g. in js):
 * <script>
 *    fetch('/api/employees?empid=3977')
 *        .then(response => response.json())
 *        .then(data => {
 *            console.log(data);
 *        })
 *        .catch(error => {
 *            console.error('Error:', error);
 *        });
 * </script>
 * 
 */

// Set headers for JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Set current working directory to project root to allow relative includes from backend/
chdir(__DIR__ . '/../');

require_once 'backend/libs/EmployeeList.php';

try {
    // Initialize EmployeeList
    $employeeList = new EmployeeList();

    // Check if 'id' parameter is present
    if (isset($_GET['empid'])) {
        $empid = filter_input(INPUT_GET, 'empid', FILTER_VALIDATE_INT);

        if ($empid === false || $empid === null) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Invalid ID parameter']);
            exit;
        }

        $employee = $employeeList->getEmployee($empid);

        if ($employee) {
            echo json_encode($employee);
        } else {
            http_response_code(404); // Not Found
            echo json_encode(['error' => 'Employee not found']);
        }
    } else {
        // Fetch all employees
        $employees = $employeeList->getEmployees();
        echo json_encode($employees);
    }
} catch (Exception $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Internal Server Error: ' . $e->getMessage()]);
}
