@extends('../modules/layouts.main')
@section('contents')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <!-- Additional controls (like buttons for adding employees) can go here -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">
            <!-- Total Employees -->
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>234</h3>
                        <p>Total Employees</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="" class="small-box-footer text-dark">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Active Employees -->
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Active Employees</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-checkmark-circled"></i>
                    </div>
                    <a href="" class="small-box-footer text-dark">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Total Attendance -->
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>34567</h3>
                        <p>Total Attendance This Month</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-calendar"></i>
                    </div>
                    <a href="" class="small-box-footer text-dark">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Total Resigned Employees -->
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>10</h3>
                        <p>Total Resigned Employees</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-close-circled"></i>
                    </div>
                    <a href="" class="small-box-footer text-dark">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Total Departments -->
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>7</h3>
                        <p>Total Departments</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a href="" class="small-box-footer text-dark">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Recent Hires -->
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>5</h3>
                        <p>Recent Hires This Month</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="" class="small-box-footer text-dark">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
@endsection
