<?php
if(!isset($_SESSION))
{
session_start();
}
include_once('../functions/userData.php');
$userData=new UserData;
include_once('../functions/updateTable.php');
$updateTable=new UpdateTable;
$updateMesg="";
if(!isset($patientID))
$index="";
if(empty($_POST['PatientNumber'])&&!isset($_SESSION["updateRes"]))
{
  header('location:searchpatient');
}
else
{
  if(!empty($_POST['PatientNumber']))
  $patientID=$userData->clean_data($_POST['PatientNumber']);
  if(!empty($_SESSION["updateRes"]))
  {
  $updateMesg=$userData->clean_data($_SESSION["updateRes"]["mesg"]);
  $patientID=$userData->clean_data($_SESSION["updateRes"]["ID"]);
  $index=$userData->clean_data($_SESSION["updateRes"]["index"]);
  unset($_SESSION["updateRes"]);
  }
}
$stylesheet="pms";
$page="patientdetails";
$title="Patient Details Update: Noble Banks Dental";
include_once('pmsframe.php');
?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-sm-5 mt-lg-2">
        <div class="container">
  <?php
  $userDataRows=$userData->fetch_data("patient");
  foreach($userDataRows as $row)
  {
    if(strcmp($row["PatientNumber"], $patientID)==0)
    {
      echo '<table class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
        <td colspan="6">
        <b>Name:</b> '.$row["FirstName"].' '.$row["FirstName"].'<br>
        <b>Date of Birth:</b> '.$row["DOB"].'<br>
        <b>Date Joined:</b> '.$row["DateJoined"].'
        </td></tr>
        </thead>';
         echo '
    <thead>
      <tr>
        <th>Index</th>
        <th>Value</th>
        <th>Index</th>
        <th>Value</th>
        <th>Index</th>
        <th>Value</th>
      </tr>
    </thead>
  <tbody id="myTable">';
  $col=0;
      foreach( $row as $key=>$value)
      {
        if(strcmp($key,"Title")!=0&&strcmp($key,"FirstName")!=0&&strcmp($key,"LastName")!=00&&strcmp($key,"DOB")!=00&&strcmp($key,"PatientNumber")!=00&&strcmp($key,"LastName")!=0)
        {
        if($col==0)
        echo "<tr>";
        echo '
        <td>'.$key.'</td>
        <td><form action="updatePatient.php" method="POST">
        <input name="patientID" type="hidden" value="'.$row["PatientNumber"].'">
        <input name="index" type="hidden" value="'.$key.'">
        <input name="value" type="text" value="'.$value.'">
        <input class="btn-success" type="submit" name="button" value="Update">
        </form></td>';
        $col++;
        if($col==3)
        {
          echo "</tr>";
          $col=0;
        }
        // if(strcmp($index,$key)==0)
        // echo '<td><input class="border-0 bg-transparent text-danger" name="value" type="text" value="'.$updateMesg.'" disabled></td>';
        // else
        //  echo '<td><input class="border-0 bg-transparent text-danger" name="value" type="text" value="" disabled></td>';
        }
        }
   }
  }?>
  </tbody></table>
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

