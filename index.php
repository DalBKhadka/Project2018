<?php
$stylesheet="index";
$title="Home: Nobel Banks Dental";
include_once 'includes/head.php';
include_once("nav.php");
?>
<!-- mt-lg-5 pt-lg-5 mt-md-4 pt-md-4 mt-sm-5 pt-sm-5 -->
<main  class="mt-5 pt-5" role="main">
      <section class="jumbotron  text-center">
        <div class="container py-lg-5 pt-sm-5">
          <a class="navbar-brand" href="../website"><img src="img/NobelBankLogo.PNG" alt="Nobel Bank Logo in PNG" width="260"></a>
          <p class="lead text-muted">1 line Intro about Noble Banks Dental</p>
          <p>
            <button type="button" class="btn font-weight-bold btn-booknow p-md-3 my-3" id="myBtn">Book Now</button>
            <!-- <a href="#" class="btn font-weight-bold btn-booknow my-2">Book Now</a> -->
            <a href="contactus" class="btn p-md-3 font-weight-bold btn-primary my-3">Contact us</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php 
            for($i=0;$i<3;$i++)
            echo
            '<div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" height="300"  alt="Service Available" src="img/service.JPG">
                <div class="card-body">
                  <p class="card-text font-weight-bold">Dental Service '.($i+1).'</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>';?>
          </div>
        </div>
      </div>

     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="bg-danger modal-header">
          <h4 class=" modal-title text-white">Book Now</h4>
          <button type="button" class="close font-weight-bold" data-dismiss="modal">×</button>
        </div>
        <!-- Modal body -->
        <div class="bg-light modal-body">
      
        <!-- <div class="col-12">
        <button type="button" class="btn font-weight-bold btn-booknow p-md-3 my-3" id="myBtn1">Book Now</button>
        </div> -->
        <div class="col-12">
        <p class="col-10 border border-danger mx-auto py-3 bg-light font-weight-bold">Test<span class="float-right" data-feather="chevrons-right"></span></p>
        </div>
        <div class="col-12">
        <p class="col-10 border border-danger mx-auto py-3 bg-light font-weight-bold">Test<span class="float-right" data-feather="chevrons-right"></span></p>
        </div>
        
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
        <div class="col-10">
         <a class="navbar-brand" href="../website"><img src="img/NobelBankLogo.PNG" alt="Nobel Bank Logo in PNG" width="260"></a>
       </div>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    </main>
    <?php
    include_once 'footer.php';
    ?>
   <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    })



});
// $('#myModal').modal({
//     backdrop: 'static',
//     keyboard: false  // to prevent closing with Esc button (if you want this too)
// });





 

</script>
 <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
  </body>
</html>