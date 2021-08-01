<?php

class RobertClass
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function execute($toPlus)
    {
        echo $toPlus + $this->number;
    }


}