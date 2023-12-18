<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('logo/CITY.jpg');
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      color: #333;
    }

    .sidenav {
      height: 100%;
      width: 200px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #1D5D9B;
      padding-top: 20px;
      overflow-x: hidden;
    }

    .sidenav a {
      padding: 15px 8px;
      text-decoration: none;
      font-size: 16px;
      color: white;
      display: block;
      transition: background 0.3s ease;
      text-align: center;
    }

    .sidenav a:hover {
      background-color: #144375;
    }

    .header {
      position: sticky;
      top: 0;
      margin-left: 200px;
      padding: 20px;
      background-color: #5390cc;
      color: white;
      text-align: left;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      z-index: 2;
    }

    .logo {
      text-align: center;
      color: white;
      padding: 10px;
    }

    .logo img {
      width: 80px;
      border-radius: 50%;
    }

    .header h1 {
      font-size: 24px;
      margin: 0;
    }

    .additional-text,
    .districts-container {
      position: sticky;
      top: 0;
      margin-left: 200px;
      padding: 20px;
      text-align: left;
      font-size: 20px;
      z-index: 1;
      font-weight: bold;
    }

    .districts-container {
      display: flex;
      justify-content: space-evenly;
      font-size: 18px;
      flex-wrap: wrap; /* Allow flex items to wrap onto multiple lines */
    }

    .district-list {
      margin-right: 20px;
    }

    .district-title {
      font-size: 20px;
      color: #1D5D9B;
      font-weight: bold;
      text-align: center;
      margin-bottom: 5px;
    }

    .barangay-list {
      list-style-type: none;
      padding: 0;
      text-align: center;
    }

    .barangay-list a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      transition: color 0.3s ease;
    }

    .barangay-list a:hover {
      color: #1D5D9B;
    }

    .content-box {
      background-color: #D2D4DA;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      width: 250px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    @media only screen and (max-width: 600px) {
      .sidenav,
      .header,
      .additional-text,
      .districts-container {
        margin-left: 0;
        width: 100%;
      }
    }
  </style>
</head>
<body>

<div class="sidenav">
  <div class="logo">
    <img src="logo/City.png" alt="Logo">
    <p>FMEWS-CDRRMO</p>
  </div>
  <a href="BARANGAY.php">Home</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Contact</a>
</div>

<div class="header">
  <h1>FLOOD MONITORING ADMIN</h1>
</div>

<div class="additional-text">
  <p>BARANGAY OF CITY OF SAN FERNANDO</p>
</div>

<div class="districts-container">
  <div class="district-list">
    <div class="content-box">
    <p class="district-title">DISTRICT I</p>
    <ul class="barangay-list">
      <li><a href="#">BARANGAY I</a></li>
      <li><a href="#">BARANGAY II</a></li>
      <li><a href="#">BARANGAY III</a></li>
      <li><a href="#">BARANGAY IV</a></li>

    <p class="district-title">DISTRICT V</p>
    <ul class="barangay-list">
      <li><a href="#">CARLATAN</a></li>
      <li><a href="#">DALUMPINAS ESTE</a></li>
      <li><a href="#">DALUMPINAS OESTE</a></li>
      <li><a href="#">LINGSAT</a></li>
    </ul>

    <p class="district-title">DISTRICT IX</p>
    <ul class="barangay-list">
      <li><a href="#">CABAROAN</a></li>
      <li><a href="#">DALLANGAYAN OESTE</a></li>
      <li><a href="#">SANTIAGO SUR</a></li>
      <li><a href="#">TANQUI</a></li>
  </div>
</div>
  <!-- Second Column -->
  <div class="district-list">
    <div class="content-box">
    <p class="district-title">DISTRICT II</p>
    <ul class="barangay-list">
      <li><a href="#">ILOCANOS SUR</a></li>
      <li><a href="#">ILOCANOS NORTE</a></li>
      <li><a href="#">PADGSATAOAN</a></li>
    </ul>

    <p class="district-title">DISTRICT VI</p>
    <ul class="barangay-list">
      <li><a href="#">ABUT</a></li>
      <li><a href="#">BANGCUSAY</a></li>
      <li><a href="#">BATO</a></li>
      <li><a href="#">BIDAY</a></li>
      <li><a href="#">MAMELTAC</a></li>
      <li><a href="#">NAMTUTAN</a></li>
      <li><a href="#">SAOAY</a></li>
    </ul>

    <p class="district-title">DISTRICT X</p>
    <ul class="barangay-list">
      <li><a href="#">CADACLAN</a></li>
      <li><a href="#">CAMANSI</a></li>
      <li><a href="#">DALLANGANYAN ESTE</a></li>
      <li><a href="#">LANGCUAS</a></li>
      <li><a href="#">PIAS</a></li>
      <li><a href="#">SANTIAGO NORTE</a></li>
    </ul>
  </div>
</div>

  <!-- Third Column -->
  <div class="district-list">
    <div class="content-box">
    <p class="district-title">DISTRICT III</p>
    <ul class="barangay-list">
      <li><a href="#">CATBAGEN</a></li>
      <li><a href="#">PARIAN</a></li>
      <li><a href="#">MADAYEGDEG</a></li>
    </ul>

    <p class="district-title">DISTRICT VII</p>
    <ul class="barangay-list">
      <li><a href="#">PAGDALAGAN</a></li>
      <li><a href="#">PAGUDPUD</a></li>
      <li><a href="#">SAN VICENTE</a></li>
      <li><a href="SEVILLA.php">SEVILLA</a></li>
    </ul>

    <p class="district-title">DISTRICT XI</p>
    <ul class="barangay-list">
      <li><a href="#">CABARSICAN</a></li>
      <li><a href="#">MASICONG</a></li>
      <li><a href="#">NAGYUBUYUBAN</a></li>
      <li><a href="#">PACPACO</a></li>
      <li><a href="#">PAO NORTE</a></li>
      <li><a href="#">PAO SUR</a></li>
      <li><a href="#">SACYUD</a></li>
    </ul>
  </div>
</div>
  <!-- Fourth Column -->
  <div class="district-list">
    <div class="content-box">
    <p class="district-title">DISTRICT IV</p>
    <ul class="barangay-list">
      <li><a href="#">CANAOAY</a></li>
      <li><a href="#">PORO</a></li>
      <li><a href="#">SAN AGUSTIN</a></li>
      <li><a href="#">SAN FRANCISCO</a></li>
    </ul>

    <p class="district-title">DISTRICT VIII</p>
    <ul class="barangay-list">
      <li><a href="#">BIRUNGET</a></li>
      <li><a href="#">BUNGRO</a></li>
      <li><a href="#">NARRA ESTE</a></li>
      <li><a href="#">NARRA OESTE</a></li>
      <li><a href="#">SAGAYAD</a></li>
      <li><a href="#">SIBUAN-OTONG</a></li>
      <li><a href="#">TANQUIGAN</a></li>
    </ul>

    <p class="district-title">DISTRICT XII</p>
    <ul class="barangay-list">
      <li><a href="#">APALENG</a></li>
      <li><a href="#">BACSIL</a></li>
      <li><a href="#">BANGBANGOLAN</a></li>
      <li><a href="#">BARAOAS</a></li>
      <li><a href="#">CALABUGAO</a></li>
      <li><a href="#">PUSPUS</a></li>
    </ul>
  </div>
</div>
</body>
</html>
