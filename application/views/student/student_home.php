<style>
    td, th {
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
            <span class="text-capitalize"><?=$role; ?></span>
            Dashboard
            <small><a href="<?= site_url() ?>admin/">
                    <span class="text-capitalize"><?=$role; ?></span>
                    </a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Students
            </small>
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
                        <h3 class="box-title">View Students</h3>
                        <?php if($role=="admin" || $role=="receptionist"){?>
                        <a href="<?= site_url() ?>student/studentlevel" type="button" class="btn btn-success pull-right">
                            <i class="fa fa-money"></i>&nbsp;&nbsp;&nbsp;Create Payment Slip</a>
                        <?php } if($role=="admin" || $role=="teacher" || $role=="receptionist"){?>
                            <a href="<?= site_url() ?>studentattendance/allcourse" type="button"
                           class="btn btn-success pull-right"><i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;Attendance</a>
                        <?php } if($role=="admin" || $role=="receptionist"){?>
                            <a href="<?= site_url() ?>studentpayment/viewstd" type="button"
                           class="btn btn-success pull-right"><i class="fa fa-graduation-cap"></i>&nbsp;&nbsp;&nbsp;Payment Detail</a>
                        <a href="<?= site_url() ?>student/addstudent" type="button" class="btn btn-success pull-right">
                            <i class="glyphicon glyphicon-plus"></i>
                            &nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Student
                        </a>
<!--                         <a href="<?= site_url() ?>student/asignsection" type="button" class="btn btn-success pull-right">
                            <i class="glyphicon glyphicon-plus"></i>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assign Section
                        </a>-->
                        <a href="<?= site_url() ?>student/studentclassview" type="button" class="btn btn-success pull-right">
                            <i class="glyphicon glyphicon-plus"></i>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student View Class vice
                        </a>
 
                                               <?php } ?>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <?php if($role=="admin" || $role=="receptionist"){ ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Student Name</th>
                                <th>Father Name</th>
                                <th>Address</th>
                                <th>Status</th>

                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result==0) {?>
                            <?php } else {
                                $sno = 1;
                                foreach ($result as $array) { ?>
                                    <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $array->student_name ?></td>
                                        <td><?= $array->std_father_name ?></td>
                                        <td><?= $array->student_address?></td>
                                        <td><?php  if($array->student_status==1){?>
                                                <i class="label label-success">Active</i>
                                            <?php }else{ ?>
                                                <i class="label label-danger">Deactive</i>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url() ?>student/studentdetails/<?= $array->student_id ?>"
                                               type="button" class="btn btn-primary">
                                                <i class="fa fa-eye" alt="View details of this Visitor"
                                                   aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;View Details</a>&nbsp;&nbsp;&nbsp;
                                                
                                        </td>
                                    </tr>
                                    <?php $sno++;
                                }
                            } ?>
                        </table>
                        <?php } ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>

