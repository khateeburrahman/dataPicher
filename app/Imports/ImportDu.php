<?php

namespace App\Imports;

use App\Models\Du;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class importDu implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        
        return new Du([
            'site_name'          => $row[1],
            'city'              => $row[2],
            'address'            => $row[3],
            'sharing_status'          => $row[4],
            'omo'                 => $row[5],
            'omo_id'            => $row[6],
            'latitude'              => $row[7],
            'longitude'          => $row[8]
        ]);
    }
}