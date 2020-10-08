@extends('layouts.mainadmin')
@section('tittle' , 'languages')
@section('style')

    <link rel="shortcut icon" href="{{asset('images/admin/apple-touch-icon-57-precomposed.ico')}}">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/jqvmap/dist/jqvmap.min.css')}}">


    <link rel="stylesheet" href="{{asset('assets/admin/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
@endsection
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Languages</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="active">Languages</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @include('includes.alerts.success')
    @include('includes.alerts.errors')
@endsection
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Languages Table</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">abbr</th>
                        <th scope="col">name</th>
                        <th scope="col">direction</th>
                        <th scope="col">activation state</th>
                        <th scope="col">operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($languages)
                        @foreach($languages as $language)
                        <tr>
                            <th scope="row">{{++$counter}}</th>
                            <td>{{$language -> abbr}}</td>
                            <td>{{$language -> name}}</td>
                            <td>{{$language -> direction}}</td>
                            <td>{{$language -> active}}</td>
                            <td>
                                <a href="{{route('admin.lang.updateView',$language -> id)}}"><button class="btn btn-success">Edit</button></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticModal">
                                    Delete
                                </button>
                                @include('includes.models.deletelangmodel')
{{--                                <a href="{{route('admin.lang.Delete',$language -> id)}}"><button class="btn btn-danger">Delete</button></a>--}}
                            </td>
                        </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- .content -->
@endsection

@section('scripts')

    <script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/main.js')}}"></script>


@endsection
