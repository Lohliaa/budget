<?php

namespace App\Http\Controllers;

use App\Exports\MasterBarangExport;
use App\Imports\MasterBarangImport;
use App\Models\MasterBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        set_time_limit(0);
        $master_barang = MasterBarang::orderBy('id', 'asc')->paginate(4000);
        $count = $master_barang->count();
        $data = $master_barang->all();
        return view('master_barang.index', compact('master_barang', 'count', 'data'));

    }

    public function searchMB(Request $request)
    {
        $searchTerm = $request->input('master_barang');

        $query = MasterBarang::query();

        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('code', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('satuan', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('account_1', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('account_2', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('account_3', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('account_4', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('account_5', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('account_6', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('account_7', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('account_8', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('account_9', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('account_10', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $master_barang = $query->paginate(500);

        return view('master_barang.partial.master_barang', ['master_barang' => $master_barang]);
    }

    public function export_excel_mb()
    {
        return Excel::download(new MasterBarangExport, 'Master Barang.xlsx');
    }

    public function import_excel_mb(Request $request)
    {
        set_time_limit(0);
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
    
        $file = $request->file('file');
    
        $nama_file = rand() . $file->getClientOriginalName();
    
        $path = $file->storeAs('public/excel/', $nama_file);
    
        Excel::import(new MasterBarangImport(), storage_path('app/public/excel/' . $nama_file));
    
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
        return view('master_barang.create');
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
            'code' => 'required',
            'name' => 'required',
            'satuan' => 'required',
            'account_1' => 'required',
            'account_2' => 'required',
            'account_3' => 'required',
            'account_4' => 'required',
            'account_5' => 'required',
            'account_6' => 'required',
            'account_7' => 'required',
            'account_8' => 'required',
            'account_9' => 'required',
            'account_10' => 'required',

        ]);

        $master_barang = MasterBarang::create([
            'code' => $request->code,
            'name' => $request->name,
            'satuan' => $request->satuan,
            'account_1' => $request->account_1,
            'account_2' => $request->account_2,
            'account_3' => $request->account_3,
            'account_4' => $request->account_4,
            'account_5' => $request->account_5,
            'account_6' => $request->account_6,
            'account_7' => $request->account_7,
            'account_8' => $request->account_8,
            'account_9' => $request->account_9,
            'account_10' => $request->account_10,

        ]);

        if ($master_barang) {
            return redirect()->route('master_barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('master_barang.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function addMB(Request $request)
    {
        // Validate the form data
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'satuan' => 'required',
            'account_1' => 'required',
            'account_2' => 'required',
            'account_3' => 'required',
            'account_4' => 'required',
            'account_5' => 'required',
            'account_6' => 'required',
            'account_7' => 'required',
            'account_8' => 'required',
            'account_9' => 'required',
            'account_10' => 'required',
        ]);

        // Create a new UMH instance
        $master_barang = new MasterBarang();
        $master_barang->code = $request->input('code');
        $master_barang->name = $request->input('name');
        $master_barang->satuan = $request->input('satuan');
        $master_barang->account_1 = $request->input('account_1');
        $master_barang->account_2 = $request->input('account_2');
        $master_barang->account_3 = $request->input('account_3');
        $master_barang->account_4 = $request->input('account_4');
        $master_barang->account_5 = $request->input('account_5');
        $master_barang->account_6 = $request->input('account_6');
        $master_barang->account_7 = $request->input('account_7');
        $master_barang->account_8 = $request->input('account_8');
        $master_barang->account_9 = $request->input('account_9');
        $master_barang->account_10 = $request->input('account_10');

        // Save the data to the database
        $master_barang->save();

        // You can add a success message or redirect to another page if needed
        return redirect('/master_barang')->with('success', 'Master Barang data added successfully.');
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
            'code' => 'required',
            'name' => 'required',
            'satuan' => 'required',
            'account_1' => '',
            'account_2' => '',
            'account_3' => '',
            'account_4' => '',
            'account_5' => '',
            'account_6' => '',
            'account_7' => '',
            'account_8' => '',
            'account_9' => '',
            'account_10' => '',

        ]);

        $master_barang = MasterBarang::find($id);

        $master_barang->code = $request->input('code');
        $master_barang->name = $request->input('name');
        $master_barang->satuan = $request->input('satuan');
        $master_barang->account_1 = $request->input('account_1');
        $master_barang->account_2 = $request->input('account_2');
        $master_barang->account_3 = $request->input('account_3');
        $master_barang->account_4 = $request->input('account_4');
        $master_barang->account_5 = $request->input('account_5');
        $master_barang->account_6 = $request->input('account_6');
        $master_barang->account_7 = $request->input('account_7');
        $master_barang->account_8 = $request->input('account_8');
        $master_barang->account_9 = $request->input('account_9');
        $master_barang->account_10 = $request->input('account_10');


        if ($master_barang->save()) {
            return redirect()->route('master_barang.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            return redirect()->route('master_barang.index')->with(['error' => 'Data Gagal Diperbarui!']);
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
    
        MasterBarang::whereIn('id', $selectedIds)->delete();
    
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function reset_mb()
    {
        MasterBarang::truncate();
        return response()->json(['success' => "Deleted successfully."]);
    }
}
