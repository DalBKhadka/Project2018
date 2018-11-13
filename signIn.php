<?php
$stylesheet="signIn";
$title="Noble Banks Dental: Login";
require_once("includes/head.php");
$loginError="";
if(isset($_SESSION['loggedInUser']))
      header("location:pms");

if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      if(isset($_POST["signIn"]))
       {
            include_once('functions/userData.php');
            $userData=new UserData;
            $userNameInput=$userData->clean_data($_POST['userName']);
            $passwordInput=$userData->clean_data($_POST['password']);
            if(!empty($userData->verify_login($userNameInput,$passwordInput)))
              {
                $loginError=$userData->verify_login($userNameInput,$passwordInput);
              }
      }
    }
?>
  <body>
    <form class="form-signin" method="POST" action="signIn.php">
      <div class="text-center mb-4">
        <a href='index.php'><img class="mb-4" src="img/NobelBankLogo.PNG" alt="Nobel Bank Logo in PNG" height="65"></a>
        <h1 class="h3 mb-3 font-weight-normal login-title">Authorisation</h1>
      </div>

      <div class="form-label-group">
        <input type="text" name="userName" id="userName" class="form-control" placeholder="Username" required autofocus>
        <label for="userName">Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->

      <button name="signIn" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <div class="form-label-group">
        <input disabled class="form-control border-0 bg-transparent text-danger text-center font-weight-bold" value="<?php echo $loginError?>">
      </div>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>
  </body>
</html>
