<?php

namespace App\Imports;

use App\Models\Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class HomeImport implements ToModel, WithHeadingRow, WithBatchInserts, WithValidation
{
    protected $errors = [];
    private $tahun;
    private $user;
    private $row = 0;
    private $columnNames = []; // Array to store column names associated with failures

    public function rules(): array
    {
        return [
            'code' => ['required', Rule::exists('master_barang', 'code')],
            'name' => ['required', Rule::exists('master_barang', 'name')],
            'kode_budget' => ['required', Rule::exists('kode_budget', 'kode_budget')],
            'kode_carline' => ['required', Rule::exists('carline', 'kode')],
            // Add more rules as needed
        ];
    }

    public function __construct($tahun, $user)
    {
        $this->tahun = $tahun;
        $this->user = $user;
    }

    public function model(array $row)
    {
        // Misalkan kolom 'bulan' dan 'tahun' ada di file Excel
        $bulan = now()->month;
        $tahunSekarang = now()->year;
        $tahunDepan = now()->addYear()->year;

        if (
            ($bulan >= 7 && $bulan <= 12 && $this->tahun == $tahunSekarang) ||
            ($bulan >= 1 && $bulan <= 6 && $this->tahun == $tahunDepan)
        ) {
            $this->row++;
            $this->columnNames = array_keys($row); // Store column names for the current row

            $role = $this->user->role;
            $section = auth()->user()->role;
            $tahun = $this->tahun;
            return new Home([
                "tahun" => $tahun,
                "section" => $section,
                "code" => $row['code'],
                "nama" => $row['name'],
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
        return null;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function onError(Throwable $e)
    {
        $this->errors[] = $e->getMessage();
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
    public function withValidation($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->any()) {
                $this->errors[] = $validator->errors()->all();
            }
        });
    }
}
