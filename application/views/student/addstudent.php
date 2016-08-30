<style>
    .Level{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add New Student
            <small><!-- <a href="<?= site_url()?>student/">Student Home</a>  -->
            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Add New Student
            </small>
          </h1>
        </section>
        <!-- Main content -->
        <?php $this->load->view('include/alert')?>
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title text-primary ">Step-I</h2>
                  <a href="<?= site_url()?>student/"class="pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" data-toggle="validator" enctype="multipart/form-data" action="<?= site_url()?>student/addstudentpro" method="post">
                 <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" name="student_name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Name" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Father Name</label>
                          <input type="text" name="father_name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Father Name" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                       
                    </div>
                     <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Address</label>
                          <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                        </div>

                         <div class="form-group has-feedback col-md-6">
                              <label for="exampleInputEmail1">Phone</label>
                              <input type="phone" name="phone" class="form-control" id="phone" placeholder="Enter Phone #" required />
                               <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                               <span class="help-block with-errors" style="margin-left:10px; "></span>
                         </div>
                         <div class="form-group has-feedback col-md-6">
                              <label for="exampleInputEmail1">CNIC</label>
                              <input type="number" name="cnic" class="form-control" id="cnic" maxlength="14" minlength="14" placeholder="Enter CNIC #" required />
                               <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                               <span class="help-block with-errors" style="margin-left:10px; "></span>
                         </div>
                    </div>
                     
                     </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary col-sm-1 pull-right ">Next  <div class="fa fa-angle-double-right"></div></button>
                </div>
             </form>
          </div><!-- /.box -->
       </div>
     </div>
   </section>
</div>
              