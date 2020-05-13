<?php

namespace App\Imports;

use App\Ruangan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class RuanganImport implements ToCollection
{
    /**
     * @return int
     */
    public function startRow() : int
    {
        return 2;
    }
    /**
    * @param array $column
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $column)
    {
        return new Ruangan([
            'name'=> $column[1]
        ]);
    }
}
