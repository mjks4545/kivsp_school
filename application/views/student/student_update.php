<style>
    .course{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Student
            <?php foreach ($result as $data) {?>
            <small>
                <a href="<?= site_url()?>student/">Student Home</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url()?>student/viewstudents">View Students</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url()?>student/studentdetails/<?= $data->student_id?>">Student Details</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Update Student</small>
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
                        <h2 class="box-title text-primary ">Update Student</h2>
                        <a href="<?= site_url()?>student/studentdetails/<?= $data->student_id?>"class="pull-right"> Back</a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url()?>student/updatestudentpro/<?= $data->student_id?>" method="post">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="student_name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?= $data->student_name?>" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Father Name</label>
                                    <input type="text" name="father_name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?= $data->std_father_name?>" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="<?= $data->student_address?>" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                    <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" value="<?= $data->student_phone?>" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Fee</label>
                                    <input type="text" name="fee" class="form-control" id="exampleInputEmail1" value="<?= $data->student_fee?>" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary col-sm-1 pull-right ">Update</button>
                        </div>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>

    </section>
</div>
