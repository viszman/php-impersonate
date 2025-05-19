<?php

namespace Raza\PHPImpersonate\Browser;

interface BrowserInterface
{
    public const CHROME_99 = 'chrome99';
    public const CHROME_99_ANDROID = 'chrome99_android';
    public const CHROME_100 = 'chrome100';
    public const CHROME_101 = 'chrome101';
    public const CHROME_104 = 'chrome104';
    public const CHROME_107 = 'chrome107';
    public const CHROME_110 = 'chrome110';
    public const CHROME_116 = 'chrome116';
    public const EDGE_99 = 'edge99';
    public const EDGE_101 = 'edge101';
    public const FF_91_ESR = 'ff91esr';
    public const FF_95 = 'ff95';
    public const FF_98 = 'ff98';
    public const FF_100 = 'ff100';
    public const FF_102 = 'ff102';
    public const FF_109 = 'ff109';
    public const FF_117 = 'ff117';
    public const SAFARI_15_3 = 'safari15_3';
    public const SAFARI_15_5 = 'safari15_5';

    /**
     * Get the browser executable path
     *
     * @return string
     */
    public function getExecutablePath(): string;

    /**
     * Get the browser name
     *
     * @return string
     */
    public function getName(): string;
}
