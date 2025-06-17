<?php

namespace App\Http\Controllers;
use App\Models\candidate;

use Illuminate\Http\Request;

class candidateController extends Controller
{
    public function select_canditate()
    {
        $candidates = Candidate::paginate(5); // 5 items per page
        // $count_candidate=$candidates->count('i');
        return view('candidate.index_candidate', compact('candidates'));
    }
    public function register_candidate(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'secondName' => 'required',
            'gender' => 'required',
            'dof' => 'required',
            'examDate' => 'required',
            'phoneNumber' => 'required',
        ]);
        $candidate = candidate::create($request->all());
        return redirect('candidate')->with('message', 'Candidate successful Registered');
    }
    public function edit_candidate($id)
    {
        $edit_candidate = candidate::findOrFail($id);
        return view('candidate.update_candidate', compact('edit_candidate'));
    }
    public function update_candidate(Request $request, $id)
    {
        $request->validate([
            'firstName' => 'required',
            'secondName' => 'required',
            'gender' => 'required',
            'dof' => 'required',
            'examDate' => 'required',
            'phoneNumber' => 'required',
        ]);
        $update_candidate = candidate::findOrFail($id)->update($request->all());
        return redirect('candidate')->with('message','updated');
    }
    public function delete_candidate( $id)
    {

        $update_candidate = candidate::findOrFail($id)->delete();
        return back()->with('message','deleted record');
    }
}
