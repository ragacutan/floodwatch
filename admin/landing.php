<?php
include "../backend/session.php";
include "../backend/functions.php";
include "../backend/check_login.php";

date_default_timezone_set('Asia/Taipei');
$apiKey = "10f78797831bb67ce3a30494eeff3534";
$cityId = "1707052";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();

$select = "SELECT `time`, `water-level`  FROM `waterstatus` ORDER BY `time` LIMIT 10";
$query = mysqli_query($connection, $select);



?>


<?php include "layouts/_landing-header.php"; ?>

<body>
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo me-5" href="landing.php" style="display: inline-block;">
        <span>Flood Watch</span>
      </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="ti-view-list"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
            <img src="images/logo.png" alt="profile" />
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item">
              <i class="ti-settings text-primary"></i>
              Settings
            </a>
            <a class="dropdown-item" href="../backend/logout.php?logout=true">
              <i class="ti-power-off text-primary"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
        data-toggle="offcanvas">
        <span class="ti-view-list"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="ti-shield menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="ti-palette menu-icon"></i>
            <span class="menu-title">UI Elements</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h4 class="font-weight-bold mb-0">Welcome!
                  <?= $_SESSION['name'] ?>
                </h4>
              </div>
              <div>
                <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                  <i class="ti-clipboard btn-icon-prepend"></i>Report
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Registered User</p>
                <div
                  class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">

                    <?php
                    $select = "SELECT * FROM users WHERE user_type = 'user'";
                    $query_run = mysqli_query($connection, $select);

                    $row = mysqli_num_rows($query_run);
                    echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">' . $row . '</h3>';
                    ?>
                  </h3>
                  <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Registered Admin</p>
                <div
                  class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">

                    <?php
                    $select = "SELECT * FROM users WHERE user_type = 'admin'";
                    $query_run = mysqli_query($connection, $select);

                    $row = mysqli_num_rows($query_run);
                    echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">' . $row . '</h3>';
                    ?>
                  </h3>
                  <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Downloads</p>
                <div
                  class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">40016</h3>
                  <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
                <p class="mb-0 mt-2 text-success">64.00%<span class="text-black ms-1"><small>(30 days)</small></span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Returns</p>
                <div
                  class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">61344</h3>
                  <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
                <p class="mb-0 mt-2 text-success">23.00%<span class="text-black ms-1"><small>(30 days)</small></span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title mb-0">Water Level Status</p>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Time</th>
                        <th>Water Level</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $num = mysqli_num_rows($query);
                      if ($num > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                          echo '<tr>';
                          echo '<td>' . date("F m, Y @ g:H a", strtotime($row['time'])) . '</td>';
                          echo '<td>' . $row['water-level'] . '</td>';
                          $waterlevel = $row['water-level'];
                          $color = '';

                          if ($waterlevel == 'sensor_1') {
                            $color = 'green';
                            $status = 'low';
                          } elseif ($waterlevel == 'sensor_2') {
                            $color = 'orange';
                            $status = 'level 1';
                          } elseif ($waterlevel == 'sensor_3') {
                            $color = 'yellow';
                            $status = 'level 2';
                          }elseif ($waterlevel == 'sensor_4') {
                            $color = 'red';
                            $status = 'level 3';
                          }
                    
                          echo '<td style="background-color: ' . $color . '; color: black; font-weight: bold; text-align: center;">' . $status . '</td>';
                          echo '<tr>';
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Weather Status</h4>
                <div class="pt-2">
                  <tbody>
                    <tr>
                      <td><span style="color: black;">Date:</span>
                        <?php echo date("F j, Y", $currentTime) . ' || ' . date("l", $currentTime); ?>
                      </td>
                    </tr>
                    <br>
                    <br>
                    <br>
                    <tr>
                      <td><span style="color: black;">Time: <span id="demo"></span></span></td>
                    </tr>
                    <br>
                    <br>
                    <br>
                    <tr>
                      <td><span style="color: black;">Weather Forecast: </span>
                        <?php echo ucwords($data->weather[0]->description); ?> <span><img
                            src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                            class="weather-icon" </span>
                      </td>
                    </tr>
                    <br>
                    <br>
                    <br>
                    <tr>
                      <td><span style="color: darkblue;">Temperature:</span>
                        <?php echo $data->main->temp_max; ?>&deg;
                      </td>
                    </tr>
                    <br>
                    <br>
                    <br>
                    <tr>
                      <td><span style="color: darkred;">Humidity:</span>
                        <?php echo $data->main->humidity; ?> %
                      </td>
                    </tr>
                    <br>
                    <br>
                    <br>
                    <tr>
                      <td><span style="color: darkgreen;">Wind:</span>
                        <?php echo $data->wind->speed; ?> Km/H
                      </td>
                    </tr>
                    <br>
                    <br>
                    <br>
                  </tbody>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Sales details</p>
                <p class="text-muted font-weight-light">Received overcame oh sensible so at an. Formed do change merely
                  to county it. Am separate contempt domestic to to oh. On relation my so addition branched.</p>
                <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                <canvas id="sales-chart"></canvas>
              </div>
              <div class="card border-right-0 border-left-0 border-bottom-0">
                <div class="d-flex justify-content-center justify-content-md-end">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-lg btn-outline-light dropdown-toggle rounded-0 border-top-0 border-bottom-0"
                      type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="true">
                      Today
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                  <button class="btn btn-lg btn-outline-light text-primary rounded-0 border-0 d-none d-md-block"
                    type="button"> View all </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card border-bottom-0">
              <div class="card-body pb-0">
                <p class="card-title">Purchases</p>
                <p class="text-muted font-weight-light">The argument in favor of using filler text goes something like
                  this: If you use real content in the design process, anytime you reach a review</p>
                <div class="d-flex flex-wrap mb-5">
                  <div class="me-5 mt-3">
                    <p class="text-muted">Status</p>
                    <h3>362</h3>
                  </div>
                  <div class="me-5 mt-3">
                    <p class="text-muted">New users</p>
                    <h3>187</h3>
                  </div>
                  <div class="me-5 mt-3">
                    <p class="text-muted">Chats</p>
                    <h3>524</h3>
                  </div>
                  <div class="mt-3">
                    <p class="text-muted">Feedbacks</p>
                    <h3>509</h3>
                  </div>
                </div>
              </div>
              <canvas id="order-chart" class="w-100"></canvas>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title mb-0">Top Products</p>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>User</th>
                        <th>Product</th>
                        <th>Sale</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Jacob</td>
                        <td>Photoshop</td>
                        <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                        <td><label class="badge badge-danger">Pending</label></td>
                      </tr>
                      <tr>
                        <td>Messsy</td>
                        <td>Flash</td>
                        <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr>
                      <tr>
                        <td>John</td>
                        <td>Premier</td>
                        <td class="text-danger"> 35.00% <i class="ti-arrow-down"></i></td>
                        <td><label class="badge badge-info">Fixed</label></td>
                      </tr>
                      <tr>
                        <td>Peter</td>
                        <td>After effects</td>
                        <td class="text-success"> 82.00% <i class="ti-arrow-up"></i></td>
                        <td><label class="badge badge-success">Completed</label></td>
                      </tr>
                      <tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td class="text-success"> 98.05% <i class="ti-arrow-up"></i></td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr>
                      <tr>
                        <td>Messsy</td>
                        <td>Flash</td>
                        <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                        <td><label class="badge badge-info">Fixed</label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">To Do Lists</h4>
                <div class="list-wrapper pt-2">
                  <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                    <li>
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox">
                          Become A Travel Pro In One Easy Lesson
                        </label>
                      </div>
                      <i class="remove ti-trash"></i>
                    </li>
                    <li class="completed">
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" checked>
                          See The Unmatched Beauty Of The Great Lakes
                        </label>
                      </div>
                      <i class="remove ti-trash"></i>
                    </li>
                    <li>
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox">
                          Copper Canyon
                        </label>
                      </div>
                      <i class="remove ti-trash"></i>
                    </li>
                    <li class="completed">
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" checked>
                          Top Things To See During A Holiday In Hong Kong
                        </label>
                      </div>
                      <i class="remove ti-trash"></i>
                    </li>
                    <li>
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox">
                          Travelagent India
                        </label>
                      </div>
                      <i class="remove ti-trash"></i>
                    </li>
                  </ul>
                </div>
                <div class="add-items d-flex mb-0 mt-4">
                  <input type="text" class="form-control todo-list-input me-2" placeholder="Add new task">
                  <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i
                      class="ti-location-arrow"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card position-relative">
              <div class="card-body">
                <p class="card-title">Detailed Reports</p>
                <div class="row">
                  <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                    <div class="ml-xl-4">
                      <h1>33500</h1>
                      <h3 class="font-weight-light mb-xl-4">Sales</h3>
                      <p class="text-muted mb-2 mb-xl-0">The total number of sessions within the date range. It is the
                        period time a user is actively engaged with your website, page or app, etc</p>
                    </div>
                  </div>
                  <div class="col-md-12 col-xl-9">
                    <div class="row">
                      <div class="col-md-6 mt-3 col-xl-5">
                        <canvas id="north-america-chart"></canvas>
                        <div id="north-america-legend"></div>
                      </div>
                      <div class="col-md-6 col-xl-7">
                        <div class="table-responsive mb-3 mb-md-0">
                          <table class="table table-borderless report-table">
                            <tr>
                              <td class="text-muted">Illinois</td>
                              <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                  <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"
                                    aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>
                                <h5 class="font-weight-bold mb-0">524</h5>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-muted">Washington</td>
                              <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                  <div class="progress-bar bg-primary" role="progressbar" style="width: 30%"
                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>
                                <h5 class="font-weight-bold mb-0">722</h5>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-muted">Mississippi</td>
                              <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                  <div class="progress-bar bg-primary" role="progressbar" style="width: 95%"
                                    aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>
                                <h5 class="font-weight-bold mb-0">173</h5>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-muted">California</td>
                              <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                  <div class="progress-bar bg-primary" role="progressbar" style="width: 60%"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>
                                <h5 class="font-weight-bold mb-0">945</h5>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-muted">Maryland</td>
                              <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                  <div class="progress-bar bg-primary" role="progressbar" style="width: 40%"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>
                                <h5 class="font-weight-bold mb-0">553</h5>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-muted">Alaska</td>
                              <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                  <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>
                                <h5 class="font-weight-bold mb-0">912</h5>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
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
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
              href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a
              href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>


  <?php include "layouts/_landing-footer.php"; ?>