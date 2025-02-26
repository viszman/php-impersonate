<?php

namespace Raza\PHPImpersonate;

use Raza\PHPImpersonate\Exception\RequestException;

interface ClientInterface
{
    /**
     * Send a request and get a response
     *
     * @param Request $request The request to send
     * @return Response
     * @throws RequestException
     */
    public function send(Request $request): Response;

    /**
     * Send a GET request
     *
     * @param string $url The URL to request
     * @param array<string,string> $headers Headers to send
     * @return Response
     * @throws RequestException
     */
    public function sendGet(string $url, array $headers = []): Response;

    /**
     * Send a POST request
     *
     * @param string $url The URL to request
     * @param array<string,mixed>|null $data Data to send
     * @param array<string,string> $headers Headers to send
     * @return Response
     * @throws RequestException
     */
    public function sendPost(string $url, ?array $data = null, array $headers = []): Response;

    /**
     * Send a HEAD request
     *
     * @param string $url The URL to request
     * @param array<string,string> $headers Headers to send
     * @return Response
     * @throws RequestException
     */
    public function sendHead(string $url, array $headers = []): Response;

    /**
     * Send a DELETE request
     *
     * @param string $url The URL to request
     * @param array<string,string> $headers Headers to send
     * @return Response
     * @throws RequestException
     */
    public function sendDelete(string $url, array $headers = []): Response;

    /**
     * Send a PATCH request
     *
     * @param string $url The URL to request
     * @param array<string,mixed>|null $data Data to send
     * @param array<string,string> $headers Headers to send
     * @return Response
     * @throws RequestException
     */
    public function sendPatch(string $url, ?array $data = null, array $headers = []): Response;

    /**
     * Send a PUT request
     *
     * @param string $url The URL to request
     * @param array<string,mixed>|null $data Data to send
     * @param array<string,string> $headers Headers to send
     * @return Response
     * @throws RequestException
     */
    public function sendPut(string $url, ?array $data = null, array $headers = []): Response;
}
