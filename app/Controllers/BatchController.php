<?php declare(strict_types=1);	
    
    namespace App\Controllers;
    use App\Models\Batch;

    class BatchController
    {
        private $batch;

        function __construct(Batch $batch)
        {
            $this->batch = $batch;
        }

        /*
        |--------------------------------------------------------------------------
        | Create a new Batch record calling the related Model
        |--------------------------------------------------------------------------
        */
        public function create():void
        {
            $this->batch->startBatch();
        }

        public function closeBatch()
        {
            
        }
    }