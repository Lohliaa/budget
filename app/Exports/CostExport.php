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
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CostExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithChunkReading
{
    public function collection()
    {
        $type = FacadesDB::table('cost')->select(
            'cost_center',
            'detail_cost_center'
        )
            ->get();
        return $type;
    }
    public function headings(): array
    {
        return [
            'cost_center',
            'detail_cost_center'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function chunkSize(): int
    {
        return 2000;
    }
}
