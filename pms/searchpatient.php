<?php
if(!isset($_SESSION))
{
session_start();
}
include_once('../functions/userData.php');
$userData=new UserData;
$stylesheet="pms";
$page="patient";
$title="Patients Lookup";
include_once('pmsframe.php');
?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
  <br>
  <?php
  echo '<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Date of Birth</th>
        <th>Mobile</th>
        <th>Address</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
  <tbody id="myTable">';
  $userDataRows=$userData->fetch_data("patient");
  foreach($userDataRows as $row)
  {
    echo '<tr>
        <td>'.$row["FirstName"].'</td>
        <td>'.$row["LastName"].'</td>
        <td>'.$row["DOB"].'</td>
        <td>'.$row["Mobile"].'</td>
        <td>'.$row["StreetAddress"].','.$row["Suburb"].','.$row["PostCode"].'</td>';
        if(strcmp($_SESSION['loggedInUser']['accessLevel'],"Doctor")!=0)
        echo'<td><form action="patientdetails.php" method="POST">
        <input name="PatientNumber" type="hidden" value="'.$row["PatientNumber"].'">
        <input class="btn-primary" type="submit" name="button" value="Details">
        </form></td>';
        if(strcmp($_SESSION["loggedInUser"]["accessLevel"],"Doctor")==0)
        echo '<td> <form action="searchpatient.php" method="POST">
        <input name="PatientNumber" type="hidden" value="'.$row["PatientNumber"].'">
       <input class="btn-primary" type="submit" name="button" value="Details">
        </form></td>';
      echo '</tr>';
  }
  echo '</tbody></table>';
  ?>
</div>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Patient File</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
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
    <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

  </body>
</html>

