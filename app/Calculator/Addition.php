<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Addition extends MathOperations
{
    public function calculate()
    {
        if(count($this->operands) === 0){
            throw new NoOperandsException();
        }
        else{
            return array_sum($this->operands);
        }
    }
}