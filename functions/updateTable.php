<?php 
class UpdateTable
{
    public function __construct()
    {
    require_once('database.php');
    require_once('userData.php');
    }

	public function updatePatient($index,$patientID,$value)
	{
		$updatePatientResponse="";
		$objDatabase=new Database();
		$objUserData=new UserData();
		$connDatabase=$objDatabase->connect();
		if($stmt = $connDatabase->prepare("UPDATE patient SET ".$index."=? WHERE PatientNumber=?"))
		{
			$updatePatientResponse="Details Updated.";
		}
		else
		{
			$updatePatientResponse="Upate Failed";
		}
		$stmt->bind_param("ss",$value,$patientID);
		$stmt->execute();
		return $updatePatientResponse;
	}

	public function insertToUser()
	{
		$insertUserResponse="";
		$username="Dipa";
		$password="Dipa";
		$accessLevel="Admin";

		//Encryption
		$options = [
    	'cost' => 12,
		];
 				$password=password_hash($password, PASSWORD_BCRYPT, $options);
				$database = new Database;
                $database->query('INSERT INTO user(userName,password,accessLevel) VALUES(:username,:password,:accessLevel)');
                $database->bind(':username', $username);
                $database->bind(':password', $password);
                $database->bind(':accessLevel', $accessLevel);
                $regResponse=$database->execute();
				return $insertUserResponse;
	}
}
 ?>