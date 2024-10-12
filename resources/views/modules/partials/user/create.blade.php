@extends('../modules/layouts.main')
@section('contents')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Employee</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form id="userForm" method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
            @csrf <!-- Include CSRF token for security -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" autocomplete="new-name" required>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" autocomplete="new-email" required>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="new-password">
                            </div>
                        </div>
                        <!-- Position (Dropdown) -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="position">Position</label>
                                <select name="position" id="position" class="form-control" required>
                                    <option value="" disabled selected>Select Position</option>
                                    @foreach($positions as $position)
                                        <option value="{{ $position->name }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Department (Dropdown) -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="department">Department</label>
                                <select name="department" id="department" class="form-control" required>
                                    <option value="" disabled selected>Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->name }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Phone Number -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone_number">Phone Number</label>
                                <input type="tel" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number" required>
                            </div>
                        </div>
                        <!-- Role -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role">Assign Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="" disabled selected>Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Joining Date -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="joining_date">Joining Date</label>
                                <input type="date" name="joining_date" id="joining_date" class="form-control" required>
                            </div>
                        </div>
                        <!-- Date of Birth -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control">
                            </div>
                        </div>
                        <!-- Salary -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="salary">Salary</label>
                                <input type="number" name="salary" id="salary" class="form-control" placeholder="Salary" step="0.01">
                            </div>
                        </div>
                        <!-- Address -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('employees.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

@endsection
