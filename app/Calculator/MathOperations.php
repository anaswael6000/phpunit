<?php

namespace App\Calculator;

abstract class MathOperations
{
    protected $operands = [];

    public function setOperands(array $operands = []) : void
    {
        $this->operands = $operands;
    }

    abstract public function calculate();
}