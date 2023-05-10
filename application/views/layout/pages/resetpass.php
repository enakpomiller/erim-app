
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title?>
        <small><?="Drivers Registration "?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> <?php echo $title ?>  </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->


              <div class="box-body">
                    <div class="row" style="margin-top:20px;margin-bottom:20px;">
                    <form action="<?=base_url('dashboard/resetpassword')?>" method="POST">
                          <div class="col-md-5" style="position:relative;left:20px;">
                          <?php if($this->session->flashdata('changed')){?>
                          <?=$this->session->flashdata('changed')?>  
                    <?php } ?>
                     
                         <label> Old Password </label>
                            <div class="form-group">
                                    <input type="password" required value="<?=set_value('oldpassword')?>" name="oldpassword" class="form-control">
                                   <psan class="text-danger">  <?=form_error('fullname')?></span>
                                </div>
                            <label> New Password  </label>
                            <div class="form-group">
                                    <input type="password" required value="<?=set_value('password')?>" name="password" class="form-control">
                                    <psan class="text-danger">  <?=form_error('email')?></span>
                                </div> 
                                <p>
                                <label> Confirm Password  </label>
                                  <div class="form-group">
                                          <input type="password" required  name="confpassword" class="form-control" id="password" value="<?=set_value('confpassword')?>">
                                          <i class="bi bi-eye-slash" id="togglePassword" style="position:relative;bottom:30px;left:95%;"></i>
                                        </p>
                                      
                                      </div>
                      
                                <button type="submit" class="btn btn-primary" style="width:100%;"> Register </button>
                      </div>
                  </form>
            </div>
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->





  
          <!-- /.row -->




        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





  <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>