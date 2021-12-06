<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return $roles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RoleCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        $data = $request->validate();

        $role = Role::create([
            'name'          => $data['name'],
            'description'   => $data['description'],
        ]);

        $role->save();

        return $role;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = Role::find($role->id);

        return $role;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RoleUpdateRequest $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $data = $request->validate();

        $role = Role::find($role->id);

        $role->name = $data['name'];
        $role->name = $data['description'];
        
        $role->save();

        return $role;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role = Role::find($role->id);

        $role->delete();
        
        return response('resource deleted successfully', 200);
    }
}
