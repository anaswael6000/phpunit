<?php

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /** @test */
    public function can_set_single_operation()
    {
        $addition = new App\Calculator\Addition();
        $addition->setOperands([4, 10]);

        $calculator = new App\Calculator\Calculator();
        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }

     /** @test */
    public function can_set_multiple_operations()
    {
        $addition1 = new App\Calculator\Addition();
        $addition1->setOperands([4, 10]);

        $addition2 = new App\Calculator\Addition();
        $addition2->setOperands([2, 3]);


        $calculator = new App\Calculator\Calculator();
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    /** @test */
    public function operations_are_ignored_if_not_instance_of_MathOperations()
    {
        $addition = new App\Calculator\Addition();
        $addition->setOperands([4, 10]);

        $calculator = new App\Calculator\Calculator();
        $calculator->setOperations([$addition, "cats", "dogs"]);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function can_calculate_result()
    {
        $addition = new App\Calculator\Addition();
        $addition->setOperands([4, 10]);

        $calculator = new App\Calculator\Calculator();
        $calculator->setOperation($addition);

        $this->assertEquals(14, $calculator->calculate());
    }

    /** @test */
    public function can_calcualte_multiple_results()
    {
        
        $addition = new App\Calculator\Addition();
        $addition->setOperands([4, 10]);
        
        $division = new App\Calculator\Division();
        $division->setOperands([10, 5]);

        $calculator = new App\Calculator\Calculator();
        $calculator->setOperations([$addition, $division]);

        $this->assertIsArray($calculator->calculate());
        $this->assertEquals(14, $calculator->calculate()[0]);
        $this->assertEquals(2, $calculator->calculate()[1]);
    }
}