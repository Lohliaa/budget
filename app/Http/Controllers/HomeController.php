<?php

namespace App\Http\Controllers;

use App\Exports\HomeExport;
use App\Imports\HomeImport;
use App\Models\Carline;
use App\Models\Cost;
use App\Models\Home;
use App\Models\KodeBudget;
use App\Models\MasterBarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        set_time_limit(0);
        $role = Auth::id();
        if (Auth::user()->role === 'Admin') {
            $home = Home::orderBy('id', 'asc')->paginate(10000);
        } else {
            $home = Home::where('role_id', $role)->orderBy('id', 'asc')->paginate(10000);
        }
        // $home = Home::where('role_id', $role)->orderBy('id', 'asc')->paginate(10000);
        $count = $home->count();
        $data = $home->all();
        $master_barang = MasterBarang::all();
        $kode_budget = KodeBudget::all();
        $carline = Carline::all();
        $cost = Cost::all();
        return view('home', compact('home', 'count', 'data', 'master_barang', 'kode_budget', 'carline','cost'   ));
    }

    public function searchHome(Request $request)
    {
        $searchTerm = $request->input('home');
        $role = Auth::id();

        $query = Home::query();

        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('section', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('code', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('nama', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('kode_budget', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('cur', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('order_plan', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('delivery_plan', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('fixed', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('prep', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('kode_carline', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('remark', 'LIKE', '%' . $searchTerm . '%');
            });

            // Tambahkan kondisi untuk mencocokkan role_id
            $query->where('role_id', $role);
        }

        $home = $query->paginate(100);

        return view('partialhome', ['home' => $home]);
    }

    public function export_excel()
    {
        return Excel::download(new HomeExport, 'budget.xlsx');
    }

    public function import_excel_home(Request $request)
    {
        set_time_limit(0);
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $path = $file->storeAs('public/excel/', $nama_file);

        Excel::import(new HomeImport(), storage_path('app/public/excel/' . $nama_file));

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
        return view('home.create');
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
            'section' => 'required',
            'code' => 'required',
            'nama' => 'required',
            'kode_budget' => 'required',
            'cur' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'order_plan' => 'required',
            'delivery_plan' => 'required',
            'fixed' => 'required',
            'prep' => 'required',
            'kode_carline' => 'required',
            'remark' => 'required',
        ]);

        $role = Auth::id();

        $home = Home::create([
            'section' => $request->section,
            'code' => $request->code,
            'nama' => $request->nama,
            'kode_budget' => $request->kode_budget,
            'cur' => $request->cur,
            'qty' => $request->qty,
            'price' => $request->price,
            'order_plan' => $request->order_plan,
            'delivery_plan' => $request->delivery_plan,
            'fixed' => $request->fixed,
            'prep' => $request->prep,
            'kode_carline' => $request->kode_carline,
            'remark' => $request->remark,
            'role_id' => $role,
        ]);

        if ($home) {
            return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('home')->with(['error' => 'Data Gagal Disimpan!']);
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
            'section' => 'required',
            'code' => 'required',
            'nama' => 'required',
            'kode_budget' => 'required',
            'cur' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'order_plan' => 'required',
            'delivery_plan' => 'required',
            'fixed' => 'required',
            'prep' => 'required',
            'kode_carline' => 'required',
            'remark' => 'required',
        ]);

        $role = Auth::id();

        $home = Home::find($id);

        $home->section = $request->input('section');
        $home->code = $request->input('code');
        $home->nama = $request->input('nama');
        $home->kode_budget = $request->input('kode_budget');
        $home->cur = $request->input('cur');
        $home->qty = $request->input('qty');
        $home->price = $request->input('price');
        $home->order_plan = $request->input('order_plan');
        $home->delivery_plan = $request->input('delivery_plan');
        $home->fixed = $request->input('fixed');
        $home->prep = $request->input('prep');
        $home->kode_carline = $request->input('kode_carline');
        $home->remark = $request->input('remark');
        $home->role_id = $role;

        if ($home->save()) {
            return redirect()->route('home')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            return redirect()->route('home')->with(['error' => 'Data Gagal Diperbarui!']);
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
        $role = Auth::id();

        Home::whereIn('id', $selectedIds)->where('role_id', $role)->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function reset_home()
    {
        $role = Auth::id();
        Home::where('role_id', $role)->delete();
        Home::truncate();
        return response()->json(['success' => "Deleted successfully."]);
    }
}
