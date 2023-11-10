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
            "fixed" => $row['fixed_variabel'],
            "prep" => $row['prep_masspro'],
            "kode_carline" => $row['kode_carline'],
            "remark" => $row['remark'],
            "qty_jul" => $row['qty_jul'],
            "price_jul" => $row['price_jul'],
            "amount_jul" => $row['amount_jul'],
            "qty_aug" => $row['qty_aug'],
            "price_aug" => $row['price_aug'],
            "amount_aug" => $row['amount_aug'],
            "qty_sep" => $row['qty_sep'],
            "price_sep" => $row['price_sep'],
            "amount_sep" => $row['amount_sep'],
            "qty_okt" => $row['qty_okt'],
            "price_okt" => $row['price_okt'],
            "amount_okt" => $row['amount_okt'],
            "qty_nov" => $row['qty_nov'],
            "price_nov" => $row['price_nov'],
            "amount_nov" => $row['amount_nov'],
            "qty_dec" => $row['qty_dec'],
            "price_dec" => $row['price_dec'],
            "amount_dec" => $row['amount_dec'],
            "qty_jan" => $row['qty_jan'],
            "price_jan" => $row['price_jan'],
            "amount_jan" => $row['amount_jan'],
            "qty_feb" => $row['qty_feb'],
            "price_feb" => $row['price_feb'],
            "amount_feb" => $row['amount_feb'],
            "qty_mar" => $row['qty_mar'],
            "price_mar" => $row['price_mar'],
            "amount_mar" => $row['amount_mar'],
            "qty_apr" => $row['qty_apr'],
            "price_apr" => $row['price_apr'],
            "amount_apr" => $row['amount_apr'],
            "qty_may" => $row['qty_may'],
            "price_may" => $row['price_may'],
            "amount_may" => $row['amount_may'],
            "qty_jun" => $row['qty_jun'],
            "price_jun" => $row['price_jun'],
            "amount_jun" => $row['amount_jun'],
            "role_id" => $role,
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
