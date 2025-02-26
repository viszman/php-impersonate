<?php

namespace Raza\PHPImpersonate;

use Raza\PHPImpersonate\Exception\RequestException;

/**
 * Factory class providing backward compatibility with static methods
 */
class PHPImpersonateFactory
{
    /**
     * Get the response from a URL using GET method
     *
     * @param string $url The URL to request
     * @param array<string,string> $headers Headers to send with the request
     * @param int $timeout Timeout in seconds
     * @param string $browser Browser to impersonate
     * @param array<string,mixed> $curlOptions Custom curl options to add to the request
     * @return Response
     * @throws RequestException
     */
    public static function get(
        string $url,
        array $headers = [],
        int $timeout = 30,
        string $browser = 'chrome99_android',
        array $curlOptions = []
    ): Response {
        $client = new PHPImpersonate($browser, $timeout, $curlOptions);

        return $client->sendGet($url, $headers);
    }

    /**
     * Post data to a URL and return response
     *
     * @param string $url The URL to request
     * @param array<string,mixed>|null $data Data to send with the POST request
     * @param array<string,string> $headers Headers to send with the request
     * @param int $timeout Timeout in seconds
     * @param string $browser Browser to impersonate
     * @param array<string,mixed> $curlOptions Custom curl options to add to the request
     * @return Response
     * @throws RequestException
     */
    public static function post(
        string $url,
        ?array $data = null,
        array $headers = [],
        int $timeout = 30,
        string $browser = 'chrome99_android',
        array $curlOptions = []
    ): Response {
        $client = new PHPImpersonate($browser, $timeout, $curlOptions);

        return $client->sendPost($url, $data, $headers);
    }

    /**
     * Get headers and status code for a URL using HEAD request
     *
     * @param string $url The URL to request
     * @param array<string,string> $headers Headers to send with the request
     * @param int $timeout Timeout in seconds
     * @param string $browser Browser to impersonate
     * @param array<string,mixed> $curlOptions Custom curl options to add to the request
     * @return Response
     * @throws RequestException
     */
    public static function head(
        string $url,
        array $headers = [],
        int $timeout = 30,
        string $browser = 'chrome99_android',
        array $curlOptions = []
    ): Response {
        $client = new PHPImpersonate($browser, $timeout, $curlOptions);

        return $client->sendHead($url, $headers);
    }

    /**
     * Delete a resource at a URL
     *
     * @param string $url The URL to request
     * @param array<string,string> $headers Headers to send with the request
     * @param int $timeout Timeout in seconds
     * @param string $browser Browser to impersonate
     * @param array<string,mixed> $curlOptions Custom curl options to add to the request
     * @return Response
     * @throws RequestException
     */
    public static function delete(
        string $url,
        array $headers = [],
        int $timeout = 30,
        string $browser = 'chrome99_android',
        array $curlOptions = []
    ): Response {
        $client = new PHPImpersonate($browser, $timeout, $curlOptions);

        return $client->sendDelete($url, $headers);
    }

    /**
     * Patch a resource at a URL
     *
     * @param string $url The URL to request
     * @param array<string,mixed>|null $data Data to send with the PATCH request
     * @param array<string,string> $headers Headers to send with the request
     * @param int $timeout Timeout in seconds
     * @param string $browser Browser to impersonate
     * @param array<string,mixed> $curlOptions Custom curl options to add to the request
     * @return Response
     * @throws RequestException
     */
    public static function patch(
        string $url,
        ?array $data = null,
        array $headers = [],
        int $timeout = 30,
        string $browser = 'chrome99_android',
        array $curlOptions = []
    ): Response {
        $client = new PHPImpersonate($browser, $timeout, $curlOptions);

        return $client->sendPatch($url, $data, $headers);
    }

    /**
     * Put a resource at a URL
     *
     * @param string $url The URL to request
     * @param array<string,mixed>|null $data Data to send with the PUT request
     * @param array<string,string> $headers Headers to send with the request
     * @param int $timeout Timeout in seconds
     * @param string $browser Browser to impersonate
     * @param array<string,mixed> $curlOptions Custom curl options to add to the request
     * @return Response
     * @throws RequestException
     */
    public static function put(
        string $url,
        ?array $data = null,
        array $headers = [],
        int $timeout = 30,
        string $browser = 'chrome99_android',
        array $curlOptions = []
    ): Response {
        $client = new PHPImpersonate($browser, $timeout, $curlOptions);

        return $client->sendPut($url, $data, $headers);
    }
}
