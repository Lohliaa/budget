<?php

namespace App\Http\Controllers;

use App\Imports\CostImport;
use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        set_time_limit(0);
        $cost = Cost::orderBy('id', 'asc')->paginate(10000);
        $count = $cost->count();
        $data = $cost->all();
        return view('cost.index', compact('cost', 'count', 'data'));
    }

    public function searchCost(Request $request)
    {
        $searchTerm = $request->input('cost');

        $query = Cost::query();

        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('cost_center', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('detail_cost_center', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $cost = $query->paginate(100);

        return view('cost.partial.cost', ['cost' => $cost]);
    }

    public function export_excel_carline()
    {
        return Excel::download(new MasterBarangExport, 'master barang.xlsx');
    }

    public function import_excel_cost(Request $request)
    {
        set_time_limit(0);
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $path = $file->storeAs('public/excel/', $nama_file);

        // Menggunakan import() tanpa antrian
        Excel::import(new CostImport(), storage_path('app/public/excel/' . $nama_file));

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
        return view('cost.create');
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
            'cost_center' => 'required',
            'detail_cost_center' => 'required',
        ]);

        $cost = Cost::create([
            'cost_center' => $request->cost_center,
            'detail_cost_center' => $request->detail_cost_center,
        ]);

        if ($cost) {
            return redirect()->route('cost.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('cost.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
            'cost_center' => 'required',
            'detail_cost_center' => 'required',
        ]);

        $cost = Cost::find($id);

        $cost->cost_center = $request->input('cost_center');
        $cost->detail_cost_center = $request->input('detail_cost_center');

        if ($cost->save()) {
            return redirect()->route('cost.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            return redirect()->route('cost.index')->with(['error' => 'Data Gagal Diperbarui!']);
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
    
        Cost::whereIn('id', $selectedIds)->delete();
    
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function reset_cost()
    {
        Cost::truncate();
        return response()->json(['success' => "Deleted successfully."]);
    }
}
