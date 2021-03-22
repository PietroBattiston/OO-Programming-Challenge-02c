<?php declare(strict_types=1);	
    
    namespace App\Controllers;
    use App\Models\Consignment;
    use App\Interfaces\CourierInterface;


    class ConsignmentController
    {
        private $consignment;
        private $courier;

        function __construct(Consignment $consignment, CourierInterface $courier)
        {
            $this->consignment = $consignment;
            $this->courier = $courier;

        }

        /*
        |--------------------------------------------------------------------------
        | Create a new Consignment record calling the related Model.
        |--------------------------------------------------------------------------
        | Before creating the record with obtain the Unique Identifier Number related to
        | the choosen Courier.
        |
        */
        public function create():void
        {
            $uniqueNumber = $this->getUniqueNumber($this->courier);
            $this->consignment->createConsignment($uniqueNumber,$this->courier->id);
        }

         /*
        |--------------------------------------------------------------------------
        | Get an array containing all the Consignments of the day
        |--------------------------------------------------------------------------
        */
        private function getCurrentConsignments():array
        {
            return $this->consignment->getCurrentConsignments();
        }


         /*
        |--------------------------------------------------------------------------
        | Get the unique number. The class injected must implements CourierNumberInterface
        |--------------------------------------------------------------------------
        */
        private function getUniqueNumber($courier):string
        {
            return $courier->getIdentifier();
        }
    }