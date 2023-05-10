


      <body class="hold-transition login-page">
      <div class="login-box">
        <div class="login-logo">
          <a href="<?=base_url('')?>"><b> <?=$title?> </a>
        </div>
        <!-- /.login-logo -->
            <div class="login-box-body">
              <p class="login-box-msg"> 
                 <?php if(($this->session->flashdata('error'))) {  ?>
                    <?=$this->session->flashdata('error')?>
                  <?php unset($_SESSION['error']); }?>
                

          <form action="<?=base_url('dashboard/forgetpassword')?>" method="POST">
            <div class="form-group has-feedback" style="margin-top:20px;">
              <input type="text" name="email" value="<?=set_value('email')?>" class="form-control pt-2 pb-2" placeholder="Email">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" value="<?=set_value('password')?>"  name="password" class="form-control" placeholder="password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="confpassword" value="<?=set_value('confpassword')?>"  class="form-control" placeholder=" Confirm Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <div class="col-xs-14" style="margin-top:10px;">
                <a href="<?=base_url('dashboard/admin_login')?>">
                <button type="submit" class="btn btn-info btn-block btn-flat"> Admin Login </button> 
            </a>
            <div class="col-xs-14" style="margin-top:10px;">
                <a href="<?=base_url('dashboard/reg_admin')?>">
                <button type="submit" class="btn btn-danger btn-block btn-flat"> New Membership</button> 
            </a>
        </div>
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
