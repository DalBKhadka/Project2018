<?php
$stylesheet="contact";
$title="Home: Nobel Banks Dental";
$submitResponse="";
include_once 'includes/head.php';
include_once("nav.php");
?>
<div class="mt-5 pt-5 container">
  <div class="mt-4 row justify-content-center">
    <div class="col-lg-10 col-md-8 col-lg-6 pb-5">
                    <form action="mail.php" method="post">
                        <div class="card border-0 rounded-1">
                            <div class="card-header p-0">
                                <div class="text-white py-2">
                                    <h3 class="text-primary font-weight-bold"><i class=" fa fa-envelope"></i> Write to us</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <!--Body-->
                                <!-- For submit response -->
                                <div class="form-group input-group input-group-sm bg-transparent">
                                        <input disabled type="text" class=" border-0 form-control bg-transparent text-center input-sm" id="submitResponse" value="<?php echo $submitResponse;?>" name="submitResponse">
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class=" text-primary fa fa-user"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="text-primary fa fa-envelope"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="text-primary fa fa-mobile"></i></div>
                                        </div>
                                        <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number (Optional)">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="text-primary fa fa-comment"></i></div>
                                        </div>
                                        <textarea  class="form-control" placeholder="Your Message*" maxlength="100" rows="10" required></textarea>
                                    </div><div class="text-danger help-block">*Limit of 100 words applies.</div>
                                </div>
                                <div class="text-right ">
                                    <input type="submit" value="Submit" class="btn btn-primary font-weight-bold rounded-1 py-2 mb-4">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
  </div>
</div>
<?php
    include_once 'footer.php';
?>
</body>
</html>