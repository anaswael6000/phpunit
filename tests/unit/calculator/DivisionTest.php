<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    protected $division;

    public function setUp(): void 
    {
        $this->division = new App\Calculator\Division();
    }

    public function tearDown(): void
    {
        unset($this->division);
    }

    public function testDividesGivenOperands()
    {
        $this->division->setOperands([100,2,2]);

        $this->assertEquals(25, $this->division->calculate());
    }

    public function testExceptionIsThrowWhenNOOperandsAreProvided()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $this->division->calculate();
    }

    public function testThatCalculateIgnoresDivisionByZero()
    {
        $this->division->setOperands([100,0,0,2,0]);
        
        $this->assertEquals(50, $this->division->calculate());
    }
}