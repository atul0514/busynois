<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Busynoi">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@Busynoi">
    <meta property="twitter:creator" content="@Busynoi">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Busynoi Admin">
    <meta property="og:title" content="Busynoi Admin Dashboard">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="Busynoi Admin Dashboard.">
    <title>Busynoi Admin Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    <section class="login-section py-5">
        <div class="container my-5">
            <div class="row justify-content-center py-5">
                <div class="col-4" style="border-radius: 6px; border:2px solid #e2e2e2;">
                  <h3 class="login-head py-4 text-center">Login</h3>
                    <?php echo form_open('login'); ?>

                    <?php
                      if($login=$this->session->userdata('invalid_login')){
                      ?>
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo $login; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php
                      }
                    ?>
                      <div class="form-group">
                        <label class="control-label h6">USERNAME</label>
                        <input class="form-control" type="text" name="uname" value="<?php echo set_value('uname'); ?>" placeholder="Enter Username" autofocus>
                        <?php echo form_error('uname'); ?>
                      </div>
                      <div class="form-group">
                        <label class="control-label h6">PASSWORD</label>
                        <input class="form-control" type="password" name="pword" placeholder="Password">
                        <?php echo form_error('pword'); ?>
                      </div>
                      <div class="form-group btn-container py-2">
                        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                      </div>
                    </form>
                    <!--   echo form_open('login','class="py-4 px-2"'); ?>
                      <h3 class="text-center py-2">Login</h3>
                        <?php echo validation_errors(); ?>
                        <?php
                            if($error=$this->session->flashdata('invalid_login')){
                          ?>
                          <div class="alert alert-danger py-1 my-1 text-center" role="alert"><?php echo $error; ?></div>
                        <?php
                            }
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address/username</label>
                            <input type="text" class="form-control" value="<?php echo set_value('uname'); ?>" name="uname" >
                            <?php echo form_error('uname'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="pword" id="exampleInputPassword1">
                            <?php echo form_error('pword'); ?>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        <?php echo form_close(); ?> -->
                </div>
            </div>
        </div>
    </section>
    <section class="login-footer py-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-center">All The Rights are reserved @2020- Busynoi.</p>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
    </body>
</html>