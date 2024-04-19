<?php

namespace App\Http\Controllers;

use App\Http\Requests\createemployee;
use App\Models\Employees;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class employeeController extends Controller
{

    public function create(Request $request)
    {
        $idcompany = $request->idcompany;
        return view('newemployee', compact('idcompany'));
    }
    public function store(Request $request)
    {
        $idcompany = $request->idcompany;
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $phone = $request->phone;




        $create = DB::table('employees')->insert([
            'company_id' => $idcompany,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone,
        ]);
        // $create = Employees::create([
        //     'company_id' => $idcompany,
        //     'fname' => $fname,
        //     'lname' => $lname,
        //     'email' => $email,
        //     'phone' => $phone,

        // ]);
        // if ($create) {
        //     return back()->with('succses', 'create employee sucsess');
        // }
        return view('newemployee');
    }
    public function update(Request $request)
    {

        return $request;
    }

    public function destroy(Request $request)

    {

    }
}
