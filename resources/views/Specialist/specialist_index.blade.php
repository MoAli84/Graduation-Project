<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>i Track</title>
    <base href="{{ \URL::to('/') }}">

    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/t.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-7 " href="{{ url('specialist/index') }}"><img src="images/track.svg"
                        class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('specialist/index') }}"><img src="images/tlogo.svg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                  <li class="nav-item dropdown">

                  </li>
                  <li class="nav-item nav-profile dropdown">

                      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                          <img src="images/faces/my-profile-icon-png-3 (1).jpg" alt="profile" />
                      </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                          aria-labelledby="profileDropdown">
                          <a class="dropdown-item">
                              <i class="ti- text-primary"></i>
                              Show Profile
                          </a>
                          <a href="{{ url('/specialist/logout') }}" class="dropdown-item">
                              <i class="ti-power-off text-primary"></i>
                              Logout
                          </a>
                      </div>
                  </li>

              </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>

            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('specialist/home') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Home Page</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#primary" aria-expanded="false"
                            aria-controls="primary">
                            <i class="icon-book menu-icon"></i>
                            <span class="menu-title">primary</span>
                            <i class="menu-arrow"></i>
                        </a>

                        <div class="collapse" id="primary">
                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link" href="{{ url('specialist/index/one') }}"> 1
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('specialist/index/two') }}"> 2
                                    </a>
                                </li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ url('specialist/index/three') }}">3</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ url('specialist/index/four') }}">4</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ url('specialist/index/five') }}">5</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ url('specialist/index/sex') }}">6</a></li>
                            </ul>
                        </div>


                    </li>
                    <!-- ************************************************************************** -->
                    <!-- **************************************************************************************** -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#middle" aria-expanded="false"
                            aria-controls="middle">
                            <i class="icon-book menu-icon"></i>
                            <span class="menu-title">middle</span>
                            <i class="menu-arrow"></i>
                        </a>

                        <div class="collapse" id="middle">
                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link" href="{{ url('specialist/index/seven') }}">
                                        1 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('specialist/index/eight') }}">
                                        2 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('specialist/index/nine') }}">3</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- *************************************************************************** -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#secondary" aria-expanded="false"
                            aria-controls="secondary">
                            <i class="icon-book menu-icon"></i>
                            <span class="menu-title">secondary</span>
                            <i class="menu-arrow"></i>
                        </a>

                        <div class="collapse" id="secondary">
                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link" href="{{ url('specialist/index/ten') }}"> 1
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('specialist/index/eleven') }}">
                                        2 </a>
                                </li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ url('specialist/index/twelve') }}">3</a></li>
                            </ul>
                        </div>

                    </li>

                    {{-- <li class="nav-item">
            <a class="nav-link" href="{{ url('affair/create') }}">
              <i class="icon-plus menu-icon"></i>
              <span class="menu-title">Add Student</span>
            </a>
          </li> --}}






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

                                        {{-- <p class="card-description">
                                            <button type="button" class="btn btn-primary"> Upgrade Level</button>
                                        </p> --}}

                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="width:100%; height: 60px;">
                                                <thead>
                                                    <tr>
                                                        <th class="header-label" style="background-color: #fff;font-weight: bold;" >Id </th>
                                                        <th class="header-label" style="background-color: #fff;font-weight: bold;">Students Names</th>

                                                        @foreach($d4 as $dd4)
                                                        <th class="header-label">
                                                            <div><input type="text" value="{{$dd4['MaterialName']}}" readonly name="matrails[]" style="background-color: #fff;font-weight: bold; border: none"></div>
                                                        </th>
                                                        @endforeach

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($d2 as $dd2)
                                                    <tr class="tr-inputs">
                                                        <td scope="row">
                                                            <div><input type="text" value="{{$dd2['id']}}" readonly name="stuid[]" disabled style="background-color: #ddd;  text-align:center"></div>
                                                        </td>
                                                        <td class="col-md-4">
                                                            <div><input type="text" value="{{$dd2['Name']}}" readonly name="stuname[]" style="background-color: #fff; border: none"></div>
                                                        </td>
                                                        {{-- <td class="col-md-4">{{$dd1['Name']}}</td> --}}

                                                        @foreach($d4 as $dd4)
                                                        <td>
                                                            <div>
                                                                <input type="number" name="score[]" disabled
                                                                @foreach($d6 as $dd6)
                                                                 @if (($dd2['Name']==$dd6['Name'])&&($dd4['MaterialName']==$dd6['MaterialName']))
                                                                    @if ($dd6['Score'] <= 25 )
                                                                    value="{{$dd6['Score']}}" style="background-color: #f00 ; text-align: center; font-weight: bold "
                                                                    @elseif (($dd6['Score'] > 25) && ($dd6['Score'] < 30))
                                                                    value="{{$dd6['Score']}}" style="background-color: rgb(255, 251, 0)"
                                                                    @elseif (($dd6['Score'] >= 30) && ($dd6['Score'] < 40))
                                                                    value="{{$dd6['Score']}}" style="background-color: rgb(145, 255, 0)"
                                                                    @else
                                                                    value="{{$dd6['Score']}}" style="background-color: #0f0"
                                                                    @endif
                                                                 @break
                                                                 @endif
                                                                @endforeach
                                                                min="0"
                                                                @foreach($d6 as $dd6)
                                                                @if ($dd4['MaterialName']==$dd6['MaterialName'])
                                                                max="{{$dd6['totalScore']}}"
                                                                @break
                                                                @endif
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

                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.
                            Premium <a href="#">Student Performance Tracking System</a> All rights
                            reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
