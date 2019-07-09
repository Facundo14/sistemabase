<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Permission);

        return view('admin.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);

        return view('admin.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);
        
        $data = $request->validate(['display_name' => 'required']);

        $permission->update($data);

        return redirect()->route('admin.permissions.edit', $permission)->withFlash('El rol fué actualizado correctamente');
    }

    
}
