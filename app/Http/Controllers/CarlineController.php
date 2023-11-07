<?php

namespace App\Http\Controllers;

use App\Imports\CarlineImport;
use App\Models\Carline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CarlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        set_time_limit(0);
        $carline = Carline::orderBy('id', 'asc')->paginate(10000);
        $count = $carline->count();
        $data = $carline->all();
        return view('carline.index', compact('carline', 'count', 'data'));

    }

    public function searchCarline(Request $request)
    {
        $searchTerm = $request->input('carline');

        $query = Carline::query();

        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('destination_ppc', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('hfm_carline', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('model_year', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('kode', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $carline = $query->paginate(100);

        return view('carline.partial.carline', ['carline' => $carline]);
    }


    public function export_excel_carline()
    {
        return Excel::download(new MasterBarangExport, 'master barang.xlsx');
    }

    public function import_excel_carline(Request $request)
    {
        set_time_limit(0);
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
    
        $file = $request->file('file');
    
        $nama_file = rand() . $file->getClientOriginalName();
    
        $path = $file->storeAs('public/excel/', $nama_file);
    
        // Menggunakan import() tanpa antrian
        Excel::import(new CarlineImport(), storage_path('app/public/excel/' . $nama_file));
    
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
        return view('carline.create');

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
            'destination_ppc' => 'required',
            'hfm_carline' => 'required',
            'model_year' => 'required',
            'kode' => 'required',
        ]);

        $carline = Carline::create([
            'destination_ppc' => $request->destination_ppc,
            'hfm_carline' => $request->hfm_carline,
            'model_year' => $request->model_year,
            'kode' => $request->kode,
        ]);

        if ($carline) {
            return redirect()->route('carline.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('carline.index')->with(['error' => 'Data Gagal Disimpan!']);
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
            'destination_ppc' => '',
            'hfm_carline' => '',
            'model_year' => '',
            'kode' => '',
        ]);

        $carline = Carline::find($id);

        $carline->destination_ppc = $request->input('destination_ppc');
        $carline->hfm_carline = $request->input('hfm_carline');
        $carline->model_year = $request->input('model_year');
        $carline->kode = $request->input('kode');

        if ($carline->save()) {
            return redirect()->route('carline.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            return redirect()->route('carline.index')->with(['error' => 'Data Gagal Diperbarui!']);
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
    
        Carline::whereIn('id', $selectedIds)->delete();
    
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function reset_carline()
    {
        Carline::truncate();
        return response()->json(['success' => "Deleted successfully."]);
    }
}
