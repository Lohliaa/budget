<?php

namespace App\Exports;
// app/Exports/YourExportClass.php

use App\Models\Carline;
use App\Models\Home;
use App\Models\UMH;
use Illuminate\Support\Facades\Auth;
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
            $amount_jul = round($item['amount_jul'], 2);
            $amount_aug = round($item['amount_aug'], 2);
            $amount_sep = round($item['amount_sep'], 2);
            $amount_okt = round($item['amount_okt'], 2);
            $amount_nov = round($item['amount_nov'], 2);
            $amount_dec = round($item['amount_dec'], 2);
            $amount_jan = round($item['amount_jan'], 2);
            $amount_feb = round($item['amount_feb'], 2);
            $amount_mar = round($item['amount_mar'], 2);
            $amount_apr = round($item['amount_apr'], 2);
            $amount_may = round($item['amount_may'], 2);
            $amount_jun = round($item['amount_jun'], 2);

            $amount_jul_formatted = $amount_jul - intval($amount_jul) == 0 ? intval($amount_jul) : $amount_jul;
            $amount_aug_formatted = $amount_aug - intval($amount_aug) == 0 ? intval($amount_aug) : $amount_aug;
            $amount_sep_formatted = $amount_sep - intval($amount_sep) == 0 ? intval($amount_sep) : $amount_sep;
            $amount_okt_formatted = $amount_okt - intval($amount_okt) == 0 ? intval($amount_okt) : $amount_okt;
            $amount_nov_formatted = $amount_nov - intval($amount_nov) == 0 ? intval($amount_nov) : $amount_nov;
            $amount_dec_formatted = $amount_dec - intval($amount_dec) == 0 ? intval($amount_dec) : $amount_dec;
            $amount_jan_formatted = $amount_jan - intval($amount_jan) == 0 ? intval($amount_jan) : $amount_jan;
            $amount_feb_formatted = $amount_feb - intval($amount_feb) == 0 ? intval($amount_feb) : $amount_feb;
            $amount_mar_formatted = $amount_mar - intval($amount_mar) == 0 ? intval($amount_mar) : $amount_mar;
            $amount_apr_formatted = $amount_apr - intval($amount_apr) == 0 ? intval($amount_apr) : $amount_apr;
            $amount_may_formatted = $amount_may - intval($amount_may) == 0 ? intval($amount_may) : $amount_may;
            $amount_jun_formatted = $amount_jun - intval($amount_jun) == 0 ? intval($amount_jun) : $amount_jun;

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
                'amount_jul' => $amount_jul_formatted,
                'qty_aug' => $item['qty_aug'],
                'price_aug' => $item['price_aug'],
                'amount_aug' => $amount_aug_formatted,
                'qty_sep' => $item['qty_sep'],
                'price_sep' => $item['price_sep'],
                'amount_sep' => $amount_sep_formatted,
                'qty_okt' => $item['qty_okt'],
                'price_okt' => $item['price_okt'],
                'amount_okt' => $amount_okt_formatted,
                'qty_nov' => $item['qty_nov'],
                'price_nov' => $item['price_nov'],
                'amount_nov' => $amount_nov_formatted,
                'qty_dec' => $item['qty_dec'],
                'price_dec' => $item['price_dec'],
                'amount_dec' => $amount_dec_formatted,
                'qty_jan' => $item['qty_jan'],
                'price_jan' => $item['price_jan'],
                'amount_jan' => $amount_jan_formatted,
                'qty_feb' => $item['qty_feb'],
                'price_feb' => $item['price_feb'],
                'amount_feb' => $amount_feb_formatted,
                'qty_mar' => $item['qty_mar'],
                'price_mar' => $item['price_mar'],
                'amount_mar' => $amount_mar_formatted,
                'qty_apr' => $item['qty_apr'],
                'price_apr' => $item['price_apr'],
                'amount_apr' => $amount_apr_formatted,
                'qty_may' => $item['qty_may'],
                'price_may' => $item['price_may'],
                'amount_may' => $amount_may_formatted,
                'qty_jun' => $item['qty_jun'],
                'price_jun' => $item['price_jun'],
                'amount_jun' => $amount_jun_formatted,
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
        ];

        // Check if the user is an admin
        $userRole = Auth::user()->role;

        // Add SheetEnam only for admin users
        if ($userRole === 'Admin') {
            // $sheets['Sheet 6'] = new SheetEnam($this->data);
            $sheets['Sheet 7'] = new SheetTujuh($this->data);
        }

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
        $userRole = Auth::user()->role;

        $result = $this->data
            ->groupBy(function ($item) {
                return $item->tahun . '-' . $item->section . '-' . $item->code . '-' . $item->nama;
            })
            ->map(function ($groupedItems) use ($userRole) {
                return $groupedItems->reduce(function ($carry, $item) use ($userRole) {
                    $carry['tahun'] = $item->tahun;
                    $carry['section'] = $item->section;
                    $carry['code'] = $item->code;
                    $carry['nama'] = $item->nama;

                    // Sum quantities and total amounts for each month
                    $carry['qty_jul'] += $item->qty_jul;
                    $carry['total_amount_jul'] += round($item->amount_jul, 2);
                    $carry['qty_aug'] += $item->qty_aug;
                    $carry['total_amount_aug'] += round($item->amount_aug, 2);
                    $carry['qty_sep'] += $item->qty_sep;
                    $carry['total_amount_sep'] += round($item->amount_sep, 2);
                    $carry['qty_okt'] += $item->qty_okt;
                    $carry['total_amount_okt'] += round($item->amount_okt, 2);
                    $carry['qty_nov'] += $item->qty_nov;
                    $carry['total_amount_nov'] += round($item->amount_nov, 2);
                    $carry['qty_dec'] += $item->qty_dec;
                    $carry['total_amount_dec'] += round($item->amount_dec, 2);
                    $carry['qty_jan'] += $item->qty_jan;
                    $carry['total_amount_jan'] += round($item->amount_jan, 2);
                    $carry['qty_feb'] += $item->qty_feb;
                    $carry['total_amount_feb'] += round($item->amount_feb, 2);
                    $carry['qty_mar'] += $item->qty_mar;
                    $carry['total_amount_mar'] += round($item->amount_mar, 2);
                    $carry['qty_apr'] += $item->qty_apr;
                    $carry['total_amount_apr'] += round($item->amount_apr, 2);
                    $carry['qty_may'] += $item->qty_may;
                    $carry['total_amount_may'] += round($item->amount_may, 2);
                    $carry['qty_jun'] += $item->qty_jun;
                    $carry['total_amount_jun'] += round($item->amount_jun, 2);

                    if ($userRole !== 'Admin' && $item->section !== $userRole) {
                        // If not admin and section doesn't match, set values to 0
                        $carry = array_map(function () {
                            return 0;
                        }, $carry);
                    }

                    return $carry;
                }, [
                    'tahun' => 0,
                    'section' => 0,
                    'code' => 0,
                    'nama' => 0,
                    'qty_jul' => 0,
                    'total_amount_jul' => 0,
                    'qty_aug' => 0,
                    'total_amount_aug' => 0,
                    'qty_sep' => 0,
                    'total_amount_sep' => 0,
                    'qty_okt' => 0,
                    'total_amount_okt' => 0,
                    'qty_nov' => 0,
                    'total_amount_nov' => 0,
                    'qty_dec' => 0,
                    'total_amount_dec' => 0,
                    'qty_jan' => 0,
                    'total_amount_jan' => 0,
                    'qty_feb' => 0,
                    'total_amount_feb' => 0,
                    'qty_mar' => 0,
                    'total_amount_mar' => 0,
                    'qty_apr' => 0,
                    'total_amount_apr' => 0,
                    'qty_may' => 0,
                    'total_amount_may' => 0,
                    'qty_jun' => 0,
                    'total_amount_jun' => 0,
                ]);
            });

        return $result;
    }

    public function headings(): array
    {
        return [
            'tahun',
            'section',
            'code',
            'nama',
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
        $userRole = Auth::user()->role;

        $result = $this->data
            ->groupBy(function ($item) {
                return $item->tahun . '-' . $item->section . '-' . $item->kode_budget;
            })
            ->map(function ($groupedItems) use ($userRole) {
                return $groupedItems->reduce(function ($carry, $item) use ($userRole) {
                    $carry['tahun'] = $item->tahun;
                    $carry['section'] = $item->section;
                    $carry['kode_budget'] = $item->kode_budget;

                    // Sum quantities and total amounts for each month
                    $carry['qty_jul'] += $item->qty_jul;
                    $carry['total_amount_jul'] += round($item->amount_jul, 2);
                    $carry['qty_aug'] += $item->qty_aug;
                    $carry['total_amount_aug'] += round($item->amount_aug, 2);
                    $carry['qty_sep'] += $item->qty_sep;
                    $carry['total_amount_sep'] += round($item->amount_sep, 2);
                    $carry['qty_okt'] += $item->qty_okt;
                    $carry['total_amount_okt'] += round($item->amount_okt, 2);
                    $carry['qty_nov'] += $item->qty_nov;
                    $carry['total_amount_nov'] += round($item->amount_nov, 2);
                    $carry['qty_dec'] += $item->qty_dec;
                    $carry['total_amount_dec'] += round($item->amount_dec, 2);
                    $carry['qty_jan'] += $item->qty_jan;
                    $carry['total_amount_jan'] += round($item->amount_jan, 2);
                    $carry['qty_feb'] += $item->qty_feb;
                    $carry['total_amount_feb'] += round($item->amount_feb, 2);
                    $carry['qty_mar'] += $item->qty_mar;
                    $carry['total_amount_mar'] += round($item->amount_mar, 2);
                    $carry['qty_apr'] += $item->qty_apr;
                    $carry['total_amount_apr'] += round($item->amount_apr, 2);
                    $carry['qty_may'] += $item->qty_may;
                    $carry['total_amount_may'] += round($item->amount_may, 2);
                    $carry['qty_jun'] += $item->qty_jun;
                    $carry['total_amount_jun'] += round($item->amount_jun, 2);

                    if ($userRole !== 'Admin' && $item->section !== $userRole) {
                        // If not admin and section doesn't match, set values to 0
                        $carry = array_map(function () {
                            return 0;
                        }, $carry);
                    }

                    return $carry;
                }, [
                    'tahun' => 0,
                    'section' => 0,
                    'kode_budget' => 0,
                    'qty_jul' => 0,
                    'total_amount_jul' => 0,
                    'qty_aug' => 0,
                    'total_amount_aug' => 0,
                    'qty_sep' => 0,
                    'total_amount_sep' => 0,
                    'qty_okt' => 0,
                    'total_amount_okt' => 0,
                    'qty_nov' => 0,
                    'total_amount_nov' => 0,
                    'qty_dec' => 0,
                    'total_amount_dec' => 0,
                    'qty_jan' => 0,
                    'total_amount_jan' => 0,
                    'qty_feb' => 0,
                    'total_amount_feb' => 0,
                    'qty_mar' => 0,
                    'total_amount_mar' => 0,
                    'qty_apr' => 0,
                    'total_amount_apr' => 0,
                    'qty_may' => 0,
                    'total_amount_may' => 0,
                    'qty_jun' => 0,
                    'total_amount_jun' => 0,
                ]);
            });

        return $result;
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
        $userRole = Auth::user()->role;

        $result = $this->data
            ->groupBy(function ($item) {
                return $item->tahun . '-' . $item->section . '-' . $item->fixed;
            })
            ->map(function ($groupedItems) use ($userRole) {
                return $groupedItems->reduce(function ($carry, $item) use ($userRole) {
                    $carry['tahun'] = $item->tahun;
                    $carry['section'] = $item->section;
                    $carry['fixed'] = $item->fixed;

                    // Sum quantities and total amounts for each month
                    $carry['qty_jul'] += $item->qty_jul;
                    $carry['total_amount_jul'] += round($item->amount_jul, 2);
                    $carry['qty_aug'] += $item->qty_aug;
                    $carry['total_amount_aug'] += round($item->amount_aug, 2);
                    $carry['qty_sep'] += $item->qty_sep;
                    $carry['total_amount_sep'] += round($item->amount_sep, 2);
                    $carry['qty_okt'] += $item->qty_okt;
                    $carry['total_amount_okt'] += round($item->amount_okt, 2);
                    $carry['qty_nov'] += $item->qty_nov;
                    $carry['total_amount_nov'] += round($item->amount_nov, 2);
                    $carry['qty_dec'] += $item->qty_dec;
                    $carry['total_amount_dec'] += round($item->amount_dec, 2);
                    $carry['qty_jan'] += $item->qty_jan;
                    $carry['total_amount_jan'] += round($item->amount_jan, 2);
                    $carry['qty_feb'] += $item->qty_feb;
                    $carry['total_amount_feb'] += round($item->amount_feb, 2);
                    $carry['qty_mar'] += $item->qty_mar;
                    $carry['total_amount_mar'] += round($item->amount_mar, 2);
                    $carry['qty_apr'] += $item->qty_apr;
                    $carry['total_amount_apr'] += round($item->amount_apr, 2);
                    $carry['qty_may'] += $item->qty_may;
                    $carry['total_amount_may'] += round($item->amount_may, 2);
                    $carry['qty_jun'] += $item->qty_jun;
                    $carry['total_amount_jun'] += round($item->amount_jun, 2);

                    if ($userRole !== 'Admin' && $item->section !== $userRole) {
                        // If not admin and section doesn't match, set values to 0
                        $carry = array_map(function () {
                            return 0;
                        }, $carry);
                    }

                    return $carry;
                }, [
                    'tahun' => 0,
                    'section' => 0,
                    'fixed' => 0,
                    'qty_jul' => 0,
                    'total_amount_jul' => 0,
                    'qty_aug' => 0,
                    'total_amount_aug' => 0,
                    'qty_sep' => 0,
                    'total_amount_sep' => 0,
                    'qty_okt' => 0,
                    'total_amount_okt' => 0,
                    'qty_nov' => 0,
                    'total_amount_nov' => 0,
                    'qty_dec' => 0,
                    'total_amount_dec' => 0,
                    'qty_jan' => 0,
                    'total_amount_jan' => 0,
                    'qty_feb' => 0,
                    'total_amount_feb' => 0,
                    'qty_mar' => 0,
                    'total_amount_mar' => 0,
                    'qty_apr' => 0,
                    'total_amount_apr' => 0,
                    'qty_may' => 0,
                    'total_amount_may' => 0,
                    'qty_jun' => 0,
                    'total_amount_jun' => 0,
                ]);
            });

        return $result;
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
        $userRole = Auth::user()->role;

        $result = $this->data
            ->groupBy(function ($item) {
                return $item->tahun . '-' . $item->section . '-' . $item->prep . '-' . $item->kode_carline;
            })
            ->map(function ($groupedItems) use ($userRole) {
                return $groupedItems->reduce(function ($carry, $item) use ($userRole) {
                    $carry['tahun'] = $item->tahun;
                    $carry['section'] = $item->section;
                    $carry['prep'] = $item->prep;
                    $carry['kode_carline'] = $item->kode_carline;

                    // Sum quantities and total amounts for each month
                    $carry['qty_jul'] += $item->qty_jul;
                    $carry['total_amount_jul'] += round($item->amount_jul, 2);
                    $carry['qty_aug'] += $item->qty_aug;
                    $carry['total_amount_aug'] += round($item->amount_aug, 2);
                    $carry['qty_sep'] += $item->qty_sep;
                    $carry['total_amount_sep'] += round($item->amount_sep, 2);
                    $carry['qty_okt'] += $item->qty_okt;
                    $carry['total_amount_okt'] += round($item->amount_okt, 2);
                    $carry['qty_nov'] += $item->qty_nov;
                    $carry['total_amount_nov'] += round($item->amount_nov, 2);
                    $carry['qty_dec'] += $item->qty_dec;
                    $carry['total_amount_dec'] += round($item->amount_dec, 2);
                    $carry['qty_jan'] += $item->qty_jan;
                    $carry['total_amount_jan'] += round($item->amount_jan, 2);
                    $carry['qty_feb'] += $item->qty_feb;
                    $carry['total_amount_feb'] += round($item->amount_feb, 2);
                    $carry['qty_mar'] += $item->qty_mar;
                    $carry['total_amount_mar'] += round($item->amount_mar, 2);
                    $carry['qty_apr'] += $item->qty_apr;
                    $carry['total_amount_apr'] += round($item->amount_apr, 2);
                    $carry['qty_may'] += $item->qty_may;
                    $carry['total_amount_may'] += round($item->amount_may, 2);
                    $carry['qty_jun'] += $item->qty_jun;
                    $carry['total_amount_jun'] += round($item->amount_jun, 2);

                    if ($userRole !== 'Admin' && $item->section !== $userRole) {
                        // If not admin and section doesn't match, set values to 0
                        $carry = array_map(function () {
                            return 0;
                        }, $carry);
                    }

                    return $carry;
                }, [
                    'tahun' => 0,
                    'section' => 0,
                    'prep' => 0,
                    'kode_carline' => 0,
                    'qty_jul' => 0,
                    'total_amount_jul' => 0,
                    'qty_aug' => 0,
                    'total_amount_aug' => 0,
                    'qty_sep' => 0,
                    'total_amount_sep' => 0,
                    'qty_okt' => 0,
                    'total_amount_okt' => 0,
                    'qty_nov' => 0,
                    'total_amount_nov' => 0,
                    'qty_dec' => 0,
                    'total_amount_dec' => 0,
                    'qty_jan' => 0,
                    'total_amount_jan' => 0,
                    'qty_feb' => 0,
                    'total_amount_feb' => 0,
                    'qty_mar' => 0,
                    'total_amount_mar' => 0,
                    'qty_apr' => 0,
                    'total_amount_apr' => 0,
                    'qty_may' => 0,
                    'total_amount_may' => 0,
                    'qty_jun' => 0,
                    'total_amount_jun' => 0,
                ]);
            });

        return $result;
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

// class SheetEnam implements FromCollection, WithHeadings, WithStyles, WithTitle, ShouldAutoSize
// {
//     protected $data;

//     public function __construct($data)
//     {
//         $this->data = $data;
//     }

//     public function collection()
//     {
//         $userRole = Auth::user()->role;

//         $result = $this->data
//             ->groupBy(function ($item) {
//                 return $item->tahun . '-' . $item->section . '-' . $item->kode_budget . '-' . $item->fixed;
//             })
//             ->map(function ($groupedItems) use ($userRole) {
//                 return $groupedItems->reduce(function ($carry, $item) use ($userRole) {
//                     $carry['tahun'] = $item->tahun;
//                     $carry['section'] = $item->section;
//                     $carry['kode_budget'] = $item->kode_budget;
//                     $carry['fixed'] = $item->fixed;

//                     // Sum quantities and total amounts for each month
//                     $carry['total_amount_jul'] += round($item->amount_jul, 2);
//                     $carry['total_amount_aug'] += round($item->amount_aug, 2);
//                     $carry['total_amount_sep'] += round($item->amount_sep, 2);
//                     $carry['total_amount_okt'] += round($item->amount_okt, 2);
//                     $carry['total_amount_nov'] += round($item->amount_nov, 2);
//                     $carry['total_amount_dec'] += round($item->amount_dec, 2);
//                     $carry['total_amount_jan'] += round($item->amount_jan, 2);
//                     $carry['total_amount_feb'] += round($item->amount_feb, 2);
//                     $carry['total_amount_mar'] += round($item->amount_mar, 2);
//                     $carry['total_amount_apr'] += round($item->amount_apr, 2);
//                     $carry['total_amount_may'] += round($item->amount_may, 2);
//                     $carry['total_amount_jun'] += round($item->amount_jun, 2);

//                     $sumTotalAmountJul = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_jul');

//                     $sumTotalAmountAug = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_aug');

//                     $sumTotalAmountSep = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_sep');

//                     $sumTotalAmountOkt = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_okt');

//                     $sumTotalAmountNov = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_nov');

//                     $sumTotalAmountDec = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_dec');

//                     $sumTotalAmountJan = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_jan');

//                     $sumTotalAmountFeb = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_feb');

//                     $sumTotalAmountMar = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_mar');

//                     $sumTotalAmountApr = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_apr');

//                     $sumTotalAmountMay = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_may');

//                     $sumTotalAmountJun = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('amount_jun');

//                     $carry['sumTotalAmountJul'] = number_format($sumTotalAmountJul, 2);
//                     $carry['sumTotalAmountAug'] = number_format($sumTotalAmountAug, 2);
//                     $carry['sumTotalAmountSep'] = number_format($sumTotalAmountSep, 2);
//                     $carry['sumTotalAmountOkt'] = number_format($sumTotalAmountOkt, 2);
//                     $carry['sumTotalAmountNov'] = number_format($sumTotalAmountNov, 2);
//                     $carry['sumTotalAmountDec'] = number_format($sumTotalAmountDec, 2);
//                     $carry['sumTotalAmountJan'] = number_format($sumTotalAmountJan, 2);
//                     $carry['sumTotalAmountFeb'] = number_format($sumTotalAmountFeb, 2);
//                     $carry['sumTotalAmountMar'] = number_format($sumTotalAmountMar, 2);
//                     $carry['sumTotalAmountApr'] = number_format($sumTotalAmountApr, 2);
//                     $carry['sumTotalAmountMay'] = number_format($sumTotalAmountMay, 2);
//                     $carry['sumTotalAmountJun'] = number_format($sumTotalAmountJun, 2);


//                     $umhData = UMH::first(); // Mengambil data pertama dari tabel Umh

//                     // Menambahkan nilai kolom ke dalam array $carry
//                     $carry['ltp_jul'] = number_format($umhData->ltp_jul ?? 0, 2);
//                     $carry['ltp_aug'] = number_format($umhData->ltp_aug ?? 0, 2);
//                     $carry['ltp_sep'] = number_format($umhData->ltp_sep ?? 0, 2);
//                     $carry['ltp_okt'] = number_format($umhData->ltp_okt ?? 0, 2);
//                     $carry['ltp_nov'] = number_format($umhData->ltp_nov ?? 0, 2);
//                     $carry['ltp_dec'] = number_format($umhData->ltp_dec ?? 0, 2);
//                     $carry['ltp_jan'] = number_format($umhData->ltp_jan ?? 0, 2);
//                     $carry['ltp_feb'] = number_format($umhData->ltp_feb ?? 0, 2);
//                     $carry['ltp_mar'] = number_format($umhData->ltp_mar ?? 0, 2);
//                     $carry['ltp_apr'] = number_format($umhData->ltp_apr ?? 0, 2);
//                     $carry['ltp_may'] = number_format($umhData->ltp_may ?? 0, 2);
//                     $carry['ltp_jun'] = number_format($umhData->ltp_jun ?? 0, 2);

//                     $carry['stp_jul'] = number_format($umhData->stp_jul ?? 0, 2);
//                     $carry['stp_aug'] = number_format($umhData->stp_aug ?? 0, 2);
//                     $carry['stp_sep'] = number_format($umhData->stp_sep ?? 0, 2);
//                     $carry['stp_okt'] = number_format($umhData->stp_okt ?? 0, 2);
//                     $carry['stp_nov'] = number_format($umhData->stp_nov ?? 0, 2);
//                     $carry['stp_dec'] = number_format($umhData->stp_dec ?? 0, 2);
//                     $carry['stp_jan'] = number_format($umhData->stp_jan ?? 0, 2);
//                     $carry['stp_feb'] = number_format($umhData->stp_feb ?? 0, 2);
//                     $carry['stp_mar'] = number_format($umhData->stp_mar ?? 0, 2);
//                     $carry['stp_apr'] = number_format($umhData->stp_apr ?? 0, 2);
//                     $carry['stp_may'] = number_format($umhData->stp_may ?? 0, 2);
//                     $carry['stp_jun'] = number_format($umhData->stp_jun ?? 0, 2);

//                     $fixedValue = $item->fixed;

//                     $stp_amount_jul = 0;
//                     $stp_amount_aug = 0;
//                     $stp_amount_sep = 0;
//                     $stp_amount_okt = 0;
//                     $stp_amount_nov = 0;
//                     $stp_amount_dec = 0;
//                     $stp_amount_jan = 0;
//                     $stp_amount_feb = 0;
//                     $stp_amount_mar = 0;
//                     $stp_amount_apr = 0;
//                     $stp_amount_may = 0;
//                     $stp_amount_jun = 0;

//                     if (strtolower($fixedValue) == 'fixed') {
//                         $stp_amount_jul = $carry['total_amount_jul'];
//                         $stp_amount_aug = $carry['total_amount_aug'];
//                         $stp_amount_sep = $carry['total_amount_sep'];
//                         $stp_amount_okt = $carry['total_amount_okt'];
//                         $stp_amount_nov = $carry['total_amount_nov'];
//                         $stp_amount_dec = $carry['total_amount_dec'];
//                         $stp_amount_jan = $carry['total_amount_jan'];
//                         $stp_amount_feb = $carry['total_amount_feb'];
//                         $stp_amount_mar = $carry['total_amount_mar'];
//                         $stp_amount_apr = $carry['total_amount_apr'];
//                         $stp_amount_may = $carry['total_amount_may'];
//                         $stp_amount_jun = $carry['total_amount_jun'];
//                     }
//                     if (strtolower($fixedValue) == 'variabel') {
//                         $stp_amount_jul = ($umhData->stp_jul / $umhData->ltp_jul) * $carry['total_amount_jul'];
//                         $stp_amount_aug = ($umhData->stp_aug / $umhData->ltp_aug) * $carry['total_amount_aug'];
//                         $stp_amount_sep = ($umhData->stp_sep / $umhData->ltp_sep) * $carry['total_amount_sep'];
//                         $stp_amount_okt = ($umhData->stp_okt / $umhData->ltp_okt) * $carry['total_amount_okt'];
//                         $stp_amount_nov = ($umhData->stp_nov / $umhData->ltp_nov) * $carry['total_amount_nov'];
//                         $stp_amount_dec = ($umhData->stp_dec / $umhData->ltp_dec) * $carry['total_amount_dec'];
//                         $stp_amount_jan = ($umhData->stp_jan / $umhData->ltp_jan) * $carry['total_amount_jan'];
//                         $stp_amount_feb = ($umhData->stp_feb / $umhData->ltp_feb) * $carry['total_amount_feb'];
//                         $stp_amount_mar = ($umhData->stp_mar / $umhData->ltp_mar) * $carry['total_amount_mar'];
//                         $stp_amount_apr = ($umhData->stp_apr / $umhData->ltp_apr) * $carry['total_amount_apr'];
//                         $stp_amount_may = ($umhData->stp_may / $umhData->ltp_may) * $carry['total_amount_may'];
//                         $stp_amount_jun = ($umhData->stp_jun / $umhData->ltp_jun) * $carry['total_amount_jun'];
//                     }

//                     $carry['stp_amount_jul'] = round($stp_amount_jul, 2);
//                     $carry['stp_amount_aug'] = round($stp_amount_aug, 2);
//                     $carry['stp_amount_sep'] = round($stp_amount_sep, 2);
//                     $carry['stp_amount_okt'] = round($stp_amount_okt, 2);
//                     $carry['stp_amount_nov'] = round($stp_amount_nov, 2);
//                     $carry['stp_amount_dec'] = round($stp_amount_dec, 2);
//                     $carry['stp_amount_jan'] = round($stp_amount_jan, 2);
//                     $carry['stp_amount_feb'] = round($stp_amount_feb, 2);
//                     $carry['stp_amount_mar'] = round($stp_amount_mar, 2);
//                     $carry['stp_amount_apr'] = round($stp_amount_apr, 2);
//                     $carry['stp_amount_may'] = round($stp_amount_may, 2);
//                     $carry['stp_amount_jun'] = round($stp_amount_jun, 2);
                    

//                     // Menyimpan data ke dalam tabel Home
//                     $homeData = Home::updateOrCreate(
//                         [
//                             'tahun' => $carry['tahun'],
//                             'section' => $carry['section'],
//                             'kode_budget' => $carry['kode_budget'],
//                             'fixed' => $carry['fixed'],
//                         ],
//                         [
//                             'stp_amount_jul' => $carry['stp_amount_jul'],
//                             'stp_amount_aug' => $carry['stp_amount_aug'],
//                             'stp_amount_sep' => $carry['stp_amount_sep'],
//                             'stp_amount_okt' => $carry['stp_amount_okt'],
//                             'stp_amount_nov' => $carry['stp_amount_nov'],
//                             'stp_amount_dec' => $carry['stp_amount_dec'],
//                             'stp_amount_jan' => $carry['stp_amount_jan'],
//                             'stp_amount_feb' => $carry['stp_amount_feb'],
//                             'stp_amount_mar' => $carry['stp_amount_mar'],
//                             'stp_amount_apr' => $carry['stp_amount_apr'],
//                             'stp_amount_may' => $carry['stp_amount_may'],
//                             'stp_amount_jun' => $carry['stp_amount_jun'],
//                         ]

//                     );

//                     $homeData->save();

//                     $sumSTPAmountJul = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_jul');

//                     $sumSTPAmountAug = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_aug');

//                     $sumSTPAmountSep = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_sep');

//                     $sumSTPAmountOkt = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_okt');

//                     $sumSTPAmountNov = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_nov');

//                     $sumSTPAmountDec = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_dec');

//                     $sumSTPAmountJan = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_jan');

//                     $sumSTPAmountFeb = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_feb');

//                     $sumSTPAmountMar = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_mar');

//                     $sumSTPAmountApr = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_apr');

//                     $sumSTPAmountMay = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_may');

//                     $sumSTPAmountJun = Home::where('tahun', $item->tahun)
//                         ->where('section', $item->section)
//                         ->where('kode_budget', $item->kode_budget)
//                         ->sum('stp_amount_jun');

//                     $carry['sumSTPAmountJul'] = $sumSTPAmountJul;
//                     $carry['sumSTPAmountAug'] = $sumSTPAmountAug;
//                     $carry['sumSTPAmountSep'] = $sumSTPAmountSep;
//                     $carry['sumSTPAmountOkt'] = $sumSTPAmountOkt;
//                     $carry['sumSTPAmountNov'] = $sumSTPAmountNov;
//                     $carry['sumSTPAmountDec'] = $sumSTPAmountDec;
//                     $carry['sumSTPAmountJan'] = $sumSTPAmountJan;
//                     $carry['sumSTPAmountFeb'] = $sumSTPAmountFeb;
//                     $carry['sumSTPAmountMar'] = $sumSTPAmountMar;
//                     $carry['sumSTPAmountApr'] = $sumSTPAmountApr;
//                     $carry['sumSTPAmountMay'] = $sumSTPAmountMay;
//                     $carry['sumSTPAmountJun'] = $sumSTPAmountJun;

//                     if ($userRole !== 'Admin' && $item->section !== $userRole) {
//                         // If not admin and section doesn't match, set values to 0
//                         $carry = array_map(function () {
//                             return 0;
//                         }, $carry);
//                     }

//                     return $carry;
//                 }, [
//                     'tahun' => 0,
//                     'section' => 0,
//                     'kode_budget' => 0,
//                     'fixed' => 0,
//                     'total_amount_jul' => 0,
//                     'sumTotalAmountJul' => 0,
//                     'ltp_jul' => 0,
//                     'total_amount_aug' => 0,
//                     'sumTotalAmountAug' => 0,
//                     'ltp_aug' => 0,
//                     'total_amount_sep' => 0,
//                     'sumTotalAmountSep' => 0,
//                     'ltp_sep' => 0,
//                     'total_amount_okt' => 0,
//                     'sumTotalAmountOkt' => 0,
//                     'ltp_okt' => 0,
//                     'total_amount_nov' => 0,
//                     'sumTotalAmountNov' => 0,
//                     'ltp_nov' => 0,
//                     'total_amount_dec' => 0,
//                     'sumTotalAmountDec' => 0,
//                     'ltp_dec' => 0,
//                     'total_amount_jan' => 0,
//                     'sumTotalAmountJan' => 0,
//                     'ltp_jan' => 0,
//                     'total_amount_feb' => 0,
//                     'sumTotalAmountFeb' => 0,
//                     'ltp_feb' => 0,
//                     'total_amount_mar' => 0,
//                     'sumTotalAmountMar' => 0,
//                     'ltp_mar' => 0,
//                     'total_amount_apr' => 0,
//                     'sumTotalAmountApr' => 0,
//                     'ltp_apr' => 0,
//                     'total_amount_may' => 0,
//                     'sumTotalAmountMay' => 0,
//                     'ltp_may' => 0,
//                     'total_amount_jun' => 0,
//                     'sumTotalAmountJun' => 0,
//                     'ltp_jun' => 0,
//                     'stp_amount_jul' => 0,
//                     'sumSTPAmountJul' => 0,
//                     'stp_jul' => 0,
//                     'stp_amount_aug' => 0,
//                     'sumSTPAmountAug' => 0,
//                     'stp_aug' => 0,
//                     'stp_amount_sep' => 0,
//                     'sumSTPAmountSep' => 0,
//                     'stp_sep' => 0,
//                     'stp_amount_okt' => 0,
//                     'sumSTPAmountOkt' => 0,
//                     'stp_okt' => 0,
//                     'stp_amount_nov' => 0,
//                     'sumSTPAmountNov' => 0,
//                     'stp_nov' => 0,
//                     'stp_amount_dec' => 0,
//                     'sumSTPAmountDec' => 0,
//                     'stp_dec' => 0,
//                     'stp_amount_jan' => 0,
//                     'sumSTPAmountJan' => 0,
//                     'stp_jan' => 0,
//                     'stp_amount_feb' => 0,
//                     'sumSTPAmountFeb' => 0,
//                     'stp_feb' => 0,
//                     'stp_amount_mar' => 0,
//                     'sumSTPAmountMar' => 0,
//                     'stp_mar' => 0,
//                     'stp_amount_apr' => 0,
//                     'sumSTPAmountApr' => 0,
//                     'stp_apr' => 0,
//                     'stp_amount_may' => 0,
//                     'sumSTPAmountMay' => 0,
//                     'stp_may' => 0,
//                     'stp_amount_jun' => 0,
//                     'sumSTPAmountJun' => 0,
//                     'stp_jun' => 0,
//                 ]);
//             });
//         // dd($result);
//         return $result;
//     }

//     public function headings(): array
//     {
//         return [
//             'Tahun',
//             'Section',
//             'Kode Budget',
//             'fixed/variabel',
//             'Amount Jul',
//             'Total Jul',
//             'UMH LTP JUL',
//             'Amount Aug',
//             'Total Aug',
//             'UMH LTP AUG',
//             'Amount Sep',
//             'Total Sep',
//             'UMH LTP SEP',
//             'Amount Okt',
//             'Total Okt',
//             'UMH LTP OKT',
//             'Amount Nov',
//             'Total Nov',
//             'UMH LTP NOV',
//             'Amount Dec',
//             'Total Dec',
//             'UMH LTP DEC',
//             'Amount Jan',
//             'Total Jan',
//             'UMH LTP JAN',
//             'Amount Feb',
//             'Total Feb',
//             'UMH LTP FEB',
//             'Amount Mar',
//             'Total Mar',
//             'UMH LTP MAR',
//             'Amount Apr',
//             'Total Apr',
//             'UMH LTP APR',
//             'Amount May',
//             'Total May',
//             'UMH LTP MAY',
//             'Amount Jun',
//             'Total Jun',
//             'UMH LTP JUN',
//             'AMOUNT STP JUL',
//             'TOTAL AMOUNT JUL',
//             'UMH STP JUL',
//             'AMOUNT STP AUG',
//             'TOTAL AMOUNT AUG',
//             'UMH STP AUG',
//             'AMOUNT STP SEP',
//             'TOTAL AMOUNT SEP',
//             'UMH STP SEP',
//             'AMOUNT STP OKT',
//             'TOTAL AMOUNT OKT',
//             'UMH STP OKT',
//             'AMOUNT STP NOV',
//             'TOTAL AMOUNT NOV',
//             'UMH STP NOV',
//             'AMOUNT STP DEC',
//             'TOTAL AMOUNT DEC',
//             'UMH STP DEC',
//             'AMOUNT STP JAN',
//             'TOTAL AMOUNT JAN',
//             'UMH STP JAN',
//             'AMOUNT STP FEB',
//             'TOTAL AMOUNT FEB',
//             'UMH STP FEB',
//             'AMOUNT STP MAR',
//             'TOTAL AMOUNT MAR',
//             'UMH STP MAR',
//             'AMOUNT STP APR',
//             'TOTAL AMOUNT APR',
//             'UMH STP APR',
//             'AMOUNT STP MAY',
//             'TOTAL AMOUNT MAY',
//             'UMH STP MAY',
//             'AMOUNT STP JUN',
//             'TOTAL AMOUNT JUN',
//             'UMH STP JUN',
//         ];
//     }

//     public function styles(Worksheet $sheet)
//     {
//         return [
//             1 => ['font' => ['bold' => true]],
//             'E1:AN1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'FFFF00']]],
//             'AO1:BX1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '00E4FF']]],
//         ];
//     }

//     public function title(): string
//     {
//         return 'STP';
//     }
// }

class SheetTujuh implements FromCollection, WithHeadings, WithStyles, WithTitle, ShouldAutoSize
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $userRole = Auth::user()->role;

        $result = $this->data
            ->groupBy(function ($item) {
                return $item->tahun . '-' . $item->section . '-' . $item->kode_budget . '-' . $item->prep . '-' . $item->kode_carline;
            })
            ->map(function ($groupedItems) use ($userRole) {
                return $groupedItems->reduce(function ($carry, $item) use ($userRole) {
                    $carry['tahun'] = $item->tahun;
                    $carry['section'] = $item->section;
                    $carry['kode_budget'] = $item->kode_budget;
                    $carry['prep'] = $item->prep;
                    $carry['kode_carline'] = $item->kode_carline;

                    $carlineData = Carline::where('kode', $item->kode_carline)->first();

                    // Jika data ditemukan di tabel 'carline', tambahkan kolom-kolom tertentu ke dalam $carry
                    if ($carlineData) {
                        $carry['destination'] = $carlineData->destination_ppc;
                        $carry['model_year'] = $carlineData->model_year;
                    }

                    $carry['sum_amount_jul'] += round($item->amount_jul, 2);
                    $carry['sum_amount_aug'] += round($item->amount_aug, 2);
                    $carry['sum_amount_sep'] += round($item->amount_sep, 2);
                    $carry['sum_amount_okt'] += round($item->amount_okt, 2);
                    $carry['sum_amount_nov'] += round($item->amount_nov, 2);
                    $carry['sum_amount_dec'] += round($item->amount_dec, 2);
                    $carry['sum_amount_jan'] += round($item->amount_jan, 2);
                    $carry['sum_amount_feb'] += round($item->amount_feb, 2);
                    $carry['sum_amount_mar'] += round($item->amount_mar, 2);
                    $carry['sum_amount_apr'] += round($item->amount_apr, 2);
                    $carry['sum_amount_may'] += round($item->amount_may, 2);
                    $carry['sum_amount_jun'] += round($item->amount_jun, 2);

                    if ($userRole !== 'Admin' && $item->section !== $userRole) {
                        // If not admin and section doesn't match, set values to 0
                        $carry = array_map(function () {
                            return 0;
                        }, $carry);
                    }

                    return $carry;
                }, [
                    'tahun' => 0,
                    'section' => 0,
                    'kode_budget' => 0,
                    'destination' => 0,
                    'kode_carline' => 0,
                    'model_year' => 0,
                    'prep' => 0,
                    'sum_amount_jul' => 0,
                    'sum_amount_aug' => 0,
                    'sum_amount_sep' => 0,
                    'sum_amount_okt' => 0,
                    'sum_amount_nov' => 0,
                    'sum_amount_dec' => 0,
                    'sum_amount_jan' => 0,
                    'sum_amount_feb' => 0,
                    'sum_amount_mar' => 0,
                    'sum_amount_apr' => 0,
                    'sum_amount_may' => 0,
                    'sum_amount_jun' => 0,
                ]);
            });

        return $result;
    }

    public function headings(): array
    {
        return [
            'tahun',
            'section',
            'kode budget',
            'destination',
            'carline',
            'model year',
            'prep/maspro',
            'jul',
            'aug',
            'sep',
            'okt',
            'nov',
            'dec',
            'jan',
            'feb',
            'mar',
            'apr',
            'may',
            'jun'

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
        return 'Destination';
    }
}
