  



<!-- datatable bootstrap -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
<!-- enddatatable bootstrap -->

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
              <h3 class="box-title"> Passengers Records  </h3>

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

                
               <table class="table table-striped" id="table" style="width:80%;margin:auto;">
        
                    <thead class="bg-black">
                        <tr>
                        <th scope="col">s/n</th>
                        <th scope="col">Full Name </th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col" style="float:right;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count =1; foreach($allpassengers as $rows){?>
                        <tr>
                            <td> <?=$count++;?> </td>
                            <td>  <?=$rows->fullname?></td>
                            <td>  <?=$rows->email?></td>
                            <td>  <?=$rows->type?></td>
                            <td style="float:right;">
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$rows->id?>">Edit </a>
                                <a href="<?=base_url('dashboard/deletepassenger/'.$rows->id)?>" onclick="return confirm(' are you sure you want to delete this record')" class="btn btn-danger"> Delete </a>
                            </td>
                        </tr>

                            <!-- Modal -->
                            <div class="modal fade"  id="exampleModal<?=$rows->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog"  role="document">
                                <div class="modal-content" style="width:80%; margin:auto;margin-top:100px;">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-center" id="exampleModalLabel">Edit Passengers Record</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                             <form action="<?=base_url('dashboard/passengers')?>" method="POST"> 
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label> Full Name  </label>
                                        <input type="hidden" name="id" value="<?=$rows->id?>">
                                        <input type="text" name="fullname" class="form-control" style="width:100%;" value="<?=$rows->fullname?>">
                                    </div>
                                    <div class="form-group">
                                        <label> Email   </label>
                                        <input type="email" name="email" class="form-control" style="width:100%;" value="<?=$rows->email?>">
                                    </div>
                                    <div class="form-group">
                                        <label> Type   </label>
                                        <input type="text" readonly class="form-control" style="width:100%;" value="<?=$rows->type?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                                </div>
                            </div>
                            </div>
                            <!-- end modal --> 
                        <?php }?>
                    </tbody>
                 </table>
                
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

<!-- datatable script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
<!-- end datatable script -->

  <script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable();
});
</script>

