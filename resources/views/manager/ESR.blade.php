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
    <!-- endinject -->

    <link rel="shortcut icon" href="images/t.png" />
    {{-- <link rel="stylesheet" href="css/report.css"> --}}

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');

        * {

            font-family: 'Open Sans', sans-serif;
        }

        .main {
            justify-items: center;
        }

        .card hr {
            border: none;
            height: 8px;
            margin-top: -2px;
            /* Set the hr color */
            color: #333;
            /* old IE */
            background-color: #333;
            /* Modern Browsers */
        }

        .con {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .con .info {
            padding-bottom: 18px;

        }

        .con .info p {
            line-height: 13px;
            font-size: 16px;
            font-weight: bold;
            padding-bottom: 15px;
            padding-top: 10px;
        }

        /* .con-2 .total p{
    background-color: #c7d6db;
} */
        .chart-2 {
            display: flex;
            flex-direction: row;
        }

        .fl {
            text-align: right;
            font-weight: bold;
        }
    </style>

</head>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div class="main-panel" style="margin-left: 300px; ">
                <div class="content">
                    <div class="row">
                        <div class="col-md-9 grid-margin">

                            <div class="card">
                                <p class="card-description">
                                <h2 id="h">Student Growth Report For Education Stage </h2>
                                <hr>
                                </p>

                                <p id="y" class="fl">date:- {{ $date }}</p>

                            </div>
                            <div class="con">
                                <div class="info">
                                    @foreach ($d1 as $dd1)
                                        <p id="id">Student ID:- {{ $dd1['id'] }}</p>
                                        <p id="n">Student Name:- {{ $dd1['Name'] }}</p>
                                        <p id="es">Education Stage:- {{ $dd1['EduLevelName'] }}</p>
                                    @endforeach

                                </div>
                                <div class="i">
                                    <img src="images/avatar2.jpg" id="avatar" style=" width: 120px;">
                                </div>

                            </div>

                            <hr
                                style="border: none;
              height: 3px;

              /* Set the hr color */
              color: #333; /* old IE */
              background-color: #333; /* Modern Browsers */">

                            <div class="con-2">
                                <div class="total">
                                    <p id="h1"
                                        style="background-color:rgba(204, 204, 204); font-size: large; font-weight: bolder; padding: 12px;">
                                        total achievement over education stage</p>

                                </div>
                                <div class="chart-1"
                                    style="border:  3px  solid rgba(204, 204, 204) ; margin-top: -8px; padding: 20px;">
                                    <div>
                                        <p id="b11"
                                            style="color:rgba(77, 77, 77); font-size: large;line-height:38px ;">here is
                                            some visualization for your child's total achievement in all levels and
                                            semesters.</p>
                                    </div>
                                    <div>
                                        <canvas id="chart4" style="height: 90px; width:230px"></canvas>
                                    </div>

                                </div>
                            </div>


                            <br>
                            @php
                                $array = [];
                            @endphp

                            @foreach ($MaterialName as $mMaterialName)
                                @if (count($arr1[$mMaterialName]) / 2 < 3)
                                    @continue;
                                @else
                                    @php
                                        array_push($array, $mMaterialName);
                                    @endphp

                                    <div class="con-4">
                                        <div class="arabic">
                                            <p
                                                style="background-color:rgba(204, 204, 204); font-size: large; font-weight: bolder; padding: 12px;">
                                                {{ $mMaterialName }}</p>

                                        </div>
                                        <div class="chart-1"
                                            style="border:  3px  solid rgba(204, 204, 204) ; margin-top: -8px; padding: 20px;">

                                            <div>
                                                <br>
                                                {{-- <img src="images/chart1.png"> --}}
                                                {{-- <canvas id= @php  "chart'.$x'" @endphp ></canvas> --}}
                                                <canvas id={{ $mMaterialName }}></canvas>
                                                <br>

                                            </div>

                                        </div>
                                    </div>
                                @endif
                                <br>
                            @endforeach




                        </div>

                    </div>

                    <br>
                    <div class="con-7">
                        <button class="btn btn-primary btn-lg" style="font-size: 20px;" id="e"
                            onclick="convertHTMLToPDF()">Download</button>

                    </div>




                </div>
                <!-- content-wrapper ends -->

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
    <!-- End custom js for this page-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/1.4.0/chartjs-plugin-annotation.min.js"
        integrity="sha512-HrwQrg8S/xLPE6Qwe7XOghA/FOxX+tuVF4TxbvS73/zKJSs/b1gVl/P4MsdfTFWYFYg/ISVNYIINcg35Xvr6QQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script type="text/javascript">
        const bgcolor = {
            id: 'bgcolor',
            beforeDraw: (chart, options) => {
                const {
                    ctx,
                    width,
                    height
                } = chart;
                ctx.fillStyle = 'white';
                ctx.fillRect(0, 0, chart.width, chart.height)
                ctx.restore();
            }
        }



        var arry = <?php echo json_encode($array); ?>;
        /* console.log(arry); */
        var stuGrades = <?php echo json_encode($x1); ?>;

        var average = <?php echo json_encode($array1); ?>;
        /* console.log(average); */
        var edlv = <?php echo json_encode($eedulv); ?>;
        /* console.log(edlv); */

        var mPerformance = [];
        var avgPerformance = [];
        var levels = [];
        var scores = [];
        var avgscores = [];
        var totalscore = [];

        var larry = arry.length;
        /* console.log(larry); */

        for (var x in arry) {

            for (var i = 0; i < stuGrades.length; i++) {
                if (stuGrades[i][1] == arry[x]) {
                    mPerformance.push(stuGrades[i]);
                }
            }

            for (var i = 0; i < average.length; i++) {
                if (average[i][1] == arry[x]) {
                    avgPerformance.push(average[i]);
                }
            }

            /* console.log(mPerformance);
            console.log(avgPerformance); */

            scores.push(mPerformance[0][2]);
            avgscores.push(avgPerformance[0][2]);
            totalscore.push(mPerformance[0][3]);

            for (var j = 0; j < mPerformance.length; j++) {
                levels.push(mPerformance[j][0]);
                scores.push(mPerformance[j][2]);
                totalscore.push(mPerformance[j][3]);
            }

            for (var j = 0; j < avgPerformance.length; j++) {
                avgscores.push(avgPerformance[j][2]);
            }

            const value = [, ];
            const ll = value.concat(levels);

            /* console.log(ll);
            console.log(scores);
            console.log(avgscores);
            console.log(totalscore); */


            var ch1 = document.getElementById(arry[x]).getContext('2d');



            const datach1 = {
                labels: ll,
                datasets: [{
                    label: 'danger',
                    data: [{
                            x: 0,
                            y: 50
                        },
                        {
                            x: 1,
                            y: 50
                        }, {
                            x: 2,
                            y: 50
                        }, {
                            x: 3,
                            y: 50
                        }, {
                            x: 4,
                            y: 50
                        }, {
                            x: 5,
                            y: 50
                        }, {
                            x: 6,
                            y: 50
                        }
                    ],
                    backgroundColor: 'rgb(245, 61, 61)',
                    pointRadius: 0,
                    fill: 'start',
                    tension: 0.4,
                }, {
                    label: 'poor',
                    data: [{
                            x: 0,
                            y: 65
                        },
                        {
                            x: 1,
                            y: 65
                        }, {
                            x: 2,
                            y: 65
                        }, {
                            x: 3,
                            y: 65
                        }, {
                            x: 4,
                            y: 65
                        }, {
                            x: 5,
                            y: 65
                        }, {
                            x: 6,
                            y: 65
                        }
                    ],
                    backgroundColor: 'rgb(245, 135, 61)',
                    pointRadius: 0,
                    fill: '-1',
                    tension: 0.4,
                }, {
                    label: 'good',
                    data: [{
                            x: 0,
                            y: 75
                        },
                        {
                            x: 1,
                            y: 75
                        }, {
                            x: 2,
                            y: 75
                        }, {
                            x: 3,
                            y: 75
                        }, {
                            x: 4,
                            y: 75
                        }, {
                            x: 5,
                            y: 75
                        }, {
                            x: 6,
                            y: 75
                        }
                    ],
                    backgroundColor: 'rgb(245, 208, 61)',
                    pointRadius: 0,
                    fill: '-1',
                    tension: 0.4,
                }, {
                    label: 'very good',
                    data: [{
                            x: 0,
                            y: 85
                        },
                        {
                            x: 1,
                            y: 85
                        }, {
                            x: 2,
                            y: 85
                        }, {
                            x: 3,
                            y: 85
                        }, {
                            x: 4,
                            y: 85
                        }, {
                            x: 5,
                            y: 85
                        }, {
                            x: 6,
                            y: 85
                        }
                    ],
                    backgroundColor: 'rgb(9, 170, 62)',
                    pointRadius: 0,
                    fill: '-1',
                    tension: 0.4,
                }, {
                    label: 'excellent',
                    data: [{
                            x: 0,
                            y: 100
                        },
                        {
                            x: 1,
                            y: 100
                        }, {
                            x: 2,
                            y: 100
                        }, {
                            x: 3,
                            y: 100
                        }, {
                            x: 4,
                            y: 100
                        }, {
                            x: 5,
                            y: 100
                        }, {
                            x: 6,
                            y: 100
                        }
                    ],
                    backgroundColor: 'rgb(61, 171, 245)',
                    pointRadius: 0,
                    fill: '-1',
                    tension: 0.4,
                }, {
                    type: 'line',
                    label: 'tuqa',
                    data: scores,
                    fill: false,
                    borderColor: 'black',
                    borderWidth: 1.5,
                    tension: 0.3,
                    backgroundColor: 'white',
                    showLine: false,
                    datalabels: {
                        display: true,
                        align: 'start',
                        anchor: 'start'
                    },
                    legend: {
                        display: false
                    }
                }, {
                    type: 'line',
                    label: 'ttuqa',
                    data: scores,
                    fill: false,
                    borderColor: 'black',
                    borderWidth: 9,
                    tension: 0.1,
                    backgroundColor: 'white',
                    pointRadius: 0,
                }, {
                    type: 'line',
                    label: 'average',
                    data: avgscores,
                    fill: false,
                    borderColor: 'black',
                    borderWidth: 3,
                    borderDash: [6, 6],
                    tension: 0.1,
                    pointRadius: 0,
                    backgroundColor: 'white',
                }]
            }


            const bgcolor = {
                id: 'bgcolor',
                beforeDraw: (chart, options) => {
                    const {
                        ctx,
                        width,
                        height
                    } = chart;
                    ctx.fillStyle = 'white';
                    ctx.fillRect(0, 0, chart.width, chart.height)
                    ctx.restore();
                }
            }


            const configch1 = {
                type: 'line',
                data: datach1,
                options: {
                    devicePixelRatio: 10,
                    /*  responsive: true,
                     interaction: {
                       mode: 'index',
                       intersect: false
                     }, */
                    scales: {
                        x: {
                            position: 'bottom',
                            grid: {
                                display: true,
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
                            /* min: 0,
                            max: 100, */
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
                        datalabels: {
                            backgroundColor: 'white',
                            borderRadius: 10,
                            borderWidth: 2,
                            borderColor: 'black',
                            color: 'black',
                            font: {
                                weight: 'bold'
                            },
                            display: false,
                            formatter: (value, context) => {
                                return value;
                            },
                            padding: 5
                        },
                        legend: {
                            position: 'right',
                            labels: {
                                font: {
                                    size: 14
                                },
                                filter: function(item, chart) {
                                    return !item.text.includes('ttuqa');
                                }
                            }
                        },
                        filler: {
                            propagate: false,
                            drawTime: 'beforeDatasetsDraw'
                        },
                        autoColors: false,
                        annotation: {
                            annotations: {



                                line1: {
                                    type: 'line',
                                    mode: 'vertical',
                                    drawTime: 'beforeDatasetsDraw',
                                    xMin: 1,
                                    xMax: 1,
                                    borderColor: 'rgba(255, 255, 255,0.4)',
                                    borderWidth: 1,
                                },


                                line2: {
                                    type: 'line',
                                    mode: 'vertical',
                                    drawTime: 'beforeDatasetsDraw',
                                    xMin: 2,
                                    xMax: 2,
                                    borderColor: 'rgba(255, 255, 255,0.4)',
                                    borderWidth: 1,
                                },
                                line3: {
                                    type: 'line',
                                    mode: 'vertical',
                                    drawTime: 'beforeDatasetsDraw',
                                    xMin: 3,
                                    xMax: 3,
                                    borderColor: 'rgba(255, 255, 255,0.4)',
                                    borderWidth: 1,
                                },
                                line4: {
                                    type: 'line',
                                    mode: 'vertical',
                                    drawTime: 'beforeDatasetsDraw',
                                    xMin: 4,
                                    xMax: 4,
                                    borderColor: 'rgba(255, 255, 255,0.4)',
                                    borderWidth: 1,
                                },
                                line5: {
                                    type: 'line',
                                    mode: 'vertical',
                                    drawTime: 'beforeDatasetsDraw',
                                    xMin: 5,
                                    xMax: 5,
                                    borderColor: 'rgba(255, 255, 255,0.4)',
                                    borderWidth: 1,
                                },
                                line6: {
                                    type: 'line',
                                    mode: 'vertical',
                                    drawTime: 'beforeDatasetsDraw',
                                    xMin: 6,
                                    xMax: 6,
                                    borderColor: 'rgba(255, 255, 255,0.4)',
                                    borderWidth: 1,
                                }
                            }
                        },
                        title: {
                            display: true,
                            text: 'your child achievement in Mathematics over primary education stage',
                            font: {
                                size: 14
                            }

                        }
                    },
                    pointBackgroundColor: 'white',
                    radius: 4,

                },
                plugins: [bgcolor]
            }


            Chart.register(ChartDataLabels);
            var chart1 = new Chart(ch1, configch1);

            /* console.log(chart1.data.labels); */


            var d = [];
            var p = [];
            var g = [];
            var vg = [];
            var e = [];

            for (i = 0; i < totalscore.length; i++) {
                d.push(totalscore[i] * 0.5);
                p.push(totalscore[i] * (65 / 100));
                g.push(totalscore[i] * (75 / 100));
                vg.push(totalscore[i] * (85 / 100));
                e.push(totalscore[i]);
            }
            for (i = 0; i < totalscore.length; i++) {
                chart1.data.datasets[0].data[i].y = d[i];
                chart1.data.datasets[1].data[i].y = p[i];
                chart1.data.datasets[2].data[i].y = g[i];
                chart1.data.datasets[3].data[i].y = vg[i];
                chart1.data.datasets[4].data[i].y = e[i];
                chart1.update();

            }


            const c1len = chart1.data.datasets[5].data.length - 1;
            const arr1 = ['black'];
            for (i = 1; i <= c1len; i++) {
                if (chart1.data.datasets[5].data[i] <= d[i]) {
                    var q = chart1.data.datasets[0].backgroundColor;
                    arr1.push(q);
                } else if (chart1.data.datasets[5].data[i] <= p[i]) {
                    var q = chart1.data.datasets[1].backgroundColor;
                    arr1.push(q);
                } else if (chart1.data.datasets[5].data[i] <= g[i]) {
                    var q = chart1.data.datasets[2].backgroundColor;
                    arr1.push(q);
                } else if (chart1.data.datasets[5].data[i] <= vg[i]) {
                    var q = chart1.data.datasets[3].backgroundColor;
                    arr1.push(q);
                } else if (chart1.data.datasets[5].data[i] <= e[i]) {
                    var q = chart1.data.datasets[4].backgroundColor;
                    arr1.push(q);
                }
            }

            chart1.options.pointBackgroundColor = arr1;
            chart1.options.plugins.datalabels.borderColor = arr1;
            chart1.update();

            /*  for (i = 0; i < c1len; i++) {
                 if (chart1.data.datasets[5].data[i] <= 80) {
                     chart1.data.datasets[5].datalabels.align = 'end';
                     chart1.data.datasets[5].datalabels.anchor = 'end';
                     chart1.update();
                 } else if (chart1.data.datasets[5].data[i] >= 80) {
                     chart1.data.datasets[5].datalabels.align = 'start';
                     chart1.data.datasets[5].datalabels.anchor = 'start';
                     chart1.update();
                 }

             } */


            chart1.config.options.plugins.title.text = 'your child achievement in ' + arry[x] +
                ' over ' + edlv + ' education stage';
            chart1.update();

            var mPerformance = [];
            var avgPerformance = [];
            var levels = [];
            var scores = [];
            var avgscores = [];
            var totalscore = [];

            var d = [];
            var p = [];
            var g = [];
            var vg = [];
            var e = [];

        }





        //---------------------------------chart4----------------------------------------------

        var ch4 = document.getElementById('chart4').getContext('2d');

        var stuScoresF = <?php echo json_encode($array6); ?>;
        var stuScoresS = <?php echo json_encode($array7); ?>;
        /* console.log(stuScoresS); */

        var levels = [];
        var studentScoreF = [];
        var totalScoreF = [];
        var studentScoreS = [];
        var totalScoreS = [];

        for (var i = 0; i < stuScoresF.length; i++) {
            levels.push(stuScoresF[i][0]);
            var value = (stuScoresF[i][1] * 100) / stuScoresF[i][2];
            studentScoreF.push(Math.round(value));
            totalScoreF.push(stuScoresF[i][2]);
        }

        for (var j = 0; j < stuScoresS.length; j++) {
            var value = (stuScoresS[j][1] * 100) / stuScoresS[j][2];
            studentScoreS.push(Math.round(value));
            totalScoreS.push(stuScoresS[j][2]);
        }

        /* console.log(levels);
        console.log(studentScoreF);
        console.log(totalScoreF);
        console.log(studentScoreS);
        console.log(totalScoreS); */


        const datach4 = {
            labels: levels,
            datasets: [{
                    type: 'bar',
                    label: 'term 1',
                    backgroundColor: ["#e6e6e6"],
                    borderColor: ["#cccccc"],
                    data: studentScoreF,
                    barThickness: 25,
                },
                {
                    type: 'bar',
                    label: 'term 2',
                    backgroundColor: ["#74bad8"],
                    borderColor: ["#4ca6cd"],
                    data: studentScoreS,
                    barThickness: 25,
                },

            ]
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
                                size: 16,
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
                        position: 'left',
                        grid: {
                            display: true,
                            drawBorder: true,
                        },
                        ticks: {
                            font: {
                                size: 16,
                            },
                            callback: function(value) {
                                return value + "%"
                            },
                        }
                    },
                    yAxis2: {
                        position: 'right',
                        grid: {
                            display: false,
                            drawBorder: true,
                        },
                        ticks: {
                            display: false
                        }
                    }

                },
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: {
                                size: 16
                            },
                            filler: {
                                propagate: false,
                                drawTime: 'beforeDatasetsDraw'
                            },
                            autoColors: false,
                        }
                    },
                    datalabels: {
                        display: false
                    }
                }
            },
            plugins: [bgcolor]
        }

        Chart.register(ChartDataLabels);
        var chart4 = new Chart(ch4, configch4);
        //---------------------------------end chart4----------------------------------------------



        //---------------------------------pdf----------------------------------------------

        var information = <?php echo json_encode($ar); ?>;
        var date = <?php echo json_encode($date); ?>;


        var id = information[0];
        var Name = information[1];
        var EduLevelName = information[2];

        var idd = 'Student ID:- ' + id.toString();
        var datee = 'year:- ' + date.toString();
        var EduLevelNamee = 'Education Stage:- ' + EduLevelName.toString();
        var Namee = 'Student Name:- ' + Name;
        /* console.log(mat); */

        function convertHTMLToPDF() {


            const avatar = document.getElementById('avatar');

            let pdf = new jsPDF('p', 'in', [8.5, 9.5]);


            pdf.setFontSize(26).setFont('Cambria', "bold", 'normal').text(0.5, 0.7, h.innerText);
            let z = 0.5 + 26 / 72;
            pdf.setLineWidth(5 / 72).line(0.5, z, 7.75, z);
            z += 0.4 + 5 / 72;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').text(6.2, z, datee);
            z += 0.5;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').text(0.5, z + 14 / 72, idd);
            pdf.addImage(avatar, 'jpg', 6.2, z + 1 / 72, 1.6, 1.4);
            z += 14 / 72 + 0.5;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').text(0.5, z, Namee);
            z += 0.5;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').text(0.5, z, EduLevelNamee);
            z += 0.2;

            z += 0.3;
            pdf.setLineWidth(1 / 72).line(0.5, z, 7.75, z);
            z += 0.3;
            pdf.setDrawColor(204, 204, 204).setLineWidth(30 / 72).line(0.5, z, 7.75, z);
            pdf.setFontSize(18).setFont('Cambria', "bold", 'normal').text(0.6, 0.1 + z, h1.innerText);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, 15 / 72 + z, 0.5, 7.9 + 0.04);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(7.75, 15 / 72 + z, 7.75, 7.9 + 0.04);
            z += 15 / 72 + 0.4;


            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(77, 77, 77).text(0.5 + 1 / 72 + 0.1,
                z +
                0.2, b11.innerText);

            z += 0.2 + 14 / 72 + 0.2;
            const cha1 = document.getElementById('chart4');
            const imgcha1 = cha1.toDataURL('image/jpeg', 1.0);
            pdf.addImage(imgcha1, 'png', 0.7, z, 6.9, 2.5);
            z += 2.6 + 0.3;
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, z, 7.75, z);
            z += 0.3 + 1 / 72;





            if ((larry % 2 == 0) && (larry != 0)) {
                for (var i = 0; i < larry; i = i + 2) {

                    pdf.addPage();

                    let z1 = 0.5;

                    pdf.setDrawColor(204, 204, 204).setLineWidth(30 / 72).line(0.5, z1, 7.75, z1);
                    pdf.setFontSize(18).setFont('Cambria', "bold", 'normal').setTextColor(0, 0, 0).text(0.6, 0.1 + z1,
                        arry[i]);
                    pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, 15 / 72 + z1, 0.5, 4.2 + 0.02);
                    pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(7.75, 15 / 72 + z1, 7.75, 4.2 + 0.02);

                    z1 += 30 / 72 + 0.2;

                    const cha2 = document.getElementById(arry[i]);
                    const imgcha2 = cha2.toDataURL('image/jpeg', 1.0);
                    pdf.addImage(imgcha2, 'png', 0.7, z1, 6.9, 2.7);
                    z1 += 2.7 + 0.4;
                    pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, z1, 7.75, z1);
                    z1 += 1 / 72 + 0.5;


                    pdf.setDrawColor(204, 204, 204).setLineWidth(30 / 72).line(0.5, z1, 7.75, z1);
                    pdf.setFontSize(18).setFont('Cambria', "bold", 'normal').setTextColor(0, 0, 0).text(0.6, 0.1 + z1,
                        arry[i + 1]);
                    pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, 15 / 72 + z1, 0.5, 8.4 + 0.04);
                    pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(7.75, 15 / 72 + z1, 7.75, 8.4 + 0.04);

                    z1 += 30 / 72 + 0.2;

                    const cha3 = document.getElementById(arry[i + 1]);
                    const imgcha3 = cha3.toDataURL('image/jpeg', 1.0);
                    pdf.addImage(imgcha3, 'png', 0.7, z1, 6.9, 2.7);
                    z1 += 2.7 + 0.4;
                    pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, z1, 7.75, z1);

                    z1 = 0;
                }
            }
            pdf.save('education_stage_report.pdf');


        }


        //---------------------------------pdf----------------------------------------------
    </script>




</body>

</html>
