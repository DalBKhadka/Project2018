<?php
$stylesheet="pms";
$title="Patient Registration";
$page="register";
include_once('pmsframe.php');
include_once('../functions/userData.php');
include_once('../functions/updateTable.php');
$userData=new UserData;
$regResponse="";
$termsErr="";
$patientAll=$userData->patientAll;
$patientReq=$userData->patientReq;
$patientOpt=$userData->patientOpt;
$healthFund=$userData->healthFund;
$medicareDetails=$userData->medicareDetails;
$updateTable=new UpdateTable;
    for($i=0;$i<count($patientReq);$i++)
        {
            $errorMesg=$patientReq[$i]."Err";
            $$errorMesg="";
        }
    for($i=0;$i<count($healthFund);$i++)
        {
            $errorMesg=$healthFund[$i]."Err";
            $$errorMesg="";
        }
    for($i=0;$i<count($medicareDetails);$i++)
        {
            $errorMesg=$medicareDetails[$i]."Err";
            $$errorMesg="";
        } 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
            $patientReqSuccess=FALSE;
            for($i=0;$i<count($patientReq);$i++)
            {
            $patientReqSuccess=FALSE;
            $errorMesg=$patientReq[$i]."Err";
            $$errorMesg=$userData->empty_check($_POST[$patientReq[$i]]);
            if(empty($$errorMesg))
            {
            $$patientReq[$i]=$userData->clean_data($_POST[$patientReq[$i]]);
            $patientReqSuccess=TRUE;
            }
            }

            for($i=0;$i<count($patientOpt);$i++)
            {
            $errorMesg=$userData->empty_check($_POST[$patientOpt[$i]]);
            if(empty($errorMesg))
            {
            $$patientOpt[$i]=$userData->clean_data($_POST[$patientOpt[$i]]);
            }
            else
            $$patientOpt[$i]="";
            }
            if($patientReqSuccess)
            {
                $userDataRows=$userData->fetch_data("patientes");
                foreach($userDataRows as $row)
                    {
                        if(strcmp($row["firstName"], $firstName)==0&&strcmp($row["lastName"], $lastName)==0&&strcmp($row["dob"], $dob)==0)
                        {
                        $regResponse="Your are already in our database";
                        $patientReqSuccess=FALSE;
                        break;
                        }
                    }
                if($patientReqSuccess)
                {
                $database = new Database;
                $database->query('INSERT INTO patientes(title,firstName,lastName,gender,preferredName,dob,streetAddress,suburb,postcode,state,email,phoneNumber,homePhone,workPhone,admin) VALUES (:title,:firstName,:lastName,:gender,:preferredName,:dob,:streetAddress,:suburb,:postcode,:state,:email,:phoneNumber,:homePhone,:workPhone,:admin)');
                for($i=0;$i<count($patientAll);$i++)
                $database->bind(':'.$patientAll[$i].'', $$patientAll[$i]);
                $regResponse=$database->execute();
                    }
            }
        }

?>
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="container my-3">
    <div class="row">
        <div class="col-md-9 mx-auto">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="fileForm" role="form">
            <fieldset><legend class="mb-0 text-center font-weight-bold">Employee Registration</legend>
            <input class="form-control border-0 mt-0 text-center text-success bg-transparent" type="text" disabled value="<?php echo $regResponse;?>"/> 
            <!-- <hr class="my-0">
            <legend class="text-center font-weight-normal">Personal Details</legend> -->
            <hr class="mt-0 mb-1">
            <div class="form-group d-inline-block  col-lg-4">     
                <label for="title"><span class="req">* </span> Title </label>
                <select class="form-control" name="title" id="title" autofocus required>
                    <option value="">Title</option>
                    <option value="Mr">Mr</option>
                    <option value="Ms">Ms</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Miss">Miss</option>
                    <option value="Master">Master</option>
                </select>
                <div class="req" id="titleErr"><?php echo $titleErr;?></div>

            </div><div class="form-group d-inline-block  col-lg-4">

                <label for="firstName"><span class="req">* </span> First name: </label>
                <input class="form-control" type="text" name="firstName" id = "txt" onkeyup = "Validate(this)" required placeholder="First Name"/> 
                <div class="req" id="firstNameErr"><?php echo $firstNameErr;?></div>

            </div><div class="form-group d-inline-block  col-lg-4">
                <label for="lastName"><span class="req">* </span> Last name: </label> 
                    <input class="form-control" type="text" name="lastName" id = "txt" onkeyup = "Validate(this)" placeholder="Last Name" required />  
                        <div class="req" id="lastNameErr"><?php echo $lastNameErr;?></div>

            </div><div class="form-group d-inline-block  col-lg-4">     
                <label for="gender"><span class="req">* </span> Gender </label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <div class="req" id="genderErr"><?php echo $genderErr;?></div>

            </div><div class="form-group d-inline-block  col-lg-4">     
                <label for="preferredName"><span class="req"></span>Preferred name: </label>
                <input class="form-control" type="text" name="preferredName" id = "txt" onkeyup = "Validate(this)"  placeholder="Preferred name" /> 
                <!-- <div class="req" id="preferredNameErr"><?php echo $preferredNameErr;?></div> -->

            </div><div class="form-group d-inline-block  col-lg-4">     
                <label for="dob"><span class="req">* </span>Date of Birth: </label>
                <input class="form-control" type="date" name="dob" id = "" onkeyup = "Validate(this)" required placeholder="Preferred name" /> 
                <div class="req" id="dobErr"><?php echo $dobErr;?></div>

            </div><div class="form-group d-inline-block  col-lg-4">
                <label for="status"><span class="req">*</span> Role: </label><select class="form-control" name="role" id="role" required>
                    <option value="">Select Role</option>
                    <option value="HeadAdmin">Head Admin</option>
                    <option value="Admin">Admin</option>
                    <option value="Doctor">Doctor</option>
                </select>
                 <div class="req" id="statusErr"><?php echo $statusErr;?></div> 
            </div><div class="form-group d-inline-block  col-lg-4">
            <label for="streetAddress"><span class="req">* </span> Street Address: </label><input required type="text" name="streetAddress" id="streetAddress" class="form-control" maxlength="100" onkeyup="validatephone(this);" placeholder="Street Address"/>
            <div class="req" id="streetAddressErr"><?php echo $streetAddressErr;?></div>

            </div><div class="form-group d-inline-block  col-lg-4">
            <label for="suburb"><span class="req">* </span> Suburb: </label><input required type="text" name="suburb" id="suburb" class="form-control" maxlength="100" onkeyup="validatephone(this);" placeholder="Suburb"/>
            <div class="req" id="suburbErr"><?php echo $suburbErr;?></div>

            </div><div class="form-group d-inline-block  col-lg-4">
            <label for="postcode"><span class="req">* </span> Postcode: </label><input required type="number" name="postcode" id="postcode" class="form-control" maxlength="4" onkeyup="validatephone(this);" placeholder="Postcode"/>
            <div class="req" id="postcodeErr"><?php echo $postcodeErr;?></div>

            </div><div class="form-group d-inline-block  col-lg-4">     
                <label for="state"><span class="req">* </span> State </label>
                <select class="form-control" name="state" id="state" required>
                    <option value="">State</option>
                    <option value="NSW">NSW</option>
                    <option value="VIC">VIC</option>
                    <option value="QLD">QLD</option>
                    <option value="TAS">TAS</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="NT">NT</option>
                    <option value="ACT">ACT</option>
                </select>
                <div class="req" id="stateErr"><?php echo $stateErr;?></div>

            </div><div class="form-group d-inline-block  col-lg-4">
            <label for="email"><span class="req">* </span>Email: </label><input required type="email" name="email" id="email" class="form-control" maxlength="20" placeholder="Email Address"/></div><div class="form-group d-inline-block  col-lg-4">
                <label for="phoneNumber"><span class="req">* </span> Phone Number: </label><input required type="number" name="phoneNumber" id="phoneNumber" class="form-control phone" maxlength="10" onkeyup="validatephone(this);" placeholder="Mobile Number"/>
                <div class="req"  id="phoneNumberErr"><?php echo $phoneNumberErr;?></div>

            </div><div class="form-group d-inline-block  col-lg-4">
            <label for="homePhone">Home Phone: </label><input  type="number" name="homePhone" id="homePhone" class="form-control" maxlength="10" onkeyup="validatephone(this);" placeholder="Home Phone"/>
            <!-- <div class="req" id="homePhoneErr"><?php echo $homePhoneErr;?></div> -->

            </div><div class="form-group d-inline-block  col-lg-4">
            <label for="workPhone">Work Phone: </label><input  type="number" name="workPhone" id="workPhone" class="form-control" maxlength="10" onkeyup="validatephone(this);" placeholder="Work Phone"/>
            <!-- <div class="req" id="workPhoneErr"><?php echo $workPhoneErr;?></div> --></div><div class="form-group">
                <?php $admin="test"; ?>
                <input type="hidden" value="<?php echo date("Y/m/d"); ?>" name="dateRegistered">
                <input type="hidden" value="<?php echo $admin;?>" name="admin" /></div>
            
            <div class="form-group">
                <input type="checkbox" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">   <label for="terms">I agree with the <a href="terms.php" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label>
                <div class="req" id="termsErr"><?php echo $termsErr;?></div> 

            </div>

            <div class="form-group">
                <input class="btn btn-success" type="submit" name="submit_reg" value="Register">
            </div>
            </fieldset>
            </form><!-- ends register form -->

<script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
</script>
        </div><!-- ends col-6 -->
    </div>
</div>
</main>
</div>
</div>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    </script>
</body>
</html>