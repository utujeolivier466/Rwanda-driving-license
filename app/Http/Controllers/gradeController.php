<?php

namespace App\Http\Controllers;
use App\Models\grade;
use App\Models\candidate;

use Illuminate\Http\Request;

class gradeController extends Controller
{
    public function select_grade()
    {
        $grades = grade::with('candidate')->paginate(5);
        return view('grade.index_grade', compact('grades'));
    }
    public function register_grade(Request $request)
    {
        $request->validate([
            'candidateNationalId' => 'required',
            'candidate_name' => 'required',
            'licenseExamCategory' => 'required',
            'obtainedmarks_20' => 'required|numeric',
        ]);

        $decision = $request->obtainedmarks_20 < 12 ? 'Fail' : 'Pass';

        grade::create([
            'candidateNationalId' => $request->candidateNationalId,
            'licenseExamCategory' => $request->licenseExamCategory,
            'obtainedmarks_20' => $request->obtainedmarks_20,
            'decision' => $decision,
        ]);

        return redirect('grade')->with('message', 'Grade successfully registered');
    }
    public function select_candidate($id)
    {
        $candidates=candidate::findOrFail($id);
        return view('grade.form_grade', compact('candidates'));

    }


    public function edit_grade($id)
    {
        $grade = grade::findOrFail($id);
        $candidates = candidate::findOrFail($grade->candidateNationalId);
        return view('grade.update_grade', compact('grade', 'candidates'));
    }


    public function update_grade(Request $request, $id)
    {
        $request->validate([
            'candidateNationalId' => 'required',
            'licenseExamCategory' => 'required',
            'obtainedmarks_20' => 'required|numeric',
        ]);

        $decision = $request->obtainedmarks_20 < 12 ? 'Fail' : 'Pass';

        $grade = grade::findOrFail($id);
        $grade->update([
            'candidateNationalId' => $request->candidateNationalId,
            'licenseExamCategory' => $request->licenseExamCategory,
            'obtainedmarks_20' => $request->obtainedmarks_20,
            'decision' => $decision,
        ]);

        return redirect('grade')->with('message', 'Grade successfully updated');
    }

    public function delete_grade($id)
    {

        $update_grade = grade::findOrFail($id)->delete();
        return back()->with('message', 'Grade Deleted ');
    }

    public function add_grade()
    {
        $candidates = candidate::first();
        if (!$candidates) {
            return redirect()->route('candidate')->with('error', 'Please add a candidate first before adding grades.');
        }
        return view('grade.form_grade', compact('candidates'));
    }

}
