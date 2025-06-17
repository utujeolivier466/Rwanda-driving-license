<?php

namespace App\Http\Controllers;
use App\Models\candidate;
use App\Models\grade;

use Illuminate\Http\Request;

class reportController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        if ($start_date && $end_date) {
            $candidates = candidate::with('grade')->whereBetween('examDate', [$start_date, $end_date])->get();
            $count_candidate = $candidates->count('id');

        } else {
            $candidates = candidate::with('grade')->get();
            $count_candidate  = $candidates->count('id');

        }

        return view('report', compact('candidates','count_candidate'));
    }
}
