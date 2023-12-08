<?php

namespace App\Http\Controllers;

use App\Models\Deadline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeadlineController extends Controller
{
    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'deadline_date' => 'required|date',
    //         'deadline_time' => 'required',
    //     ]);
    
    //     try {
    //         $user = auth()->user();
    
    //         if ($user->role !== 'Admin') {
    //             return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengatur deadline.');
    //         }
    
    //         $deadline = Deadline::updateOrCreate([], [
    //             'deadline_datetime' => $request->input('deadline_date') . ' ' . $request->input('deadline_time')
    //         ]);
    
    //         return redirect()->back()->with('success', 'Deadline berhasil diatur.');
    //     } catch (\Exception $e) {
    //         dd($e->getMessage());
    //         return redirect()->back()->with('error', 'Gagal mengatur deadline. Silakan coba lagi.');
    //     }
    // }
    
}
