<?php
if(!isset($_SESSION))
{
session_start();
}
if(!isset($_SESSION['loggedInUser']))
{
      header("location:../signIn.php");
}
require_once("../includes/head.php");
?>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../"><img src="../img/NobelBankLogo.PNG" alt="Nobel Bank Logo in PNG" height="30"></a>
      <?php
      if(strcmp($page,'patient')==0)
      echo '<input id="myInput" class="form-control w-100" type="text" placeholder="Search Patients using headings below....." aria-label="Search using headings below.....">';
      else
      echo '<input class="form-control form-control-dark w-100" disabled type="hidden">';?>

      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class=" btn btn-danger my-1" href="logout.php">Logout</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="../pms">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <?php if(strcmp($_SESSION["loggedInUser"]["accessLevel"],"Doctor")!=0)
              echo '<li class="nav-item">
                <a class="nav-link" href="register.php">
                  <span data-feather="file"></span>
                  Patient Registration
                </a>
              </li>';
              ?>
              <?php if(strcmp($_SESSION["loggedInUser"]["accessLevel"],"HeadAdmin")==0)
              echo '<li class="nav-item">
                <a class="nav-link" href="addEmployee.php">
                  <span data-feather="file"></span>
                  Employee Registration
                </a>
              </li>' ?> 
               <?php if(strcmp($_SESSION["loggedInUser"]["accessLevel"],"Doctor")!=0)
               echo   
              '<li class="nav-item">
                <a class="nav-link" href="searchpatient">
                  <span data-feather="users"></span>
                  Patients
                </a>
              </li>';
              ?>
              <?php if(strcmp($_SESSION["loggedInUser"]["accessLevel"],"Doctor")==0)
               echo   
              '<li class="nav-item">
                <a class="nav-link" href="searchpatient">
                  <span data-feather="users"></span>
                  Bookings
                </a>
              </li>';
              ?>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <?php if(strcmp($_SESSION["loggedInUser"]["accessLevel"],"Doctor")!=0)
               echo   
              '<li class="nav-item">
                <a class="nav-link" href="checkout">
                  <span data-feather="credit-card"></span>
                  Payments
                </a>
              </li>';?>
            </ul>
            <?php echo '<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 font-weight-bold"><span class="text-danger" data-feather="lock"></span><span class="nav-link text-center text-danger font-weight-bold">Logged in as
              '.$_SESSION["loggedInUser"]["accessLevel"].'</span><span class="text-danger" data-feather="lock"></span>
            </h6>';?>
            <ul class="nav flex-column mb-2">
              <?php
              echo '<li class="nav-item">
              <span class="nav-link">Name:
              '.$_SESSION["loggedInUser"]["userName"].'</span> 
              </li>';

              echo '<li class="text-center nav-item">
              <span class="nav-link text-primary">Please make sure to<br><a  class="btn btn-danger mt-2" href="logout">Logout</a>
              </span> 
              </li>';
              ?>
            </ul>
          </div>
        </nav>