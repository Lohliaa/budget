<?php

namespace App\Http\Controllers;

use App\Models\Deadline;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function atur_deadline(Request $request)
    {
        $request->validate([
            'deadline_date' => 'required|date',
            'deadline_time' => 'required',
        ]);

        try {
            $user = auth()->user();

            if ($user->role !== 'Admin') {
                return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengatur deadline.');
            }

            $deadline = Deadline::firstOrNew(['user_id' => $user->id]);
            $deadline->deadline_datetime = $request->input('deadline_date') . ' ' . $request->input('deadline_time');
            $deadline->save();

            return redirect()->back()->with('success', 'Deadline berhasil diatur.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengatur deadline. Silakan coba lagi.');
        }
    }
}
