<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageUpload;
use App\Models\Employee;

class EmployeeController extends Controller
{
    
    public function index()
    {
       $employee = Employee::all();

       return view('employee.index' , compact('employee'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'mobile_number'=> 'required|min:11|numeric',
            'address'=> 'required',
            'photo'=> 'required',
        ]);

        $input = $request->all();
        
		if ($request->hasFile('photo')){
			$input['photo'] = ImageUpload::upload('/upload/employee',$request->file('photo')); 
		}
        Employee::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'country_code' => $input['country_code'],
            'mobile_number' => $input['mobile_number'],
            'address' => $input['address'],
            'gender' => $input['gender'],
            'hobby' => json_encode($input['hobby']),
            'photo' => $input['photo'] ?? null,
        ]);

    
        return redirect()->route('emp_index')->with('success','Employee inserted successfully.');

    }

    public function edit($id)
    {
       $employee = Employee::where('id', $id)->first();

       return view('employee.edit', compact('employee'));
    }

    public function upadte(Request $request)
    {
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'mobile_number'=> 'required|min:11|numeric',
            'address'=> 'required',
        ]);

        $employee = Employee::findOrFail($request->emp_id);
        
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'country_code' => $request->country_code,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'gender' => $request->gender,
            'hobby' => $request->has('hobby') ? json_encode($request->hobby) : $employee->hobby,
            'photo' => $request->hasFile('photo') 
                        ? ImageUpload::upload('/upload/employee', $request->file('photo')) 
                        : $employee->photo,
        ]);

        return redirect()->route('emp_index')->with('success','Employee Upadte successfully.');

    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()->route('emp_index')->with('success','Employee Delete successfully.');
    }

    
}
