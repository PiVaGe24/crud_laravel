<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    { 
        $employee = Employee::all();//where('',GET)
        return view('employee.index')->with('employees', $employee);
    }

    public function create()
    {
        $role = Role::all();
        return view('employee.employee-form',['roles'=>$role]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name'=>'required',
            'username'=>'required' ,
            'address'=>'required',
            'telephone'=>'required',
            'email'=>'required | email',
            'password'=>'required',
            'role_id'=>'required',
        ],
        [
            'full_name.required'=>'El campo es obligatorio.',
        ]);

        $employees = new Employee();

        $employees->full_name = $request->get('full_name');
        $employees->username = $request->get('username');
        $employees->address = $request->get('address');
        $employees->telephone = $request->get('telephone');
        $employees->email = $request->get('email');
        $employees->password= $request->get('password');
        $employees->role_id= $request->get('role_id');
        $employees->save();
        return redirect()->back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $role = Role::all();
        $employee = Employee::find($id);
        return view('employee.employee-form',['roles'=>$role])->with('employee',$employee);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'full_name'=>'required',
            'username'=>'required' ,
            'address'=>'required',
            'telephone'=>'required',
            'email'=>'required | email',
            'password'=>'required',
            'role_id'=>'required',
        ],
        [
            'full_name.required'=>'El campo es obligatorio.',
        ]);
        
        $employee = Employee::find($id);
        $employee->full_name = $request->get('full_name');
        $employee->username = $request->get('username');
        $employee->address = $request->get('address');
        $employee->telephone = $request->get('telephone');
        $employee->email = $request->get('email');
        $employee->role_id = $request->get('role_id');
        $employee->save();
        return redirect()->route('employeeIndex');
    }

    public function destroy(string $id)
    {
        $comment = Employee::FindOrFail($id);
        $comment->delete();
        return redirect()->back();
        /*$employee = Employee::find($id);
        $employee->delete();
        return redirect('/employee');*/
    }
}
