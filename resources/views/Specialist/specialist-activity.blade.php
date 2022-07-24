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

                                                                            @foreach ($d4 as $dd4)
                                                                                <th class="header-label">
                                                                                    <div><input type="text"
                                                                                            value="{{ $dd4['ActivityName'] }}"
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
                                                                                            value="{{ $dd2['Name']. ' '.$dd2['FatherName'] }}"
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
                                                                                                @foreach ($d6 as $dd6) @if ($dd2['Name'] == $dd6['Name'] && $dd4['ActivityName'] == $dd6['ActivityName'])
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
                                                                            @foreach ($d6 as $dd6) @if ($dd4['ActivityName'] == $dd6['ActivityName'])
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
                                                {{-- <div class="card-body">
                                                                    <select id='se' style="margin: 20px; padding: 3px;
                                                               -webkit-appearance: none;
                                                              -moz-appearance: none;
                                                          appearance: none;
                                                          height: 57px;
                                                          padding: 10px 22px 12px 14px;
                                                          text-align: center;
                                                          background-size: 10px;
                                                          transition: border-color .1s ease-in-out,box-shadow .1s ease-in-out;
                                                          border: 1px solid #ddd;
                                                          border-radius: 14px;
                                                          "
                                                          onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
                                                          >

                                                              <option>Choose Action</option>
                                                              <option value="{{route('e.matrialsF',$id)}}">Material Performance</option>
                                                              <option value="activity-p">Activity Performance</option>
                                                              <option value="competitions">Competitions</option>
                                                              <option value="attendance">Attendance</option>
                                                              <option value="{{route('e.behaviorF',$id)}}">Behavior</option>
                                                              </select> --}}


                                                <!----------------------------------------------------------- *********************activity****************** ----------------------------------------------------------------------------------->
                                                {{-- <div class="b2" id="box1" style="margin-top: 25px;">
                                                                        <table class="table table-bordered" style="width:100%; height: 60px;">

                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="header-label">Id</td>
                                                                                    <td class="header-label">Students Names</td>
                                                                                    <td class="header-label">Painting</td>
                                                                                    <td class="header-label">Music</td>
                                                                                    <td class="header-label">Agricultural</td>
                                                                                    <td class="header-label">industrial</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="tr-inputs">
                                                                                    <td scope="row">1</td>
                                                                                    <td class="col-md-4">tuqa hussien taha</td>
                                                                                    <td>
                                                                                        <div><input type="number"></div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div><input type="number"></div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div><input type="number"></div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div><input type="number"></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div> --}}
                                                <!----------------------------------------------------------- *********************end activity****************** ----------------------------------------------------------------------------------->

                                                <!----------------------------------------------------------- *********************competion****************** ----------------------------------------------------------------------------------->
                                                {{-- <div class="b3" id="box2" style="margin-top: 25px;">
                                                                        <table class="table table-bordered" style="width:100%; height: 60px;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="header-label">Id</td>
                                                                                    <td class="header-label">Students Names</td>
                                                                                    <td class="header-label">Competitions Type</td>
                                                                                    <td class="header-label">Rank</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="tr-inputs">
                                                                                    <td scope="row">
                                                                                        <div><input type="number"></div>
                                                                                    </td>
                                                                                    <td class="col-md-4">
                                                                                        <div><input type="string" ></div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div><input type="string" ></div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div><input type="string" ></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div> --}}
                                                <!----------------------------------------------------------- *********************end competion****************** ----------------------------------------------------------------------------------->

                                                <!----------------------------------------------------------- *********************attendence****************** ----------------------------------------------------------------------------------->
                                                {{-- <div class="b4" id="box3" style="margin-top: 0px;">
                                                                        <button class="btn btn-md btn-success" id="addBtn" type="button" style="padding: 4px 19px; margin-bottom:10px; margin-right:10px; float:right; font-size: 20px; ">+</button>
                                                                        <table class="table table-bordered" style="width:100%; height: 60px;" id="myTable">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="header-label">id</td>
                                                                                    <td class="header-label">Students Names</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="tbody">
                                                                                <tr class="tr-inputs">
                                                                                    <td scope="row">
                                                                                        <div><input type="number" ></div>
                                                                                    </td>
                                                                                    <td class="col-md-10">
                                                                                        <div><input type="string" ></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div> --}}
                                                <!----------------------------------------------------------- *********************end attensence****************** ----------------------------------------------------------------------------------->



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
                                                                                    value="{{ $dd3['ActivityName'] }}"
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
                                                                                    value="{{ $dd1['Name']. ' '.$dd1['FatherName'] }}"
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
                                                                                        @foreach ($d5 as $dd5) @if ($dd1['Name'] == $dd5['Name'] && $dd3['ActivityName'] == $dd5['ActivityName'])
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
                                            </div>
                                        </div>
                                        {{-- <div class="card-body">
                                                                    <select id='see' style="margin: 20px; padding: 3px;
                                                             -webkit-appearance: none;
                                                            -moz-appearance: none;
                                                        appearance: none;
                                                        height: 57px;
                                                        padding: 10px 22px 12px 14px;
                                                        text-align: center;
                                                        background-size: 10px;
                                                        transition: border-color .1s ease-in-out,box-shadow .1s ease-in-out;
                                                        border: 1px solid #ddd;
                                                        border-radius: 14px;"
                                                        onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
                                                        >

                                                          <option>Choose Action</option>
                                                          <option value="{{route('e.matrialsS',$id)}}">Material Performance</option>
                                                          <option value="activity-p">Activity Performance</option>
                                                          <option value="competitions">Competitions</option>
                                                          <option value="attendance" >Attendance</option>
                                                          <option value="{{route('e.behaviorS',$id)}}">Behavior</option>
                                                          </select> --}}



                                        <!----------------------------------------------------------- *********************activity****************** ----------------------------------------------------------------------------------->
                                        {{-- <div class="b2" id="box01" style="margin-top: 25px;">
                                                                        <table class="table table-bordered" style="width:100%; height: 60px;">

                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="header-label">Id</td>
                                                                                    <td class="header-label">Students Names</td>
                                                                                    <td class="header-label">Painting</td>
                                                                                    <td class="header-label">Music</td>
                                                                                    <td class="header-label">Agricultural</td>
                                                                                    <td class="header-label">industrial</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="tr-inputs">
                                                                                    <td scope="row">1</td>
                                                                                    <td class="col-md-4">tuqa hussien taha </td>
                                                                                    <td>
                                                                                        <div><input type="number"></div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div><input type="number"></div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div><input type="number"></div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div><input type="number"></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div> --}}
                                        <!----------------------------------------------------------- *********************end activity****************** ----------------------------------------------------------------------------------->

                                        <!----------------------------------------------------------- *********************competion****************** ----------------------------------------------------------------------------------->
                                        {{-- <div class="b3" id="box02" style="margin-top: 25px;">
                                                                        <table class="table table-bordered" style="width:100%; height: 60px;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="header-label">Id</td>
                                                                                    <td class="header-label">Students Names</td>
                                                                                    <td class="header-label">Competitions Type</td>
                                                                                    <td class="header-label">Rank</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="tr-inputs">
                                                                                    <td scope="row">
                                                                                        <div><input type="number"></div>
                                                                                    </td>
                                                                                    <td class="col-md-4">
                                                                                        <div><input type="string" style="width: 100% ;"></div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div><input type="string" style="width: 80% ;"></div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div><input type="string" style="width: 80% ;"></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div> --}}
                                        <!----------------------------------------------------------- *********************end competion****************** ----------------------------------------------------------------------------------->

                                        <!----------------------------------------------------------- *********************attendence****************** ----------------------------------------------------------------------------------->
                                        {{-- <div class="b4" id="box03" style="margin-top: 0px; ">
                                                                        <button class="btn btn-md btn-success " id="addBtn1" type="button" style="padding: 4px 19px; margin-bottom:10px; margin-right:10px; float:right; font-size: 20px; ">+</button>
                                                                        <table class="table table-bordered" style="width:100%; height: 60px;" id="myTable">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="header-label">id</td>
                                                                                    <td class="header-label">Students Names</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="tbody1">
                                                                                <tr class="tr-inputs">
                                                                                    <td scope="row">
                                                                                        <div><input type="number" style="width: 80% ;"></div>
                                                                                    </td>
                                                                                    <td class="col-md-10">
                                                                                        <div><input type="string" style="width: 100% ;"></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div> --}}
                                        <!----------------------------------------------------------- *********************end attensence****************** ----------------------------------------------------------------------------------->

                                        {{-- </div> --}}
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
