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
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="css/demo.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/t.png" />
    <style>
        a button {
            margin: 10px;
        }

        .flex-con {
            /* display: flex;
        flex-direction: column; */
            margin-top: 40px;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-7 " href="manager.html"><img src="images/track.svg" class="mr-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="manager.html"><img src="images/tlogo.svg"
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
            <!-- partial:partials/_settings-panel.html -->
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
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('m.home') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>



                    <!--********************************* generate reports *************************************-->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#p" aria-expanded="false"
                            aria-controls="p">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Generate Reports </span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="p">
                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#P"
                                        aria-expanded="false" aria-controls="P"> Primary </a></li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#M"
                                        aria-expanded="false" aria-controls="M"> Middle </a></li>

                                <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#S"
                                        aria-expanded="false" aria-controls="S"> Secondary </a></li>
                            </ul>
                        </div>

                        <div class="collapse" id="P">
                            <h5
                                style="text-align:center; color: white;background-color: #4b49ac; padding: 10px; border-radius:10px ; font-size: 16px">
                                Primary</h5>
                            <ul class="nav flex-column sub-menu">
                                @foreach ($p as $pp)
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('m.indexReport', $pp['id']) }}">{{ $pp['sublevel'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="collapse" id="M">
                            <h5
                                style="text-align:center; color: white;background-color: #4b49ac; padding: 10px; border-radius:10px ; font-size: 16px">
                                Middle</h5>
                            <ul class="nav flex-column sub-menu">
                                @foreach ($pre as $ppre)
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('m.indexReport', $ppre['id']) }}">{{ $ppre['sublevel'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="collapse" id="S">
                            <h5
                                style="text-align:center; color: white;background-color: #4b49ac; padding: 10px; border-radius:10px ; font-size: 16px">
                                Secondary</h5>
                            <ul class="nav flex-column sub-menu">
                                @foreach ($sec as $ssec)
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('m.indexReport', $ssec['id']) }}">{{ $ssec['sublevel'] }}</a>
                                    </li>
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
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">

                                    <form action="{{ route('m.searchYear', $id) }}" method="get">
                                        @csrf

                                        <div class="card-body">
                                            <div class="input-group mb-4" style="width:40% ; ">
                                                <input type="text" class="form-control input-text"
                                                    placeholder="enter year...." aria-label="Recipient's username"
                                                    aria-describedby="basic-addon2" name="year">
                                                <div class="input-group-append">
                                                    <input class="btn btn-outline-primary btn-sm" type="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    @if (isset($_GET['year']) && $yyearr != 0)

                                       {{--  <a href="{{ route('m.history', $id) }}" type="button">back</a> --}}

                                        <div class="flex-con" style=" margin-top:30px ;">

                                            <a href="{{ route('m.SR1Old', [$id, $yyearr]) }}" type="button"
                                                class="btn btn-primary">
                                                First Term</a>

                                            <a href="{{ route('m.SR2Old', [$id, $yyearr]) }}"type="button"
                                                class="btn btn-info">
                                                Second Term</a>

                                            <a href="{{ route('m.AYROld', [$id, $yyearr]) }}" type="button"
                                                class="btn btn-danger">
                                                Year</a>

                                            @if ($yyearr == 2016 || $yyearr == 2019 || $yyearr == 2022)
                                                <a href="{{ route('m.ESROld', [$id, $yyearr]) }}"type="button"
                                                    class="btn btn-outline-info"> Education
                                                    Stage</a>
                                            @endif
                                        </div>
                                    @endif

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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. Premium
                <a href="#">Student Performance Tracking System</a> All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                    class="ti-heart text-danger ml-1"></i></span>
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
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <script src="js/script.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
