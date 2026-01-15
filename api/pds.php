<?php

// Set headers for JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Set current working directory to project root to allow relative includes from backend/
chdir(__DIR__ . '/../');

require_once 'backend/libs/Pds.php';
try {
    // Initialize PDS
    $pds = new Pds();

    // Check if 'objid' parameter is present
    // Check Request Method
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'GET') {
        // Check if 'empid' parameter is present
        if (isset($_GET['empid'])) {
            $empid = filter_input(INPUT_GET, 'empid', FILTER_VALIDATE_INT);

            if ($empid === false || $empid === null) {
                http_response_code(400); // Bad Request
                echo json_encode(['error' => 'Invalid ID parameter']);
                exit;
            }

            $pds = $pds->getPds($empid);

            if ($pds) {
                echo json_encode($pds);
            } else {
                http_response_code(404); // Not Found
                echo json_encode(['error' => 'Employee not found']);
            }
        } else {
            // Handle case where empid is missing for GET if needed, or keep existing behavior (nothing happens or error)
            // Original code required empid for the first block.
            // If I follow the original strictness:
            http_response_code(400);
            echo json_encode(['error' => 'Missing empid parameter']);
        }
    } else if ($method === 'PUT') {
        // Parse input stream for PUT data
        $input = json_decode(file_get_contents('php://input'), true);

        // Check if 'empid' parameter is present in query string
        $empid = filter_input(INPUT_GET, 'empid', FILTER_VALIDATE_INT);

        if ($empid === false || $empid === null) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Invalid ID parameter']);
            exit;
        }

        if (empty($input)) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'No data provided for update']);
            exit;
        }

        $type = filter_input(INPUT_GET, 'type', FILTER_DEFAULT);
        $success = false;

        if ($type === 'professional') {
            $success = $pds->updateProfessional($empid, $input);
        } else {
            // Default to bio or explicit check for 'bio'
            $success = $pds->updateBio($empid, $input);
        }

        if ($success) {
            echo json_encode(['message' => 'Employee updated successfully', 'data' => $input]);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Failed to update employee']);
        }
    }
} catch (Exception $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Internal Server Error: ' . $e->getMessage()]);
}
