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
                        <form role="form" action="<?=  site_url()?>examination/test_report_exam_w" method="post">
                            <div class="form-group">
                                <label for="selectfield">Filter By Exam Type</label>
                                <select class="form-control" name="exam_type">
                                    <option value="0">---Select Exam Type---</option>
                                    <option  value="1stterm">First Term</option>
                                    <option selected value="2ndterm">Second Term</option>
                                    <option value="3rdterm">Final Term</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Filter" name="filter_exam" />
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

