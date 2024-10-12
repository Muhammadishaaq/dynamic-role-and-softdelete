<?php
namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Department;
use Spatie\Permission\Models\Role; 
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EmployeeController extends Controller implements HasMiddleware
{
    public static function middleware(): array{
        return[
            new Middleware('permission:read-employees', only:['index']),
            new Middleware('permission:create-employees', only:['create']),
            new Middleware('permission:edit-employees', only:['edit']),
            new Middleware('permission:delete-employees', only:['destroy']),
        ];

    }
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $data = $this->userService->getAll();
        return view('modules.partials.user.index', compact('data')); 
    }

    public function create()
    {
        $roles = Role::where('name', '!=', 'Admin')->get(); 
        $positions = Position::all();
        $departments = Department::all();
        return view('modules.partials.user.create', compact('positions', 'departments', 'roles')); 
    }

    public function store(EmployeeRequest $request) 
    {
        $data = $request->validated();

        $this->userService->create($data);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {
        $positions = Position::all();
        $departments = Department::all();
        $employee = $this->userService->getById($id);
        return view('modules.partials.user.edit', compact('employee','positions', 'departments'));  
    }

    public function update(Request $request, $id) 
    {
        $data = $request->all(); 

        $this->userService->update($id, $data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $this->userService->delete($id);

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
