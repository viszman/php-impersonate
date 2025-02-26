# PHP-Impersonate

A PHP library for making HTTP requests with browser impersonation. This library uses curl-impersonate to mimic various browsers' network signatures, making it useful for accessing websites that may detect and block automated requests.

## Platform Requirements

**IMPORTANT**: This package only works on Linux platforms. Windows and macOS are not supported due to the reliance on Linux-specific binary dependencies.

## Installation

Install via Composer:

```bash
composer require hamaadraza/php-impersonate
```

## System Requirements

- PHP 8.0 or higher
- Linux operating system

## Basic Usage

```php
<?php
require 'vendor/autoload.php';

use Raza\PHPImpersonate\PHPImpersonate;

// Simple GET request
$response = PHPImpersonate::get('https://example.com');
echo $response->body();

// POST request with data
$response = PHPImpersonate::post('https://example.com/api', [
    'username' => 'johndoe',
    'email' => 'john@example.com'
]);

// Check the response
if ($response->isSuccess()) {
    $data = $response->json();
    echo "User created with ID: " . $data['id'];
} else {
    echo "Error: " . $response->status();
}
```

## API Reference

### Static Methods

The library provides convenient static methods for making requests:

```php
// GET request with optional headers and timeout
PHPImpersonate::get(string $url, array $headers = [], int $timeout = 30): Response

// POST request with optional data, headers and timeout
PHPImpersonate::post(string $url, ?array $data = null, array $headers = [], int $timeout = 30): Response

// PUT request with optional data, headers and timeout
PHPImpersonate::put(string $url, ?array $data = null, array $headers = [], int $timeout = 30): Response

// PATCH request with optional data, headers and timeout 
PHPImpersonate::patch(string $url, ?array $data = null, array $headers = [], int $timeout = 30): Response

// DELETE request with optional headers and timeout
PHPImpersonate::delete(string $url, array $headers = [], int $timeout = 30): Response

// HEAD request with optional headers and timeout
PHPImpersonate::head(string $url, array $headers = [], int $timeout = 30): Response
```

### Instance Methods

You can also create an instance of the client for more configuration options:

```php
// Create a client with specific browser and timeout
$client = new PHPImpersonate('chrome107', 30);

// Instance methods
$client->sendGet(string $url, array $headers = []): Response
$client->sendPost(string $url, ?array $data = null, array $headers = []): Response
$client->sendPut(string $url, ?array $data = null, array $headers = []): Response
$client->sendPatch(string $url, ?array $data = null, array $headers = []): Response
$client->sendDelete(string $url, array $headers = []): Response
$client->sendHead(string $url, array $headers = []): Response

// Generic send method
$client->send(Request $request): Response
```

### Response Methods

The `Response` class provides several methods for working with HTTP responses:

```php
// Get the HTTP status code
$response->status(): int

// Get the response body as string
$response->body(): string

// Check if the response was successful (status code 200-299)
$response->isSuccess(): bool

// Parse the JSON response
$response->json(): array|null

// Get a specific header value
$response->header(string $name, ?string $default = null): ?string

// Get all headers
$response->headers(): array

// Dump information about the response (returns string)
$response->dump(): string

// Output debug information about the response (echoes and returns self)
$response->debug(): Response
```

## Browser Options

PHP-Impersonate supports mimicking various browsers:

- `chrome99_android` (default)
- `chrome99`
- `chrome100`
- `chrome101`
- `chrome104`
- `chrome105`
- `chrome107`
- `chrome110`
- `edge99`
- `edge101`
- `firefox100`
- `firefox102`
- `firefox105`
- `firefox106`
- `safari15_3`
- `safari15_5`

Example:
```php
// Create a client that mimics Firefox
$client = new PHPImpersonate('firefox105');
$response = $client->sendGet('https://example.com');
```

## Timeouts

You can configure request timeouts:

```php
// Set a 5-second timeout for this request
$response = PHPImpersonate::get('https://example.com', [], 5);

// Or when creating a client instance
$client = new PHPImpersonate('chrome107', 10); // 10-second timeout
```

## Advanced Examples

### JSON API Request

```php
// Data will be automatically converted to JSON with correct Content-Type
$data = [
    'title' => 'New Post',
    'body' => 'This is the content',
    'userId' => 1
];

$response = PHPImpersonate::post(
    'https://jsonplaceholder.typicode.com/posts',
    $data,
    ['Content-Type' => 'application/json']
);

$post = $response->json();
echo "Created post with ID: {$post['id']}\n";
```

### Error Handling

```php
try {
    $response = PHPImpersonate::get('https://example.com/nonexistent', [], 5);
    
    if (!$response->isSuccess()) {
        echo "Error: HTTP {$response->status()}\n";
        echo $response->body();
    }
} catch (\Raza\PHPImpersonate\Exception\RequestException $e) {
    echo "Request failed: " . $e->getMessage();
}
```

## Testing

Run the test suite:

```bash
composer test
```

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Data Formats for POST, PUT and PATCH Requests

PHP-Impersonate supports sending data in different formats:

### Form Data

By default, data is sent as form data (`application/x-www-form-urlencoded`):

```php
// This will be sent as form data
$response = PHPImpersonate::post('https://example.com/api', [
    'username' => 'johndoe',
    'email' => 'john@example.com'
]);

// Explicitly specify form data
$response = PHPImpersonate::post('https://example.com/api',
    [
        'username' => 'johndoe',
        'email' => 'john@example.com'
    ],
    ['Content-Type' => 'application/x-www-form-urlencoded']
);
```

### JSON Data

You can send data as JSON by specifying the `Content-Type` header:

```php
// Send data as JSON
$response = PHPImpersonate::post('https://example.com/api',
    [
        'username' => 'johndoe',
        'email' => 'john@example.com'
    ],
    ['Content-Type' => 'application/json']
);
```

For PUT and PATCH requests, JSON is used as the default format.
