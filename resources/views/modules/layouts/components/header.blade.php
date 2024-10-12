<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NSOL BPO :: Administrative Panel</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">


<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


<!-- jQuery (necessary for Bootstrap and DataTables) -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Optional: Initialize DataTables -->
<script>
    $(document).ready(function () {
        $('.clientdataTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
        });
    });
</script>
