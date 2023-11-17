<?php

namespace App\Http\Controllers;

use App\Exports\HomeExport;
use App\Exports\HomeFilterExport;
use App\Imports\HomeImport;
use App\Models\Carline;
use App\Models\Cost;
use App\Models\Home;
use App\Models\KodeBudget;
use App\Models\MasterBarang;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $role = Auth::user()->role;
        $user = User::all();

        $currentYear = Carbon::now()->year;

        if ($role !== 'Admin') {
            $home = Home::where('section', $role)->whereYear('created_at', $currentYear)->get();
        } else {
            $home = Home::whereYear('created_at', $currentYear)->get();
        }

        $master_barang = MasterBarang::all();
        $kode_budget = KodeBudget::all();
        $carline = Carline::all();
        $cost = Cost::all();

        $tahun = Home::select('tahun')->distinct()->get();
        $section = Home::select('section')->distinct()->get();

        return view('home', compact('home', 'master_barang', 'kode_budget', 'carline', 'cost', 'user', 'tahun', 'section'));
    }

    public function filterByYear($tahun)
    {
        set_time_limit(0);
        $role = Auth::user()->role;
        $user = User::all();
        $home = null;

        if ($role === 'Admin') {
            $home = Home::orderBy('id', 'asc')->get();
            $home = Home::where('tahun', $tahun)->get();
        } else {
            $home = Home::where('section', $role)->orderBy('id', 'asc')->paginate(10000);
            $home = Home::where('tahun', $tahun)->where('section', $role)->get();
        }

        $master_barang = MasterBarang::all();
        $kode_budget = KodeBudget::all();
        $carline = Carline::all();
        $cost = Cost::all();

        $uniqueSection = Home::where('section', $role)->select('section')->distinct()->get();
        $uniqueYears = Home::where('section', $role)->select('tahun')->distinct()->get();

        return view('home', [
            'home' => $home,
            'tahun' => $uniqueYears,
            'section' => $uniqueSection,
            'master_barang' => $master_barang,
            'kode_budget' => $kode_budget,
            'carline' => $carline,
            'cost' => $cost,
            'user' => $user
        ]);
    }

    public function filterBySection(Request $request)
    {
        set_time_limit(0);
        $role = Auth::user()->role;
        $currentYear = Carbon::now()->year;

        $selectedSections = $request->input('sections');

        $homeQuery = Home::query();

        if (!empty($selectedSections)) {
            $homeQuery->whereIn('section', $selectedSections);
        }

        if ($role !== 'Admin') {
            $homeQuery->where('section', $role);
        }

        $homeQuery->whereYear('created_at', $currentYear);

        $home = $homeQuery->get();

        $master_barang = MasterBarang::all();
        $kode_budget = KodeBudget::all();
        $carline = Carline::all();
        $cost = Cost::all();
        $tahun = Home::select('tahun')->distinct()->get();
        $section = Home::select('section')->distinct()->get();

        return view('partialhome', compact('home', 'cost', 'kode_budget', 'carline', 'master_barang', 'section', 'tahun'));
    }


    public function loadOriginalData(Request $request)
    {
        set_time_limit(0);

        // Jika pengguna adalah admin, ambil semua data dari tabel Home
        if (Auth::user()->role === 'Admin') {
            $home = Home::all();
        } else {
            // Jika bukan admin, ambil data sesuai dengan peran pengguna
            $home = Home::where('section', Auth::user()->role)->get();
        }

        // Load data lain yang mungkin diperlukan
        $master_barang = MasterBarang::all();
        $kode_budget = KodeBudget::all();
        $carline = Carline::all();
        $cost = Cost::all();
        $tahun = Home::select('tahun')->distinct()->get();
        $section = Home::select('section')->distinct()->get();

        return view('partialhome', compact('home', 'cost', 'kode_budget', 'carline', 'master_barang', 'section', 'tahun'));
    }

    public function searchHome(Request $request)
    {
        $searchTerm = $request->input('home');

        $query = Home::query();

        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('section', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('code', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('nama', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('kode_budget', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('cur', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('fixed', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('prep', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('kode_carline', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('remark', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_jul', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_jul', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_jul', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_aug', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_aug', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_aug', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_sep', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_sep', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_sep', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_okt', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_okt', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_okt', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_nov', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_nov', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_nov', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_dec', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_dec', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_dec', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_jan', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_jan', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_jan', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_feb', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_feb', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_feb', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_mar', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_mar', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_mar', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_apr', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_apr', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_apr', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_may', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_may', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_may', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('qty_jun', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('price_jun', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount_jun', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $home = $query->paginate(100);

        return view('partialhome', ['home' => $home]);
    }

    public function downloadFilteredData(Request $request)
    {
        set_time_limit(0);
        $sections = $request->input('sections');
        
        $query = Home::query();
    
        if (!empty($sections)) {
            $query->whereIn('section', $sections);
        }
    
        $sectionData = $query->get();

        return Excel::download(new HomeFilterExport($sectionData), 'Filter Section.xlsx');
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
        $tahun = $request->input('tahun');
        Excel::import(new HomeImport($tahun), storage_path('app/public/excel/' . $nama_file));

        Storage::delete($path);

        return back()->with('success', "Data berhasil diimport!");
    }

    public function create()
    {
        return view('home.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required',
            'code' => 'required',
            'nama' => 'required',
            'kode_budget' => 'required',
            'cur' => 'required',
            'fixed' => 'required',
            'prep' => 'required',
            'kode_carline' => 'required',
            'remark' => 'required',
            'qty_jul' => 'required',
            'price_jul' => 'required',
            'amount_jul' => 'required',
            'qty_aug' => 'required',
            'price_aug' => 'required',
            'amount_aug' => 'required',
            'qty_sep' => 'required',
            'price_sep' => 'required',
            'amount_sep' => 'required',
            'qty_okt' => 'required',
            'price_okt' => 'required',
            'amount_okt' => 'required',
            'qty_nov' => 'required',
            'price_nov' => 'required',
            'amount_nov' => 'required',
            'qty_dec' => 'required',
            'price_dec' => 'required',
            'amount_dec' => 'required',
            'qty_jan' => 'required',
            'price_jan' => 'required',
            'amount_jan' => 'required',
            'qty_feb' => 'required',
            'price_feb' => 'required',
            'amount_feb' => 'required',
            'qty_mar' => 'required',
            'price_mar' => 'required',
            'amount_mar' => 'required',
            'qty_apr' => 'required',
            'price_apr' => 'required',
            'amount_apr' => 'required',
            'qty_may' => 'required',
            'price_may' => 'required',
            'amount_may' => 'required',
            'qty_jun' => 'required',
            'price_jun' => 'required',
            'amount_jun' => 'required',
            'tahun' => 'required',

        ]);

        $role = Auth::id();

        $home = Home::create([
            'section' => $request->section,
            'code' => $request->code,
            'nama' => $request->nama,
            'kode_budget' => $request->kode_budget,
            'cur' => $request->cur,
            'fixed' => $request->fixed,
            'prep' => $request->prep,
            'kode_carline' => $request->kode_carline,
            'remark' => $request->remark,
            'qty_jul' => $request->qty_jul,
            'price_jul' => $request->price_jul,
            'amount_jul' => $request->amount_jul,
            'qty_aug' => $request->qty_aug,
            'price_aug' => $request->price_aug,
            'amount_aug' => $request->amount_aug,
            'qty_sep' => $request->qty_sep,
            'price_sep' => $request->price_sep,
            'amount_sep' => $request->amount_sep,
            'qty_okt' => $request->qty_okt,
            'price_okt' => $request->price_okt,
            'amount_okt' => $request->amount_okt,
            'qty_nov' => $request->qty_nov,
            'price_nov' => $request->price_nov,
            'amount_nov' => $request->amount_nov,
            'qty_dec' => $request->qty_dec,
            'price_dec' => $request->price_dec,
            'amount_dec' => $request->amount_dec,
            'qty_jan' => $request->qty_jan,
            'price_jan' => $request->price_jan,
            'amount_jan' => $request->amount_jan,
            'qty_feb' => $request->qty_feb,
            'price_feb' => $request->price_feb,
            'amount_feb' => $request->amount_feb,
            'qty_mar' => $request->qty_mar,
            'price_mar' => $request->price_mar,
            'amount_mar' => $request->amount_mar,
            'qty_apr' => $request->qty_apr,
            'price_apr' => $request->price_apr,
            'amount_apr' => $request->amount_apr,
            'qty_may' => $request->qty_may,
            'price_may' => $request->price_may,
            'amount_may' => $request->amount_may,
            'qty_jun' => $request->qty_jun,
            'price_jun' => $request->price_jun,
            'amount_jun' => $request->amount_jun,
            'tahun' => $request->tahun,

            'role_id' => $role,
        ]);

        if ($home) {
            return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('home')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function addHome(Request $request)
    {
        $request->validate([
            'section' => '',
            'code' => '',
            'nama' => '',
            'kode_budget' => '',
            'cur' => '',
            'fixed' => '',
            'prep' => '',
            'kode_carline' => '',
            'remark' => '',
            'qty_jul' => '',
            'price_jul' => '',
            'amount_jul' => '',
            'qty_aug' => '',
            'price_aug' => '',
            'amount_aug' => '',
            'qty_sep' => '',
            'price_sep' => '',
            'amount_sep' => '',
            'qty_okt' => '',
            'price_okt' => '',
            'amount_okt' => '',
            'qty_nov' => '',
            'price_nov' => '',
            'amount_nov' => '',
            'qty_dec' => '',
            'price_dec' => '',
            'amount_dec' => '',
            'qty_jan' => '',
            'price_jan' => '',
            'amount_jan' => '',
            'qty_feb' => '',
            'price_feb' => '',
            'amount_feb' => '',
            'qty_mar' => '',
            'price_mar' => '',
            'amount_mar' => '',
            'qty_apr' => '',
            'price_apr' => '',
            'amount_apr' => '',
            'qty_may' => '',
            'price_may' => '',
            'amount_may' => '',
            'qty_jun' => '',
            'price_jun' => '',
            'amount_jun' => '',
            'tahun' => '',

        ]);

        $role = Auth::id();

        $home = new Home();
        $home->section = $request->input('section');
        $home->code = $request->input('code');
        $home->nama = $request->input('nama');
        $home->kode_budget = $request->input('kode_budget');
        $home->cur = $request->input('cur');
        $home->fixed = $request->input('fixed');
        $home->prep = $request->input('prep');
        $home->kode_carline = $request->input('kode_carline');
        $home->remark = $request->input('remark');
        $home->qty_jul = $request->input('qty_jul');
        $home->price_jul = $request->input('price_jul');
        $home->amount_jul = $request->input('amount_jul');
        $home->qty_aug = $request->input('qty_aug');
        $home->price_aug = $request->input('price_aug');
        $home->amount_aug = $request->input('amount_aug');
        $home->qty_sep = $request->input('qty_sep');
        $home->price_sep = $request->input('price_sep');
        $home->amount_sep = $request->input('amount_sep');
        $home->qty_okt = $request->input('qty_okt');
        $home->price_okt = $request->input('price_okt');
        $home->amount_okt = $request->input('amount_okt');
        $home->qty_nov = $request->input('qty_nov');
        $home->price_nov = $request->input('price_nov');
        $home->amount_nov = $request->input('amount_nov');
        $home->qty_dec = $request->input('qty_dec');
        $home->price_dec = $request->input('price_dec');
        $home->amount_dec = $request->input('amount_dec');
        $home->qty_jan = $request->input('qty_jan');
        $home->price_jan = $request->input('price_jan');
        $home->amount_jan = $request->input('amount_jan');
        $home->qty_feb = $request->input('qty_feb');
        $home->price_feb = $request->input('price_feb');
        $home->amount_feb = $request->input('amount_feb');
        $home->qty_mar = $request->input('qty_mar');
        $home->price_mar = $request->input('price_mar');
        $home->amount_mar = $request->input('amount_mar');
        $home->qty_apr = $request->input('qty_apr');
        $home->price_apr = $request->input('price_apr');
        $home->amount_apr = $request->input('amount_apr');
        $home->qty_may = $request->input('qty_may');
        $home->price_may = $request->input('price_may');
        $home->amount_may = $request->input('amount_may');
        $home->qty_jun = $request->input('qty_jun');
        $home->price_jun = $request->input('price_jun');
        $home->amount_jun = $request->input('amount_jun');
        $home->tahun = $request->input('tahun');

        $home->role_id = $role;

        if ($home->save()) {
            return redirect()->route('home')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            return redirect()->route('home')->with(['error' => 'Data Gagal Diperbarui!']);
        }
    }

    public function getMasterBarangName(Request $request)
    {
        $code = $request->input('code');
        $masterBarang = MasterBarang::where('code', $code)->first();
        return response()->json(['name' => $masterBarang ? $masterBarang->name : '']);
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'section' => '',
            'code' => '',
            'nama' => '',
            'kode_budget' => '',
            'cur' => '',
            'fixed' => '',
            'prep' => '',
            'kode_carline' => '',
            'remark' => '',
            'qty_jul' => '',
            'price_jul' => '',
            'amount_jul' => '',
            'qty_aug' => '',
            'price_aug' => '',
            'amount_aug' => '',
            'qty_sep' => '',
            'price_sep' => '',
            'amount_sep' => '',
            'qty_okt' => '',
            'price_okt' => '',
            'amount_okt' => '',
            'qty_nov' => '',
            'price_nov' => '',
            'amount_nov' => '',
            'qty_dec' => '',
            'price_dec' => '',
            'amount_dec' => '',
            'qty_jan' => '',
            'price_jan' => '',
            'amount_jan' => '',
            'qty_feb' => '',
            'price_feb' => '',
            'amount_feb' => '',
            'qty_mar' => '',
            'price_mar' => '',
            'amount_mar' => '',
            'qty_apr' => '',
            'price_apr' => '',
            'amount_apr' => '',
            'qty_may' => '',
            'price_may' => '',
            'amount_may' => '',
            'qty_jun' => '',
            'price_jun' => '',
            'amount_jun' => '',

        ]);

        $role = Auth::id();

        $home = Home::find($id);

        $home->section = $request->input('section');
        $home->code = $request->input('code');
        $home->nama = $request->input('nama');
        $home->kode_budget = $request->input('kode_budget');
        $home->cur = $request->input('cur');
        $home->fixed = $request->input('fixed');
        $home->prep = $request->input('prep');
        $home->kode_carline = $request->input('kode_carline');
        $home->remark = $request->input('remark');
        $home->qty_jul = $request->input('qty_jul');
        $home->price_jul = $request->input('price_jul');
        $home->amount_jul = $request->input('amount_jul');
        $home->qty_aug = $request->input('qty_aug');
        $home->price_aug = $request->input('price_aug');
        $home->amount_aug = $request->input('amount_aug');
        $home->qty_sep = $request->input('qty_sep');
        $home->price_sep = $request->input('price_sep');
        $home->amount_sep = $request->input('amount_sep');
        $home->qty_okt = $request->input('qty_okt');
        $home->price_okt = $request->input('price_okt');
        $home->amount_okt = $request->input('amount_okt');
        $home->qty_nov = $request->input('qty_nov');
        $home->price_nov = $request->input('price_nov');
        $home->amount_nov = $request->input('amount_nov');
        $home->qty_dec = $request->input('qty_dec');
        $home->price_dec = $request->input('price_dec');
        $home->amount_dec = $request->input('amount_dec');
        $home->qty_jan = $request->input('qty_jan');
        $home->price_jan = $request->input('price_jan');
        $home->amount_jan = $request->input('amount_jan');
        $home->qty_feb = $request->input('qty_feb');
        $home->price_feb = $request->input('price_feb');
        $home->amount_feb = $request->input('amount_feb');
        $home->qty_mar = $request->input('qty_mar');
        $home->price_mar = $request->input('price_mar');
        $home->amount_mar = $request->input('amount_mar');
        $home->qty_apr = $request->input('qty_apr');
        $home->price_apr = $request->input('price_apr');
        $home->amount_apr = $request->input('amount_apr');
        $home->qty_may = $request->input('qty_may');
        $home->price_may = $request->input('price_may');
        $home->amount_may = $request->input('amount_may');
        $home->qty_jun = $request->input('qty_jun');
        $home->price_jun = $request->input('price_jun');
        $home->amount_jun = $request->input('amount_jun');

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
        $userRole = Auth::user()->role;

        if ($userRole === 'Admin') {
            Home::truncate();
            return response()->json(['success' => 'Data truncated successfully.']);
        } else {
            $role = Auth::id();
            Home::where('role_id', $role)->delete();
            return response()->json(['success' => 'Data deleted successfully.']);
        }
    }
}
