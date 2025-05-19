<?php

namespace Raza\PHPImpersonate;

use Raza\PHPImpersonate\Proxy\ProxyConfig;

class Request
{
    /**
     * @param string $method HTTP method
     * @param string $url The URL to request
     * @param array<string,string> $headers Request headers
     * @param string|null $body Request body content
     */
    public function __construct(
        private string $method,
        private string $url,
        private array $headers = [],
        private ?string $body = null,
        private ?ProxyConfig $proxyConfig = null
    ) {
    }

    /**
     * Get the request method
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Get the request URL
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Get the request headers
     *
     * @return array<string,string>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Get the request body
     *
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * Create a new request with the given headers
     *
     * @param array<string,string> $headers
     * @return self
     */
    public function withHeaders(array $headers): self
    {
        $clone = clone $this;
        $clone->headers = array_merge($this->headers, $headers);

        return $clone;
    }

    /**
     * Create a new request with the given body
     *
     * @param string|null $body
     * @return self
     */
    public function withBody(?string $body): self
    {
        $clone = clone $this;
        $clone->body = $body;

        return $clone;
    }

    /**
     * Create a GET request
     *
     * @param string $url
     * @param array<string,string> $headers
     * @return self
     */
    public static function get(string $url, array $headers = []): self
    {
        return new self('GET', $url, $headers);
    }

    /**
     * Create a POST request
     *
     * @param string                                      $url
     * @param array<string,string>                        $headers
     * @param string|null                                 $body
     * @param \Raza\PHPImpersonate\Proxy\ProxyConfig|null $proxyConfig
     *
     * @return self
     */
    public static function post(string $url, array $headers = [], ?string $body = null, ?ProxyConfig $proxyConfig): self
    {
        return new self('POST', $url, $headers, $body, $proxyConfig);
    }

    /**
     * Create a HEAD request
     *
     * @param string $url
     * @param array<string,string> $headers
     * @return self
     */
    public static function head(string $url, array $headers = []): self
    {
        return new self('HEAD', $url, $headers);
    }

    /**
     * Create a DELETE request
     *
     * @param string $url
     * @param array<string,string> $headers
     * @return self
     */
    public static function delete(string $url, array $headers = []): self
    {
        return new self('DELETE', $url, $headers);
    }

    /**
     * Create a PATCH request
     *
     * @param string                                      $url
     * @param array<string,string>                        $headers
     * @param string|null                                 $body
     * @param \Raza\PHPImpersonate\Proxy\ProxyConfig|null $proxyConfig
     *
     * @return self
     */
    public static function patch(string $url, array $headers = [], ?string $body = null, ?ProxyConfig $proxyConfig): self
    {
        return new self('PATCH', $url, $headers, $body, $proxyConfig);
    }

    /**
     * Create a PUT request
     *
     * @param string                                      $url
     * @param array<string,string>                        $headers
     * @param string|null                                 $body
     * @param \Raza\PHPImpersonate\Proxy\ProxyConfig|null $proxyConfig
     *
     * @return self
     */
    public static function put(string $url, array $headers = [], ?string $body = null, ?ProxyConfig $proxyConfig): self
    {
        return new self('PUT', $url, $headers, $body, $proxyConfig);
    }

    /**
     * @return \Raza\PHPImpersonate\Proxy\ProxyConfig|null
     */
    public function getProxyConfig(): ?ProxyConfig
    {
        return $this->proxyConfig;
    }
}
