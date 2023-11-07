<?php

namespace App\Imports;

use App\Models\UMH;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UMHImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    public function model(array $row)
    {
        return new UMH([
            "month" => $row['month'],
            "umh" => $row['umh'],
            "amount" => $row['amount'],
            "new_umh" => $row['new_umh'],
            "new_amount" => $row['new_amount'],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
