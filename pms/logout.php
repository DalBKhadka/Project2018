<?php
session_start();
unset($_SESSION['loggedInUser']);
header("location:../../website"); 
?>