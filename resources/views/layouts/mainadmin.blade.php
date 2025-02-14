<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('tittle')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      @yield('style')

</head>

<body>



    @include('includes.admin.sidebar')
<!-- Right Panel -->

<div id="right-panel" class="right-panel">

   @include('includes.admin.header')
   @yield('breadcrumbs')
   @yield('content')
</div><!-- /#right-panel -->

<!-- Right Panel -->
 @yield('scripts')

</body>

</html>


