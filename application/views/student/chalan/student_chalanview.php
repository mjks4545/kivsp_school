<style>
    .Level{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create Fee Chalan
            <small><!-- <a href="<?= site_url()?>student/">Student Home</a>  -->
            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Freate Fee Chalan
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
                <form role="form" data-toggle="validator" enctype="multipart/form-data" action="<?= site_url()?>studentpayment/studentpayfee" method="post">
                 <div class="box-body">
                      <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Student</label>
                          <select name="s_name" class="form-control">
                              <?php foreach($result as $res)?>
                              <option value="<?php echo $res->student_id ?>"><?php echo $res->student_name?></option>
                              
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Student</label>
                          <select name="s_course" class="form-control">
                              <?php foreach($course as $cors)?>
                              <option value="<?php echo $cors->co_id ?>"><?php echo $cors->co_name?></option>
                              
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Class</label>
                          <select name="s_class" class="form-control">
                              <?php foreach ($class as $cl)
                                  ?>
                              
                              <option value="<?php echo $cl->class_course_id?>"><?php echo $cl->class_course_name?></option>
                              
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      </div>
                     <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Fee Type</label>
                          <select name="fee_type" class="form-control">
                              
                              <option value="admission_fee">Admission Fee</option>
                              <option value="monthly_fee">Monthly Fee</option>
                              <option value="other_fee">Other Fee</option>
                              
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      </div>
                     
                     <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Fee</label>
                          <input type="number" class="form-control" name="fee" id="exampleIdFee" />
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
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
              