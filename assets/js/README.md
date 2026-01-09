# Native Fetch API Wrapper

## Usage

### GET Requests

**Fetch all records:**

```javascript
const employees = await api.get("/api/employees");
console.log(employees);
```

**Fetch with query parameters:**

```javascript
// Requests: /api/employees?id=123&active=1
const employee = await api.get("/api/employees", {
  id: 123,
  active: 1,
});
```

### POST Requests

**Create a new record:**

```javascript
const newEmployee = {
  name: "Jane Doe",
  position: "Developer",
  department_id: 5,
};

try {
  const response = await api.post("/api/employees", newEmployee);
  console.log("Created:", response);
} catch (error) {
  console.error("Failed to create:", error);
}
```

### PUT Requests

**Update an existing record:**

```javascript
const updates = {
  position: "Senior Developer",
};

const response = await api.put("/api/employees?id=123", updates);
```

### DELETE Requests

**Delete a record:**

```javascript
await api.delete("/api/employees?id=123");
```

## Features

- **Automatic JSON Parsing**: Automatically parses JSON responses.
- **Error Handling**: Throws an informative error if the response status is not in the 200-299 range.
- **Query Parameter Helper**: Automatically converts an object to a query string for GET requests.
- **Headers**: Automatically sets `Content-Type: application/json` for POST, PUT, and DELETE requests.
