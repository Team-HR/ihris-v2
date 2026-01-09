<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'backend/config/Database.php';

echo "Attempting to connect...\n";
$db = new Database();
$conn = $db->connect();

if ($conn) {
    echo "Connected successfully!";
} else {
    echo "Connection failed (instance created but connect() returned null/false, see previous errors if any).";
}
echo "\n";
