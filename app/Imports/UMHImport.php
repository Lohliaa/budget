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
            "ltp_jul" => $row['ltp_jul'],
            "ltp_aug" => $row['ltp_aug'],
            "ltp_sep" => $row['ltp_sep'],
            "ltp_okt" => $row['ltp_okt'],
            "ltp_nov" => $row['ltp_nov'],
            "ltp_dec" => $row['ltp_dec'],
            "ltp_jan" => $row['ltp_jan'],
            "ltp_feb" => $row['ltp_feb'],
            "ltp_mar" => $row['ltp_mar'],
            "ltp_apr" => $row['ltp_apr'],
            "ltp_may" => $row['ltp_may'],
            "ltp_jun" => $row['ltp_jun'],

            "stp_jul" => $row['stp_jul'],
            "stp_aug" => $row['stp_aug'],
            "stp_sep" => $row['stp_sep'],
            "stp_okt" => $row['stp_okt'],
            "stp_nov" => $row['stp_nov'],
            "stp_dec" => $row['stp_dec'],
            "stp_jan" => $row['stp_jan'],
            "stp_feb" => $row['stp_feb'],
            "stp_mar" => $row['stp_mar'],
            "stp_apr" => $row['stp_apr'],
            "stp_may" => $row['stp_may'],
            "stp_jun" => $row['stp_jun'],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
