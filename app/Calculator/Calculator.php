<?php

namespace App\Calculator;

class Calculator 
{
    protected $operations = [];

    public function setOperation($operation) : void
    {
        array_push($this->operations, $operation);
    }

    public function setOperations(array $operations = []) : void
    {
        $operations = array_filter($operations, fn($operation) => $operation instanceof MathOperations);

        $this->operations = array_merge($this->operations, $operations);
    }

    public function getOperations() : array
    {
        return $this->operations;
    }

    public function calculate()
    
    {
        if (count($this->operations) > 1)
        {
            $results = array_map(fn($operation) => $operation->calculate(), $this->operations);

            return $results;
        }
        
        return $this->operations[0]->calculate();
    }
}
