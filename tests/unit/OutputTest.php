<?php

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class OutputTest extends TestCase
{
    public function testOutputStringIsCorrect()
    {
        $this->expectOutputString("foo");

        echo "foo";
    }

    public function testOutputMatchesRegex()
    {
        $this->expectOutputRegex("/\d+Hello/");

        echo "12345Hello";
    }

}
