<?php declare(strict_types = 1);

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Depends;

class AdditionTest extends TestCase
{
    protected $addition;

    public function setUp(): void
    {
        $this->addition = new App\Calculator\Addition();
    }

    public function tearDown(): void
    {
        unset($this->addition);
    }

    public static function AdditionDataProvider()
    {
        return array([4, 10, 14], [-35, 100, 65]);
    }

    #[DataProvider('AdditionDataProvider')]
    public function testAddition($x, $y, $expected)
    {
        $this->addition->setOperands([$x, $y]);

        $this->assertEquals($expected, $this->addition->calculate());

    }

    public function test1()
    {
        $this->addition->setOperands([1, 5]);
        $this->assertEquals(6, $this->addition->calculate());

        return 6;
    }

    #[Depends('test1')]
    public function test2($x)
    {
        $this->addition->setOperands([$x, 5]);
        $this->assertEquals(11, $this->addition->calculate());

        return 11;
    }

    #[Depends('test1')]
    #[Depends('test2')]
    public function test3($x, $y)
    {
        $this->addition->setOperands([$x, $y]);
        $this->assertEquals(17, $this->addition->calculate());
    }

    public function testExceptionIsThrowWhenNoOperandsAreProvided()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $this->addition->calculate();
    }
}
