<?php

namespace App\Http\Controllers;

use App\Imports\UMHImport;
use App\Models\UMH;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UMHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        set_time_limit(0);
        $umh = UMH::orderBy('id', 'asc')->paginate(4000);
        $count = $umh->count();
        $data = $umh->all();
        return view('umh.index', compact('umh', 'count', 'data'));
    }

    public function searchUMH(Request $request)
    {
        $searchTerm = $request->input('umh');

        $query = UMH::query();

        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('month', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('umh', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('new_umh', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('new_amount', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $umh = $query->paginate(100);

        return view('umh.partial.umh', ['umh' => $umh]);
    }

    public function export_excel_umh()
    {
        return Excel::download(new MasterBarangExport, 'UMH.xlsx');
    }

    public function import_excel_umh(Request $request)
    {
        set_time_limit(0);
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $path = $file->storeAs('public/excel/', $nama_file);

        // Menggunakan import() tanpa antrian
        Excel::import(new UMHImport(), storage_path('app/public/excel/' . $nama_file));

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
        return view('umh.create');
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
            'month' => 'required',
            'umh' => 'required',
            'amount' => 'required',
            'new_umh' => 'required',
            'new_amount' => 'required',
        ]);

        $umh = UMH::create([
            'month' => $request->month,
            'umh' => $request->umh,
            'amount' => $request->amount,
            'new_umh' => $request->new_umh,
            'new_amount' => $request->new_amount,

        ]);

        if ($umh) {
            return redirect()->route('umh.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('umh.index')->with(['error' => 'Data Gagal Disimpan!']);
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
            'month' => '',
            'umh' => '',
            'amount' => '',
            'new_umh' => '',
            'new_amount' => '',

        ]);

        $umh = UMH::find($id);

        $umh->month = $request->input('month');
        $umh->umh = $request->input('umh');
        $umh->amount = $request->input('amount');
        $umh->new_umh = $request->input('new_umh');
        $umh->new_amount = $request->input('new_amount');

        if ($umh->save()) {
            return redirect()->route('umh.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            return redirect()->route('umh.index')->with(['error' => 'Data Gagal Diperbarui!']);
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

        UMH::whereIn('id', $selectedIds)->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }


    public function reset_umh()
    {
        UMH::truncate();
        return response()->json(['success' => "Deleted successfully."]);
    }
}
