<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/raisin.png">
    <title>Login</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://colorlib.com/polygon/concept/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="https://colorlib.com/polygon/concept/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://colorlib.com/polygon/concept/assets/libs/css/style.css">
    <link rel="stylesheet" href="https://colorlib.com/polygon/concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .btn-log {
        background-color: #866139;
        color: white;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <span class="splash-description text-dark">
                    <strong>LOGIN</strong>
                    <!-- <span class="splash-description text-small mt-3">Silahkan login terlebih dahulu.</span> -->
                    <!-- <i class="fa fas fa-sign-in-alt"></i> -->
                    <!-- Silahkan login terlebih dahulu -->
                </span>
            </div>
            <div class="card-body">
                <form method="POST" action="<?=base_url('auth');?>">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                    </div>
                    <!-- <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div> -->
                    <br>
                    <button type="submit" class="btn btn-log btn-lg btn-block">Masuk</button>
                </form>
                <p>
                   <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
                      <div class="alert alert-warning">
                         <?php echo session()->getFlashdata('gagal') ?>
                      </div>
                   <?php } ?>
                </p>
            </div>
            <!-- <div class="card-footer bg-white p-0 text-center">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
                <div class="card-footer-item card-footer-item-bordered">RSUD dr. Haryoto Lumajang</div>
            </div> -->
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="https://colorlib.com/polygon/concept/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="https://colorlib.com/polygon/concept/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>