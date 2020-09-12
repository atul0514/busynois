    
    <!--Page Info-->
    <section class="page-info">
        <div class="auto-container clearfix">
            <div class="pull-left"><h2>Login</h2></div>
            <div class="pull-right">
                <ul class="bread-crumb clearfix">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
    </section>    
    <!--login Section-->
    <section class="register-section">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Form Column-->
                <div class="col-md-4 col-md-offset-4">
                
                    <div class="sec-title medium">
                        <h2>Login Now</h2>
                    </div>
                    
                    <!--Login Form-->
                    <div class="styled-form login-form">
                        <?php 
                            $attributes = array('class' => 'login-form', 'id' => 'myform');
                            echo form_open('Login', $attributes); 
                        ?>
                            <div class="form-group">
                                <span class="adon-icon"><span class="fa fa-user"></span></span>
                                <input type="text" name="uname" value="<?php echo set_value('uname'); ?>" placeholder="Enter Username *">
                                <p><?php echo form_error('uname'); ?></p>
                            </div>
                            <div class="form-group">
                                <span class="adon-icon"><span class="fa fa-unlock-alt"></span></span>
                                <input type="password" name="pword" value="<?php echo set_value('pword'); ?>" placeholder="Enter Password">
                                <?php echo form_error('pword'); ?>
                            </div>
                            <div class="clearfix">
                                <div class="form-group">
                                    <input type="submit" class="theme-btn btn-style-two btn-block" value="Login">
                                </div>
                            </div>
                            
                            <div class="clearfix">
                                <div class="pull-left">
                                    <input type="checkbox" id="remember-me"><label for="remember-me">&nbsp; Remember Me</label>
                                </div>
                            </div>
                            
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--login Section End-->