<?php

namespace App\Imports;

use App\Models\MasterBarang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MasterBarangImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    public function model(array $row)
    {
        return new MasterBarang([
            "code" => $row['code'],
            "name" => $row['name'],
            "satuan" => $row['satuan'],
            "account_1" => $row['account_1'],
            "account_2" => $row['account_2'],
            "account_3" => $row['account_3'],
            "account_4" => $row['account_4'],
            "account_5" => $row['account_5'],
            "account_6" => $row['account_6'],
            "account_7" => $row['account_7'],
            "account_8" => $row['account_8'],
            "account_9" => $row['account_9'],
            "account_10" => $row['account_10']
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
