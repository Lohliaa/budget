<?php

namespace App\Exports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class HomeExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithMultipleSheets
{
    use Exportable;

    public function collection()
    {
        $userRole = Auth::user()->role;

        if ($userRole === 'Admin') {
            $type = DB::table('home')->select(
                'section',
                'code',
                'nama',
                'kode_budget',
                'cur',
                'qty',
                'price',
                'order_plan',
                'delivery_plan',
                'fixed',
                'prep',
                'kode_carline',
                'remark'
            )->get();
        } else {
            $role = Auth::id();
            $type = DB::table('home')->select(
                'section',
                'code',
                'nama',
                'kode_budget',
                'cur',
                'qty',
                'price',
                'order_plan',
                'delivery_plan',
                'fixed',
                'prep',
                'kode_carline',
                'remark'
            )
                ->where('role_id', $role)
                ->get();
        }

        return $type;
    }

    public function headings(): array
    {
        return [
            'section',
            'code',
            'nama',
            'kode_budget',
            'cur',
            'qty',
            'price',
            'order_plan',
            'delivery_plan',
            'fixed',
            'prep',
            'kode_carline',
            'remark'

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
        $role = Auth::id();

        $sheets = [
            new DetailSheet($role),
            new SummarySheet($role),
        ];

        return $sheets;
    }
}
class DetailSheet implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    private $roleId;

    public function __construct($roleId)
    {
        $this->roleId = $roleId;
    }
    public function collection()
    {
        $userRole = Auth::user()->role;

        if ($userRole === 'Admin') {
            $type = DB::table('home')->select(
                'section',
                'code',
                'nama',
                'kode_budget',
                'cur',
                'qty',
                'price',
                'order_plan',
                'delivery_plan',
                'fixed',
                'prep',
                'kode_carline',
                'remark'
            )->get();
        } else {
            $role = Auth::id();
            $type = DB::table('home')->select(
                'section',
                'code',
                'nama',
                'kode_budget',
                'cur',
                'qty',
                'price',
                'order_plan',
                'delivery_plan',
                'fixed',
                'prep',
                'kode_carline',
                'remark'
            )
                ->where('role_id', $role)
                ->get();
        }

        return $type;
    }

    public function headings(): array
    {
        return [
            'section',
            'code',
            'nama',
            'kode_budget',
            'cur',
            'qty',
            'price',
            'order_plan',
            'delivery_plan',
            'fixed',
            'prep',
            'kode_carline',
            'remark'

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

class SummarySheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    private $roleId;

    public function __construct($roleId)
    {
        $this->roleId = $roleId;
    }

    public function collection()
    {
        $userRole = Auth::user()->role;

        $homeData = DB::table('home')
            ->select(
                'section',
                'fixed',
                'kode_budget',
                'kode_carline',
                'prep',
                'cur',
                'order_plan',
                'delivery_plan',
                'qty', // Tambahkan kolom 'qty'
                'price' // Tambahkan kolom 'price'
            );

        if ($userRole !== 'Admin') {
            $role = Auth::id();
            $homeData->where('home.role_id', $role);
        }

        $homeData = $homeData->get();

        // Ambil data 'section' dari tabel 'home'
        $sections = $homeData->pluck('section');

        // Ambil data 'detail_cost_center' dari tabel 'cost' sesuai dengan 'section' dari tabel 'home'
        $costData = DB::table('cost')
            ->whereIn('cost_center', $sections)
            ->select('cost_center', 'detail_cost_center as nama_section')
            ->get();

        // Gabungkan data dari kedua tabel berdasarkan 'section'
        $result = [];
        foreach ($homeData as $homeRow) {
            $matchingCostRow = $costData->where('cost_center', $homeRow->section)->first();

            if ($matchingCostRow) {
                // Hitung nilai untuk setiap bulan antara 'order_plan' dan 'delivery_plan'
                $orderPlan = Carbon::parse($homeRow->order_plan); // Ubah string menjadi objek Carbon
                $deliveryPlan = Carbon::parse($homeRow->delivery_plan); // Ubah string menjadi objek Carbon
                $original = [];

                $original = [];
                while ($orderPlan <= $deliveryPlan) {
                    $original[$orderPlan->format('F Y')] = $homeRow->qty * $homeRow->price;
                    $orderPlan->addMonth();
                }


                $result[] = [
                    'section' => $homeRow->section,
                    'nama_section' => $matchingCostRow->nama_section,
                    'fixed' => $homeRow->fixed,
                    'kode_budget' => $homeRow->kode_budget,
                    'kode_carline' => $homeRow->kode_carline,
                    'prep' => $homeRow->prep,
                    'cur' => $homeRow->cur,
                    'order_plan' => $homeRow->order_plan,
                    'delivery_plan' => $homeRow->delivery_plan,
                    'original' => $original,
                ];
            }
        }

        return collect($result)->map(function ($item) {
            $item['original'] = collect($item['original']);
            return $item;
        });
    }

    public function headings(): array
    {
        return [
            'section',
            'nama_section',
            'fixed/variabel',
            'kode_budget',
            'kode_carline',
            'prep/masspro',
            'cur',
            'start',
            'finish',
            'original',
        ];
    }
}
