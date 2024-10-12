@extends('../modules/layouts.main')

@section('contents')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permissions</h1>
            </div>
            @can('create-permissions')
            <div class="col-sm-6 text-right">
                <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Create New Permission</a>
            </div>
            @endcan
        </div>
    </div>
</section>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('permissions.index') }}">Active Permissions</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('permissions.trashed') }}">Trashed Permissions</a>
    </li>
</ul>

<table class="table table-bordered table-responsive mx-auto clientdataTable">
    <thead>
        <tr>
            <th width="60">ID</th>
            <th>Permission</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $permission->name }}</td>
                <td>
                    @can('edit-permissions')
                    <a href="{{ route('permissions.edit', $permission->id) }}" class="edit-btn" aria-label="Edit Permission {{ $permission->name }}">
                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                    </a>
                    @endcan
                    @can('delete-permissions')
                        <form id="delete-form-{{ $permission->id }}" action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="text-danger" 
                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this Permission?')) document.getElementById('delete-form-{{ $permission->id }}').submit();"
                                aria-label="Delete Permission {{ $permission->name }}">
                                <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </form>
                    @endcan
                    @can('restore-trashed-permissions')
                        @if($permission->deleted_at !== null)
                        <a href="{{ route('permissions.restore', $permission->id) }}" aria-label="Restore Permission {{ $permission->name }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 3v3a4 4 0 10-4 4H3a7 7 0 110-14h5zm9 9a7 7 0 11-14 0 7 7 0 0114 0z" />
                                <path d="M14.5 10.5H10a4 4 0 01-4-4V6h-.5a1 1 0 00-.5 1.866A6 6 0 0016 10.5h.5a1 1 0 00-.5-1.866z" />
                            </svg>
                        </a>
                        @endif
                    @endcan
                    @can('permanent-delete-permissions')
                        <form id="force-delete-form-{{ $permission->id }}" action="{{ route('permissions.forceDelete', $permission->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="text-danger" 
                                onclick="event.preventDefault(); if(confirm('Are you sure you want to permanently delete this Permission?')) document.getElementById('force-delete-form-{{ $permission->id }}').submit();"
                                aria-label="Permanently Delete Permission {{ $permission->name }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-danger" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H3a1 1 0 000 2h1v10a2 2 0 002 2h8a2 2 0 002-2V6h1a1 1 0 000-2h-1V3a1 1 0 00-1-1H6zm1 2h6v12H7V4zm-1 2a1 1 0 00-1 1v8a1 1 0 002 0V6a1 1 0 00-1-1zm8 0a1 1 0 00-1 1v8a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </form>
                    @endcan

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
