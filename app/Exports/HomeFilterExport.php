<?php

namespace App\Exports;
// app/Exports/YourExportClass.php

use App\Models\Home;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class HomeFilterExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithMultipleSheets
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
                'section' => $item['section'],
                'code' => $item['code'],
                'nama' => $item['nama'],
                'kode_budget' => $item['kode_budget'],
                'cur' => $item['cur'],
                'fixed' => $item['fixed'],
                'prep' => $item['prep'],
                'kode_carline' => $item['kode_carline'],
                'remark' => $item['remark'],
                'qty_jul' => $item['qty_jul'],
                'price_jul' => $item['price_jul'],
                'amount_jul' => $item['amount_jul'],
                'qty_aug' => $item['qty_aug'],
                'price_aug' => $item['price_aug'],
                'amount_aug' => $item['amount_aug'],
                'qty_sep' => $item['qty_sep'],
                'price_sep' => $item['price_sep'],
                'amount_sep' => $item['amount_sep'],
                'qty_okt' => $item['qty_okt'],
                'price_okt' => $item['price_okt'],
                'amount_okt' => $item['amount_okt'],
                'qty_nov' => $item['qty_nov'],
                'price_nov' => $item['price_nov'],
                'amount_nov' => $item['amount_nov'],
                'qty_dec' => $item['qty_dec'],
                'price_dec' => $item['price_dec'],
                'amount_dec' => $item['amount_dec'],
                'qty_jan' => $item['qty_jan'],
                'price_jan' => $item['price_jan'],
                'amount_jan' => $item['amount_jan'],
                'qty_feb' => $item['qty_feb'],
                'price_feb' => $item['price_feb'],
                'amount_feb' => $item['amount_feb'],
                'qty_mar' => $item['qty_mar'],
                'price_mar' => $item['price_mar'],
                'amount_mar' => $item['amount_mar'],
                'qty_apr' => $item['qty_apr'],
                'price_apr' => $item['price_apr'],
                'amount_apr' => $item['amount_apr'],
                'qty_may' => $item['qty_may'],
                'price_may' => $item['price_may'],
                'amount_may' => $item['amount_may'],
                'qty_jun' => $item['qty_jun'],
                'price_jun' => $item['price_jun'],
                'amount_jun' => $item['amount_jun'],
            ];
        });

        return $filteredData;
    }

    public function headings(): array
    {
        return [
            'tahun',
            'section',
            'code',
            'nama',
            'kode_budget',
            'cur',
            'fixed',
            'prep',
            'kode_carline',
            'remark',
            'qty_jul',
            'price_jul',
            'amount_jul',
            'qty_aug',
            'price_aug',
            'amount_aug',
            'qty_sep',
            'price_sep',
            'amount_sep',
            'qty_okt',
            'price_okt',
            'amount_okt',
            'qty_nov',
            'price_nov',
            'amount_nov',
            'qty_dec',
            'price_dec',
            'amount_dec',
            'qty_jan',
            'price_jan',
            'amount_jan',
            'qty_feb',
            'price_feb',
            'amount_feb',
            'qty_mar',
            'price_mar',
            'amount_mar',
            'qty_apr',
            'price_apr',
            'amount_apr',
            'qty_may',
            'price_may',
            'amount_may',
            'qty_jun',
            'price_jun',
            'amount_jun',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function sheets(): array
    {
        $sheets = [
            'Sheet 1' => new HomeFilterExport($this->data),
            'Sheet 2' => new SheetDua($this->data),
            'Sheet 3' => new SheetTiga($this->data),
            'Sheet 4' => new SheetEmpat($this->data),
            'Sheet 5' => new SheetLima($this->data),
        ];

        return $sheets;
    }
}

class SheetDua implements FromCollection, WithHeadings, WithStyles, WithTitle, ShouldAutoSize
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
                'section' => $item['section'],
                'code' => $item['code'],
                'nama' => $item['nama'],
                'qty_jul' => $item['qty_jul'],
                'price_jul' => $item['price_jul'],
                'amount_jul' => $item['amount_jul'],
                'qty_aug' => $item['qty_aug'],
                'price_aug' => $item['price_aug'],
                'amount_aug' => $item['amount_aug'],
                'qty_sep' => $item['qty_sep'],
                'price_sep' => $item['price_sep'],
                'amount_sep' => $item['amount_sep'],
                'qty_okt' => $item['qty_okt'],
                'price_okt' => $item['price_okt'],
                'amount_okt' => $item['amount_okt'],
                'qty_nov' => $item['qty_nov'],
                'price_nov' => $item['price_nov'],
                'amount_nov' => $item['amount_nov'],
                'qty_dec' => $item['qty_dec'],
                'price_dec' => $item['price_dec'],
                'amount_dec' => $item['amount_dec'],
                'qty_jan' => $item['qty_jan'],
                'price_jan' => $item['price_jan'],
                'amount_jan' => $item['amount_jan'],
                'qty_feb' => $item['qty_feb'],
                'price_feb' => $item['price_feb'],
                'amount_feb' => $item['amount_feb'],
                'qty_mar' => $item['qty_mar'],
                'price_mar' => $item['price_mar'],
                'amount_mar' => $item['amount_mar'],
                'qty_apr' => $item['qty_apr'],
                'price_apr' => $item['price_apr'],
                'amount_apr' => $item['amount_apr'],
                'qty_may' => $item['qty_may'],
                'price_may' => $item['price_may'],
                'amount_may' => $item['amount_may'],
                'qty_jun' => $item['qty_jun'],
                'price_jun' => $item['price_jun'],
                'amount_jun' => $item['amount_jun'],
            ];
        });

        return $filteredData;
    }

    public function headings(): array
    {
        return [
            'tahun',
            'section',
            'code',
            'nama',
            'qty_jul',
            'price_jul',
            'amount_jul',
            'qty_aug',
            'price_aug',
            'amount_aug',
            'qty_sep',
            'price_sep',
            'amount_sep',
            'qty_okt',
            'price_okt',
            'amount_okt',
            'qty_nov',
            'price_nov',
            'amount_nov',
            'qty_dec',
            'price_dec',
            'amount_dec',
            'qty_jan',
            'price_jan',
            'amount_jan',
            'qty_feb',
            'price_feb',
            'amount_feb',
            'qty_mar',
            'price_mar',
            'amount_mar',
            'qty_apr',
            'price_apr',
            'amount_apr',
            'qty_may',
            'price_may',
            'amount_may',
            'qty_jun',
            'price_jun',
            'amount_jun',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function title(): string
    {
        return 'Sheet 2';
    }
}

class SheetTiga implements FromCollection, WithHeadings, WithStyles, WithTitle, ShouldAutoSize
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
                'section' => $item['section'],
                'kode_budget' => $item['kode_budget'],
                'qty_jul' => $item['qty_jul'],
                'price_jul' => $item['price_jul'],
                'amount_jul' => $item['amount_jul'],
                'qty_aug' => $item['qty_aug'],
                'price_aug' => $item['price_aug'],
                'amount_aug' => $item['amount_aug'],
                'qty_sep' => $item['qty_sep'],
                'price_sep' => $item['price_sep'],
                'amount_sep' => $item['amount_sep'],
                'qty_okt' => $item['qty_okt'],
                'price_okt' => $item['price_okt'],
                'amount_okt' => $item['amount_okt'],
                'qty_nov' => $item['qty_nov'],
                'price_nov' => $item['price_nov'],
                'amount_nov' => $item['amount_nov'],
                'qty_dec' => $item['qty_dec'],
                'price_dec' => $item['price_dec'],
                'amount_dec' => $item['amount_dec'],
                'qty_jan' => $item['qty_jan'],
                'price_jan' => $item['price_jan'],
                'amount_jan' => $item['amount_jan'],
                'qty_feb' => $item['qty_feb'],
                'price_feb' => $item['price_feb'],
                'amount_feb' => $item['amount_feb'],
                'qty_mar' => $item['qty_mar'],
                'price_mar' => $item['price_mar'],
                'amount_mar' => $item['amount_mar'],
                'qty_apr' => $item['qty_apr'],
                'price_apr' => $item['price_apr'],
                'amount_apr' => $item['amount_apr'],
                'qty_may' => $item['qty_may'],
                'price_may' => $item['price_may'],
                'amount_may' => $item['amount_may'],
                'qty_jun' => $item['qty_jun'],
                'price_jun' => $item['price_jun'],
                'amount_jun' => $item['amount_jun'],
            ];
        });

        return $filteredData;
    }

    public function headings(): array
    {
        return [
            'tahun',
            'section',
            'kode budget',
            'qty_jul',
            'price_jul',
            'amount_jul',
            'qty_aug',
            'price_aug',
            'amount_aug',
            'qty_sep',
            'price_sep',
            'amount_sep',
            'qty_okt',
            'price_okt',
            'amount_okt',
            'qty_nov',
            'price_nov',
            'amount_nov',
            'qty_dec',
            'price_dec',
            'amount_dec',
            'qty_jan',
            'price_jan',
            'amount_jan',
            'qty_feb',
            'price_feb',
            'amount_feb',
            'qty_mar',
            'price_mar',
            'amount_mar',
            'qty_apr',
            'price_apr',
            'amount_apr',
            'qty_may',
            'price_may',
            'amount_may',
            'qty_jun',
            'price_jun',
            'amount_jun',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function title(): string
    {
        return 'Sheet 3';
    }
}

class SheetEmpat implements FromCollection, WithHeadings, WithStyles, WithTitle, ShouldAutoSize
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
                'section' => $item['section'],
                'fixed' => $item['fixed'],
                'qty_jul' => $item['qty_jul'],
                'price_jul' => $item['price_jul'],
                'amount_jul' => $item['amount_jul'],
                'qty_aug' => $item['qty_aug'],
                'price_aug' => $item['price_aug'],
                'amount_aug' => $item['amount_aug'],
                'qty_sep' => $item['qty_sep'],
                'price_sep' => $item['price_sep'],
                'amount_sep' => $item['amount_sep'],
                'qty_okt' => $item['qty_okt'],
                'price_okt' => $item['price_okt'],
                'amount_okt' => $item['amount_okt'],
                'qty_nov' => $item['qty_nov'],
                'price_nov' => $item['price_nov'],
                'amount_nov' => $item['amount_nov'],
                'qty_dec' => $item['qty_dec'],
                'price_dec' => $item['price_dec'],
                'amount_dec' => $item['amount_dec'],
                'qty_jan' => $item['qty_jan'],
                'price_jan' => $item['price_jan'],
                'amount_jan' => $item['amount_jan'],
                'qty_feb' => $item['qty_feb'],
                'price_feb' => $item['price_feb'],
                'amount_feb' => $item['amount_feb'],
                'qty_mar' => $item['qty_mar'],
                'price_mar' => $item['price_mar'],
                'amount_mar' => $item['amount_mar'],
                'qty_apr' => $item['qty_apr'],
                'price_apr' => $item['price_apr'],
                'amount_apr' => $item['amount_apr'],
                'qty_may' => $item['qty_may'],
                'price_may' => $item['price_may'],
                'amount_may' => $item['amount_may'],
                'qty_jun' => $item['qty_jun'],
                'price_jun' => $item['price_jun'],
                'amount_jun' => $item['amount_jun'],
            ];
        });

        return $filteredData;
    }

    public function headings(): array
    {
        return [
            'tahun',
            'section',
            'fixed/variabel',
            'qty_jul',
            'price_jul',
            'amount_jul',
            'qty_aug',
            'price_aug',
            'amount_aug',
            'qty_sep',
            'price_sep',
            'amount_sep',
            'qty_okt',
            'price_okt',
            'amount_okt',
            'qty_nov',
            'price_nov',
            'amount_nov',
            'qty_dec',
            'price_dec',
            'amount_dec',
            'qty_jan',
            'price_jan',
            'amount_jan',
            'qty_feb',
            'price_feb',
            'amount_feb',
            'qty_mar',
            'price_mar',
            'amount_mar',
            'qty_apr',
            'price_apr',
            'amount_apr',
            'qty_may',
            'price_may',
            'amount_may',
            'qty_jun',
            'price_jun',
            'amount_jun',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function title(): string
    {
        return 'Sheet 4';
    }
}

class SheetLima implements FromCollection, WithHeadings, WithStyles, WithTitle, ShouldAutoSize
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
                'section' => $item['section'],
                'prep' => $item['prep'],
                'kode_carline' => $item['kode_carline'],
                'qty_jul' => $item['qty_jul'],
                'price_jul' => $item['price_jul'],
                'amount_jul' => $item['amount_jul'],
                'qty_aug' => $item['qty_aug'],
                'price_aug' => $item['price_aug'],
                'amount_aug' => $item['amount_aug'],
                'qty_sep' => $item['qty_sep'],
                'price_sep' => $item['price_sep'],
                'amount_sep' => $item['amount_sep'],
                'qty_okt' => $item['qty_okt'],
                'price_okt' => $item['price_okt'],
                'amount_okt' => $item['amount_okt'],
                'qty_nov' => $item['qty_nov'],
                'price_nov' => $item['price_nov'],
                'amount_nov' => $item['amount_nov'],
                'qty_dec' => $item['qty_dec'],
                'price_dec' => $item['price_dec'],
                'amount_dec' => $item['amount_dec'],
                'qty_jan' => $item['qty_jan'],
                'price_jan' => $item['price_jan'],
                'amount_jan' => $item['amount_jan'],
                'qty_feb' => $item['qty_feb'],
                'price_feb' => $item['price_feb'],
                'amount_feb' => $item['amount_feb'],
                'qty_mar' => $item['qty_mar'],
                'price_mar' => $item['price_mar'],
                'amount_mar' => $item['amount_mar'],
                'qty_apr' => $item['qty_apr'],
                'price_apr' => $item['price_apr'],
                'amount_apr' => $item['amount_apr'],
                'qty_may' => $item['qty_may'],
                'price_may' => $item['price_may'],
                'amount_may' => $item['amount_may'],
                'qty_jun' => $item['qty_jun'],
                'price_jun' => $item['price_jun'],
                'amount_jun' => $item['amount_jun'],
            ];
        });

        return $filteredData;
    }

    public function headings(): array
    {
        return [
            'tahun',
            'section',
            'prep/masspro',
            'kode carline',
            'qty_jul',
            'price_jul',
            'amount_jul',
            'qty_aug',
            'price_aug',
            'amount_aug',
            'qty_sep',
            'price_sep',
            'amount_sep',
            'qty_okt',
            'price_okt',
            'amount_okt',
            'qty_nov',
            'price_nov',
            'amount_nov',
            'qty_dec',
            'price_dec',
            'amount_dec',
            'qty_jan',
            'price_jan',
            'amount_jan',
            'qty_feb',
            'price_feb',
            'amount_feb',
            'qty_mar',
            'price_mar',
            'amount_mar',
            'qty_apr',
            'price_apr',
            'amount_apr',
            'qty_may',
            'price_may',
            'amount_may',
            'qty_jun',
            'price_jun',
            'amount_jun',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function title(): string
    {
        return 'Sheet 5';
    }
}