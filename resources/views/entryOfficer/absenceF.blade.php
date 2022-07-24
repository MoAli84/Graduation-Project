@extends('entryOfficer.layout')
@section('content')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('entry/home') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#primary" aria-expanded="false" aria-controls="primary">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">primary</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="primary">
                    <ul class="nav flex-column sub-menu">
                        @foreach ($p as $pp)
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ route('e.l1', $pp['id']) }}">{{ $pp['id'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#middle" aria-expanded="false" aria-controls="middle">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">middle</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="middle">
                    <ul class="nav flex-column sub-menu">
                        @foreach ($pre as $ppre)
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ route('e.l1', $ppre['id']) }}">{{ $ppre['id'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#secondary" aria-expanded="false"
                    aria-controls="secondary">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">secondary</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="secondary">
                    <ul class="nav flex-column sub-menu">
                        @foreach ($sec as $ssec)
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ route('e.l1', $ssec['id']) }}">{{ $ssec['id'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
    </nav>


    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="row">
                            <div class="card-body">


                                <!----------------------------------------------------------- *********************attendence****************** ----------------------------------------------------------------------------------->
                                <div class="b4" id="box3">

                                    <form action="{{ route('e.storeF', $id) }}" method="POST">
                                        @csrf
                                        <div><input type="date" id="date" class="btn btn-outline-primary"
                                                style="padding: 10px 25px; margin-bottom:25px; margin-right:10px ; border-radius:21px; float:right; "
                                                name="datee"></div>


                                        <div style="margin-top: 20px;">
                                            <button class="btn btn-md btn-warning" id="addBtna" type="button"
                                                style="padding: 4px 19px; margin-bottom:10px; margin-right:10px; float:left; font-size: 20px; ">+</button>



                                            <table class="table table-bordered" style="width:50%; height: 60px; "
                                                id="myTable">
                                                <thead>
                                                    <tr>
                                                        <td class="header-label">id</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody">

                                                    <tr class="tr-inputs">
                                                        <td scope="row">
                                                            <div><input type="number" value="" name="stuid[]"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr-inputs">
                                                        <td scope="row">
                                                            <div><input type="number" value="" name="stuid[]"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr-inputs">
                                                        <td scope="row">
                                                            <div><input type="number" value="" name="stuid[]"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr-inputs">
                                                        <td scope="row">
                                                            <div><input type="number" value="" name="stuid[]"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr-inputs">
                                                        <td scope="row">
                                                            <div><input type="number" value="" name="stuid[]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr-inputs">
                                                        <td scope="row">
                                                            <div><input type="number" value="" name="stuid[]">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <input type="submit" class="btn btn-success" name="additem">
                                        <form>
                                </div>
                                <!----------------------------------------------------------- *********************end attensence****************** ----------------------------------------------------------------------------------->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. Premium <a
                    href="#">Student Performance Tracking System</a> All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                    class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->
    </div>
@endsection
