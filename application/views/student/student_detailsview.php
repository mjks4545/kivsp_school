<style>
    td, th {
        text-align: center;
    }

    .name {
        margin-top: 10px;2
    }

    .ad {
        text-align: center;
    }
</style>
<?php
$session = $this->session->userdata('session_data');
$id= $session['id'];
$role = $session['role'];  ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$role?> Dashboard

            <?php
            foreach ($resul as $data) {
                if($role=="admin"){?>
            <small><a href="<?= site_url() ?>student/">Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>student/viewstudents/<?= $data->student_id?>">View Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>Details
            </small>
            <?php } ?>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>

                        <h3 class="box-title">Student Details</h3>
                        <?php if($role=="admin"){?>
                        <!-- for student img-->
                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title text-primary">Image Upload</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-offset-1">
                                                <form action="<?= site_url() ?>student/img_upload/<?=$data->student_id?>" enctype="multipart/form-data" method="post">
                                                    <label class="text-primary">Image</label>
                                                    <input type="file"  name="img" class="form-control" style="border:1px solid; " required>
                                                    <hr/>
                                                    <input type="submit" class="btn btn-primary pull-right" name="submit" value="Upload">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- for student img-->
                        <?php } ?>
                    </div>
                    
                    <div class="col-md-12 "><hr></div>
                    <!-- /.box-header -->
                    <div class="box-body">

                            <div class="col-md-12 "><h3>Personal Information</h3>
                                <?php if($role=="admin"){?>
                                <a href="<?= site_url()?>student/updatestudent/<?= $data->student_id?>"style="position:relative;bottom: 30px;" class="btn btn-info pull-right" type="button">Update</a>
                                <?php } ?>
                            </div>

                            <div class="col-md-12 col-sm-offset-1">
                                <!-- general form elements -->

                                <div class="col-md-4">
                                    <div class="form-group name"><label>Registration No : </label> <?= $data->student_id?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group name"><label>Name : </label> <?= $data->student_name?>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12 col-sm-offset-1">
                                <!-- general form elements -->
                                <div class="col-md-4">
                                    <div class="form-group name"><label>Father Name : </label> <?= $data->std_father_name?>
                                    </div>
                                </div>
                         <div class="col-md-4">
                                    <div class="form-group name"><label>Address : </label> <?= $data->student_address?>
                                    </div>
                                </div>
                           
                            </div>
                        <div class="col-md-12 col-sm-offset-1">
                                <div class="col-md-4">
                                    <div class="form-group name"><label>Phone : </label> <?= $data->student_phone?>
                                    </div>
                                </div>
                                
                            </div>
                        <?php }?>
                        <div class="col-md-12"><hr></div>
                        <div class="col-md-12 ">
                            <h3>Subject Information
                                <?php if($role=="admin"){?>
                                &nbsp;<a class="btn btn-info btn-xs" href="<?php echo site_url("student/add_newclass/".$data->student_id); ?>">
                                    Add New class
                                </a>
                            <?php } ?>
                            </h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Course</th>
                                <th>Class</th>
                                <th>Section</th>
                                <?php if($role=="admin"){?>
                                <th class="text-center">Actions</th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php   $total=0;
                            if($class == 0) {?><?php } else {
                                $sno=1;
                            foreach ($class as $cls)
                            {?>
                            <tr>
                                <td><?= $sno;?></td>
                                <td><?= $cls->co_name;?></td>
                                <td><?= $cls->class_course_name?></td>
                                <td><?= $cls->c_section_name?></td>
                                <?php if($role=="admin"){?>
                                <td>
                                  <?php  ?>
                                    <a href="<?= site_url() ?>student/studentclassstatus/<?php echo $cls->student_id.'/0/'?>"  type="button" class="btn btn-success">
                                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                        &nbsp;&nbsp;&nbsp;Active</a>
                                  <?php  ?>
                                    <a href="<?= site_url() ?>student/studentclassstatus/<?php echo $cls->student_id.'/1/'?>"  type="button" class="btn btn-danger">
                                        <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                                        &nbsp;&nbsp;&nbsp;Deactive</a>
                                <?php  ?>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php  $sno++; }?>
                            <?php }?>
                         </tbody>
                        </table>
                         <div class="col-md-12"><hr></div>
                        <div class="col-md-12 "><h3>Financial Information
                                <a class="btn btn-info btn-xs" href="<?php echo site_url().'studentpayment/studentclass/'.$data->student_id; ?>">Payment Detail</a>
                            </h3>
                        </div>
                            <?php
                            if( !empty( $fee ) ){
                            foreach ($fee as $f)
                            
                             ?>
                         <div class="col-md-12"><h4><b>Monthly Fee<b> <?= $f->fee;?></h4>
                            <?php }?>
                                         </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Total Paid Amount</th>
                                <th>Remaining Amount</th>
                                
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                
                                <?php
                                  if( !empty( $monthlydetail ) ){
                                     foreach ($monthlydetail as $mdp)?>
                               
                                <?php $sno=1;?>
                                    <td><?php echo $sno;?></td>
                                <td><?php echo $mdp->std_date;?></td>
                                    <td><?php echo $mdp->total_paid;?></td>
                                    <td>
                                    <?php
                                        echo $mdp->remain_fee;
                                    ?>
                                    </td>
                                       <?php }?>
                            </tr>
                        </table>

                        <div class="col-md-12"><h4><b>Other Fee<b></h4>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Total Paid Amount</th>
                                <th>Remaining Amount</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <?php 
                                if( !empty( $otherpaydate ) ){
                                foreach ($otherpaydate as $opd)?>
                                <?php $sno=1;?>
                                <td><?php echo $sno; ?></td>
                                
                                <td><?php echo $opd->otherpay_created_date;?>
                                <?php }?>
                                </td>
                                
                                <?php 
                                if( !empty( $otherfeed ) ){
                                foreach ($otherfeed as $ofd);?>
                                <td><?php echo $ofd->paid_amt;?></td>
                                
                                        <td><?php
                                        echo $ofd->otherfee_remain;?>
                                        </td>
                                <?php }?>

                            </tr>
                        </table>



    </section>
</div>




