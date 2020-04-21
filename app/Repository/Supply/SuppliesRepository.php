<?php

namespace App\Repository\Supply;

use App\Models\Supply;
use App\Repository\BaseRepository;

class SuppliesRepository extends BaseRepository
{

    /**
     * Configure the Model
     *
     **/
    public function model()
    {
        return Supply::class;
    }



}
