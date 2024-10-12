<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserService
{
    public function getAll()
    {
    
        return User::all();
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']); 
        $user = User::create($data);
        if (isset($data['role'])) {
            $role = Role::where('name', $data['role'])->first();
            if ($role) {
                $user->assignRole($role->name);
            }
        }
    
        return $user;
    }

    public function getById(int $id)
    {
        return User::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $user = User::findOrFail($id);
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return $user;
    }

    public function delete(int $id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
