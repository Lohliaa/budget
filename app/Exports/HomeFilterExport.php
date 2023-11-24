<?php

namespace App\Exports;
// app/Exports/YourExportClass.php

use App\Models\Home;
use App\Models\UMH;
use Illuminate\Support\Facades\DB;
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
            'fixed/variabel',
            'prep/masspro',
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
            'Sheet 6' => new SheetEnam($this->data),
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
        return DB::table('home')
            ->select(
                'tahun',
                'section',
                'code',
                'nama',
                DB::raw('SUM(qty_jul) as qty_jul'),
                DB::raw('price_jul'),
                DB::raw('SUM(qty_jul * price_jul) as total_amount_jul'),
                DB::raw('SUM(qty_aug) as qty_aug'),
                DB::raw('price_aug'),
                DB::raw('SUM(qty_aug * price_aug) as total_amount_aug'),
                DB::raw('SUM(qty_sep) as qty_sep'),
                DB::raw('price_sep'),
                DB::raw('SUM(qty_sep * price_sep) as total_amount_sep'),
                DB::raw('SUM(qty_okt) as qty_okt'),
                DB::raw('price_okt'),
                DB::raw('SUM(qty_okt * price_okt) as total_amount_okt'),
                DB::raw('SUM(qty_nov) as qty_nov'),
                DB::raw('price_nov'),
                DB::raw('SUM(qty_nov * price_nov) as total_amount_nov'),
                DB::raw('SUM(qty_dec) as qty_dec'),
                DB::raw('price_dec'),
                DB::raw('SUM(qty_dec * price_dec) as total_amount_dec'),
                DB::raw('SUM(qty_jan) as qty_jan'),
                DB::raw('price_jan'),
                DB::raw('SUM(qty_jan * price_jan) as total_amount_jan'),
                DB::raw('SUM(qty_feb) as qty_feb'),
                DB::raw('price_feb'),
                DB::raw('SUM(qty_feb * price_feb) as total_amount_feb'),
                DB::raw('SUM(qty_mar) as qty_mar'),
                DB::raw('price_mar'),
                DB::raw('SUM(qty_mar * price_mar) as total_amount_mar'),
                DB::raw('SUM(qty_apr) as qty_apr'),
                DB::raw('price_apr'),
                DB::raw('SUM(qty_apr * price_apr) as total_amount_apr'),
                DB::raw('SUM(qty_may) as qty_may'),
                DB::raw('price_may'),
                DB::raw('SUM(qty_may * price_may) as total_amount_may'),
                DB::raw('SUM(qty_jun) as qty_jun'),
                DB::raw('price_jun'),
                DB::raw('SUM(qty_jun * price_jun) as total_amount_jun'),
            )
            ->groupBy(
                'tahun',
                'section',
                'code',
                'nama',
                'price_jul',
                'price_aug',
                'price_sep',
                'price_okt',
                'price_nov',
                'price_dec',
                'price_jan',
                'price_feb',
                'price_mar',
                'price_apr',
                'price_may',
                'price_jun',
            )
            ->get();
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
        return 'Percode';
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
        return DB::table('home')
            ->select(
                'tahun',
                'section',
                'kode_budget',
                DB::raw('SUM(qty_jul) as qty_jul'),
                DB::raw('SUM(amount_jul)'),
                DB::raw('SUM(qty_aug) as qty_aug'),
                DB::raw('SUM(amount_jul)'),
                DB::raw('SUM(qty_sep) as qty_sep'),
                DB::raw('SUM(amount_sep)'),
                DB::raw('SUM(qty_okt) as qty_okt'),
                DB::raw('SUM(amount_okt)'),
                DB::raw('SUM(qty_nov) as qty_nov'),
                DB::raw('SUM(amount_nov)'),
                DB::raw('SUM(qty_dec) as qty_dec'),
                DB::raw('SUM(amount_dec)'),
                DB::raw('SUM(qty_jan) as qty_jan'),
                DB::raw('SUM(amount_jan)'),
                DB::raw('SUM(qty_feb) as qty_feb'),
                DB::raw('SUM(amount_feb)'),
                DB::raw('SUM(qty_mar) as qty_mar'),
                DB::raw('SUM(amount_mar)'),
                DB::raw('SUM(qty_apr) as qty_apr'),
                DB::raw('SUM(amount_apr)'),
                DB::raw('SUM(qty_may) as qty_may'),
                DB::raw('SUM(amount_may)'),
                DB::raw('SUM(qty_jun) as qty_jun'),
                DB::raw('SUM(amount_jun)'),
            )
            ->groupBy(
                'tahun',
                'section',
                'kode_budget'

            )
            ->get();
    }

    public function headings(): array
    {
        return [
            'tahun',
            'section',
            'kode budget',
            'qty_jul',
            'amount_jul',
            'qty_aug',
            'amount_aug',
            'qty_sep',
            'amount_sep',
            'qty_okt',
            'amount_okt',
            'qty_nov',
            'amount_nov',
            'qty_dec',
            'amount_dec',
            'qty_jan',
            'amount_jan',
            'qty_feb',
            'amount_feb',
            'qty_mar',
            'amount_mar',
            'qty_apr',
            'amount_apr',
            'qty_may',
            'amount_may',
            'qty_jun',
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
        return 'Kode Budget';
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
        return DB::table('home')
            ->select(
                'tahun',
                'section',
                'fixed',
                DB::raw('SUM(qty_jul) as qty_jul'),
                DB::raw('SUM(amount_jul)'),
                DB::raw('SUM(qty_aug) as qty_aug'),
                DB::raw('SUM(amount_jul)'),
                DB::raw('SUM(qty_sep) as qty_sep'),
                DB::raw('SUM(amount_sep)'),
                DB::raw('SUM(qty_okt) as qty_okt'),
                DB::raw('SUM(amount_okt)'),
                DB::raw('SUM(qty_nov) as qty_nov'),
                DB::raw('SUM(amount_nov)'),
                DB::raw('SUM(qty_dec) as qty_dec'),
                DB::raw('SUM(amount_dec)'),
                DB::raw('SUM(qty_jan) as qty_jan'),
                DB::raw('SUM(amount_jan)'),
                DB::raw('SUM(qty_feb) as qty_feb'),
                DB::raw('SUM(amount_feb)'),
                DB::raw('SUM(qty_mar) as qty_mar'),
                DB::raw('SUM(amount_mar)'),
                DB::raw('SUM(qty_apr) as qty_apr'),
                DB::raw('SUM(amount_apr)'),
                DB::raw('SUM(qty_may) as qty_may'),
                DB::raw('SUM(amount_may)'),
                DB::raw('SUM(qty_jun) as qty_jun'),
                DB::raw('SUM(amount_jun)'),
            )
            ->groupBy(
                'tahun',
                'section',
                'fixed'
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            'tahun',
            'section',
            'fixed/variabel',
            'qty_jul',
            'amount_jul',
            'qty_aug',
            'amount_aug',
            'qty_sep',
            'amount_sep',
            'qty_okt',
            'amount_okt',
            'qty_nov',
            'amount_nov',
            'qty_dec',
            'amount_dec',
            'qty_jan',
            'amount_jan',
            'qty_feb',
            'amount_feb',
            'qty_mar',
            'amount_mar',
            'qty_apr',
            'amount_apr',
            'qty_may',
            'amount_may',
            'qty_jun',
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
        return 'Fixed_Variabel';
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
        return DB::table('home')
            ->select(
                'tahun',
                'section',
                'prep',
                'kode_carline',
                DB::raw('SUM(qty_jul) as qty_jul'),
                DB::raw('SUM(amount_jul)'),
                DB::raw('SUM(qty_aug) as qty_aug'),
                DB::raw('SUM(amount_jul)'),
                DB::raw('SUM(qty_sep) as qty_sep'),
                DB::raw('SUM(amount_sep)'),
                DB::raw('SUM(qty_okt) as qty_okt'),
                DB::raw('SUM(amount_okt)'),
                DB::raw('SUM(qty_nov) as qty_nov'),
                DB::raw('SUM(amount_nov)'),
                DB::raw('SUM(qty_dec) as qty_dec'),
                DB::raw('SUM(amount_dec)'),
                DB::raw('SUM(qty_jan) as qty_jan'),
                DB::raw('SUM(amount_jan)'),
                DB::raw('SUM(qty_feb) as qty_feb'),
                DB::raw('SUM(amount_feb)'),
                DB::raw('SUM(qty_mar) as qty_mar'),
                DB::raw('SUM(amount_mar)'),
                DB::raw('SUM(qty_apr) as qty_apr'),
                DB::raw('SUM(amount_apr)'),
                DB::raw('SUM(qty_may) as qty_may'),
                DB::raw('SUM(amount_may)'),
                DB::raw('SUM(qty_jun) as qty_jun'),
                DB::raw('SUM(amount_jun)'),
            )
            ->groupBy(
                'tahun',
                'section',
                'prep',
                'kode_carline',
            )
            ->get();
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
        return 'Prep_Masspro';
    }
}

class SheetEnam implements FromCollection, WithHeadings, WithStyles, WithTitle, ShouldAutoSize
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function collection()
    {
        $filteredData = $this->data->map(function ($item) {

            $fixedValue = $item['fixed'];

            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            // Ambil nilai bulan dari item
            // $month = $item['months'];

            // Jika fixed adalah "variabel", hitung new_amount sesuai rumus yang Anda berikan
            if (strtolower($fixedValue) === "variabel" && $item['new_umh'] != 0) {

                // Ambil data UMH dari tabel berdasarkan bulan
                $umhData = UMH::where('month', $months)->first();
                if ($umhData) {
                    // Ambil nilai umh dan new_umh dari tabel UMH
                    $umh = $umhData->umh;
                    $new_umh = $umhData->new_umh;

                    // Hitung new_amount untuk setiap bulan
                    $newAmount_Jul = $item['amount_jul'] * $umh / $new_umh;
                    $newAmount_Aug = $item['amount_aug'] * $umh / $new_umh;
                    $newAmount_Sep = $item['amount_sep'] * $umh / $new_umh;
                    $newAmount_Okt = $item['amount_okt'] * $umh / $new_umh;
                    $newAmount_Nov = $item['amount_nov'] * $umh / $new_umh;
                    $newAmount_Dec = $item['amount_dec'] * $umh / $new_umh;
                    $newAmount_Jan = $item['amount_jan'] * $umh / $new_umh;
                    $newAmount_Feb = $item['amount_feb'] * $umh / $new_umh;
                    $newAmount_Mar = $item['amount_mar'] * $umh / $new_umh;
                    $newAmount_Apr = $item['amount_apr'] * $umh / $new_umh;
                    $newAmount_May = $item['amount_may'] * $umh / $new_umh;
                    $newAmount_Jun = $item['amount_jun'] * $umh / $new_umh;
                }
            } else {
                // Jika fixed bukan "variabel", ambil nilai dari amount yang sudah ada
                $newAmount_Jul = $item['amount_jul'];
                $newAmount_Aug = $item['amount_aug'];
                $newAmount_Sep = $item['amount_sep'];
                $newAmount_Okt = $item['amount_okt'];
                $newAmount_Nov = $item['amount_nov'];
                $newAmount_Dec = $item['amount_dec'];
                $newAmount_Jan = $item['amount_jan'];
                $newAmount_Feb = $item['amount_feb'];
                $newAmount_Mar = $item['amount_mar'];
                $newAmount_Apr = $item['amount_apr'];
                $newAmount_May = $item['amount_may'];
                $newAmount_Jun = $item['amount_jun'];
            }

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
                'amount_jul' => $item['amount_jul'],
                'amount_aug' => $item['amount_aug'],
                'amount_sep' => $item['amount_sep'],
                'amount_okt' => $item['amount_okt'],
                'amount_nov' => $item['amount_nov'],
                'amount_dec' => $item['amount_dec'],
                'amount_jan' => $item['amount_jan'],
                'amount_feb' => $item['amount_feb'],
                'amount_mar' => $item['amount_mar'],
                'amount_apr' => $item['amount_apr'],
                'amount_may' => $item['amount_may'],
                'amount_jun' => $item['amount_jun'],
                'new_amount_jul' => $newAmount_Jul,
                'new_amount_aug' => $newAmount_Aug,
                'new_amount_sep' => $newAmount_Sep,
                'new_amount_okt' => $newAmount_Okt,
                'new_amount_nov' => $newAmount_Nov,
                'new_amount_dec' => $newAmount_Dec,
                'new_amount_jan' => $newAmount_Jan,
                'new_amount_feb' => $newAmount_Feb,
                'new_amount_mar' => $newAmount_Mar,
                'new_amount_apr' => $newAmount_Apr,
                'new_amount_may' => $newAmount_May,
                'new_amount_jun' => $newAmount_Jun,

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
            'fixed/variabel',
            'prep/masspro',
            'kode_carline',
            'amount_jul',
            'amount_aug',
            'amount_sep',
            'amount_okt',
            'amount_nov',
            'amount_dec',
            'amount_jan',
            'amount_feb',
            'amount_mar',
            'amount_apr',
            'amount_may',
            'amount_jun',
            'stp_jul',
            'stp_aug',
            'stp_sep',
            'stp_okt',
            'stp_nov',
            'stp_dec',
            'stp_jan',
            'stp_feb',
            'stp_mar',
            'stp_apr',
            'stp_may',
            'stp_jun',
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
        return 'STP';
    }
}
