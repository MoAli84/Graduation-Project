@extends('manager.homelayout')
@section('content')
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

            {{-- <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#primary" aria-expanded="false" aria-controls="primary">
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
                                    href="{{ route('m.indexAnalysis', $pp['id']) }}">{{ $pp['sublevel'] }}</a></li>
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
                                    href="{{ route('m.indexAnalysis', $ppre['id']) }}">{{ $ppre['sublevel'] }}</a></li>
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
                                    href="{{ route('m.indexAnalysis', $ssec['id']) }}">{{ $ssec['sublevel'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </li> --}}

            <!--********************************* generate reports *************************************-->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#p" aria-expanded="false" aria-controls="p">
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
                                    href="{{ route('m.indexReport', $pp['id']) }}">{{ $pp['sublevel'] }}</a></li>
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
                                    href="{{ route('m.indexReport', $ppre['id']) }}">{{ $ppre['sublevel'] }}</a></li>
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
                                    href="{{ route('m.indexReport', $ssec['id']) }}">{{ $ssec['sublevel'] }}</a></li>
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
                <div class="col-xl-8 col-lg-8 col-md-4 grid-margin  stretch-card" style="width: 100%;">
                    <div class="row " style="margin-right:-150px;">
                        <div class="col-md-8 grid-margin ">
                            <div class="row" style="text-align: center;">
                                <div class="col-md-4 mb-4 stretch-card ">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                            <p class="mb-4">Student Number</p>
                                            <p class="fs-30 mb-2">50</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 stretch-card ">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Staff Number </p>
                                            <p class="fs-30 mb-2">6</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-4  stretch-card ">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                            <p class="mb-4">matrials</p>
                                            <p class="fs-30 mb-2">40</p>

                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>
                        <div class="col-8 col-md-4 col-xl-4 ">
                            <div class="justify-content-sm-between d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <div class=" wrapper ">
                                        <div class="container-calendar" style="margin-left:280px ;">
                                            <h3 id="monthAndYear"></h3>
                                            <div class="button-container-calendar">
                                                <button id="previous" onclick="previous()">&#8249;</button>
                                                <button id="next" onclick="next()">&#8250;</button>
                                            </div>
                                            <table class="table-calendar" id="calendar" data-lang="en">
                                                <thead id="thead-month"></thead>
                                                <tbody id="calendar-body"></tbody>
                                            </table>
                                            <div class="footer-container-calendar">
                                                <label for="month">Jump To: </label>
                                                <select id="month" onchange="jump()">
                                                    <option value=0>Jan</option>
                                                    <option value=1>Feb</option>
                                                    <option value=2>Mar</option>
                                                    <option value=3>Apr</option>
                                                    <option value=4>May</option>
                                                    <option value=5>Jun</option>
                                                    <option value=6>Jul</option>
                                                    <option value=7>Aug</option>
                                                    <option value=8>Sep</option>
                                                    <option value=9>Oct</option>
                                                    <option value=10>Nov</option>
                                                    <option value=11>Dec</option>
                                                </select>
                                                <select id="year" onchange="jump()"></select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-wrapper">
                <div class="row" style="margin-top:-340px ; margin-left:-50px ;">
                    <div class="col-lg-6 col-md-3 grid-margin stretch-card ">

                        <div class="card">
                            <div class="card-body">
                                <canvas id="chart2" style="width:250px; height:120px;"></canvas>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-3  grid-margin stretch-card ">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="chart5" style="width:250px; height:120px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row" style="margin-top:-100px ; ">

                <div class=" col-lg-12 col-md-10 col-md-10 col-sm-6 grid-margin stretch-card ">
                    <div class="col-lg-7 col-md-6 grid-margin " style="margin-top: 60px " >
                        <div class="card">
                            <div class="card-body">
                                <p>percentage of success and failure in school</p>
                                <div style="float:right ; margin-top:-30px; ">
                                    <select class="styled" id='psf'>
                                        {{-- <option >Educational Stage</option> --}}
                                        <option value="Primary" selected>Primary</option>
                                        <option value="Middle">Middle</option>
                                        <option value="Secondary">Secondary</option>
                                    </select>

                                </div>
                                <canvas id="chart3" style="width:250px; height:90px;"></canvas>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 grid-margin  stretch-card " style="margin-top: 60px " >
                        <div class="card">
                            <div class="card-body">

                                <canvas id="chart7" style="width:250px; height:120px;"></canvas>
                            </div>
                        </div>
                    </div>



                    {{-- <div class="col-lg-5 col-xl-5 col-md-5 col-sm-3 grid-margin stretch-card ">
                        <div class="card">
                            <div class="card-body">

                                <h2 class="ta-ca"> <img src="images/trophy.jpg" style="width: 50px ;">Competition Type
                                </h2>
                                <table class="table " style="width: 100%;">
                                    <thead>
                                        <tr>

                                            <th scope="col">Student Name</th>
                                            <th scope="col">Competition Type</th>
                                            <th scope="col">Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>Mark</td>
                                            <td>football</td>
                                            <td>8</td>
                                        </tr>
                                        <tr>

                                            <td>Jacob</td>
                                            <td>running</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>

                                            <td>Jacob</td>
                                            <td>running</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>

                                            <td>Jacob</td>
                                            <td>running</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>

                                            <td>Jacob</td>
                                            <td>running</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>

                                            <td>Jacob</td>
                                            <td>running</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>

                                            <td>Jacob</td>
                                            <td>running</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>

                                            <td>Mark</td>
                                            <td>football</td>
                                            <td>8</td>
                                        </tr>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}


                </div>
            </div>
            <div class="row" style="margin-top:-50px;">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="col-lg-7 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p>percentage of success in each material</p>
                                <div style="float:right ; margin-top:-30px; ">
                                    <select class="styled" id="sub">
                                        {{-- <option selected>Subjects</option> --}}
                                        <option>Math</option>
                                        <option>Arabic</option>
                                        <option>English</option>
                                        <option>science </option>

                                    </select>

                                </div>

                                <canvas id="chart4" style="width:250px; height:90px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <canvas id="chart6" style="width:250px; height:120px;"></canvas>
                            </div>
                        </div>
                    </div>



                </div>
            </div>


            <div class="row" style="margin-top:-10px ;">

                <div class="col-md-12 grid-margin stretch-card">

                    {{-- <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p>percentage of absence in school</p>
                                <div style="float:right ; margin-top:-30px; ">

                                    <select class="styled">
                                        <option selected>Educational Stage</option>
                                        <option>Primary</option>
                                        <option>Middle</option>
                                        <option>Secondary</option>
                                    </select>

                                </div>
                                <canvas id="chart1" style="width:250px; height:90px;"></canvas>
                            </div>
                        </div>
                    </div> --}}

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
    <!-- <script src="js/script.js"></script> -->
    <!-- End custom js for this page-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/1.4.0/chartjs-plugin-annotation.min.js"
        integrity="sha512-HrwQrg8S/xLPE6Qwe7XOghA/FOxX+tuVF4TxbvS73/zKJSs/b1gVl/P4MsdfTFWYFYg/ISVNYIINcg35Xvr6QQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script type="text/javascript">
        var ch2 = document.getElementById('chart2').getContext('2d');
        var ch5 = document.getElementById('chart5').getContext('2d');
        var ch3 = document.getElementById('chart3').getContext('2d');
        var ch4 = document.getElementById('chart4').getContext('2d');
        /* var ch1 = document.getElementById('chart1').getContext('2d'); */
        var ch6 = document.getElementById('chart6').getContext('2d');
        var ch7 = document.getElementById('chart7').getContext('2d');

        //-------------------------------------------------------------------------------------
        const datach2 = {
            labels: ['', '2018', '2019', '2020', '2021', '2022'],
            datasets: [{

                type: 'line',
                label: 'precentage',
                data: [, 35, 22, 35, 40, 50],
                fill: false,
                borderColor: 'black',
                backgroundColor: 'transparent',
                tension: 0.1,

            }]
        }


        const configch2 = {

            data: datach2,
            options: {
                devicePixelRatio: 10,

                scales: {
                    x: {
                        position: 'bottom',
                        grid: {
                            display: false,
                            drawBorder: true,
                        },
                        ticks: {
                            font: {
                                size: 14,
                            }
                        }
                    },
                    xAxis2: {
                        position: 'top',
                        grid: {
                            display: false,
                            drawBorder: true,
                        },
                        ticks: {
                            display: false
                        }
                    },
                    y: {
                        min: 0,

                        grid: {
                            display: true,
                            drawBorder: true,
                        },
                        ticks: {
                            font: {
                                size: 14,
                            }
                            /* ,
                                                        callback: function(value) {
                                                            return value + "%"
                                                        } */
                        }
                    },
                    yAxis2: {
                        position: 'right',
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false,
                            drawBorder: true,
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    filler: {
                        propagate: false,
                        drawTime: 'beforeDatasetsDraw'
                    },
                    autoColors: false,
                    datalabels: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'number of students in school in the last 5 years',
                        font: {
                            size: 14
                        }

                    }
                },
                pointBackgroundColor: 'white',
                radius: 4,

            },
        }
        Chart.register(ChartDataLabels);
        var chart2 = new Chart(ch2, configch2);
        //-------------------------------------------------------------------------------------

        //-------------------------------------------------------------------------------------
        const datach5 = {
            labels: ['egyption', 'Syrian', 'Sudanese'],
            datasets: [{
                label: 'Weekly Sales',
                data: [75, 20, 5],
                backgroundColor: [
                    '#898AA6',
                    '#9db7fb',
                    '#C9BBCF'
                ],
                borderColor: [
                    '#91929c',
                    '#a1b9f7',
                    '#c7beca'
                ],
                borderWidth: 1
            }]
        };


        const configch5 = {
            type: 'pie',
            data: datach5,
            options: {
                devicePixelRatio: 10,
                plugins: {
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: 'white',
                        formatter: (value, context) => {
                            const p = (value / 120) * 100;
                            const z = Math.round(p);
                            return z + '%';
                        }
                    },
                    legend: {
                        display: false,
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
                            },
                        },
                    },
                    filler: {
                        propagate: false,
                        drawTime: 'beforeDatasetsDraw'
                    },
                    title: {
                        display: true,
                        text: 'percentage of nationalities in school',
                        font: {
                            size: 14
                        }

                    }
                },
            },


        };

        Chart.register(ChartDataLabels);
        var chart5 = new Chart(ch5, configch5);
        //-------------------------------------------------------------------------------------

        //-------------------------------------------------------------------------------------
        const data3 = {
            labels: [1, 2, 3, 4, 5, 6],
            datasets: [{
                    label: 'failure',
                    backgroundColor: 'rgb(245, 61, 61)',
                    borderColor: 'rgb(245, 61, 61)',
                    data: [40, 30, 20, 25, 20, 35],
                    barThickness: 30,
                },
                {
                    label: 'sucess',
                    backgroundColor: '#7DA0FA',
                    borderColor: '#7DA0FA',
                    data: [60, 70, 80, 75, 80, 65],
                    barThickness: 30,
                }
            ]
        }

        const config3 = {
            type: 'bar',
            data: data3,

            options: {
                devicePixelRatio: 10,
                scales: {
                    x: {
                        stacked: true,
                        offset: true,
                        ticks: {
                            font: {
                                size: 14,
                                /* weight: 'bold' */
                            }
                        },
                        grid: {
                            display: false,
                            drawBorder: true,
                        },
                    },
                    y: {
                        stacked: true,
                        min: 0,
                        max: 100,
                        ticks: {
                            callback: function(value) {
                                return value + "%"
                            },
                            scaleLabel: {
                                display: true,
                                labelString: "Percentage"
                            }
                        }

                    }
                },

                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        color: 'white',
                        font: {
                            /* weight: 'bold' */
                        },
                        formatter: (value, context) => {
                            return value + '%';
                        }
                    }
                    /* ,
                                        title: {
                                            display: true,
                                            text: 'percentage of absence and attendence in school',
                                            font: {
                                                size: 14
                                            }

                                        } */

                }


            },


        }


        Chart.register(ChartDataLabels);
        var chart3 = new Chart(ch3, config3);


        var psf = document.getElementById('psf');
        psf.addEventListener("change", PSF);

        function PSF() {
            if (psf.value == 'Primary') {
                const l = [1, 2, 3, 4, 5, 6];
                const v = [10, 20, 30, 40, 50, 60];
                const vv = [90, 80, 70, 60, 50, 40];
                chart3.data.datasets[0].data = v;
                chart3.data.datasets[1].data = vv;
                chart3.data.labels = l;
                chart3.update();
            } else if (psf.value == 'Middle') {
                const l1 = [1, 2, 3];
                const v1 = [10, 20, 30];
                const vv1 = [90, 80, 70];
                chart3.data.datasets[0].data = v1;
                chart3.data.datasets[1].data = vv1;
                chart3.data.labels = l1;
                chart3.update();
            } else if (psf.value == 'Secondary') {
                const l2 = [1, 2, 3];
                const v2 = [40, 50, 60];
                const vv2 = [60, 50, 40];
                chart3.data.datasets[0].data = v2;
                chart3.data.datasets[1].data = vv2;
                chart3.data.labels = l2;
                chart3.update();
            }

            /* console.log(psf.value); */
        }

        //-------------------------------------------------------------------------------------

        //-------------------------------------------------------------------------------------


        const datach4 = {
            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            datasets: [{
                label: 'precentage',
                backgroundColor: ["#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77",
                    "#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77"
                ],
                borderColor: ["#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77",
                    "#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77", "#6BCB77"
                ],
                data: [80, 89, 70, 96, 88, 73, 80, 50, 70, 80, 50, 70],
                barThickness: 25,
            }]
        }


        const configch4 = {
            type: 'bar',
            data: datach4,
            options: {
                devicePixelRatio: 10,
                scales: {
                    x: {
                        position: 'bottom',
                        grid: {
                            display: false,
                            drawBorder: true,
                        },
                        ticks: {
                            font: {
                                size: 14,
                            }
                        }
                    },
                    xAxis2: {
                        position: 'top',
                        grid: {
                            display: false,
                            drawBorder: true,
                        },
                        ticks: {
                            display: false
                        }
                    },
                    y: {
                        min: 0,
                        max: 100,
                        grid: {
                            display: true,
                            drawBorder: true,
                        },
                        ticks: {
                            font: {
                                size: 14,
                            },
                            callback: function(value) {
                                return value + "%"
                            },
                        }
                    },
                    yAxis2: {
                        position: 'right',
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false,
                            drawBorder: true,
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    filler: {
                        propagate: false,
                        drawTime: 'beforeDatasetsDraw'
                    },
                    autoColors: false,
                    datalabels: {
                        display: false
                    }
                },
                pointBackgroundColor: 'white',
                radius: 4,

            },

        }
        Chart.register(ChartDataLabels);
        var chart4 = new Chart(ch4, configch4);

        var sub = document.getElementById('sub');
        sub.addEventListener("change", SUB);
        /* console.log(sub); */

        function SUB() {
            if (sub.value == 'Arabic') {
                const ll = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
                const vl = [95, 68, 79, 90, 66, 93, 50, 77, 70, 89, 95, 59];
                chart4.data.datasets[0].data = vl;
                chart4.data.labels = ll;
                chart4.update();
            } else if (sub.value == 'Math') {
                const ll1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
                const vl1 = [80, 89, 70, 96, 88, 73, 80, 50, 70, 80, 50, 70];
                chart4.data.datasets[0].data = vl1;
                chart4.data.labels = ll1;
                chart4.update();
            } else if (sub.value == 'English') {
                const ll2 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
                const vl2 = [88, 71, 77, 53, 99, 64, 80, 89, 77, 66, 70, 90];
                chart4.data.datasets[0].data = vl2;
                chart4.data.labels = ll2;
                chart4.update();
            } else if (sub.value == 'science') {
                const ll3 = [4, 5, 6, 7, 8, 9, 10, 11, 12];
                const vl3 = [66, 90, 69, 99, 52, 98, 96, 50, 60];
                chart4.data.datasets[0].data = vl3;
                chart4.data.labels = ll3;
                chart4.update();
            }
        }
        /* console.log(chart4.data.datasets[0].data); */
        //-------------------------------------------------------------------------------------

        //-------------------------------------------------------------------------------------
        const datach6 = {
            labels: ['boys', 'girls'],
            datasets: [{
                label: 'gender',
                data: [55, 45],
                backgroundColor: [
                    '#7DA0FA',
                    '#F3797E'

                ],
                borderColor: [
                    '#84a4f5',
                    '#ed7e81'

                ],
                borderWidth: 1
            }]
        };


        const configch6 = {
            type: 'pie',
            data: datach6,
            options: {
                devicePixelRatio: 10,
                plugins: {
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: 'white',
                        formatter: (value, context) => {
                            const p = (value / 120) * 100;
                            const z = Math.round(p);
                            return z + '%';
                        }
                    },
                    legend: {
                        display: false,
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
                            },
                        },
                    },
                    filler: {
                        propagate: false,
                        drawTime: 'beforeDatasetsDraw'
                    },
                    title: {
                        display: true,
                        text: 'percentage of genders in school',
                        font: {
                            size: 14
                        }

                    }
                },
            },


        };

        Chart.register(ChartDataLabels);
        var chart6 = new Chart(ch6, configch6);
        //-------------------------------------------------------------------------------------


        //-------------------------------------------------------------------------------------
        const datach7 = {
            labels: ['Muslim', 'Christian'],
            datasets: [{
                label: 'Weekly Sales',
                data: [80, 20],
                backgroundColor: [
                    '#f6b44c',
                    '#FDE49C'

                ],
                borderColor: [
                    '#ecb255',
                    '#fae39e'

                ],
                borderWidth: 1
            }]
        };


        const configch7 = {
            type: 'pie',
            data: datach7,
            options: {
                devicePixelRatio: 10,
                plugins: {
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: 'white',
                        formatter: (value, context) => {
                            const p = (value / 120) * 100;
                            const z = Math.round(p);
                            return z + '%';
                        }
                    },
                    legend: {
                        display: false,
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
                            },
                        },
                    },
                    filler: {
                        propagate: false,
                        drawTime: 'beforeDatasetsDraw'
                    },
                    title: {
                        display: true,
                        text: 'percentage of religions in school',
                        font: {
                            size: 14
                        }

                    }
                },
            },


        };

        Chart.register(ChartDataLabels);
        var chart7 = new Chart(ch7, configch7);
        //-------------------------------------------------------------------------------------
    </script>
@endsection
