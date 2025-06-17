<?php

namespace App\Http\Controllers;
use App\Models\register;
use App\Models\candidate;
use App\Models\grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class registerController extends Controller
{
    public function register_admin(Request $request)
    {
        $request->validate([
            "adminName" => "required",
            "adminPassword" => "required|min:6",
        ]);
        $user = register::create($request->all());
        return back()->with("message", "Admin succeessful register");
    }

    public function login_admin(Request $request)
    {
        $request->validate([
            'adminName' => 'required',
            'adminPassword' => 'required|min:6',
        ]);
        $user = register::where('adminName', '=', $request->adminName)->first();
        if ($user) {
            if ($request->adminPassword == $user->adminPassword) {
                $request->session()->put('loginid', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('message', 'Incorrect User Name and Password');
            }
        } else {
            return back()->with('message', 'Invalid email');
        }
    }
    public function dashboard()
    {

        $data = null;
        if (Session::has('loginid')) {
            $data = register::where('id', Session::get('loginid'))->first();
            $candidate_dashboard = candidate::with('grade')->get();
            $count_candidate = $candidate_dashboard->count('id');
            $candidate_pass = grade::where('decision', 'pass')->count();
            $candidate_fail = grade::where('decision', 'fail')->count(); // count
            return view('index', compact('data', 'candidate_dashboard', 'count_candidate', 'candidate_pass','candidate_fail'));
        }

    }

    public function logout()
    {
        if (Session::has('loginid')) {
            Session::pull('loginid');
        }
        return redirect('/')->with('message', 'Logged out successfully');

    }
}
