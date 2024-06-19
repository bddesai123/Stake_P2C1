
<style>
    .form_bg .container .form_container form .form_title {
    max-width: 280px;
    margin: 32px auto 54px;
    text-align: center;
}
</style>

 <!--====login section start====-->
    <section class="form_bg">
        <div class="container">
             <?php 
                         $success['param']='success';
                            $success['alert_class']='alert-success';
                            $success['type']='success';
                            $this->show->show_alert($success);
                            ?>
                                <?php 
                            $erroralert['param']='error';
                            $erroralert['alert_class']='alert-danger';
                            $erroralert['type']='error';
                            $this->show->show_alert($erroralert);
    
                            //echo form_open('login', 'class="login_form"');
    
                                
                    
                        ?>
            <div class="form_container">
               <!-- <div class="form_header">
                    <a href="index.html" class="registration_logo">
                        <img src="<?= $this->conn->company_info('logo');?>" class="" alt="<?= $this->conn->company_info('company_name');?>" style="width:<?php echo $this->conn->company_info('logo_width');?>;height:<?php echo $this->conn->company_info('logo_height');?>">
                    </a>
                </div>-->
                <form action="#" method="POST" class="mt-60">
                    <h1 class="form_title" style= "margin-top:80px;">Log in</h1>
                    <div class="mb-3">
                        <label for="email" class="form-label">Username</label>
                        <input type="text" placeholder="Enter Your Username" name="username" class="form-control para" id="username" required="required">
                    </div>
                    <div class="mb-3">
                        <label for="password-field" class="form-label">Password</label>
                        <div class="show_password">
                            <input type="password" placeholder="Enter Your Password" name="password" class="form-control para" id="password-field" required="required">
                            <i class="fas fa-eye toggle-password"></i>
                        </div>
                        <a href="<?= base_url('forgot');?>" class="para" id="forgot">Forgot Password?</a>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login Now!</button>
                    <div class="form_footer">
                        <!-- <span>OR</span>
                        <div class="social_container d-flex align-items-center">
                            <div class="facebook">
                                <a href="#" class="para d-flex align-items-center justify-content-evenly"><img src="assets/images/contact/facebook.png" alt="Sign Up With Facebook"> FACEBOOK</a>
                            </div>
                            <div class="google">
                                <a href="#" class="para d-flex align-items-center justify-content-evenly"><img src="assets/images/contact/google.png" alt="Sign Up With Google"> GOOGLE</a>
                            </div>
                        </div> -->
                        <p class="para">I don't have an account. <a href="<?= base_url('register');?>">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--====login section end====-->
