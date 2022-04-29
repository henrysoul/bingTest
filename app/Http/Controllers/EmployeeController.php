<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use App\Models\Permission;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $employees = Employee::all();

        // dd($employees);
        
        return view('welcome', compact('roles', 'permissions','employees'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'employee_id' => ['required'],
            'email' => ['required','unique:users'],
            'phone' => ['nullable'],
            'role_type' => ['required'],
            'username' => ['required'],
            'password_confirmation' => ['required'],
            'password' => ['required', 'min:6', 'confirmed:confirm_password'],
            'permissions'=>['required']
        ],['permissions.required'=>'Select atleast one permission']);

        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $employee = Employee::create([
            'uuid' => str::uuid(),
            'user_id' => $user->id,
            'employee_id' => $request->employee_id,
            'phone' => $request->phone,
            'role_id' => $request->role_type,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        $user->permissions()->attach($request->permissions);

        return back()->with('success', 'Employee created successfully');
    }

    public function delete_emloyee($uuid){
        Employee::where('uuid',$uuid)->delete();
        return back()->with('success', 'Employee deleted successfully');

    }
}
