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
                Class Vise
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
                        <h3 class="box-title">Students Result Class Vise</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <form role="form" action="<?=site_url()?>examination/test_report_class_w" method="post">
                            <div class="form-group">
                                <label for="selectfield">Filter By Class Course Vise</label>
                                <select class="form-control" name="course">
                                    <option value="0">---Select Course---</option>
                                    <?php foreach ($result['course_result'] as $course){ ?>
                                    <option selected value="<?=$course['co_id'];?>"><?=$course['co_name'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectfield">Filter By Class Vise</label>
                                <select class="form-control" name="class_course">
                                    <option value="0">---Select Class Course---</option>
                                    <?php foreach ($result['class_course_result'] as $course){ ?>
                                    <option selected value="<?=$course['class_course_id'];?>"><?=$course['class_course_name'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectfield">Filter By Class Section</label>
                                <select class="form-control" name="section">
                                    <option value="0">---Select Section---</option>
                                    <option selected value="A">A</option>
                                    <option  value="B">B</option>
                                    <option  value="C">C</option>
                                    <option  value="D">D</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Filter" name="filter_class" />
                        </form>
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

