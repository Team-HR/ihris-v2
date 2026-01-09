/**
 * ApiService
 * A lightweight wrapper around the native Fetch API to simplify GET, POST, PUT, and DELETE requests.
 * Handles JSON parsing, query parameters, and error checking.
 */
class ApiService {
    /**
     * Helper to handle response status and parsing
     * @param {Response} response 
     */
    static async _handleResponse(response) {
        if (!response.ok) {
            const errorBody = await response.text();
            throw new Error(`API Error: ${response.status} ${response.statusText} - ${errorBody}`);
        }
        // Return null for 204 No Content
        if (response.status === 204) {
            return null;
        }
        try {
            return await response.json();
        } catch (e) {
            // Fallback if response is not JSON
            return await response.text();
        }
    }

    /**
     * GET request
     * @param {string} url 
     * @param {Object} params - Query parameters
     */
    static async get(url, params = {}) {
        const urlObj = new URL(url, window.location.origin);
        Object.keys(params).forEach(key => urlObj.searchParams.append(key, params[key]));

        const response = await fetch(urlObj.toString(), {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        return this._handleResponse(response);
    }

    /**
     * POST request
     * @param {string} url 
     * @param {Object} data - Request body
     */
    static async post(url, data = {}) {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        return this._handleResponse(response);
    }

    /**
     * PUT request
     * @param {string} url 
     * @param {Object} data - Request body
     */
    static async put(url, data = {}) {
        const response = await fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        return this._handleResponse(response);
    }

    /**
     * DELETE request
     * @param {string} url 
     */
    static async delete(url) {
        const response = await fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        return this._handleResponse(response);
    }
}

// Export as a global object if using vanilla JS without modules, 
// or allows importing if using ES modules.
// For simple usage in script tags, we attach to window.
window.api = ApiService;
