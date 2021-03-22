<?php declare(strict_types=1);	
    
    namespace App\Models;
    use App\lib\Database\DB;

    class Batch
    {
        private $db;

        function __construct(DB $db)
        {
            $this->db = $db;
        }

        /*
        |--------------------------------------------------------------------------
        | Create a new Batch record using the current date
        |--------------------------------------------------------------------------
        */
        public function startBatch()
        {
            $values = [
                'date' => date("Y-m-d"),
            ];
            $batch = $this->db
        				->table('batches')
						->create($values);
        }

        /*
        |--------------------------------------------------------------------------
        | It returns the id of the current Batch
        |--------------------------------------------------------------------------
        */
        public function getCurrentBatch():int
        {
            $currentBatch = $this->db->table('batches')
						->select(['id'])
						->where('date','=', date("Y-m-d"))
						->get();

            return $currentBatch;
        }

    }