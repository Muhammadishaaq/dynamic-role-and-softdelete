<!DOCTYPE html>
<html lang="en">

<head>
    @include('../modules/layouts.components.header')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('../modules/layouts.components.nav')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('../modules/layouts.components.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            
            <!-- Content Header (Page header) -->
            @yield('contents')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('../modules/layouts/components/footer')

    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    @include('../modules/layouts/components/scriptpart')

</body>

</html>