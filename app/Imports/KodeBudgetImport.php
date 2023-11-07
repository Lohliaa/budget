<?php

namespace App\Imports;

use App\Models\KodeBudget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KodeBudgetImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    public function model(array $row)
    {
        return new KodeBudget([
            "kode_budget" => $row['kode_budget'],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
