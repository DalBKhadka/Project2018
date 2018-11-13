<?php
if(!isset($_SESSION))
{
session_start();
}
class UserData
{
	public $patientAll = array("title","firstName", "lastName", "gender","preferredName", "dob", "streetAddress","suburb", "postcode","state","email","phoneNumber","homePhone","workPhone","admin");

	public $patientReq = array("title","firstName", "lastName", "gender", "dob", "streetAddress","suburb", "postcode","state","phoneNumber","admin");
	public $patientOpt = array("preferredName","homePhone","workPhone","email");
	public $healthFund=array("healthFundMembershipNumber","fundName","dateJoined","status");
	public $medicareDetails=array("medicareNumber","individualNo","expiryDate");
	public function __construct()
    {
    require_once('database.php');
    require_once('userData.php');
    }

	function clean_data($data) 
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data	;
	}

	function empty_check($data) 
	{
		if (empty($data))
		{
			return $dataErr ="required";
		}
		else
		{
			return "";
		}
	}
	
	function fetch_data($table)
	{
		$database = new Database;
		$database->query("SELECT * from ".$table."");
		$rows = $database->resultset();
		return $rows;
	}

	function verify_login($userNameInput,$passwordInput)
	{
		$loginError="";
		$verified=FALSE;
		$database = new Database;
		$database->query("SELECT * from user");
		$rows = $database->resultset();
		    foreach($rows as $row) 
		    {
		        if (password_verify($passwordInput,$row["password"])&&strcmp($userNameInput,$row["userName"])==0) 
				{
				$verified=TRUE;
				$_SESSION["loggedInUser"]["userName"]=$row["userName"];
				$_SESSION["loggedInUser"]["accessLevel"]=$row["accessLevel"];
    			header("location:pms");
				} 
		    }
		    if(!$verified)
		    {
		    	return $loginError="Your Credentials are Wrong. Try Again";
		    }

	}

}

?>