<?php
    require '../backend/db.php';
    include "../backend/functions.php";
    include "../backend/session.php";

    $errors = [];

    if(isset($_POST['submit'])){

        if(!$_POST['email']){
            $errors[] = "Email is Required";
        }

        if(!$_POST['password']){
            $errors[] = "Password is Required";
        }


        global $connection;
        $sql = "SELECT * FROM users WHERE email = '".$_POST['email']."'";
        $result = mysqli_query($connection, $sql);

        $user = mysqli_fetch_object($result);
        
        if(empty($errors) && $user->user_type == "admin") {
            $user = login_account($_POST['email'], $_POST['password']);
            if(!empty($user)) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];

                header("Location: landing.php");
            } else{
                $errors[] = "The email address or password that you've entered does not match any account.";
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
                <span style="font-size: 40px; font-weight: bold;">Flood Watch</span>
              </div>
              <h4>Welcome back!</h4>
              <h6 class="font-weight-light">Happy to see you again!</h6>
              <span style="font-size: 20px;">
							<?php if (!empty($errors)) { ?>
								<?php include "layouts/_error-messages.php" ?>
							<?php } ?>
						  </span>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control form-control-lg border-left-0" name="email" value="<?= $_POST['email'] ?? ''?>" id="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="password" name="password" value="<?= $_POST['password'] ?? ''?>" placeholder="Password">                        
                  </div>
                </div>
                <div class="my-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit" value="Login">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="signup.php" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
<?php include "layouts/_footer.php"; ?>