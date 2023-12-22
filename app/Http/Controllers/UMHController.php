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
                $query->where('ltp_jul', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ltp_aug', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ltp_sep', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ltp_okt', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ltp_nov', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ltp_dec', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ltp_jan', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ltp_feb', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ltp_mar', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ltp_apr', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ltp_may', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ltp_jun', 'LIKE', '%' . $searchTerm . '%')

                    ->orWhere('stp_jul', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('stp_aug', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('stp_sep', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('stp_okt', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('stp_nov', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('stp_dec', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('stp_jan', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('stp_feb', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('stp_mar', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('stp_apr', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('stp_may', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('stp_jun', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $umh = $query->paginate(100);

        return view('umh.partial.umh', ['umh' => $umh]);
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
            'ltp_jul' => 'required',
            'ltp_aug' => 'required',
            'ltp_sep' => 'required',
            'ltp_okt' => 'required',
            'ltp_nov' => 'required',
            'ltp_dec' => 'required',
            'ltp_jan' => 'required',
            'ltp_feb' => 'required',
            'ltp_mar' => 'required',
            'ltp_apr' => 'required',
            'ltp_may' => 'required',
            'ltp_jun' => 'required',

            'stp_jul' => 'required',
            'stp_aug' => 'required',
            'stp_sep' => 'required',
            'stp_okt' => 'required',
            'stp_nov' => 'required',
            'stp_dec' => 'required',
            'stp_jan' => 'required',
            'stp_feb' => 'required',
            'stp_mar' => 'required',
            'stp_apr' => 'required',
            'stp_may' => 'required',
            'stp_jun' => 'required',
        ]);

        $umh = UMH::create([
            'ltp_jul' => $request->ltp_jul,
            'ltp_aug' => $request->ltp_aug,
            'ltp_sep' => $request->ltp_sep,
            'ltp_okt' => $request->ltp_okt,
            'ltp_nov' => $request->ltp_nov,
            'ltp_dec' => $request->ltp_dec,
            'ltp_jan' => $request->ltp_jan,
            'ltp_feb' => $request->ltp_feb,
            'ltp_mar' => $request->ltp_mar,
            'ltp_apr' => $request->ltp_apr,
            'ltp_may' => $request->ltp_may,
            'ltp_jun' => $request->ltp_jun,

            'stp_jul' => $request->stp_jul,
            'stp_aug' => $request->stp_aug,
            'stp_sep' => $request->stp_sep,
            'stp_okt' => $request->stp_okt,
            'stp_nov' => $request->stp_nov,
            'stp_dec' => $request->stp_dec,
            'stp_jan' => $request->stp_jan,
            'stp_feb' => $request->stp_feb,
            'stp_mar' => $request->stp_mar,
            'stp_apr' => $request->stp_apr,
            'stp_may' => $request->stp_may,
            'stp_jun' => $request->stp_jun,
        ]);

        if ($umh) {
            return redirect()->route('umh.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('umh.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function addUMH(Request $request)
    {
        // Validate the form data
        $request->validate([
            'ltp_jul' => '',
            'ltp_aug' => '',
            'ltp_sep' => '',
            'ltp_okt' => '',
            'ltp_nov' => '',
            'ltp_dec' => '',
            'ltp_jan' => '',
            'ltp_feb' => '',
            'ltp_mar' => '',
            'ltp_apr' => '',
            'ltp_may' => '',
            'ltp_jun' => '',

            'stp_jul' => '',
            'stp_aug' => '',
            'stp_sep' => '',
            'stp_okt' => '',
            'stp_nov' => '',
            'stp_dec' => '',
            'stp_jan' => '',
            'stp_feb' => '',
            'stp_mar' => '',
            'stp_apr' => '',
            'stp_may' => '',
            'stp_jun' => '',
        ]);

        // Create a new UMH instance
        $umh = new UMH;
        $umh->ltp_jul = $request->input('ltp_jul');
        $umh->ltp_aug = $request->input('ltp_aug');
        $umh->ltp_sep = $request->input('ltp_sep');
        $umh->ltp_okt = $request->input('ltp_okt');
        $umh->ltp_nov = $request->input('ltp_nov');
        $umh->ltp_dec = $request->input('ltp_dec');
        $umh->ltp_jan = $request->input('ltp_jan');
        $umh->ltp_feb = $request->input('ltp_feb');
        $umh->ltp_mar = $request->input('ltp_mar');
        $umh->ltp_apr = $request->input('ltp_apr');
        $umh->ltp_may = $request->input('ltp_may');
        $umh->ltp_jun = $request->input('ltp_jun');

        $umh->stp_jul = $request->input('stp_jul');
        $umh->stp_aug = $request->input('stp_aug');
        $umh->stp_sep = $request->input('stp_sep');
        $umh->stp_okt = $request->input('stp_okt');
        $umh->stp_nov = $request->input('stp_nov');
        $umh->stp_dec = $request->input('stp_dec');
        $umh->stp_jan = $request->input('stp_jan');
        $umh->stp_feb = $request->input('stp_feb');
        $umh->stp_mar = $request->input('stp_mar');
        $umh->stp_apr = $request->input('stp_apr');
        $umh->stp_may = $request->input('stp_may');
        $umh->stp_jun = $request->input('stp_jun');

        // Save the data to the database
        $umh->save();

        // You can add a success message or redirect to another page if needed
        return redirect('/umh')->with('success', 'UMH data added successfully.');
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
            'ltp_jul' => '',
            'ltp_aug' => '',
            'ltp_sep' => '',
            'ltp_okt' => '',
            'ltp_nov' => '',
            'ltp_dec' => '',
            'ltp_jan' => '',
            'ltp_feb' => '',
            'ltp_mar' => '',
            'ltp_apr' => '',
            'ltp_may' => '',
            'ltp_jun' => '',

            'stp_jul' => '',
            'stp_aug' => '',
            'stp_sep' => '',
            'stp_okt' => '',
            'stp_nov' => '',
            'stp_dec' => '',
            'stp_jan' => '',
            'stp_feb' => '',
            'stp_mar' => '',
            'stp_apr' => '',
            'stp_may' => '',
            'stp_jun' => '',
        ]);

        $umh = UMH::find($id);

        $umh->ltp_jul = $request->input('ltp_jul');
        $umh->ltp_aug = $request->input('ltp_aug');
        $umh->ltp_sep = $request->input('ltp_sep');
        $umh->ltp_okt = $request->input('ltp_okt');
        $umh->ltp_nov = $request->input('ltp_nov');
        $umh->ltp_dec = $request->input('ltp_dec');
        $umh->ltp_jan = $request->input('ltp_jan');
        $umh->ltp_feb = $request->input('ltp_feb');
        $umh->ltp_mar = $request->input('ltp_mar');
        $umh->ltp_apr = $request->input('ltp_apr');
        $umh->ltp_may = $request->input('ltp_may');
        $umh->ltp_jun = $request->input('ltp_jun');

        $umh->stp_jul = $request->input('stp_jul');
        $umh->stp_aug = $request->input('stp_aug');
        $umh->stp_sep = $request->input('stp_sep');
        $umh->stp_okt = $request->input('stp_okt');
        $umh->stp_nov = $request->input('stp_nov');
        $umh->stp_dec = $request->input('stp_dec');
        $umh->stp_jan = $request->input('stp_jan');
        $umh->stp_feb = $request->input('stp_feb');
        $umh->stp_mar = $request->input('stp_mar');
        $umh->stp_apr = $request->input('stp_apr');
        $umh->stp_may = $request->input('stp_may');
        $umh->stp_jun = $request->input('stp_jun');

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
