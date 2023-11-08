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
use Maatwebsite\Excel\Concerns\WithMapping;
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

class SummarySheet implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
    
        $result = [];
    
        $monthYearValues = []; // Inisialisasi array untuk nilai 'F Y'
    
        foreach ($homeData as $homeRow) {
            $section = $homeRow->section;
    
            // Temukan data yang sesuai dengan 'section' dari tabel 'cost'
            $matchingCostRow = $costData->where('cost_center', $section)->first();
    
            // Pastikan data yang cocok ditemukan sebelum melanjutkan
            if ($matchingCostRow) {
                // Hitung nilai untuk setiap bulan antara 'order_plan' dan 'delivery_plan'
                $orderPlan = Carbon::parse($homeRow->order_plan);
                $deliveryPlan = Carbon::parse($homeRow->delivery_plan);
    
                while ($orderPlan <= $deliveryPlan) {
                    $monthYear = $orderPlan->format('F Y');
                    $value = $homeRow->qty * $homeRow->price;
    
                    // Tambahkan data 'F Y' dan nilai ke dalam array
                    $monthYearValues[$monthYear] = $value;
                    $orderPlan->addMonth();
                }
    
                // Buat data yang akan dimasukkan ke dalam hasil akhir
                $result[] = [
                    'section' => $section,
                    'nama_section' => $matchingCostRow->nama_section,
                    'fixed' => $homeRow->fixed,
                    'kode_budget' => $homeRow->kode_budget,
                    'kode_carline' => $homeRow->kode_carline,
                    'prep' => $homeRow->prep,
                    'cur' => $homeRow->cur,
                    'order_plan' => $homeRow->order_plan,
                    'delivery_plan' => $homeRow->delivery_plan,
                ];
            }
        }
    
        // Menambahkan 'F Y' sebagai subkolom
        $result = collect($result)->map(function ($item) use ($monthYearValues) {
            $item['original'] = $monthYearValues;
            return $item;
        });
    
        return $result;
    }  
      
    public function headings(): array
    {
        $headings = [
            'Section',
            'Nama Section',
            'Fixed',
            'Kode Budget',
            'Kode Carline',
            'Prep',
            'Cur',
            'Order Plan',
            'Delivery Plan',
        ];
    
        $uniqueMonthYears = [];
        foreach ($this->collection() as $row) {
            foreach (array_keys($row['original']) as $monthYear) {
                $uniqueMonthYears[$monthYear] = $monthYear;
            }
        }
    
        $headings = array_merge($headings, $uniqueMonthYears);
    
        return $headings;
    }
    
    public function map($row): array
    {
        $data = [
            $row['section'],
            $row['nama_section'],
            $row['fixed'],
            $row['kode_budget'],
            $row['kode_carline'],
            $row['prep'],
            $row['cur'],
            $row['order_plan'],
            $row['delivery_plan'],
        ];

        foreach ($row['original'] as $monthYear => $value) {
            $data[] = $value;
        }

        return $data;
    }
}
