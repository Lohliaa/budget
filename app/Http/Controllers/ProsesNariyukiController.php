<?php

namespace App\Http\Controllers;

use App\Exports\ProsesNariyukiExport;
use App\Models\Home;
use App\Models\ProsesNariyuki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProsesNariyukiController extends Controller
{

    public function index(Request $request)
    {
        set_time_limit(0);
        $role = auth()->user()->role;

        if ($role === 'Admin') {
            $dataHome = DB::table('home')
                ->select(
                    'section',
                    'kode_budget',
                    'fixed',
                    'qty_jan',
                    'qty_feb',
                    'qty_mar',
                    'qty_apr',
                    'qty_may',
                    'qty_jun',
                    'qty_jul',
                    'qty_aug',
                    'qty_sep',
                    'qty_okt',
                    'qty_nov',
                    'qty_dec',
                    'amount_jan',
                    'amount_feb',
                    'amount_mar',
                    'amount_apr',
                    'amount_may',
                    'amount_jun',
                    'amount_jul',
                    'amount_aug',
                    'amount_sep',
                    'amount_okt',
                    'amount_nov',
                    'amount_dec'
                )
                ->whereIn('fixed', ['variabel'])
                ->get();
        } else {
            $dataHome = DB::table('home')
                ->select(
                    'section',
                    'kode_budget',
                    'fixed',
                    'qty_jan',
                    'qty_feb',
                    'qty_mar',
                    'qty_apr',
                    'qty_may',
                    'qty_jun',
                    'qty_jul',
                    'qty_aug',
                    'qty_sep',
                    'qty_okt',
                    'qty_nov',
                    'qty_dec',
                    'amount_jan',
                    'amount_feb',
                    'amount_mar',
                    'amount_apr',
                    'amount_may',
                    'amount_jun',
                    'amount_jul',
                    'amount_aug',
                    'amount_sep',
                    'amount_okt',
                    'amount_nov',
                    'amount_dec'
                )
                ->where('section', $role)
                ->whereIn('fixed', ['variabel'])
                ->get();
        }

        if (auth()->user()->role === 'Admin') {
            ProsesNariyuki::truncate();
        } else {
            ProsesNariyuki::where('section', auth()->user()->role)->delete();
        }

        foreach ($dataHome as $data) {
            $totalAmountPerMonth = [];
            foreach (['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec'] as $month) {
                $qtyColumn = 'qty_' . $month;
                $amountColumn = 'amount_' . $month;

                if (!is_null($data->{$qtyColumn})) {

                    $umhValue = DB::table('umh')
                        ->where('month', $month)
                        ->value('umh');

                    // Query untuk menghitung total amount per bulan
                    $totalAmountQuery = DB::table('home')
                        ->select('kode_budget', 'section', DB::raw("SUM($amountColumn) as total_amount"))
                        ->where('kode_budget', $data->kode_budget)
                        ->where('section', $data->section)
                        ->groupBy('kode_budget', 'section');

                    // Eksekusi query dan simpan hasilnya ke dalam array
                    $totalAmountResult = $totalAmountQuery->first();
                    $totalAmountPerMonth[$month] = $totalAmountResult->total_amount;

                    $new_umhValue = DB::table('umh')
                        ->where('month', $month)
                        ->value('new_umh');

                    ProsesNariyuki::updateOrInsert(
                        [
                            'section' => $data->section,
                            'kode_budget' => $data->kode_budget,
                            'fixed' => $data->fixed,
                            'month' => $month,
                            'umh' => $umhValue,
                            'amount' => $totalAmountPerMonth[$month],
                            'new_umh' => $new_umhValue,
                            'new_amount' => ($new_umhValue * $totalAmountPerMonth[$month]) / $umhValue
                        ]
                    );
                }
            }
        }

        if ($role === 'Admin') {
            $prosesNariyuki = ProsesNariyuki::all();
        } else {
            $prosesNariyuki = ProsesNariyuki::where('section', $role)->get();
        }

        $count = $prosesNariyuki->count();
        $data = $prosesNariyuki->all();

        return view('proses_nariyuki.index', compact('count', 'prosesNariyuki', 'data'));
    }

    public function searchProses(Request $request)
    {
        $searchTerm = $request->input('proses_nariyuki');

        $query = ProsesNariyuki::query();

        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('month', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('section', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('kode_budget', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('fixed', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('umh', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('new_umh', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('new_amount', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $proses_nariyuki = $query->paginate(5000);

        return view('proses_nariyuki.partial.proses_nariyuki', ['proses_nariyuki' => $proses_nariyuki]);
    }

    public function export_pn()
    {
        return Excel::download(new ProsesNariyukiExport, 'Summary Nariyuki.xlsx');
    }

    public function create()
    {
        return view('proses_nariyuki.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required',
            'section' => 'required',
            'kode_budget' => 'required',
            'fixed' => 'required',
            'umh' => 'required',
            'amount' => 'required',
            'new_umh' => 'required',
            'new_amount' => 'required',
        ]);

        $proses_nariyuki = ProsesNariyuki::create([
            'month' => $request->month,
            'section' => $request->section,
            'kode_budget' => $request->kode_budget,
            'fixed' => $request->fixed,
            'umh' => $request->umh,
            'amount' => $request->amount,
            'new_umh' => $request->new_umh,
            'new_amount' => $request->new_amount,

        ]);

        if ($proses_nariyuki) {
            return redirect()->route('proses_nariyuki.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('proses_nariyuki.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function addPN(Request $request)
    {
        // Validate the form data
        $request->validate([
            'month' => 'required',
            'section' => 'required',
            'kode_budget' => 'required',
            'fixed' => 'required',
            'umh' => 'required',
            'amount' => 'required',
            'new_umh' => 'required',
            'new_amount' => 'required',
        ]);

        $proses_nariyuki = new ProsesNariyuki();
        $proses_nariyuki->month = $request->input('month');
        $proses_nariyuki->section = $request->input('section');
        $proses_nariyuki->kode_budget = $request->input('kode_budget');
        $proses_nariyuki->fixed = $request->input('fixed');
        $proses_nariyuki->umh = $request->input('umh');
        $proses_nariyuki->amount = $request->input('amount');
        $proses_nariyuki->new_umh = $request->input('new_umh');
        $proses_nariyuki->new_amount = $request->input('new_amount');

        $proses_nariyuki->save();

        return redirect('/proses_nariyuki')->with('success', 'Proses Nariyuki data added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'month' => '',
            'section' => '',
            'kode_budget' => '',
            'fixed' => '',
            'umh' => '',
            'amount' => '',
            'new_umh' => '',
            'new_amount' => '',

        ]);

        $proses_nariyuki = ProsesNariyuki::find($id);

        $proses_nariyuki->month = $request->input('month');
        $proses_nariyuki->section = $request->input('section');
        $proses_nariyuki->kode_budget = $request->input('kode_budget');
        $proses_nariyuki->fixed = $request->input('fixed');
        $proses_nariyuki->umh = $request->input('umh');
        $proses_nariyuki->amount = $request->input('amount');
        $proses_nariyuki->new_umh = $request->input('new_umh');
        $proses_nariyuki->new_amount = $request->input('new_amount');

        if ($proses_nariyuki->save()) {
            return redirect()->route('proses_nariyuki.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            return redirect()->route('proses_nariyuki.index')->with(['error' => 'Data Gagal Diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteItems(Request $request)
    {
        $selectedIds = $request->input('ids');

        ProsesNariyuki::whereIn('id', $selectedIds)->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }


    public function reset_pn()
    {
        ProsesNariyuki::truncate();
        return response()->json(['success' => "Deleted successfully."]);
    }
}
