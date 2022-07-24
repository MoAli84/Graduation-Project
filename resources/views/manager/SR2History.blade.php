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

        .con-6 div table {
            margin-top: -12px;
            color: #FF4500;




        }

        .con-6 div table th{
            color: rgb( 153, 0, 0);
        }
        .con-6 div table td{
            color: black;
        }

        /* .con-6  div div table td{
    height: 100%;
    padding: -20px ;
} */
        .con-6 {
            margin-right: 12px;
            /* padding-right: -30px; */

        }

        .con-6 .t {
            width: 101%;
        }

        .con-7 {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div id="right-sidebar" class="settings-panel">

                <div class="tab-content" id="setting-content">

                </div>
            </div>
            <!-- partial -->

            <!-- partial -->
            <div class="main-panel" style="margin-left: 300px; ">
                <div class="content">
                    <div class="row">
                        <div class="col-md-9 grid-margin">

                            <div class="card">
                                <p class="card-description">
                                <h2 id="h" style="font-weight: bold;">Student Report For term</h2>
                                <hr>
                                </p>
                                <p class="fl" id="y">year:- {{ $yyearr }}</p>
                                @foreach ($d1 as $dd1)
                                    <p class="fl" id="t">term:- {{ $dd1['TermName'] }}</p>

                            </div>
                            <div class="con">
                                <div class="info">
                                    <p id="id">Student ID:- {{ $dd1['id'] }}</p>
                                    <p id="n">Student Name:- {{ $dd1['Name'] }}</p>
                                    <p id="es">Education Stage:- {{ $dd1['EduLevelName'] }}</p>
                                    <p id="l">Level:- {{ $dd1['sublevel'] }}</p>
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
                                <div class="performnce">
                                    <p style="background-color:rgba(204, 204, 204); font-size: 25px; font-weight: bolder; padding: 12px;"
                                        id="h1">
                                        performance in courses in a semester</p>
                                </div>
                                <div class="chart-1"
                                    style="border:  2px  solid rgba(204, 204, 204) ; margin-top: -8px; padding: 20px;">
                                    <div>
                                        <canvas id="chart3" style="height: 90px; width:230px"></canvas>
                                        <br>
                                        <br>
                                    </div>
                                    <div>
                                        <p style="color:rgba(77, 77, 77); font-size: large;line-height:38px ;"
                                            id="b1">it seems
                                            that Arabic is the material that has a high score in that semester.</p>
                                    </div>
                                </div>
                            </div>


                            <br>
                            <div class="con-3">
                                <div class="comm">
                                    <p style="background-color:rgba(204, 204, 204); font-size: 25px; font-weight: bolder; padding: 12px;"
                                        id="h2">
                                        commitment over semester</p>
                                </div>
                                <div class="chart-2"
                                    style="border:  2px  solid rgba(204, 204, 204) ; margin-top: -8px; padding: 20px;">
                                    <div>
                                        <canvas id="chart5"
                                            style="height:150px; width:230px; margin-top:40px ;"></canvas>
                                        {{-- <img src="images/Percentchart2.png" style="margin-bottom:40px ;"> --}}

                                    </div>
                                    <hr
                                        style=" border:   none;
                      border-left:    2px solid rgba(204, 204, 204);
                      height:         35vh;
                      width:          15px;
                      margin-left: 100px;
                      ">
                                    <div>
                                        <ul>
                                            <li style="color:rgba(77, 77, 77); font-size: large;line-height:38px ;"
                                                id="b21">
                                                the
                                                percentage of attendence is the highest
                                                percentage which means your child is very commitment to school and
                                                that reflect on performance in semester.</li>
                                            <li style="color:rgba(77, 77, 77); font-size: large;line-height:38px ;"
                                                id="b22">
                                                the
                                                percentage of absence is the lowest
                                                percentage which means your child is very commitment to school and
                                                that reflect on performance in semester.</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <br>
                            <div class="con-4">
                                <div class="activites">
                                    <p style="background-color:rgba(204, 204, 204); font-size: 25px; font-weight: bolder; padding: 12px;"
                                        id="h3">
                                        performance in activites in a semester</p>
                                </div>
                                <div class="chart-1"
                                    style="border:  2px  solid rgba(204, 204, 204) ; margin-top: -8px; padding: 20px;">
                                    <div>
                                        <canvas id="chart4" style="height: 90px; width:230px"></canvas>
                                        <br>
                                        <br>
                                    </div>
                                    <div>
                                        <p style="color:rgba(77, 77, 77); font-size: large;line-height:38px ;"
                                            id="b3">it seems
                                            that Arabic is the activity that has a high score in an that semester.</p>
                                    </div>
                                </div>
                            </div>


                            <br>
                            <div class="con-6">
                                <div class="t">
                                    <p
                                        style="background-color:rgba(204, 204, 204); font-size: 25px; font-weight: bolder; padding: 12px;">
                                        total acievement in a semester</p>

                                </div>
                                <div class="chart-1" style="  width: 101%; ">


                                    <table class="table table-bordered"
                                        style=" border-color: rgba(204, 204, 204);  border: 2px solid  rgba(204, 204, 204) ;">
                                        <thead>
                                            <tr style="height: 20px;">

                                                <th scope="col">Materials</th>

                                                @foreach ($arr1 as $arrr1)
                                                    <th scope="col">{{ $arrr1[0] }}</th>
                                                @endforeach

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Matrial Score</th>
                                                @foreach ($arr1 as $arrr1)
                                                    <td>{{ $arrr1[2] }}</td>
                                                @endforeach

                                            </tr>
                                            <tr>
                                                <th scope="row">Student Score</th>
                                                @foreach ($arr1 as $arrr1)
                                                    <td>{{ $arrr1[1] }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <th scope="row">Rating</th>
                                                @foreach ($arr3 as $arrr3)
                                                    <td>{{ $arrr3 }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <th scope="row">Total Score</th>


                                                <td colspan="6">{{ $summation }}</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                    <br>
                                    <br>



                                </div>

                            </div>
                            <br>
                            <div class="con-7">
                                <button class="btn btn-primary btn-lg" style="font-size: 20px;" id="e"
                                    onclick="convertHTMLToPDF()">Download</button>

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
        var ch3 = document.getElementById('chart3').getContext('2d');
        var ch4 = document.getElementById('chart4').getContext('2d');
        var ch5 = document.getElementById('chart5').getContext('2d');

        //---------------------------------chart3----------------------------------------------

        var stuScores = <?php echo json_encode($arr1); ?>;
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

        var max = Math.max.apply(Math, studentScore);
        /* console.log(max); */

        for (var s = 0; s < studentScore.length; s++) {
            if (studentScore[s] == max) {
                var val = matrials[s];
            }
        }

        document.getElementById('b1').innerHTML =
            "it seems that " + val + " is the material that has a high score in an academic year."


        const datach3 = {
            labels: matrials,
            datasets: [{
                label: 'precentage',
                backgroundColor: color,
                borderColor: color,
                data: studentScore,
                barThickness: 25,
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
        var chart3 = new Chart(ch3, configch3);
        //---------------------------------end chart3----------------------------------------------



        //---------------------------------chart4----------------------------------------------

        var stuScore = <?php echo json_encode($arr2); ?>;
        /* console.log(stuScore); */

        var activities = [];
        var studentScoree = [];

        for (var j = 0; j < stuScore.length; j++) {
            activities.push(stuScore[j][0]);
            studentScoree.push(stuScore[j][1]);
        }

        /* console.log(studentScoree); */

        var color = [];

        for (var l = 0; l < studentScoree.length; l++) {
            color.push('#d9d926');
        }

        var max = Math.max.apply(Math, studentScoree);
        /* console.log(max); */

        for (var s = 0; s < studentScoree.length; s++) {
            if (studentScoree[s] == max) {
                var val = activities[s];
            }
        }

        document.getElementById('b3').innerHTML =
            "it seems that " + val + " is the activity that has a high score in an academic year."


        const datach4 = {
            labels: activities,
            datasets: [{
                label: 'precentage',
                backgroundColor: color,
                borderColor: color,
                data: studentScoree,
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
                        max: 10,
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
        var chart4 = new Chart(ch4, configch4);
        //---------------------------------end chart4----------------------------------------------

        //---------------------------------chart5----------------------------------------------
        var v = <?php echo json_encode($v); ?>;
        var num = <?php echo json_encode($num); ?>;

        /* console.log(num); */

        var ab = Math.round((v * 100) / num);
        var atten = 100 - (ab);

        if (ab > atten) {
            document.getElementById('b21').innerHTML =
                " the percentage of attendence is the lowest percentage which means your child is not commitment to school and that reflect on performance in semester."
            document.getElementById('b22').innerHTML =
                "the percentage of absence is the highest percentage which means your child is not commitment to school and that reflect on performance in semester."
        }

        var attendence = num - v;

        const datach5 = {
            labels: ['absence', 'attendence'],
            datasets: [{
                label: 'precentage',
                data: [v, attendence],
                backgroundColor: [
                    'rgb(245, 61, 61)',

                    'rgb(61, 171, 245)'
                ],
                borderColor: [
                    '	rgb(242, 13, 13)',

                    'rgb(13, 150, 242)'
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
                            const p = (value / num) * 100;
                            const z = Math.round(p);
                            return z + '%';
                        }
                    },
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            },
                        },
                    },
                    filler: {
                        propagate: false,
                        drawTime: 'beforeDatasetsDraw'
                    }
                },
            },
            plugins: [bgcolor]

        };

        Chart.register(ChartDataLabels);
        var chart5 = new Chart(ch5, configch5);
        //---------------------------------end chart5----------------------------------------------

        //---------------------------------pdf----------------------------------------------

        var information = <?php echo json_encode($arr); ?>;
        var date = <?php echo json_encode($yyearr); ?>;
        var mat = <?php echo json_encode($arr1); ?>;

        var term = information[0];
        var id = information[1];
        var Name = information[2];
        var EduLevelName = information[3];
        var sublevel = information[4];

        var idd = 'Student ID:- ' + id.toString();
        var datee = 'year:- ' + date.toString();
        var EduLevelNamee = 'Education Stage:- ' + EduLevelName.toString();
        var sublevell = 'Level:- ' + sublevel.toString();
        var termm = 'term:- ' + term;
        var Namee = 'Student Name:- ' + Name;
        /* console.log(mat); */

        var summation = 0;
        for (var i = 0; i < mat.length; i++) {
            var summation = summation + mat[i][1];
        }
        var summationn = summation.toString();
        /* console.log(summation); */


        function convertHTMLToPDF() {

            const avatar = document.getElementById('avatar');

            let pdf = new jsPDF('p', 'in', 'a4');

            pdf.setFontSize(26).setFont('Cambria', "bold", 'normal').text(0.5, 0.7, h.innerText);
            let z = 0.5 + 26 / 72;
            pdf.setLineWidth(5 / 72).line(0.5, z, 7.75, z);
            z += 0.4 + 5 / 72;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').text(6.2, z, datee);
            z += 0.3;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').text(6.2, z, termm);
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
            pdf.setFontSize(18).setFont('Cambria', "bold", 'normal').text(0.6, 0.1 + z,
                h1.innerText);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, 15 / 72 + z, 0.5, 7.9 + 0.04);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(7.75, 15 / 72 + z, 7.75, 7.9 + 0.04);
            z += 15 / 72 + 0.2;

            const cha1 = document.getElementById('chart3');
            const imgcha1 = cha1.toDataURL('image/jpeg', 1.0);
            pdf.addImage(imgcha1, 'png', 0.6, z, 6.7, 2.4);
            z += 2.4 + 0.3;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(77, 77, 77).text(0.5 + 1 / 72 + 0.1, z +
                0.2, b1.innerText);
            z += 1 / 72 + 0.4;
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, z, 7.75, z);
            z += 0.3 + 1 / 72;

            pdf.setDrawColor(204, 204, 204).setLineWidth(30 / 72).line(0.5, z, 7.75, z);
            pdf.setFontSize(18).setFont('Cambria', "bold", 'normal').setTextColor(0, 0, 0).text(0.6, 0.1 + z,
                h2.innerText);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, 15 / 72 + z, 0.5, 11.3);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(7.75, 15 / 72 + z, 7.75, 11.3);
            const cha5 = document.getElementById('chart5');
            const imgcha5 = cha5.toDataURL('image/jpeg', 1.0);
            pdf.addImage(imgcha5, 'png', 0.7, 15 / 72 + z + 0.1 + 0.05, 2.6, 2.5);
            let a = 15 / 72 + z
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.7 + 2.5 + 0.3, 15 / 72 + z + 0.2, 0.7 + 2.5 + 0.3,
                11);

            const t2 = pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(77, 77, 77).splitTextToSize(
                b21.innerText, 4.1);
            for (var i = 0; i < t2.length; i++) {
                pdf.text(0.6 + 2.5 + 0.5, z + 15 / 72 + 14 / 72 + 0.2, t2[i]);
                z += 0.3
            }
            z += 0.1 + 0.05;
            const t3 = pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(77, 77, 77).splitTextToSize(
                b22.innerText, 4.1);
            for (var i = 0; i < t3.length; i++) {
                pdf.text(0.6 + 2.5 + 0.5, z + 15 / 72 + 14 / 72 + 0.2 + 0.1, t3[i]);
                z += 0.3
            }

            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, a + 2.7 + 0.1 + 0.05, 7.75, a + 2.7 + 0.1 +
                0.05);


            pdf.addPage();

            let z1 = 0.5
            pdf.setDrawColor(204, 204, 204).setLineWidth(30 / 72).line(0.5, z1, 7.75, z1);
            pdf.setFontSize(18).setFont('Cambria', "bold", 'normal').setTextColor(0, 0, 0).text(0.6, 0.1 + z1,
                'performance in activites in a semester');
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, 15 / 72 + z1, 0.5, 4.1 + 0.05);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(7.75, 15 / 72 + z1, 7.75, 4.1 + 0.05);

            z1 += 30 / 72 + 0.05;
            const cha3 = document.getElementById('chart4');
            const imgcha3 = cha3.toDataURL('image/jpeg', 1.0);
            pdf.addImage(imgcha3, 'png', 0.6, z1, 6.7, 2.4);
            z1 += 2.4 + 0.4;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(77, 77, 77).text(0.5 + 1 / 72 + 0.1, z1,
                b3.innerText);
            z1 += 14 / 72 + 0.2;
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, z1, 7.75, z1);
            z1 += 1 / 72 + 0.3;


            pdf.setDrawColor(204, 204, 204).setLineWidth(30 / 72).line(0.5, z1, 7.75, z1);
            pdf.setFontSize(18).setFont('Cambria', "bold", 'normal').setTextColor(0, 0, 0).text(0.6, 0.1 + z1,
                'total acievement in a semester');
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, 15 / 72 + z1, 0.5, 6.7 + 0.05);
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(7.75, 15 / 72 + z1, 7.75, 6.7 + 0.05);

            var zz = z1;
            var incrementtext = 0.3;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(153, 0, 0).text(0.5 + 0.1, 15 / 72 +
                zz + incrementtext, 'Matrials');
            incrementtext += 0.4;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(153, 0, 0).text(0.5 + 0.1, 15 / 72 +
                zz + incrementtext, 'Matrial Score');
            incrementtext += 0.4;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(153, 0, 0).text(0.5 + 0.1, 15 / 72 +
                zz + incrementtext, 'Student Score');
            incrementtext += 0.4;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(153, 0, 0).text(0.5 + 0.1, 15 / 72 +
                zz + incrementtext, 'Rating');
            incrementtext += 0.4;
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(153, 0, 0).text(0.5 + 0.1, 15 / 72 +
                zz + incrementtext, 'Total Score');


            var qp = mat.length;
            var incrementline = 1.8;
            pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(incrementline, 15 / 72 + zz, incrementline, 6.7 +
                0.05);
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(0, 0, 0).text(incrementline +
                0.1 + 1 / 72, 15 / 72 + zz + 1.9, summationn);
            for (var j = 0; j < qp - 1; j++) {
                var matt = mat[j][0];
                var stus = mat[j][1];
                var stuss = stus.toString();
                var mts = mat[j][2];
                var mtss = mts.toString();
                var rate = (stus * 100) / mts;
                if (rate < 50) {
                    var ratee = 'fail'
                } else if ((rate <= 65) && (rate >= 50)) {
                    var ratee = 'bad'
                } else if ((rate <= 75) && (rate > 65)) {
                    var ratee = 'good'
                } else if ((rate <= 85) && (rate > 75)) {
                    var ratee = 'very good'
                } else if (rate > 85) {
                    var ratee = 'excellent'
                }
                pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(153, 0, 0).text(incrementline +
                    0.1 + 1 / 72, 15 / 72 + zz + 0.3, matt);
                pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(0, 0, 0).text(incrementline +
                    0.1 + 1 / 72, 15 / 72 + zz + 1.1, stuss);
                pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(0, 0, 0).text(incrementline +
                    0.1 + 1 / 72, 15 / 72 + zz + 0.7, mtss);
                pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(0, 0, 0).text(incrementline +
                    0.1 + 1 / 72, 15 / 72 + zz + 1.5, ratee);
                incrementline += 0.9;
                pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(incrementline, 15 / 72 + zz, incrementline, 6.3 +
                    0.03);
            }
            var qpp = qp - 1;
            var mattt = mat[qpp][0];
            var stusss = mat[qpp][1];
            var stussss = stusss.toString();
            var mtsss = mat[qpp][2];
            var mtssss = mtsss.toString();
            var rateee = (stusss * 100) / mtsss;
            if (rateee < 50) {
                var rateeee = 'fail'
            } else if ((rateee <= 65) && (rateee >= 50)) {
                var rateeee = 'bad'
            } else if ((rateee <= 75) && (rateee > 65)) {
                var rateeee = 'good'
            } else if ((rateee <= 85) && (rateee > 75)) {
                var rateeee = 'very good'
            } else if (rateee > 85) {
                var rateeee = 'excellent'
            }
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(153, 0, 0).text(incrementline + 0.1 +
                1 / 72, 15 / 72 + zz + 0.3, mattt);
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(0, 0, 0).text(incrementline + 0.1 +
                1 / 72, 15 / 72 + zz + 1.1, stussss);
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(0, 0, 0).text(incrementline + 0.1 +
                1 / 72, 15 / 72 + zz + 0.7, mtssss);
            pdf.setFontSize(14).setFont('Cambria', "normal", 'normal').setTextColor(0, 0, 0).text(incrementline + 0.1 +
                1 / 72, 15 / 72 + zz + 1.5, rateeee);



            /* width */
            z1 += 30 / 72 + 0.2;
            for (var i = 0; i < 5; i++) {
                pdf.setDrawColor(204, 204, 204).setLineWidth(1 / 72).line(0.5, z1, 7.75, z1);
                z1 += 1 / 72 + 0.4;
            }



            pdf.save('semester2_report.pdf');


        }

        //---------------------------------end pdf----------------------------------------------
    </script>
</body>

</html>
