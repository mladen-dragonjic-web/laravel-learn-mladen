@extends('templates.admin.master.layout')

@section('seo-title')
<title>All pages {{ config('app.seo-separator') }} {{ config('app.name') }}</title>
@endsection


@section('plugins-css')
<!-- DataTables CSS -->
<link href="/templates/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="/templates/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
@endsection

@section('custom-css')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All pages</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

@include('templates.admin.partials.message')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="padding: 10px;">
            @if(count($data) > 0)
            <table width="100%" class="table table-striped table-bordered table-hover" id='users-table'>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Header</th>
                        <th>Aside</th>
                        <th>Footer</th>
                        <th>Contact form</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)
                    <tr>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ ($value->header == 1) ? 'Yes' : 'No'  }}</td>
                        <td>{{ ($value->aside == 1) ? 'Yes' : 'No'  }}</td>
                        <td>{{ ($value->footer == 1) ? 'Yes' : 'No'  }}</td>
                        <td>{{ ($value->contact_form == 1) ? 'Yes' : 'No'  }}</td>
                        <td class="center">
                            <a data-toggle='tooltip' data-placement='top' data-original-title='Edit profile' class="btn btn-xs btn-success" href='{{ route('pages-edit', [ "page" => $value->id ]) }}'>Edit</a>
                            <a data-href="{{ route('users-delete', ["user" => $value->id]) }}" data-username="{{ $value->name }}" data-userid="{{ $value->id }}" data-toggle="modal" data-target="#deleteModal" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else 
            <div class="alert alert-warning">
                There is no pages in database!!!
                <a href="{{ route('pages-create') }}">Add new page</a>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete admin user</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection

@section('plugins-js')
<!-- DataTables JavaScript -->
<script src="/templates/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/templates/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="/templates/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>
@endsection

@section('custom-js')
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#users-table').DataTable({
        responsive: true,
        "columnDefs": [
            { "orderable": false, "targets": [6] },
            { "searchable": false, "targets": [2,3,4,5,6] }
        ]
    });
});

$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var userName = button.data('username'); // Extract info from data-* attributes
    //var userId = button.data('userid');
    var userHref = button.data('href');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body').text('Are you sure that you want to delete user: ' + userName + '?')
    //modal.find('.modal-footer .btn-danger').attr('href', '/users/delete/' + userId);
    modal.find('.modal-footer .btn-danger').attr('href', userHref);
})



$('table').tooltip({
    selector: "[data-toggle=tooltip]",
    container: "body"
})

</script>
@endsection