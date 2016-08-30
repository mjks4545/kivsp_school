<style>
    td, th {
        text-align: center;
    }
</style>
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
                           
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Course Name</th>
                                <th>Class</th>
                                <th>Section</th>
                               
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result==0) {?>
                            <?php } else {
                                $sno = 1;
                                foreach ($result as $arr) {
                                    ?>
                                    
                                <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $arr->co_name ?></td>
                                        <td><?= $arr->class_course_name ?></td>
                                        <td><?= $arr->c_section_name ?></td>
                                        <td>
                                            <a href="<?= site_url() ?>student/studentclassviceview/<?= $arr->co_id?>/<?= $arr->class_course_id ?>/<?= $arr->c_section_name?>"
                                               type="button" class="btn btn-primary">
                                                <i class="fa fa-eye" alt="View details of this Visitor"
                                                   aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;View</a>&nbsp;&nbsp;&nbsp;
                                        
                                            <a href="<?= site_url() ?>Examination/test_form/<?= $arr->co_id?>/<?= $arr->class_course_id ?>/<?= $arr->c_section_name?>"
                                               type="button" class="btn btn-primary">
                                                <i class="fa fa-eye" alt="View details of this Visitor"
                                                   aria-hidden="true"></i>
                                                Make A Test</a>&nbsp;&nbsp;&nbsp;
                                            
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

