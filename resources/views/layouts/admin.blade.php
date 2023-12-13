<?php
$dash_menu = isset($dash_menu) ? 'active' : '';
$organization_menu = isset($organization_menu) ? 'active' : '';
$station_menu = isset($station_menu) ? 'active' : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$page_title ?? ''}} .:. HighFliers</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('admin_assets/css/adminlte.min.css')}}">

    @yield('style')
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{ucfirst(session('admin')->name)}}</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-key mr-2"></i> Security Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('logout')}}" class="dropdown-item dropdown-footer"  >Logout</a>

                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('admin')}}" class="brand-link">
            <img src="{{url('images/logo.png')}}" alt="" class="img-fluid">
{{--            <span class="brand-text font-weight-light">HighFliers</span>--}}
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{session('admin')->avatar}}" class="img-circle elevation-2" alt={{ucfirst(session('admin')->name)}}>
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ucfirst(session('admin')->name)}}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @if(session('role')== 'admin')
                    <li class="nav-item">
                        <a href="{{route('admin')}}" class="nav-link {{$dash_menu}}">
                            <i class="nav-icon fa fa-tachometer"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('organizations.index')}}" class="nav-link {{$organization_menu}}">
                            <i class="nav-icon fa fa-people-roof"> </i>
                            <p>
                                AMDL HQ Departments
                            </p>
                        </a>
                    </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('stations.index')}}" class="nav-link {{$station_menu}}">--}}
{{--                                <i class="nav-icon fa fa-people-roof"> </i>--}}
{{--                                <p>--}}
{{--                                     MSNC Mission Stations--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

                        <li class="nav-item">
                            <a href="{{route('alldept')}}" class="nav-link ">
                                <i class="nav-icon fa fa-building"></i>
                                <p>
                                    MSNC HQ Departments
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('allstaffmsnc')}}" class="nav-link ">
                                <i class="nav-icon fa fa-users-line"></i>
                                <p>
                                   MSNC Staff
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('allstaffamdl')}}" class="nav-link ">
                                <i class="nav-icon fa fa-users-line"></i>
                                <p>
                                   AMDL Staff
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('nomRank')}}" class="nav-link ">
                                <i class="nav-icon fa fa-certificate"></i>
                                <p>
                                   Nomenclature Ranks
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('amdlRank')}}" class="nav-link ">
                                <i class="nav-icon fa fa-certificate"></i>
                                <p>
                                    AMDL Ranks
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('msncRank')}}" class="nav-link ">
                                <i class="nav-icon fa fa-certificate"></i>
                                <p>
                                    MSNC Ranks
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('directors')}}" class="nav-link ">
                                <i class="nav-icon fa fa-users-rectangle"></i>
                                <p>
                                    Directors
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sdms')}}" class="nav-link ">
                                <i class="nav-icon fa fa-users-rectangle"></i>
                                <p>
                                    SDM/Admin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('hrs')}}" class="nav-link ">
                                <i class="nav-icon fa fa-users-rectangle"></i>
                                <p>
                                   HR Managers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admins.index')}}" class="nav-link ">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    Administrators
                                </p>
                            </a>
                        </li>
                    @endif

                        @if(session('role')== 'director')
                            <li class="nav-item">
                                <a href="{{route('directorsHome')}}" class="nav-link {{$dash_menu}}">
                                    <i class="nav-icon fa fa-tachometer"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
{{--                            @php--}}
{{--                                $admin = Session::get('admin');--}}
{{--if($id=='directorsHome'){--}}
{{--    $amdls = \App\Models\AdminOffice::where('admin_id', $admin->id)--}}
{{--            ->where('company', 'amdl')->get();--}}
{{--    $msncs = \App\Models\AdminOffice::where('admin_id', $admin->id)->where('company', 'msnc')->get();--}}
{{--}else{--}}

{{--                                    $amdls = \App\Models\AdminOffice::where('admin_id', $admin->id)--}}
{{--            ->where('company', 'amdl')--}}
{{--            ->where('organization_id', $id)->get();--}}
{{--                                    $msncs = \App\Models\AdminOffice::where('admin_id', $admin->id)--}}
{{--            ->where('company', 'msnc')--}}
{{--            ->where('organization_id', $id)->get();--}}
{{--}--}}
{{--                            @endphp--}}
{{--                            @if( $amdls->count() >0)--}}

{{--                                <li class="nav-item">--}}
{{--                                    <a href="#" class="nav-link {{$dash_menu}}">--}}
{{--                                        <i class="nav-icon fas fa-building"></i>--}}
{{--                                        <p>--}}
{{--                                            AMDL Departments--}}
{{--                                            <i class="fas fa-angle-left right"></i>--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                    <ul class="nav nav-treeview" style="display: none;">--}}
{{--                                        @foreach($amdls as $department)--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a href="{{route('directorsDepartmentAmdl',encrypt($department->organization->id))}}" class="nav-link">--}}
{{--                                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                                <p>{{$department->organization->name ?? '' }}</p>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        @endforeach--}}

{{--                                    </ul>--}}
{{--                                </li>--}}

{{--                            @endif--}}
{{--                            @if($msncs->count() >0)--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="#" class="nav-link {{$dash_menu}}">--}}
{{--                                        <i class="nav-icon fas fa-building"></i>--}}
{{--                                        <p>--}}
{{--                                            MSNC Departments--}}
{{--                                            <i class="fas fa-angle-left right"></i>--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                    <ul class="nav nav-treeview" style="display: none;">--}}
{{--                                        @foreach($msncs as $msncstaff)--}}
{{--                                            <li class="nav-item">--}}
{{--                                                <a href="{{route('directorsDepartmentMsnc',encrypt($msncstaff->department->deptID))}}" class="nav-link">--}}
{{--                                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                                <p>{{$msncstaff->department->deptName ?? '' }}</p>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}

{{--                                    </ul>--}}
{{--                                </li>--}}

{{--                            @endif--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('directorsHome')}}" class="nav-link">--}}
{{--                                    <i class="nav-icon fas fa-chart-pie"></i>--}}
{{--                                    <p>--}}
{{--                                       Departments--}}
{{--                                        <i class="right fas fa-angle-left"></i>--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                                <ul class="nav nav-treeview" style="display: none;">--}}
{{--                                        @foreach($amdl as $department)--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a href="{{route('directorsDepartmentAmdl',encrypt($department->organization->id))}}" class="nav-link">--}}
{{--                                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                                <p>{{$department->organization->name ?? '' }}</p>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        @endforeach--}}
{{--                                        @foreach($msnc as $department)--}}
{{--                                            <li class="nav-item">--}}
{{--                                                <a href="{{route('directorsDepartmentMsnc',encrypt($msncstaff->department->deptID))}}" class="nav-link">--}}
{{--                                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                                    <p>{{$msncstaff->department->deptName ?? '' }}</p>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                        @endif

                        @if(session('role')== 'sdm')
                            <li class="nav-item">
                                <a href="{{route('sdmHome')}}" class="nav-link {{$dash_menu}}">
                                    <i class="nav-icon fa fa-tachometer"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        @endif

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$page_title ?? ''}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
                            <li class="breadcrumb-item active">{{$page_title ?? ''}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        @if(session('message'))
                            <div class="alert alert-info dismissAlert">{{session('message')}}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger dismissAlert">{{session('error')}}</div>
                        @endif
                            @if($errors->any())
                                <div class="alert alert-danger dismissAlert">
                                    @foreach($errors->all()  as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </div>
                            @endif
                    </div>
                </div>
                @yield('content')
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 2.0.0
        </div>
        <strong>Copyright &copy; {{date('Y')}} <a href="https://thehighfliers.org">HIGHFLIERS.ORG</a>.</strong> All rights reserved.
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js" integrity="sha512-mULnawDVcCnsk9a4aG1QLZZ6rcce/jSzEGqUkeOLy0b6q0+T6syHrxlsAGH7ZVoqC93Pd0lBqd6WguPWih7VHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- AdminLTE App -->
<script src="{{url('admin_assets/js/adminlte.min.js')}}"></script>

<script>
    let dismissAlert = $('.dismissAlert');
    if(dismissAlert){
        setTimeout(function(){
            dismissAlert.hide(500);
        }, 3000);
    }
</script>

@yield('script')
@livewireScripts
</body>
</html>
