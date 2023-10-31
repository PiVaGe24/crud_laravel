<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('role.index')->with('roles',$role);
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $roles = new Role();
        $roles->role_name = $request->get('role_name');
        $roles->save();
        return redirect('/role');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $roles = Role::find($id);
        $roles->role_name = $request->get('role_name');
        $roles->save();
        return redirect('/role');
    }

    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('/role');
    }
}
