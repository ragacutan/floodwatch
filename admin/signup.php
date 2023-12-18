<?php
    include "../backend/functions.php";
    include "../backend/session.php";
    
    $errors = [];

    if(isset($_POST['submit'])) {

        if(!$_POST['name']){
            $errors[] = "Name is required.";
        }

        if(!$_POST['contactNumber']){
          $errors[] = "ContactNumber is required.";
        }

        if(!$_POST['address']){
          $errors[] = "Address is required.";
        }

        if(!$_POST['email']){
            $errors[] = "Email is required.";
        }  

        if(!$_POST['password']){
            $errors[] = "Password is required.";
        }

        if(empty($errors)) {
            if(!check_existing_email($_POST['email'])){
                $user = save_registration($_POST['name'],$_POST['$ddress'], $_POST['contactNumber'], $_POST['email'], $_POST['password']);
                if(!empty($user)) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                    
                    header("Location: login.php");
                }   
            } else {
                $errors[] = "The email address is already existing.";
            }
        }
    }
?>


<?php include "layouts/_header.php"; ?>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <a href="../index.php"><img src="images/logo.png" alt="logo"></a>
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
              <span style="font-size: 20px;">
							<?php if (!empty($errors)) { ?>
								<?php include "layouts/_error-messages.php" ?>
							<?php } ?>
						  </span>
              <form method="post" class="pt-3" action="signup.php">
                <div class="form-group">
                  <label>Full Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="name" name="name" value="<?= $_POST['name'] ?? ''?>" placeholder="Full Name">
                  </div>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="address" name="address" value="<?= $_POST['address'] ?? ''?>" placeholder="Address">                        
                  </div>
                </div>
                <div class="form-group">
                  <label>Contact Number</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="number" class="form-control form-control-lg border-left-0" id="contactNumber" name="contactNumber" value="<?= $_POST['contactNumber'] ?? ''?>" placeholder="Contact Number">                        
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-email text-primary"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control form-control-lg border-left-0" id="email" name="email" value="<?= $_POST['email'] ?? ''?>" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="password" name="password" value="<?= $_POST['email'] ?? ''?>" placeholder="Password">                        
                  </div>
                </div>
                <div class="mb-4">
                  <!-- <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div> -->
                </div>
                <div class="mt-3">
                  <!-- <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit" value="SIGN UP" /> -->
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit" value="Sign Up">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-flex flex-row">
           
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <?php include "layouts/_footer.php"; ?>
