<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Division extends MathOperations
{
    public function calculate()
    {
        $this->operands = array_diff($this->operands, array(0));

        if (count($this->operands) === 0)
        {
            throw new NoOperandsException;
        }
        else
        {
            return array_reduce($this->operands, function ($a, $b)
            {
                if ($a !== NULL && $b !== NULL)
                {
                    return $a / $b;
                }
                
                return $b;
            }
        );
        }
    }
}