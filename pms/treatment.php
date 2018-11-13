</head>
<?php
$stylesheet="pms";
$title="Patient Treatment";
$page="treatment";
include_once('pmsframe.php');
?>
<body>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="container mt-3">
  <h2>Activate Modal with JavaScript</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary" id="myBtn">Open Modal</button>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>
