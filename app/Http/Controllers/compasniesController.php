<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createcompany;
use App\Http\Requests\updatecompany;
use App\Models\Companies;
use Exception;

class compasniesController extends Controller
{
    public function index()
    {

        $compines = Companies::paginate(10);
        return view('compines', compact('compines'));
    }

    public function create()
    {
        return view('newcompany');
    }
    public function store(createcompany $request)
    {
        try {
            $name = $request->name;
            $email = $request->email;
            $logo = $request->file('logo');
            $website = $request->website;


            $namelogo = $logo->getClientOriginalName();
            $pathlogo = $logo->storeAs('public/logos', $namelogo);

            Companies::create([
                'name' => $name,
                'email' => $email,
                'logo' => $pathlogo,
                'website' => $website


            ]);
            return back()->with('succses', 'create company sucssess');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function update(updatecompany $request)
    {
        try {


            $id = $request->company_id;
            $company_name = $request->company_name;
            $email = $request->email;
            $website = $request->website;

            $logo = $request->file('logo');
            $namelogo = $logo->getClientOriginalName();
            $pathlogo = $logo->storeAs('public/logos', $namelogo);
            Companies::where('id', $id)->update([
                'name' => $company_name,
                'email' => $email,
                'logo' => $pathlogo,
                'website' => $website,

            ]);
            return back()->with('succsesupdate', 'update company sucssess');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function destroy(Request $request)
    {
        $id = $request->id;

        $deletecompany = Companies::where('id', $id)->delete();
        if ($deletecompany) {
            return back()->with('sucssesdelete', 'Delet Comapny sucsess');
        }
    }
    public function details(Request $request)
    {

        $company = Companies::find($request->id);
        $employee = $company->employy()->paginate(10);
        return view('employee', compact(['company', 'employee']));
    }
}
