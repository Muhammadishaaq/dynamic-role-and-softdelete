@extends('../modules/layouts.main')

@section('contents')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Create New Role</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
   
    <div class="row mx-3">
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Role Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="permissions">Assign Permissions</label>
            <div class="row">
                @foreach ($permissions as $permission)
                    <div class="col-md-4">
                        <label>
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"> 
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('roles.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
    </form>
    </div>
@endsection
