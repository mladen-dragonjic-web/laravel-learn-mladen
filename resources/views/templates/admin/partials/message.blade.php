@if(session()->has('message'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-{{ session('message-type') }} alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('message') }}
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endif