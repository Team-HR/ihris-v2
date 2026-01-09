# iHRIS-v2

Overhauling OHRMD's old iHRIS to iHRIS v2, aligning to LGU Bayawan City's BITS softdev team requirements.

## Configuration

This application requires a database configuration file to be set up before use.

1.  Navigate to the `backend/config/` directory.
2.  Copy the example configuration file:
    ```bash
    cp backend/config/config.php.example backend/config/config.php
    ```
3.  Edit `backend/config/config.php` and set your database credentials:

    ```php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'your_db_user');
    define('DB_PASS', 'your_db_password');
    define('DB_NAME', 'your_db_name');
    define('DB_PORT', '3306'); // Default MySQL port
    ```

## Native API Wrapper

The project includes a lightweight JavaScript wrapper for the native Fetch API to simplify HTTP requests. It handles JSON parsing, query parameters, and error checking.

### Quick Start

The wrapper is available globally as `api`.

```javascript
// Get all employees
const employees = await api.get("/api/employees");

// Get specific employee
const employee = await api.get("/api/employees", { empid: 123 });
```

### Documentation

For full usage examples (GET, POST, PUT, DELETE) and more details, please refer to the [API Wrapper Documentation](assets/js/README.md).

### Backend Structure

The backend API endpoints are located in the `api/` directory (e.g., `api/employees.php`). These scripts handle the requests forwarded by the frontend wrapper.
