@extends('../modules/layouts.main')
@section('contents')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Employee</h1>
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
        <form id="userForm" method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
            @csrf <!-- Include CSRF token for security -->
            @method('PUT') <!-- Indicate that this is an update request -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name', $employee->name) }}" required>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email', $employee->email) }}" required>
                            </div>
                        </div>
                        <!-- Password -->
                        <!-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Leave blank to keep current password">
                            </div>
                        </div> -->
                        <!-- Position (Dropdown) -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="position">Position</label>
                                <select name="position" id="position" class="form-control" required>
                                    <option value="" disabled>Select Position</option>
                                    @foreach($positions as $position)
                                        <option value="{{ $position->name }}" {{ $employee->position == $position->name ? 'selected' : '' }}>
                                            {{ $position->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Department (Dropdown) -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="department">Department</label>
                                <select name="department" id="department" class="form-control" required>
                                    <option value="" disabled>Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->name }}" {{ $employee->department == $department->name ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Phone Number -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number" value="{{ old('phone_number', $employee->phone_number) }}" required>
                            </div>
                        </div>
                        <!-- Joining Date -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="joining_date">Joining Date</label>
                                <input type="date" name="joining_date" id="joining_date" class="form-control" value="{{ old('joining_date', $employee->joining_date) }}" required>
                            </div>
                        </div>
                        <!-- Date of Birth -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob', $employee->dob) }}">
                            </div>
                        </div>
                        <!-- Salary -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="salary">Salary</label>
                                <input type="number" name="salary" id="salary" class="form-control" placeholder="Salary" value="{{ old('salary', $employee->salary) }}" step="0.01">
                            </div>
                        </div>
                        <!-- Address -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{ old('address', $employee->address) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('employees.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

@endsection
