<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{asset('images/admin/logo-white.png')}}" alt="Logo"></a>
{{--            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>--}}
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Dashboard elements</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-language"></i>
                        Site Languages  <i class="icon-ban-circle text text-danger">
                            {{App\Models\Laguage::count()}}
                        </i>
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-edit"></i><a href="{{route('admin.lang')}}">Show All Languages</a></li>
                        <li><i class="fa fa-edit"></i><a href="{{route('admin.lang.createView')}}">Create Language</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-info-circle"></i>
                         Main Categories  <i class="icon-ban-circle text text-danger">
                            {{App\Models\MainTourCategory::where('translation_of',0)->count()}}
                        </i>
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-edit"></i><a href="{{route('admin.main-category')}}">Show All Categories</a></li>
                        <li><i class="fa fa-edit"></i><a href="{{route('admin.category.createView')}}">Create Category</a></li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->
