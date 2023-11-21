<?php

namespace App\Exports;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProsesNariyukiExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $filteredData = $this->data->map(function ($item) {
            return [
                'tahun' => $item['tahun'],
                'month' => $item['month'],
                'section' => $item['section'],
                'kode_budget' => $item['kode_budget'],
                'fixed' => $item['fixed'],
                'umh' => $item['umh'],
                'amount' => $item['amount'],
                'new_umh' => $item['new_umh'],
                'new_amount' => $item['new_amount'],
            ];
        });

        return $filteredData;
    }

    public function headings(): array
    {
        return [
            'tahun',
            'month',
            'section',
            'kode budget',
            'fixed/variabel',
            'umh',
            'amount',
            'new_umh',
            'new_amount',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}