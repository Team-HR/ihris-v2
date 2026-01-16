<?php

// Set headers for JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Set current working directory to project root to allow relative includes from backend/
chdir(__DIR__ . '/../');

require_once 'backend/libs/Plantilla.php';
try {
    // Initialize Position
    $plantilla = new Plantilla();

    // Check if 'plantilla_id' parameter is present
    if (isset($_GET['plantilla_id'])) {
        $plantilla_id = filter_input(INPUT_GET, 'plantilla_id', FILTER_VALIDATE_INT);

        if ($plantilla_id === false || $plantilla_id === null) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Invalid ID parameter']);
            exit;
        }

        $plantilla = $plantilla->getPlantilla($plantilla_id);

        if ($plantilla) {
            echo json_encode($plantilla);
        } else {
            http_response_code(404); // Not Found
            echo json_encode(['error' => 'Plantilla not found']);
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Parse input stream for PUT data
        $input = json_decode(file_get_contents('php://input'), true);

        // Check if 'plantilla_id' parameter is present in query string
        $plantilla_id = filter_input(INPUT_GET, 'plantilla_id', FILTER_VALIDATE_INT);

        if ($plantilla_id === false || $plantilla_id === null) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Invalid ID parameter']);
            exit;
        }

        if (empty($input)) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'No data provided for update']);
            exit;
        }

        if ($plantilla->updatePlantilla($plantilla_id, $input)) {
            echo json_encode(['message' => 'Plantilla updated successfully']);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Failed to update plantilla']);
        }
    } else {
        // Fetch all plantillas
        $plantillas = $plantilla->getPlantillas();
        echo json_encode($plantillas);
    }
} catch (Exception $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Internal Server Error: ' . $e->getMessage()]);
}
