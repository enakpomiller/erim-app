<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>




<body class="hold-transition register-page">
  
<div class="register-box">
  <div class="register-logo">
    <a href="<?=base_url('dashboard/reg_admin')?>"><b><?=$title?></b> </a>
  </div>
  <div class="register-box-body">
    <p class="login-box-msg">Register as an Admin </p>
    <form method="post" action="<?=base_url('dashboard/reg_admin')?>" enctype="multipart/form-data" class="subscribeForm">
          <div class="form-group has-feedback">
            <input type="text"   name="firstname" value="<?=set_value('firstname')?>" class="form-control" placeholder="First name">
            <div class="text-danger"><?=form_error('firstname')?> </div>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text"   name="othernames" value="<?=set_value('othernames')?>" class="form-control" placeholder="Other Names">
            <div class="text-danger"><?=form_error('othernames')?> </div>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="email"   name="email" value="<?=set_value('email')?>" class="form-control" placeholder="Email">
            <div class="text-danger"><?=form_error('email')?> </div>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div> 

          <div class="form-group has-feedback">
          <label> Passport  </label>
            <input type="file"   name="userfile" value="<?=set_value('userfile')?>" class="form-control">
            <div class="text-danger"><?=form_error('userfile')?> </div>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text"   name="username" value="<?=set_value('username')?>" class="form-control" placeholder="Username">
            <div class="text-danger"><?=form_error('username')?> </div>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password"   name="password" class="form-control" placeholder="Password">
            <div class="text-danger"><?=form_error('password')?> </div>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text"   name="confpassword" value="<?=set_value('confpassword')?>" class="form-control" placeholder="Retype password">
            <div class="text-danger text-center"><?=form_error('confpassword')?> </div>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
      
            <!-- /.col -->
            <div class="col-xs-12">
               <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button> 
             
            </div>
            <!-- /.col -->
          </div>
    </form>

    <div class="col-xs-14" style="margin-top:10px;">
    <a href="<?=base_url('dashboard/admin_login')?>">
    <button type="submit" class="btn btn-danger btn-block btn-flat">I Already Have A Membership </button>
    </a>
  </div>
 
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->




<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
