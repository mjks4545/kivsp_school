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
            <small><a href="<?= site_url()?>Academic/">Academic</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Level
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
                        <h3 class="box-title">View Level</h3>
                        <a href="<?= site_url() ?>course/addclasscourseview" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add Class Course</a>
                        <a href="<?= site_url() ?>course/addcourseview" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add Course</a>
                        
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Level Title</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                             $sno=1;
                                foreach($result as $data){?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $data->co_name; ?></td>
                                        <td><?php echo $data->class_course_name; ?></td>
                                        <td><?php echo $data->c_section_name; ?></td>
                                        <td><?php echo $data->subjects; ?></td>
                                        <td><?php echo $data->created_date; ?></td>
                                        <td><?php echo $data->created_time; ?></td>
                                        <td>
                                            <a href="<?=site_url()?>course/updateclasscourse/<?= $data->c_section_id;?>/<?= $data->class_course_id;?>/<?= $data->co_id;?>" type="button" class="btn btn-primary">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;Edit
                                            </a>
                                            <a href="<?= site_url() ?>course/deleteclasscourse/<?= $data->c_section_id?>" onclick="return confirm('Do You Want To Delete This?')" type="button" class="btn btn-danger">
                                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $sno++; } ?>
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

