@extends('entryOfficer.layout')
@section('content')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('specialist.home') }}">
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
                                    href="{{ route('e.S1', $pp['id']) }}">{{ $pp['id'] }}</a></li>
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
                                    href="{{ route('e.S1', $ppre['id']) }}">{{ $ppre['id'] }}</a></li>
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
                                    href="{{ route('e.S1', $ssec['id']) }}">{{ $ssec['id'] }}</a></li>
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

                                <ul class="nav nav-tabs" id="myTab">
                                    @foreach ($d7 as $dd7)
                                        <li class="nav-item">
                                            <a @if ($dd7['TermName'] == 'first term') href="#First-Term"
                                                class="nav-link active"
                                                @elseif($dd7['TermName'] == 'second term')
                                                href="#Second-Term"
                                                class="nav-link" @endif
                                                data-bs-toggle="tab"
                                                style=" color: rgb(75, 73, 172);">{{ $dd7['TermName'] }}</a>
                                        </li>
                                    @endforeach
                                    {{-- <li class="nav-item">
                                                <a href="#Second-Term" class="nav-link" data-bs-toggle="tab" style=" color: rgb(75, 73, 172);">Second Term</a>
                                            </li> --}}
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="First-Term">
                                        <div class="form-1">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="row">
                                                        <div class="card-body">

                                                            <div class="table-responsive">
                                                                <table class="table table-bordered"
                                                                    style="width:100%; height: 60px;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="header-label"
                                                                                style="background-color: #fff;font-weight: bold;">
                                                                                Id </th>
                                                                            <th class="header-label"
                                                                                style="background-color: #fff;font-weight: bold;">
                                                                                Students Names</th>

                                                                            @foreach ($d4 as $dd4)
                                                                                <th class="header-label">
                                                                                    <div><input type="text"
                                                                                            value="{{ $dd4['MaterialName'] }}"
                                                                                            readonly name="matrails[]"
                                                                                            style="background-color: #fff;font-weight: bold; border: none">
                                                                                    </div>
                                                                                </th>
                                                                            @endforeach

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($d2 as $dd2)
                                                                            <tr class="tr-inputs">
                                                                                <td scope="row">
                                                                                    <div><input type="text"
                                                                                            value="{{ $dd2['id'] }}"
                                                                                            readonly name="stuid[]" disabled
                                                                                            style="background-color: #ddd;padding: 6px; font-size:15px; text-align:center">
                                                                                    </div>
                                                                                </td>
                                                                                <td class="col-md-2">
                                                                                    <div><input type="text"
                                                                                            value="{{ $dd2['Name'] }}"
                                                                                            readonly name="stuname[]"
                                                                                            style="background-color: #fff; border: none">
                                                                                    </div>
                                                                                </td>
                                                                                {{-- <td class="col-md-4">{{$dd1['Name']}}</td> --}}
                                                                                @foreach ($d4 as $dd4)
                                                                                    <td>
                                                                                        <div>
                                                                                            <input type="number"
                                                                                                name="score[]" disabled
                                                                                                @foreach ($d6 as $dd6) @if ($dd2['Name'] == $dd6['Name'] && $dd4['MaterialName'] == $dd6['MaterialName'])
                                                                                                {{-- @if ($dd6['Score'] < 25)
                                                                                                value="{{$dd6['Score']}}" style="background-color: #0f0"
                                                                                                @endif --}}
                                                                                                @if ($dd6['Score'] < $dd6['totalScore'] * 0.5)
                                                                                                value="{{ $dd6['Score'] }}" style="background-color: #f00 ; text-align: center; font-weight: bold "
                                                                                                @elseif ($dd6['Score'] < $dd6['totalScore'] * 0.65)
                                                                                                {{-- (($dd6['Score'] >= 25) && ($dd6['Score'] < 30)) --}}
                                                                                                value="{{ $dd6['Score'] }}" style="background-color: rgb(255, 251, 0); text-align: center; font-weight: bold ;"
                                                                                                @elseif ($dd6['Score'] < $dd6['totalScore'] * 0.75)
                                                                                                value="{{ $dd6['Score'] }}" style="background-color: rgb(0, 255, 221); text-align: center; font-weight: bold ;"
                                                                                                @elseif ($dd6['Score'] < $dd6['totalScore'] * 0.85)
                                                                                                value="{{ $dd6['Score'] }}" style="background-color: rgb(17, 0, 255); text-align: center; font-weight: bold ; color: #fff;"
                                                                                                @else
                                                                                                value="{{ $dd6['Score'] }}" style="background-color: rgb(9, 255, 0); text-align: center; font-weight: bold ; color: #fff;" @endif
                                                                                            @break @endif
                                                                            @endforeach
                                                                            min="0"
                                                                            @foreach ($d6 as $dd6) @if ($dd4['MaterialName'] == $dd6['MaterialName'])
                                                                                            max="{{ $dd6['totalScore'] }}"
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
                                                    </div>
                                                </div>




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        

                            <!-- /******** second term ***********/    -->
                            <div class="tab-pane fade" id="Second-Term">
                                <div class="form-2">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="row">
                                                <div class="card-body">

                                                    {{-- <p class="card-description">
                                                        <button type="button" class="btn btn-primary"> Upgrade
                                                            Level</button>
                                                    </p> --}}

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered"
                                                            style="width:100%; height: 60px;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="header-label"
                                                                        style="background-color: #fff;font-weight: bold;">
                                                                        Id </th>
                                                                    <th class="header-label"
                                                                        style="background-color: #fff;font-weight: bold;">
                                                                        Students Names</th>

                                                                    @foreach ($d3 as $dd3)
                                                                        <th class="header-label">
                                                                            <div><input type="text"
                                                                                    value="{{ $dd3['MaterialName'] }}"
                                                                                    readonly name="matrails[]"
                                                                                    style="background-color: #fff;font-weight: bold; border: none">
                                                                            </div>
                                                                        </th>
                                                                    @endforeach

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($d1 as $dd1)
                                                                    <tr class="tr-inputs">
                                                                        <td scope="row">
                                                                            <div><input type="text"
                                                                                    value="{{ $dd1['id'] }}"
                                                                                    readonly name="stuid[]" disabled
                                                                                    style="background-color: #ddd;padding: 6px; font-size:15px; text-align:center">
                                                                            </div>
                                                                        </td>
                                                                        <td class="col-md-2">
                                                                            <div><input type="text"
                                                                                    value="{{ $dd1['Name'] }}"
                                                                                    readonly name="stuname[]"
                                                                                    style="background-color: #fff;  border: none">
                                                                            </div>
                                                                        </td>
                                                                        {{-- <td class="col-md-4">{{$dd1['Name']}}</td> --}}
                                                                        @foreach ($d3 as $dd3)
                                                                            <td>
                                                                                <div>
                                                                                    <input type="number"
                                                                                        name="score[]" disabled
                                                                                        @foreach ($d5 as $dd5) @if ($dd1['Name'] == $dd5['Name'] && $dd3['MaterialName'] == $dd5['MaterialName'])
                                                                                                @if ($dd5['Score'] < $dd5['totalScore'] * 0.5)
                                                                                                value="{{ $dd5['Score'] }}" style="background-color: #f00 ; text-align: center; font-weight: bold "
                                                                                                @elseif ($dd5['Score'] < $dd5['totalScore'] * 0.65)
                                                                                                {{-- (($dd6['Score'] >= 25) && ($dd6['Score'] < 30)) --}}
                                                                                                value="{{ $dd5['Score'] }}" style="background-color: rgb(255, 251, 0); text-align: center; font-weight: bold ; "
                                                                                                @elseif ($dd5['Score'] < $dd5['totalScore'] * 0.75)
                                                                                                value="{{ $dd5['Score'] }}" style="background-color: rgb(0, 255, 221); text-align: center; font-weight: bold ; "
                                                                                                @elseif ($dd5['Score'] < $dd5['totalScore'] * 0.85)
                                                                                                value="{{ $dd5['Score'] }}" style="background-color: rgb(17, 0, 255); text-align: center; font-weight: bold ; color: #fff;"
                                                                                                @else
                                                                                                value="{{ $dd5['Score'] }}" style="background-color: rgb(9, 255, 0); text-align: center; font-weight: bold ; color: #fff;" @endif
                                                                                    @break @endif
                                                                    @endforeach
                                                                    min="0"
                                                                    @foreach ($d5 as $dd5) @if ($dd3['MaterialName'] == $dd5['MaterialName'])
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
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---------------------------------------------------------------------- end term 2 --------------------------------------------------------------------->

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
