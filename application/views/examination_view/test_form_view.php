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
                        <h3 class="box-title">Exam Arrangement Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <form role="form" method="post" action="<?=site_url();?>examination/test_submition" >
                            <input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="course_id" />
                            <input type="hidden" value="<?php echo $this->uri->segment(4);?>" name="class_course_id" />
                            <input type="hidden" value="<?php echo $this->uri->segment(5);?>" name="class_section_name" />
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Exam Type :</label>
                                    <select class="form-control" name="exam_type">
                                        <option value="0">---Select Test Type---</option>
                                        <option value="1stterm">First Term</option>
                                        <option value="2ndterm">Second Term</option>
                                        <option value="3rdterm">Final Term</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Field Of Study</label>
                                    <input type="text" name="field_study" value="<?=$data['dvm'][0]['co_name'];?>" class="form-control" readonly="" />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                    
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Class</label>
                                    <select class="form-control" name="class_course_id">
                                        <option value="0">---Select Class---</option>
                                        <?php for($counter=0;$counter<count($data['class']);$counter++) { ?>
                                        <option value="<?=$data['class'][$counter]['class_course_id']; ?>"><?=$data['class'][$counter]['class_course_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>

                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Class Section</label>
                                    <select class="form-control" name="class_section">
                                        <option value="0">---Select Section---</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Exam Date</label>
                                    <input type="date" name="exam_date" class="form-control" id="exampleInputEmail1"  required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>

                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Exam Total Marks</label>
                                    <input type="number" name="total_mark" class="form-control" id="phone" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Exam Month</label>
                                    <select class="form-control" name="exam_month">
                                        <option value="0">---Select Month---</option>
                                        <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="july">July</option>
                                        <option value="august">August</option>
                                        <option value="sep">Sep</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary col-sm-1 pull-right ">Submit  <div class="fa fa-angle-double-right"></div></button>
                        </div>
                    </form>
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

