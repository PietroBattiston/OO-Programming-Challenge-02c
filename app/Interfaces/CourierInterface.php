<?php declare(strict_types=1);	
    
    namespace App\Interfaces;

    Interface CourierInterface
    {
       public function getUniqueNumber():string;
       public function sendConsignments():bool;
    }