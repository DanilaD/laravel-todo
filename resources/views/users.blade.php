<!DOCTYPE html>
<html>
<head>
    <title>laravel datatables pagination with search and sort - nicesnippets.com</title>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Datatables CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- Datatables JS CDN -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">Laravel Datatables Pagination with Search and Sort - NiceSnippets.com</div>
                    <div class="card-body">
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<table id='empTable' width='100%' border="1" style='border-collapse: collapse;'>
    <thead>
    <tr>
        <td>S.no</td>
        <td>Name</td>
        <td>Email</td>
    </tr>
    </thead>
</table>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        // DataTable
        $('#empTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('users.getusers')}}",
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'email' },
            ]
        });
    });
</script>
</body>
</html>