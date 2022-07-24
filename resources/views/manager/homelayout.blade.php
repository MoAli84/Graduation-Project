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
  <!-- <link rel="stylesheet" href="css/demo.min.css">
  <link rel="stylesheet" href="css/style.css"> -->
  <!-- endinject -->
  <link rel="shortcut icon" href="images/t.png" />
  <style>
   .ta-ca {
          color: #e79e00;
      }
      /*! Demo Page CSS © CodeHim - www.codehim.com */
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,100;1,300&display=swap');*{margin:0;padding:0}a{text-decoration:none}body{background:#eee;font-family:'Roboto',sans-serif;font-size:14px;font-weight:normal}.credit a{color:#414141}.page_header,main,footer.credit{padding:14px;background:#fff;color:#414141;box-sizing:border-box}footer.credit{text-align:center}a.cd_btn{display:inline-block;padding:12px 16px;background:#212121;color:#fff;vertical-align:middle}main{max-width:960px;min-height: 300px;margin:15px auto}a.cd_btn,main{border-radius:2px}.header_inner{max-width:960px;margin:0 auto}.project_intro{text-align:center}.project_intro h1{font-size:28px;color:#414141;margin:16px 0}.project_description{font-size:14px;color:#616161;margin:16px 0}.header_inner{display:table;width:100%}.back_tutorial,.ad_unit{display:table-cell;vertical-align:top;padding:10px;box-sizing:border-box}.back_tutorial{width:30%}.ad_unit{width:70%}.ad{font-weight:300;line-height:1.4;background:#baebff;border:1px solid #95d5f0;border-radius:2px;max-width:640px;padding:10px 16px;box-sizing:border-box}.ad p{color:#046187}.ad h4{color:#313131}@media only screen and (max-width:748px){main{margin:10px;min-height:300px}}
      html {
    font-family: sans-serif;
    font-size: 15px;
    line-height: 1.4;
    color: #444;
}

body {
    margin: 0;
    background: #504f4f;
    font-size: 1em;
}

.wrapper {
    margin: 15px auto;
    max-width: 1100px;
}

.container-calendar {
    background: #ffffff;
    padding: 15px;
    max-width: 475px;
    margin: 0 auto;
    overflow: auto;
}

.button-container-calendar button {
    cursor: pointer;
    display: inline-block;
    zoom: 1;
    background: #00a2b7;
    color: #fff;
    border: 1px solid #0aa2b5;
    border-radius: 4px;
    padding: 5px 10px;
}

.table-calendar {
    border-collapse: collapse;
    width: 100%;
}

.table-calendar td, .table-calendar th {
    padding: 5px;
    border: 1px solid #e2e2e2;
    text-align: center;
    vertical-align: top;
}

.date-picker.selected {
    font-weight: bold;
    outline: 1.5px solid #00BCD4;
}

.date-picker.selected span {
    border-bottom: 2px solid currentColor;
}

/* sunday */
.date-picker:nth-child(1) {
  color: red;
}

/* friday */
.date-picker:nth-child(6) {
  color: green;
}

#monthAndYear {
    text-align: center;
    margin-top: 0;
}

.button-container-calendar {
    position: relative;
    margin-bottom: 1em;
    overflow: hidden;
    clear: both;
}

#previous {
    float: left;
}

#next {
    float: right;
}

.footer-container-calendar {
    margin-top: 1em;
    border-top: 1px solid #dadada;
    padding: 10px 0;
}

.footer-container-calendar select {
    cursor: pointer;
    display: inline-block;
    zoom: 1;
    background: #ffffff;
    color: #585858;
    border: 1px solid #bfc5c5;
    border-radius: 3px;
    padding: 5px 1em;
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

  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.3);
  -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.3);
  box-shadow: 0 1px 2px rgba(0,0,0,0.3);
}

select.styled:not([multiple='multiple']){
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

table tr td select.styled:not([multiple='multiple']){
  height: 82% !important;
}

select.styled[multiple='multiple']{
  padding-right: 5px;
}

select:focus.styled, option:focus.styled {
  outline: 1px solid white;
  border: 1px solid #ccc;
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.2);
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.2);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.2);
}


  </style>

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-7 " href="manager.html"><img src="images/track.svg" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="manager.html"><img src="images/tlogo.svg" alt="logo"/></a>
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
              <img src="images/faces/my-profile-icon-png-3 (1).jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             {{--  <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a> --}}
              <a class="dropdown-item"href="{{ url('manager/logout') }}">
                <i class="ti-power-off text-primary"></i>
                Logout
            </a>
            </div>
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
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
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
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



      @yield('content')


      <script>
        function generate_year_range(start, end) {
      var years = "";
      for (var year = start; year <= end; year++) {
          years += "<option value='" + year + "'>" + year + "</option>";
      }
      return years;
  }

  today = new Date();
  currentMonth = today.getMonth();
  currentYear = today.getFullYear();
  selectYear = document.getElementById("year");
  selectMonth = document.getElementById("month");


  createYear = generate_year_range(1970, 2050);
  /** or
   * createYear = generate_year_range( 1970, currentYear );
   */

  document.getElementById("year").innerHTML = createYear;

  var calendar = document.getElementById("calendar");
  var lang = calendar.getAttribute('data-lang');

  var months = "";
  var days = "";

  var monthDefault = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

  var dayDefault = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

  if (lang == "en") {
      months = monthDefault;
      days = dayDefault;
  } else if (lang == "id") {
      months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
      days = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
  } else if (lang == "fr") {
      months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
      days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
  } else {
      months = monthDefault;
      days = dayDefault;
  }


  var $dataHead = "<tr>";
  for (dhead in days) {
      $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
  }
  $dataHead += "</tr>";

  //alert($dataHead);
  document.getElementById("thead-month").innerHTML = $dataHead;


  monthAndYear = document.getElementById("monthAndYear");
  showCalendar(currentMonth, currentYear);



  function next() {
      currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
      currentMonth = (currentMonth + 1) % 12;
      showCalendar(currentMonth, currentYear);
  }

  function previous() {
      currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
      currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
      showCalendar(currentMonth, currentYear);
  }

  function jump() {
      currentYear = parseInt(selectYear.value);
      currentMonth = parseInt(selectMonth.value);
      showCalendar(currentMonth, currentYear);
  }

  function showCalendar(month, year) {

      var firstDay = ( new Date( year, month ) ).getDay();

      tbl = document.getElementById("calendar-body");


      tbl.innerHTML = "";


      monthAndYear.innerHTML = months[month] + " " + year;
      selectYear.value = year;
      selectMonth.value = month;

      // creating all cells
      var date = 1;
      for ( var i = 0; i < 6; i++ ) {

          var row = document.createElement("tr");


          for ( var j = 0; j < 7; j++ ) {
              if ( i === 0 && j < firstDay ) {
                  cell = document.createElement( "td" );
                  cellText = document.createTextNode("");
                  cell.appendChild(cellText);
                  row.appendChild(cell);
              } else if (date > daysInMonth(month, year)) {
                  break;
              } else {
                  cell = document.createElement("td");
                  cell.setAttribute("data-date", date);
                  cell.setAttribute("data-month", month + 1);
                  cell.setAttribute("data-year", year);
                  cell.setAttribute("data-month_name", months[month]);
                  cell.className = "date-picker";
                  cell.innerHTML = "<span>" + date + "</span>";

                  if ( date === today.getDate() && year === today.getFullYear() && month === today.getMonth() ) {
                      cell.className = "date-picker selected";
                  }
                  row.appendChild(cell);
                  date++;
              }


          }

          tbl.appendChild(row);
      }

  }

  function daysInMonth(iMonth, iYear) {
      return 32 - new Date(iYear, iMonth, 32).getDate();
  }
    </script>








  </body>

  </html>


