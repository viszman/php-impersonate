<?php

namespace Raza\PHPImpersonate\Browser;

use RuntimeException;

class Browser implements BrowserInterface
{
    private string $executablePath;

    /**
     * @param string $name Browser name (e.g., 'chrome99_android')
     * @throws RuntimeException If the browser is not found
     */
    public function __construct(
        private string $name
    ) {
        $this->resolveExecutablePath();
    }

    /**
     * @inheritDoc
     */
    public function getExecutablePath(): string
    {
        return $this->executablePath;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    public static function getImpersonateBrowsers(): array
    {
        $reflection = new \ReflectionClass(self::class);

        return $reflection->getConstants();
    }

    /**
     * Resolve the executable path for the browser
     *
     * @throws RuntimeException If the browser is not found
     */
    private function resolveExecutablePath(): void
    {
        $rootPath = getcwd();
        $paths = [
            // Package bin directory
            "$rootPath/bin/curl_{$this->name}",
            // Vendor bin directory
            "$rootPath/vendor/bin/curl_{$this->name}",
            // Absolute system path
            "/usr/local/bin/curl_{$this->name}",
            // Check if it's in PATH
            "curl_{$this->name}",
        ];

        foreach ($paths as $path) {
            // For absolute paths, check if file exists
            if (str_starts_with($path, '/') && file_exists($path) && is_executable($path)) {
                $this->executablePath = $path;

                return;
            }

            // For PATH-based executables, use 'which' command
            if (! str_starts_with($path, '/')) {
                $result = shell_exec("which $path 2>/dev/null");
                if ($result && trim($result) && file_exists(trim($result))) {
                    $this->executablePath = trim($result);

                    return;
                }
            }
        }

        throw new RuntimeException("Browser '{$this->name}' not supported - executable not found. Checked paths: " . implode(", ", $paths));
    }
}
