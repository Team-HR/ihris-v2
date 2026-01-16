<?php

// Set headers for JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Set current working directory to project root to allow relative includes from backend/
chdir(__DIR__ . '/../');

require_once 'backend/libs/Position.php';
try {
    // Initialize Position
    $position = new Position();

    // Check if 'objid' parameter is present
    if (isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id === false || $id === null) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Invalid ID parameter']);
            exit;
        }

        $position = $position->getPosition($id);

        if ($position) {
            echo json_encode($position);
        } else {
            http_response_code(404); // Not Found
            echo json_encode(['error' => 'Office not found']);
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Parse input stream for PUT data
        $input = json_decode(file_get_contents('php://input'), true);

        // Check if 'objid' parameter is present in query string
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id === false || $id === null) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Invalid ID parameter']);
            exit;
        }

        if (empty($input)) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'No data provided for update']);
            exit;
        }

        if ($position->updatePosition($id, $input)) {
            echo json_encode(['message' => 'Position updated successfully']);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Failed to update position']);
        }
    } else {
        // Fetch all positions
        $positions = $position->getPositions();
        echo json_encode($positions);
    }
} catch (Exception $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Internal Server Error: ' . $e->getMessage()]);
}
