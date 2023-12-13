<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;

class MasterBarangExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $type = FacadesDB::table('master_barang')->select(
            'code',
            'name',
            'satuan',
            'account_1',
            'account_2',
            'account_3',
            'account_4',
            'account_5',
            'account_6',
            'account_7',
            'account_8',
            'account_9',
            'account_10',
        )
        ->get();
        return $type;
    }
    public function headings(): array
    {
        return [
            'code',
        'name',
        'satuan',
        'account_1',
        'account_2',
        'account_3',
        'account_4',
        'account_5',
        'account_6',
        'account_7',
        'account_8',
        'account_9',
        'account_10',
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