<?php

namespace App\Imports;

use App\Models\Cost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CostImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    public function model(array $row)
    {
        return new Cost([
            "cost_center" => $row['cost_center'],
            "detail_cost_center" => $row['detail_cost_center'],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
