<?php

namespace App\Http\Controllers;

use App\Imports\KodeBudgetImport;
use App\Models\KodeBudget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class KodeBudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        set_time_limit(0);
        $kode_budget = KodeBudget::orderBy('id', 'asc')->paginate(10000);
        $count = $kode_budget->count();
        $data = $kode_budget->all();
        return view('kode_budget.index', compact('kode_budget', 'count', 'data'));
    }

    public function cari(Request $request)
    {
        $keyword = $request->cari;
        $kode_budget = KodeBudget::where(function ($query) use ($keyword) {
            $query->where('kode_budget', 'like', "%{$keyword}%");
        })->get();
        return view('kode_budget.index', compact('kode_budget'));
    }

    public function searchKb(Request $request)
    {
        $searchTerm = $request->input('kode_budget');

        $query = KodeBudget::query();

        if ($searchTerm) {
            $query->where('kode_budget', 'LIKE', '%' . $searchTerm . '%');
        }

        $kode_budget = $query->paginate(100);

        return view('kode_budget.partial.kode_budget', ['kode_budget' => $kode_budget]);
    }

    public function export_excel_kb()
    {
        return Excel::download(new MasterBarangExport, 'master barang.xlsx');
    }

    public function import_excel_kb(Request $request)
    {
        set_time_limit(0);
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $path = $file->storeAs('public/excel/', $nama_file);

        // Menggunakan import() tanpa antrian
        Excel::import(new KodeBudgetImport(), storage_path('app/public/excel/' . $nama_file));

        Storage::delete($path);

        return back()->with('success', "Data berhasil diimport!");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kode_budget.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_budget' => 'required',
        ]);

        $kode_budget = KodeBudget::create([
            'kode_budget' => $request->kode_budget,
        ]);

        if ($kode_budget) {
            return redirect()->route('kode_budget.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('kode_budget.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function addKb(Request $request)
    {
        // Validate the form data
        $request->validate([
            'kode_budget' => 'required',
        ]);

        // Create a new UMH instance
        $kode_budget = new KodeBudget();
        $kode_budget->kode_budget = $request->input('kode_budget');

        // Save the data to the database
        $kode_budget->save();

        // You can add a success message or redirect to another page if needed
        return redirect('/kode_budget')->with('success', 'kode Budget data added successfully.');
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
            'kode_budget' => 'required',
        ]);

        $kode_budget = KodeBudget::find($id);

        $kode_budget->kode_budget = $request->input('kode_budget');

        if ($kode_budget->save()) {
            return redirect()->route('kode_budget.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            return redirect()->route('kode_budget.index')->with(['error' => 'Data Gagal Diperbarui!']);
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

        KodeBudget::whereIn('id', $selectedIds)->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function reset_kb()
    {
        KodeBudget::truncate();
        return response()->json(['success' => "Deleted successfully."]);
    }
}
