<?php
$loginError="not good";
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