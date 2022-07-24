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
        .ta-ca {
            color: #d5aa34;
        }

        select.styled:-moz-focusring,
        option.styled:-moz-focusring {
            color: transparent !important;
            text-shadow: 0 0 0 #000 !important;
        }

        select.styled::-ms-expand {
            display: none;
        }

        .lt-ie10 select.styled {
            background-image: none;
        }

        select.styled,
        select.styled option {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            border: none;
            padding-left: 5px;
            border: 1px solid #fff;
            background: #ffffff;
        }

        select.styled {
            vertical-align: top;
            text-overflow: ellipsis;
            display: inline-block;

            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;

            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;

            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        select.styled:not([multiple='multiple']) {
            height: 30px;
            padding-right: 35px;
            background:
                linear-gradient(45deg, transparent 50%, #AAA 50%),
                linear-gradient(135deg, #AAA 50%, transparent 50%),
                linear-gradient(to top, #ddd, #fff);
            background-position:
                calc(100% - 15px) calc(50%),
                calc(100% - 10px) calc(50%),
                100% 0;
            background-size:
                5px 5px,
                5px 5px,
                30px 100%;
            background-repeat: no-repeat;
        }

        table tr td select.styled:not([multiple='multiple']) {
            height: 82% !important;
        }

        select.styled[multiple='multiple'] {
            padding-right: 5px;
        }

        select:focus.styled,
        option:focus.styled {
            outline: 1px solid white;
            border: 1px solid #ccc;
            -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.2);
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.2);
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
                <!-- <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul> -->
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <!-- <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div> -->
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="images/faces/my-profile-icon-png-3 (1).jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
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

                    <li class="nav-item">

                        <a class="nav-link" data-toggle="collapse" href="#primary" aria-expanded="false"
                            aria-controls="primary">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Performance Analysis </span>
                            <i class="menu-arrow"></i>
                        </a>

                        <div class="collapse" id="primary">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#Primary"
                                        aria-expanded="false" aria-controls="Primary"> Primary </a></li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#Middle"
                                        aria-expanded="false" aria-controls="Middle"> Middle </a></li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#Secondary"
                                        aria-expanded="false" aria-controls="Secondary"> Secondary </a></li>
                            </ul>
                        </div>

                        <div class="collapse" id="Primary">
                            <h5
                                style="text-align:center; color: white;background-color: #4b49ac; padding: 10px; border-radius:10px ; font-size: 16px">
                                Primary</h5>
                            <ul class="nav flex-column sub-menu">
                                @foreach ($p as $pp)
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('m.indexAnalysis', $pp['id']) }}">{{ $pp['sublevel'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="collapse" id="Middle">
                            <h5
                                style="text-align:center; color: white;background-color: #4b49ac; padding: 10px; border-radius:10px ; font-size: 16px">
                                Middle</h5>
                            <ul class="nav flex-column sub-menu">
                                @foreach ($pre as $ppre)
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('m.indexAnalysis', $ppre['id']) }}">{{ $ppre['sublevel'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="collapse" id="Secondary">
                            <h5
                                style="text-align:center; color: white;background-color: #4b49ac; padding: 10px; border-radius:10px ; font-size: 16px">
                                Secondary</h5>
                            <ul class="nav flex-column sub-menu">
                                @foreach ($sec as $ssec)
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('m.indexAnalysis', $ssec['id']) }}">{{ $ssec['sublevel'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

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
                <div class="content-wrapper" style="margin-top:-10px ;">


                    <div class="row">

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="col-lg-4 grid-margin ">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Area chart</h4>
                                        <canvas id="areaChart"></canvas>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3 grid-margin ">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Area chart</h4>
                                        <canvas id="areaChart"></canvas>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 class="ta-ca"> <img src="images/reward.jpg" style="width:90px ;">
                                            Excellent Students</h3>
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Student Name</th>
                                                    <th scope="col">Rank</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">52</th>
                                                    <td>Mark</td>

                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">55</th>
                                                    <td>Jacob</td>

                                                    <td>2</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">55</th>
                                                    <td>Jacob</td>

                                                    <td>3</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">55</th>
                                                    <td>Jacob</td>

                                                    <td>4</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">55</th>
                                                    <td>Jacob</td>

                                                    <td>5</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">55</th>
                                                    <td>Jacob</td>

                                                    <td>6</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">55</th>
                                                    <td>Jacob</td>

                                                    <td>7</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">55</th>
                                                    <td>Jacob</td>

                                                    <td>8</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">55</th>
                                                    <td>Jacob</td>

                                                    <td>9</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">55</th>
                                                    <td>Jacob</td>

                                                    <td>10</td>
                                                </tr>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <!-- **************************************************      -->
                        </div>
                    </div>
                    <div class="row" style="margin-top:-450px ;">

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="col-lg-7 grid-margin ">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Area chart</h4>
                                        <canvas id="areaChart"></canvas>
                                    </div>
                                </div>
                            </div>






                        </div>
                    </div>


                    <div class="row" style="margin-top:85px ;">

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="col-lg-7 grid-margin ">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Area chart</h4>
                                        <canvas id="areaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 grid-margin ">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Area chart</h4>
                                        <canvas id="areaChart"></canvas>
                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>

                    <div class="row" style="margin-top:-50px ;">

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="col-lg-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Area chart</h4>
                                        <div style="float:right ; margin-top:-40px; ">
                                            <select class="styled">
                                                <option selected>Subjects</option>
                                                <option>Math</option>
                                                <option>Arabic</option>
                                                <option>English</option>
                                                <option>science </option>

                                            </select>

                                        </div>

                                        <canvas id="areaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Area chart</h4>
                                        <div style="float:right ; margin-top:-40px; ">
                                            <select class="styled">
                                                <option selected>Subjects</option>
                                                <option>Math</option>
                                                <option>Arabic</option>
                                                <option>English</option>
                                                <option>science </option>

                                            </select>

                                        </div>

                                        <canvas id="areaChart"></canvas>
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
