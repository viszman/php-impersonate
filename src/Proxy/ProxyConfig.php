<?php

namespace Raza\PHPImpersonate\Proxy;

class ProxyConfig
{
    public function __construct(private string $ip, private int $port, private string $username, private string $password)
    {

    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function __toString()
    {
        return '--proxy http://'.$this->username.':'.$this->password.'@'.$this->ip.':'.$this->port;
    }
}
