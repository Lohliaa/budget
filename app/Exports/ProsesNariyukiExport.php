<?php

namespace App\Exports;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProsesNariyukiExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        $role = Auth::user()->role;

        if ($role === 'Admin'){
            $type = DB::table('proses_nariyuki')->select(
                'month',
                'section',
                'kode_budget',
                'fixed',
                'umh',
                'amount',
                'new_umh',
                'new_amount',
            )
            ->get();
        } else {
            $type = DB::table('proses_nariyuki')->select(
                'month',
                'section',
                'kode_budget',
                'fixed',
                'umh',
                'amount',
                'new_umh',
                'new_amount',
            )
            ->where('section', $role)
            ->get();
        }

        return $type;
    }

    public function headings(): array
    {
        return [
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