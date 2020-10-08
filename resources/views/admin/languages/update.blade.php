@extends('layouts.mainadmin')
@section('tittle' , 'Update-language')
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
                    <h1>Update Language</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="active"><a href="{{route('admin.lang')}}">Languages</a></li>
                        <li class="active">Update Language</li>

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
                <strong>Create Language</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{route('admin.lang.update')}}" method="post"  class="form-horizontal">
                    @csrf
                    <input type="hidden" value="{{$lang -> id}}" name="langId">
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label" for="name-input">Language name:</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name-input" name="name" placeholder="language name" value="{{$lang -> name}}" class="form-control">
                        </div>
                        @error('name')
                        <div class="col col-md-3"><label class=" form-control-label" for="name-error"></label></div>
                        <span class="col-12 col-md-9 text-danger" id="name-error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label" for="abbr-input">Language Abbreviation:</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="abbr-input" name="abbr" maxlength="10"  value="{{$lang -> abbr}}" placeholder="language abbr" class="form-control">
                        </div>
                        @error('abbr')
                        <div class="col col-md-3"><label class=" form-control-label" for="abbr-error"></label></div>
                        <span class="col-12 col-md-9 text-danger" id="abbr-error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label" for="dir-input">Language direction:</label></div>
                        <div class="col-12 col-md-9">
                            <select name="direction" id="dir-input">
                                <option value="rtl" @if($lang -> direction == 'rtl')selected @endif>Right To Left</option>
                                <option value="ltr" @if($lang -> direction == 'ltr')selected @endif>Left To Right</option>
                            </select>
                        </div>
                        @error('dir')
                        <div class="col col-md-3"><label class=" form-control-label" for="dir-error"></label></div>
                        <span class="col-12 col-md-9 text-danger" id="dir-error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Activation state:</label></div>
                        <div class="col col-md-9">
                            <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
                                    <input type="radio" @if($lang -> active == 'Active')checked @endif id="inline-radio1" name="active" value="1" class="form-check-input">Active
                                </label>
                                <label for="inline-radio2" class="form-check-label ">
                                    <input type="radio" @if($lang -> active == 'NotActive')checked @endif  id="inline-radio2" name="active" value="0" class="form-check-input">Not Active
                                </label>
                            </div>
                        </div>
                        @error('active')
                        <div class="col col-md-3"><label class=" form-control-label" for="activ-error"></label></div>
                        <span class="col-12 col-md-9 text-danger" id="activ-error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Update Language
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- .content -->
@endsection
@section('scripts')

    <script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/main.js')}}"></script>

@endsection
