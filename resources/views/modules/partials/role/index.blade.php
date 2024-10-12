@extends('../modules/layouts.main')

@section('contents')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
                @can('create-roles')
                <div class="col-sm-6 text-right">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Create New Role</a>
                </div>
                @endcan
            </div>
        </div>
    </section>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabs for Active and Trashed Roles -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('roles.index') }}">Active Roles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('roles.trashed') }}">Trashed Roles</a>
        </li>
    </ul>

    <table class="table table-bordered table-responsive clientdataTable">
        <thead>
            <tr>
                <th width="60">ID</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach ($role->permissions as $permission)
                            <span class="badge badge-info">{{ $permission->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        @can('edit-roles')
                        <a href="{{ route('roles.edit', $role->id) }}" class="edit-btn" aria-label="Edit Role {{ $role->name }}">
                            <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                        </a>
                        @endcan
                        @can('delete-roles')
                        <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="text-danger" 
                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this role?')) document.getElementById('delete-form-{{ $role->id }}').submit();"
                                aria-label="Delete Role {{ $role->name }}">
                                <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </form>
                        @endcan
                        @can('restore-trashed-roles')
                        @if($role->deleted_at !== null)
                        <a href="{{ route('roles.restore', $role->id) }}" class="text-success" 
                           onclick="return confirm('Are you sure you want to restore this role?');" aria-label="Restore Role {{ $role->name }}">
                            <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 3v3a4 4 0 10-4 4H3a7 7 0 110-14h5zm9 9a7 7 0 11-14 0 7 7 0 0114 0z" />
                                <path d="M14.5 10.5H10a4 4 0 01-4-4V6h-.5a1 1 0 00-.5 1.866A6 6 0 0016 10.5h.5a1 1 0 00-.5-1.866z" />
                            </svg>
                        </a>
                        @endif
                        @endcan
                        @can('permanent-delete-roles')
                            <form id="force-delete-form-{{ $role->id }}" action="{{ route('roles.forceDelete', $role->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <a href="#" class="text-danger" 
                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to permanently delete this role?')) document.getElementById('force-delete-form-{{ $role->id }}').submit();"
                                    aria-label="Permanently Delete Permission {{ $role->name }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-danger" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H3a1 1 0 000 2h1v10a2 2 0 002 2h8a2 2 0 002-2V6h1a1 1 0 000-2h-1V3a1 1 0 00-1-1H6zm1 2h6v12H7V4zm-1 2a1 1 0 00-1 1v8a1 1 0 002 0V6a1 1 0 00-1-1zm8 0a1 1 0 00-1 1v8a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </form>
                        @endcan
                        @can('assign permission to role')
                        <a href="{{ route('roles.assign', $role->id) }}" class="btn btn-secondary">Assign Permissions</a>
                        @endcan
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
