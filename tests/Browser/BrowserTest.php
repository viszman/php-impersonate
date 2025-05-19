<?php

namespace Raza\PHPImpersonate\Tests\Browser;

use Raza\PHPImpersonate\Browser\Browser;
use PHPUnit\Framework\TestCase;

class BrowserTest extends TestCase
{

    public function testGetBrowsers()
    {
        $browsers = Browser::getImpersonateBrowsers();
        $browsersStrings = [
            'CHROME_99' => 'chrome99',
            'CHROME_99_ANDROID' => 'chrome99_android',
            'CHROME_100' => 'chrome100',
            'CHROME_101' => 'chrome101',
            'CHROME_104' => 'chrome104',
            'CHROME_107' => 'chrome107',
            'CHROME_110' => 'chrome110',
            'CHROME_116' => 'chrome116',
            'EDGE_99' => 'edge99',
            'EDGE_101' => 'edge101',
            'FF_91_ESR' => 'ff91esr',
            'FF_95' => 'ff95',
            'FF_98' => 'ff98',
            'FF_100' => 'ff100',
            'FF_102' => 'ff102',
            'FF_109' => 'ff109',
            'FF_117' => 'ff117',
            'SAFARI_15_3' => 'safari15_3',
            'SAFARI_15_5' => 'safari15_5',
        ];
        foreach ($browsers as $index => $binPath) {
            $this->assertContains($browsersStrings[$index], $browsers);
        }
    }
}
