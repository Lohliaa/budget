<?php

namespace App\Imports;

use App\Models\Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HomeImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    public function model(array $row)
    {
        $role = Auth::id();

        return new Home([
            "section" => $row['section'],
            "code" => $row['code'],
            "nama" => $row['nama'],
            "kode_budget" => $row['kode_budget'],
            "cur" => $row['cur'],
            "qty" => $row['qty'],
            "price" => $row['price'],
            "order_plan" => $row['order_plan'],
            "delivery_plan" => $row['delivery_plan'],
            "fixed" => $row['fixed'],
            "prep" => $row['prep'],
            "kode_carline" => $row['kode_carline'],
            "remark" => $row['remark'],
            "role_id" => $role,
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
