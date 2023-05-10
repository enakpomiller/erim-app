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
              <h3 class="box-title"> Create Users  </h3>

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
               <form action="<?=base_url('dashboard/enroll')?>" method="POST">
                     <div class="col-md-5" style="position:relative;left:20px;">
                     <?php if($this->session->flashdata('created')){?>
                   <div class="alert alert-success text-center"><?=$this->session->flashdata('created')?>  </div>
               <?php } ?>
              
                         <label> Full Name</label>
                            <div class="form-group">
                                    <input type="text"  value="<?=set_value('fullname')?>" name="fullname" class="form-control">
                                   <psan class="text-danger">  <?=form_error('fullname')?></span>
                                </div>
                            <label> Email </label>
                            <div class="form-group">
                                    <input type="email" value="<?=set_value('email')?>" name="email" class="form-control">
                                    <psan class="text-danger">  <?=form_error('email')?></span>
                                </div>
                                <?php //$types = ['passenger','driver'] ?>
                            <label> Type </label>
                               <div class="form-group">
                                    <select name="type" class="form-control">
                                      <option disabled> select </option>
                                        <option value="passenger"> passenger </option>
                                        <option value="driver"> driver </option>
                                    </select>
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