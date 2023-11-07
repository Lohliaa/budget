<?php

namespace App\Imports;

use App\Models\Carline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CarlineImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    public function model(array $row)
    {
        return new Carline([
            "destination_ppc" => $row['destination_ppc'],
            "hfm_carline" => $row['hfm_carline'],
            "model_year" => $row['model_year'],
            "kode" => $row['kode'],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
