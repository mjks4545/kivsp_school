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
        <h1 class="text-capitalize">
            <?=$role?> Dashboard
            <?php if($role=="admin" || $role=="receptionist"){ ?>
            <small><a href="<?= site_url() ?>student/">Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>studentpayment/viewstd">All Students</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Student
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
                        <h3 class="box-title">View Students</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Course</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result == 0) { ?>
                            <?php } else {
                                $sno = 1;
                                foreach ($result as $array) {
                                    ?>
                                 <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $array->student_name ?></td>
                                        <td><?= $array->std_father_name ?></td>
                                        <td><?= $array->co_name ?></td>
                                        <td><?= $array->class_course_name ?></td>
                                        <td><?= $array->c_section_name ?></td>
                                    <?php if($role=="admin" || $role=="receptionist"){ ?>
                                        <td><a class="btn btn-success"
                                               href="<?= site_url() ?>studentpayment/paynow/<?php echo $array->student_id; ?>/<?php echo $array->co_id; ?>/<?php echo $array->c_section_name?>">
                                                <span class="fa fa-money"></span>
                                                &nbsp;&nbsp;Pay Monthly Fee
                                            </a>
                                        </td>
                                     <?php } ?>
                                        <td><a class="btn btn-success"
                                               href="<?= site_url() ?>studentpayment/otherpay/<?php echo $array->student_id; ?>/<?php echo $array->co_id; ?>/<?php echo $array->c_section_name?>">
                                                <span class="fa fa-money"></span>
                                                &nbsp;&nbsp;Pay Other Fee
                                            </a>
                                        </td>
                                        
                                    </tr>
                                    <?php $sno++;
                                }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>

