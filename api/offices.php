<?php

// Set headers for JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Set current working directory to project root to allow relative includes from backend/
chdir(__DIR__ . '/../');

require_once 'backend/libs/Office.php';
try {
    // Initialize Office
    $office = new Office();

    // Check if 'objid' parameter is present
    if (isset($_GET['objid'])) {
        $objid = filter_input(INPUT_GET, 'objid', FILTER_VALIDATE_INT);

        if ($objid === false || $objid === null) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Invalid ID parameter']);
            exit;
        }

        $office = $office->getOffice($objid);

        if ($office) {
            echo json_encode($office);
        } else {
            http_response_code(404); // Not Found
            echo json_encode(['error' => 'Office not found']);
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Parse input stream for PUT data
        $input = json_decode(file_get_contents('php://input'), true);

        // Check if 'objid' parameter is present in query string
        $objid = filter_input(INPUT_GET, 'objid', FILTER_VALIDATE_INT);

        if ($objid === false || $objid === null) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Invalid ID parameter']);
            exit;
        }

        if (empty($input)) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'No data provided for update']);
            exit;
        }

        if ($office->updateOffice($objid, $input)) {
            echo json_encode(['message' => 'Office updated successfully']);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Failed to update office']);
        }
    } else {
        // Fetch all offices
        $offices = $office->getOffices();
        echo json_encode($offices);
    }
} catch (Exception $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Internal Server Error: ' . $e->getMessage()]);
}
