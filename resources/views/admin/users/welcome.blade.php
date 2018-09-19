@extends('templates.admin.master.layout')

@section('seo-title')
<title>Welcome {{ config('app.seo-separator') }} {{ config('app.name') }}</title>
@endsection

@section('custom-css')

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Welcome {{ auth()->user()->name }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    @include('templates.admin.partials.message')
    
</div>
<!-- /.container-fluid -->
@endsection

@section('custom-js')

@endsection