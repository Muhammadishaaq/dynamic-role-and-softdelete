<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller implements HasMiddleware
{
    public static function middleware(): array{
        return[
            new Middleware('permission:read-permissions', only:['index']),
            new Middleware('permission:create-permissions', only:['create']),
            new Middleware('permission:edit-permissions', only:['edit']),
            new Middleware('permission:delete-permissions', only:['destroy']),
            new Middleware('permission:read-trashed-permissions', only:['show']),
            new Middleware('permission:restore-trashed-permissions', only:['restore']),
            new Middleware('permission:permanent-delete-permissions', only:['forceDelete']),
        ];

    }

    public function index()
    {
        $permissions = Permission::all();
        return view('modules.partials.permission.index', compact('permissions'));
    }

    public function show()
    {
        $permissions = Permission::onlyTrashed()->get(); 
        return view('modules.partials.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('modules.partials.permission.create');
    }
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:permissions,name']);
        Permission::create(['name' => $request->name]);
        return redirect()->route('permissions.index')->with('success', 'Permission created successfully!');
    }

    public function edit(Permission $permission)
    {
        return view('modules.partials.permission.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate(['name' => 'required|unique:permissions,name,' . $permission->id]);
        $permission->update(['name' => $request->name]);
        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully!');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission soft deleted successfully!');
    }

    public function forceDelete($id)
    {
        $permission = Permission::withTrashed()->findOrFail($id);
        $permission->forceDelete();
        return redirect()->route('permissions.index')->with('success', 'Permission permanently deleted.');
    }

    public function restore($id)
    {
        $permission = Permission::withTrashed()->findOrFail($id);
        $permission->restore();
        return redirect()->route('permissions.index')->with('success', 'Permission restored successfully!');
    }
}
