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

                                <!----------------------------------------------------------- *********************activity****************** ----------------------------------------------------------------------------------->
                                <div class="b2" id="box1" style="margin-top: 25px;">
                                    <table class="table table-bordered" style="width:100%; height: 60px;">

                                        <thead>
                                            <tr>
                                                <td class="header-label">Id</td>
                                                <td class="header-label">Students Names</td>

                                                <form action="{{ route('e.scoresF', $id) }}" method="POST">
                                                    @csrf

                                                    @foreach ($d3 as $dd3)
                                                        <td class="header-label">
                                                            <div><input type="text" value="{{ $dd3['ActivityName'] }}"
                                                                    readonly name="activites[]"></div>
                                                        </td>
                                                    @endforeach

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($d1 as $dd1)
                                                <tr class="tr-inputs">
                                                    <td scope="row">
                                                        <div><input type="text" value="{{ $dd1['id'] }}" readonly
                                                                name="stuid[]"></div>
                                                    </td>
                                                    <td class="col-md-4">
                                                        <div><input type="text" value="{{ $dd1['Name'] }}" readonly
                                                                name="stuname[]"></div>
                                                    </td>

                                                    @foreach ($d3 as $dd3)
                                                        <td>
                                                            <div>
                                                                <input type="number" name="score[]"
                                                                    @foreach ($d5 as $dd5) @if ($dd1['Name'] == $dd5['Name'] && $dd3['ActivityName'] == $dd5['ActivityName'])
                                                                                             value="{{ $dd5['Score'] }}"
                                                                                             @break @endif
                                                                    @endforeach
                                                                min="0"
                                                                @foreach ($d5 as $dd5) @if ($dd3['ActivityName'] == $dd5['ActivityName'])
                                                                                            max="{{ $dd5['totalScore'] }}"
                                                                                            @break @endif
                                                    @endforeach
                                                    >
                                </div>
                                </td>
                                @endforeach

                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                                <input type="submit" class="btn btn-success" name="additem">
                                </form>
                            </div>
                            <!----------------------------------------------------------- *********************end activity****************** ----------------------------------------------------------------------------------->


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
