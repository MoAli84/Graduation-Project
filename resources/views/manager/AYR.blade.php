<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>i Track</title>
    <!-- plugins:css -->
    <base href="{{ \URL::to('/') }}">
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');

        * {


            font-family: cambria;

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
            margin-top: 40px;

        }

        .con .info {
            padding-bottom: 18px;

        }

        .con .info p {
            line-height: 15px;
            font-size: 20px;
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
            font-size: 18px;
        }

        .con-6 div div table {
            margin-top: -22px;
            color: #FF4500;
            margin-left: -22px;


        }

        .con-6 {
            margin-right: 12px;
            /* padding-right: -30px; */
        }

        .con-6 .t {
            width: 95.5%;
        }

        .con-9 {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container-scroller">

        <div class="container-fluid page-body-wrapper">

            <div id="right-sidebar" class="settings-panel">

                <div class="tab-content" id="setting-content">

                </div>
            </div>


            <div class="main-panel" style="margin-left: 300px; ">
                <div class="content">
                    <div class="row">
                        <div class="col-md-9 grid-margin">

                            <div class="card">
                                <p class="card-description">
                                <h2 style="text-weight:bold;" id="h">Student Growth Report For academic year
                                </h2>
                                <hr>
                                </p>

                                <p class="fl">year:- {{ $date }}</p>

                            </div>

                            <div class="con">
                                <div class="info">
                                    @foreach ($d1 as $dd1)
                                        <p>Student ID: {{ $dd1['id'] }}</p>
                                        <p>Student Name: {{ $dd1['Name'] }}</p>
                                        <p>Education Stage: {{ $dd1['EduLevelName'] }}</p>
                                        <p>Level: {{ $dd1['sublevel'] }}</p>
                                    @endforeach
                                </div>
                                <div class="i">
                                    <img src="images/avatar2.jpg" style=" width: 160px;" id="avatar">
                                </div>

                            </div>
                            <hr
                                style="border: none;
              height: 3px;

              /* Set the hr color */
              color: #333; /* old IE */
              background-color: #333; /* Modern Browsers */">
                            <div class="con-2">
                                <div class="achievement">
                                    <p style="background-color:rgba(204, 204, 204); font-size: 25px; font-weight: bolder; padding: 12px;"
                                        id="h1">
                                        total achievement over academic year</p>
                                </div>
                                <div class="chart-1"
                                    style="border:  2px  solid rgba(204, 204, 204) ; margin-top: -8px; padding: 20px;">
                                    <div>
                                        <p style="color:rgba(77, 77, 77); font-size: large;line-height:38px ;"
                                            id="b1">academic
                                            year cosist of 2 terms each one have final score express the total
                                            achievement in
                                            all courses over the semester.
                                        </p>
                                        <p style="color:rgba(77, 77, 77); font-size: large;line-height:38px ;"
                                            id="b11">here is
                                            some visualization for your child's final score in semesters.
                                        </p>
                                    </div>
                                    <div>
                                        <canvas id="chart1" style="height: 90px; width:230px"></canvas>
                                    </div>
                                </div>
                            </div>


                            <br>
                            <div class="con-4">
                                <div class="performance">
                                    <p style="background-color:rgba(204, 204, 204); font-size: 25px; font-weight: bolder; padding: 12px;"
                                        id="h2">
                                        performance in all courses over an academic year</p>
                                </div>
                                <div class="chart-1"
                                    style="border:  2px  solid rgba(204, 204, 204) ; margin-top: -8px; padding: 20px;">
                                    <div>
                                        <canvas id="chart2" style="height: 90px; width:230px"></canvas>
                                        <br>
                                        <br>
                                    </div>
                                    <div>
                                        <p style="color:rgba(77, 77, 77); font-size: large;line-height:38px ;"
                                            id="b2">it seems
                                            that Arabic is the material that has a high score in an academic year.</p>
                                    </div>
                                </div>
                            </div>


                            <br>
                            <div class="con-5">
                                <div class="p-terms">
                                    <p style="background-color:rgba(204, 204, 204); font-size: 25px; font-weight: bolder; padding: 12px;"
                                        id="h3">
                                        performance in the same courses between terms in academic year</p>
                                </div>
                                <div class="chart-1"
                                    style="border:  2px  solid rgba(204, 204, 204) ; margin-top: -8px; padding: 20px;">
                                    <div>
                                    </div>
                                    <div>
                                        <canvas id="chart3" style="height: 90px; width:230px"></canvas>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>


                            <br>
                            <div class="con-7">
                                <div class="p-ac">
                                    <p style="background-color:rgba(204, 204, 204); font-size: 25px; font-weight: bolder; padding: 12px;"
                                        id="h4">
                                        performance in activites between terms in academic year</p>
                                </div>
                                <div class="chart-1"
                                    style="border:  2px  solid rgba(204, 204, 204) ; margin-top: -8px; padding: 20px;">
                                    <div>
                                    </div>
                                    <div>
                                        <canvas id="chart4" style="height: 90px; width:230px"></canvas>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>


                            <br>
                            <div class="con-9">
                                <button type="button" class="btn btn-primary btn-lg" onclick="convertHTMLToPDF()"
                                    id="e" style="font-size: 20px;">Download</button>
                            </div>


                        </div>

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
        var ch1 = document.getElementById('chart1').getContext('2d');
        var ch2 = document.getElementById('chart2').getContext('2d');
        var ch3 = document.getElementById('chart3').getContext('2d');
        var ch4 = document.getElementById('chart4').getContext('2d');
        /*  var ch5 = document.getElementById('chart5').getContext('2d');
         var ch6 = document.getElementById('chart6').getContext('2d');
         var ch7 = document.getElementById('chart7').getContext('2d'); */


        //---------------------------------chart1----------------------------------------------
        var stuGrades = <?php echo json_encode($arr1); ?>;
        /* console.log(stuGrades); */
        var semsters = [];
        var stuScore = [];
        var totalScore = [];

        for (var i = 0; i < stuGrades.length; i++) {
            semsters.push(stuGrades[i][0]);
            var x = (stuGrades[i][1] * 100) / stuGrades[i][2];
            stuScore.push(Math.round(x));
            totalScore.push(stuGrades[i][2]);
        }

        /* console.log(stuScore);
        console.log(totalScore); */

        stuScore.push('');
        totalScore.push('');


        const datach1 = {
            labels: semsters,
            datasets: [{
                label: 'precentage',
                backgroundColor: ["#e6e6e6", "#74bad8"],
                borderColor: ["#cccccc", "#4ca6cd"],
                data: stuScore,
                barThickness: 40,
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
            type: 'bar',
            data: datach1,
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
                        onClick: (evt, legendItem, legend) => {
                            const index = legend.chart.data.labels.indexOf(legendItem.text);
                            legend.chart.toggleDataVisibility(index);
                            legend.chart.update();
                        },
                        position: 'right',
                        labels: {
                            font: {
                                size: 14
                            },
                            generateLabels: (chart) => {
                                let visibility = [];
                                for (i = 0; i < chart.data.labels.length; i++) {
                                    if (chart.getDataVisibility(i) === true) {
                                        visibility.push(false);
                                    } else {
                                        visibility.push(true);
                                    }
                                }
                                return chart.data.labels.map(
                                    (label, index) => ({
                                        text: label,
                                        fillStyle: chart.data.datasets[0].backgroundColor[index],
                                        strokeStyle: chart.data.datasets[0].borderColor[index],
                                        /* pointStyle:'rect',*/
                                        hidden: visibility[index],
                                    })
                                )
                            },

                        },
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
            plugins: [bgcolor]
        }
        Chart.register(ChartDataLabels);
        var chart1 = new Chart(ch1, configch1);
        //---------------------------------end chart1----------------------------------------------


        //---------------------------------chart2----------------------------------------------

        var stuScores = <?php echo json_encode($arr3); ?>;
        /* console.log(stuScores); */

        var matrials = [];
        var studentScore = [];
        var matrialScore = [];

        for (var j = 0; j < stuScores.length; j++) {
            matrials.push(stuScores[j][0]);
            var y = (stuScores[j][1] * 100) / stuScores[j][2];
            studentScore.push(Math.round(y));
            matrialScore.push(stuScores[j][2]);
        }

        /* console.log(studentScore);
        console.log(matrialScore); */

        var color = [];

        for (var l = 0; l < studentScore.length; l++) {
            color.push('#d9d926');
        }

        /* console.log(color); */

        var max = Math.max.apply(Math, studentScore);
        /* console.log(max); */

        for (var s = 0; s < studentScore.length; s++) {
            if (studentScore[s] == max) {
                var val = matrials[s];
            }
        }

        document.getElementById('b2').innerHTML =
            "it seems that " + val + " is the material that has a high score in an academic year."


        const datach2 = {
            labels: matrials,
            datasets: [{
                label: 'precentage',
                backgroundColor: color,
                borderColor: color,
                data: studentScore,
                barThickness: 25,
            }]
        }


        const configch2 = {
            type: 'bar',
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
            plugins: [bgcolor]
        }
        Chart.register(ChartDataLabels);
        var chart2 = new Chart(ch2, configch2);

        //---------------------------------end chart2----------------------------------------------

        //---------------------------------chart3----------------------------------------------

        var stuScoresF = <?php echo json_encode($arr5); ?>;
        var stuScoresS = <?php echo json_encode($arr7); ?>;

        /* console.log(stuScoresF);
        console.log(stuScoresS); */

        var matrialss = [];

        var lf = stuScoresF.length;
        var ls = stuScoresS.length;
        var maximum = Math.max(lf, ls);
        var minimum = Math.min(lf, ls);

        if (lf > ls) {
            var mm = stuScoresF;
            var nn = stuScoresS;
        } else {
            var nn = stuScoresF;
            var mm = stuScoresS;
        }
        /* console.log(mm);
        console.log(nn); */

        for (var i = 0; i < minimum; i++) {
            for (var j = 0; j < maximum; j++) {
                if (nn[i][0] == mm[j][0]) {
                    matrialss.push(nn[i][0]);
                }
            }
        }
        /* console.log(matrialss); */

        var studentScoreF = [];
        var matrialScoreF = [];
        var studentScoreS = [];
        var matrialScoreS = [];

        var lm = matrialss.length;

        for (var i = 0; i < lm; i++) {
            for (var j = 0; j < lf; j++) {
                if (matrialss[i] == stuScoresF[j][0]) {
                    studentScoreF.push(stuScoresF[j][1]);
                    matrialScoreF.push(stuScoresF[j][2]);
                }
            }
        }

        for (var i = 0; i < lm; i++) {
            for (var j = 0; j < ls; j++) {
                if (matrialss[i] == stuScoresS[j][0]) {
                    studentScoreS.push(stuScoresS[j][1]);
                    matrialScoreS.push(stuScoresS[j][2]);
                }
            }
        }

        /* console.log(studentScoreF);
        console.log(matrialScoreF);
        console.log(studentScoreS);
        console.log(matrialScoreS); */

        var prestudentScoreF = [];
        var prestudentScoreS = [];

        for (var i = 0; i < studentScoreF.length; i++) {
            var precent = (studentScoreF[i] * 100) / matrialScoreF[i];
            var round = Math.round(precent)
            prestudentScoreF.push(round);
        }

        for (var i = 0; i < studentScoreS.length; i++) {
            var precent = (studentScoreS[i] * 100) / matrialScoreS[i];
            var round = Math.round(precent)
            prestudentScoreS.push(round);
        }

        /* console.log(prestudentScoreF);
        console.log(prestudentScoreS); */


        const datach3 = {
            labels: matrialss,
            datasets: [{
                    type: 'bar',
                    label: 'term 1',
                    backgroundColor: ["#e6e6e6"],
                    borderColor: ["#cccccc"],
                    data: prestudentScoreF,
                    barThickness: 25,
                },
                {
                    type: 'bar',
                    label: 'term 2',
                    backgroundColor: ["#74bad8"],
                    borderColor: ["#4ca6cd"],
                    data: prestudentScoreS,
                    barThickness: 25,
                },

            ]
        }


        const configch3 = {
            type: 'bar',
            data: datach3,
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
                    },

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
        var chart3 = new Chart(ch3, configch3);

        //---------------------------------end chart3----------------------------------------------


        //---------------------------------chart4----------------------------------------------
        var stuScorF = <?php echo json_encode($arr9); ?>;
        var stuScorS = <?php echo json_encode($arr11); ?>;

        /* console.log(stuScorF);
        console.log(stuScorS); */

        var activites = [];

        var llf = stuScorF.length;
        var lls = stuScorS.length;
        var maximumm = Math.max(llf, lls);
        var minimumm = Math.min(llf, lls);

        if (llf > lls) {
            var mmm = stuScorF;
            var nnn = stuScorS;
        } else {
            var nnn = stuScorF;
            var mmm = stuScorS;
        }
        /* console.log(mm);
        console.log(nn); */

        for (var i = 0; i < minimumm; i++) {
            for (var j = 0; j < maximumm; j++) {
                if (nnn[i][0] == mmm[j][0]) {
                    activites.push(nnn[i][0]);
                }
            }
        }
        /* console.log(activites); */

        var studentScorF = [];
        var studentScorS = [];


        var llm = activites.length;

        for (var i = 0; i < llm; i++) {
            for (var j = 0; j < llf; j++) {
                if (activites[i] == stuScorF[j][0]) {
                    studentScorF.push(stuScorF[j][1]);
                }
            }
        }

        for (var i = 0; i < llm; i++) {
            for (var j = 0; j < lls; j++) {
                if (activites[i] == stuScorS[j][0]) {
                    studentScorS.push(stuScorS[j][1]);
                }
            }
        }

        /* console.log(studentScorF);
        console.log(studentScorS); */



        const datach4 = {
            labels: activites,
            datasets: [{
                    type: 'bar',
                    label: 'term 1',
                    backgroundColor: ["#e6e6e6"],
                    borderColor: ["#cccccc"],
                    data: studentScorF,
                    barThickness: 25,
                },
                {
                    type: 'bar',
                    label: 'term 2',
                    backgroundColor: ["#74bad8"],
                    borderColor: ["#4ca6cd"],
                    data: studentScorS,
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
                        max: 10,
                        position: 'left',
                        grid: {
                            display: true,
                            drawBorder: true,
                        },
                        ticks: {
                            font: {
                                size: 16,
                            }
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
                    },

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
        /* console.log(information); */

        var id = information[0];
        var Name = information[1];
        var EduLevelName = information[2];
        var sublevel = information[3];

        var idd = 'Student ID:- ' + id.toString();
        var datee = 'year:- ' + date.toString();
        var EduLevelNamee = 'Education Stage:- ' + EduLevelName.toString();
        var Namee = 'Student Name:- ' + Name;
        var sublevell = 'Level:- ' + sublevel.toString();

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
            pdf.addImage(avatar, 'jpg', 6.2, z + 1 / 72, 1.6, 1.7);
            z += 14 / 72 + 0.5;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').text(0.5, z, Namee);
            z += 0.5;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').text(0.5, z, EduLevelNamee);
            z += 0.5;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').text(0.5, z, sublevell);
            z += 0.3;
            pdf.setLineWidth(1 / 72).line(0.5, z, 7.75, z);

            z += 0.3;
            pdf.setDrawColor(204, 204, 204).setLineWidth(30 / 72).line(0.5, z, 7.75, z);
            pdf.setFontSize(18).setFont('Cambria', "bold", 'normal').text(0.6, 0.1 + z, h1.innerText);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, 15 / 72 + z, 0.5, 8.3);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(7.75, 15 / 72 + z, 7.75, 8.3);
            z += 15 / 72 + 0.3;

            const t1 = pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(77, 77, 77).splitTextToSize(
                b1.innerText, 7);
            for (var i = 0; i < t1.length; i++) {
                pdf.text(0.5 + 1 / 72 + 0.1, z + 0.1, t1[i]);
                z += 0.3
            }
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(77, 77, 77).text(0.5 + 1 / 72 + 0.1, z +
                0.2, b11.innerText);

            z += 0.2 + 14 / 72 + 0.1;
            const cha1 = document.getElementById('chart1');
            const imgcha1 = cha1.toDataURL('image/jpeg', 1.0);
            pdf.addImage(imgcha1, 'png', 0.6, z, 6.7, 2.4);
            z += 2.6;
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, z, 7.75, z);
            z += 0.3 + 1 / 72;



            pdf.addPage();

            let z1 = 0.5
            pdf.setDrawColor(204, 204, 204).setLineWidth(30 / 72).line(0.5, z1, 7.75, z1);
            pdf.setFontSize(18).setFont('Cambria', "bold", 'normal').setTextColor(0, 0, 0).text(0.6, 0.1 + z1,
                h2.innerText);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, 15 / 72 + z1, 0.5, 4.6);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(7.75, 15 / 72 + z1, 7.75, 4.6);

            z1 += 30 / 72 + 0.2;
            const cha3 = document.getElementById('chart2');
            const imgcha3 = cha3.toDataURL('image/jpeg', 1.0);
            pdf.addImage(imgcha3, 'png', 0.6, z1, 6.7, 2.4);
            z1 += 2.4 + 0.6;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(77, 77, 77).text(0.5 + 1 / 72 + 0.1, z1,
                b2.innerText);
            z1 += 1 / 72 + 0.5;
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, z1, 7.75, z1);
            z1 += 1 / 72 + 0.5;

            pdf.setDrawColor(204, 204, 204).setLineWidth(30 / 72).line(0.5, z1, 7.75, z1);
            pdf.setFontSize(18).setFont('Cambria', "bold", 'normal').setTextColor(0, 0, 0).text(0.6, 0.1 + z1,
                h3.innerText);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, 15 / 72 + z1, 0.5, 8.9);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(7.75, 15 / 72 + z1, 7.75, 8.9);

            z1 += 30 / 72 + 0.3;
            const cha4 = document.getElementById('chart3');
            const imgcha4 = cha4.toDataURL('image/jpeg', 1.0);
            pdf.addImage(imgcha4, 'png', 0.6, z1, 6.7, 2.4);
            z1 += 2.7 + 0.3;
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, z1, 7.75, z1);
            z1 += 1 / 72 + 0.3;
            z1 = 0;


            pdf.addPage();

            z1 += 0.5
            pdf.setDrawColor(204, 204, 204).setLineWidth(30 / 72).line(0.5, z1, 7.75, z1);
            pdf.setFontSize(18).setFont('Cambria', "bold", 'normal').setTextColor(0, 0, 0).text(0.6, 0.1 + z1,
                h4.innerText);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, 15 / 72 + z1, 0.5, 4.1);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(7.75, 15 / 72 + z1, 7.75, 4.1);

            z1 += 30 / 72 + 0.3;
            const cha5 = document.getElementById('chart4');
            const imgcha5 = cha5.toDataURL('image/jpeg', 1.0);
            pdf.addImage(imgcha5, 'png', 0.6, z1, 6.7, 2.4);
            z1 += 2.4 + 0.5;
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, z1, 7.75, z1);
            z1 += 1 / 72 + 0.5;

            pdf.save('academic_year_report.pdf');

            //---------------------------------end pdf----------------------------------------------
        }
    </script>

</body>

</html>
