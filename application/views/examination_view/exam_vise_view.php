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
            <small><a href="<?= site_url(); ?>student/">Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Exam Type
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
                        <h3 class="box-title">Students Result Exam Vise</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table">
                            <th>S.No</th>
                            <th>Student Name</th>
                            <th>Course</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Exam Type</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                            <th>Test Date</th>
                            <?php 
                            $counter = 1;
                            foreach($result as $results)
                            {
                            ?>
                            <tr>
                                <td><?=$counter;?></td>
                                <td><?=$results['student_name'];?></td>
                                <td><?=$results['co_name'];?></td>
                                <td><?=$results['class_course_name'];?></td>
                                <td><?=$results['class_section_name'];?></td>
                                <td><?=$results['exam_type'];?></td>
                                <td><?=$results['exam_marks'];?></td>
                                <td><?=$results['marks_obt'];?></td>
                                <td><?=$results['exam_date'];?></td>
                            </tr>
                            <?php $counter++; } ?>
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


<?php

/* licence to hanif jadoon
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
