<body>
<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="../website"><img src="img/NobelBankLogo.PNG" alt="Nobel Bank Logo in PNG" height="55"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item active">
            <a class="nav-link font-weight-bold" href="../website">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger font-weight-bold" href="#">Services</a>
          </li>
           <li class="nav-item">
            <a class="nav-link text-danger font-weight-bold" href="#">About</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link text-danger font-weight-bold" href="contactus">Contact</a>
          </li>
          
        </ul>
          <li class="navbar-nav float-lg-right">
          <?php 
          if(!isset($_SESSION['loggedInUser']))
          echo "<a href='signIn.php' class='nav-link text-danger font-weight-bold'>Login</a>";
          else
          echo "<a href='signIn.php' class='btn btn-success nav-link font-weight-bold text-white'>Patient Management System</a>";
          ?>
          </li>
        </form>
      </div>
</nav>
    