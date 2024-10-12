@extends('../modules/layouts.main')
@section('contents')
<div class="container">
    <h1>Assign Permissions to Role: {{ $role->name }}</h1>

    <form action="{{ route('roles.assignPermission', $role->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="permissions">Permissions</label>
            <div id="permissions">
                @foreach($permissions as $permission)
                    <div class="form-check">
                        <input 
                            type="checkbox" 
                            name="permissions[]" 
                            value="{{ $permission->id }}" 
                            id="permission-{{ $permission->id }}" 
                            class="form-check-input"
                            {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="permission-{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Assign Permissions</button>
            <a href="{{ route('roles.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </form>
</div>
@endsection
