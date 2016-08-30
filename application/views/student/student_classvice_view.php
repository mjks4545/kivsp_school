<style>
    td, th {
        text-align: center;
    }
</style>
<?php
$c_id=$this->uri->segment(3);
$cc_id=$this->uri->segment(4);
$cs_id=$this->uri->segment(5);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small><a href="<?= site_url() ?>student/">Student</a>
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
                        <a href="<?= site_url() ?>student/addstudent" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Student</a>
                           <a href="<?= site_url() ?>studentpayment/createfullchalan/<?php echo $c_id; ?>/<?php echo $cc_id;?>/<?php echo $cs_id;?>" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Create Chalan&nbsp;&nbsp;for all</a>
                           
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Student Name</th>
                                <th>Course Name</th>
                                <th>Class Name</th>
                                <th>Section Name</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result==0) {?>
                            <?php } else {
                                $sno = 1;
                            ?>
                                <?php foreach ($result as $res)
                                {
                                   
                                    ?>
                                        <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $res->student_name?></td>
                                        <td><?= $res->co_name?></td>
                                        <td><?= $res->class_course_name?></td>
                                        <td><?= $res->c_section_name?></td>
                                        <td>
                                             <a href="<?= site_url() ?>studentpayment/studentchalanview/<?= $res->student_id?>/<?= $res->class_course_id?>"
                                               type="button" class="btn btn-primary">
                                                <i class="fa fa-eye" alt="View details of this Visitor"
                                                   aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;Create Chalan</a>&nbsp;&nbsp;&nbsp;
                                                <a href="<?= site_url() ?>studentpayment/stdpayment/<?= $res->student_id?>/<?= $res->co_id?>/<?php echo $res->class_course_id?>/<?php echo $this->uri->segment(5); ?>"
                                               type="button" class="btn btn-primary">
                                                <i class="fa fa-money" alt="View details of this Visitor"
                                                   aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;Student Payment</a>&nbsp;&nbsp;&nbsp;
                                                 <a href="<?= site_url() ?>student/studentprofile/<?= $res->student_id?>/<?= $res->co_id?>/<?php echo $res->class_course_id?>/<?php echo $this->uri->segment(5); ?>"
                                               type="button" class="btn btn-primary">
                                                <i class="fa fa-print" alt="View details of this Visitor"
                                                   aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;Student Profile</a>&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                    <?php $sno++;
                            }
                            }
                            ?>
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

