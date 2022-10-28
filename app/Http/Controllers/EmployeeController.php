<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $company = Company::where('id', $id)->first();
        return view('employee.apply', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myprofile()
    {

        $employee = Employee::where('user_id', Auth::user()->id)->first();
        if ($employee) {
            return view('employee.myprofile', compact('employee'));
        } else {
            return back()->with('message', 'You are not any company employee yet');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        // dd($request->logo);
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->user_id = Auth::user()->id;
        $employee->company_id = $request->company_id;
        $employee->save();

        return redirect()->route('myprofile');
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
        $employee = Employee::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $companies = Company::get();

        if ($employee) {
            return view('employee.changeProfile', compact('employee', 'companies'));
        } else {
            return redirect()->back()->with('message', 'Unauthorize Request');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {
        $employee = Employee::where('id', $id)->first();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->user_id = Auth::user()->id;
        $employee->company_id = $request->company_id;
        $employee->update();

        return redirect()->route('myprofile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->first();
        if ($employee) {
            $employee->delete();
            return redirect('home')->with('success', 'Company Left successfully.');
        } else {
            return redirect()->back()->with('message', 'Unauthorize Request');
        }
    }
}
