<style>
    td, th {
        text-align: center;
    }
</style>
<?php
$session = $this->session->userdata('session_data');
$id = $session['id'];
$role = $session['role']; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-capitalize">
            <?=$role?> Dashboard
            <small><a href="<?= site_url()?>teacher/">Teacher</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                    <?php
                                   foreach($result as $res)
                                    //if($result['salary']!=0){ ?>
                
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <?php //} ?>
                Pay Remuneration
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
                        <h3 class="box-title">Pay Remuneration</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                <?php //if($result['salary']!=0){ ?>   
                     <form role="form" data-toggle="validator" action="<?= site_url()?>teacher/salarypaymentpro/" method="post">
                            <div class="col-md-12">
                                <div class="form-group col-md-3"></div>
                                <input type="hidden" name="teacher_id" value="<?php echo $res->t_id;?>">
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Total Remuneration</label>
                                    <input type="text" name="total_salary" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?php  echo $res->salary; //$result['salary']?>" readonly/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-md-3"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Paid Month</label>
                                    <select  name="paid_month"  class="form-control">
                                        <option value="01">Jan</option>
                                        <option value="02">Feb</option>
                                        <option value="03">Mar</option>
                                        <option value="04">Apr</option>
                                        <option value="05">May</option>
                                        <option value="06">Jun</option>
                                        <option value="07">Jul</option>
                                        <option value="08">Aug</option>
                                        <option value="09">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-md-3"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Year</label>
                                    <select name="salary_year" class="form-control"  required>
                                        <?php $date = date("Y");
                                                for($i=$date-5; $i<=$date+2; $i++){ ?>
                                                    <option value="<?=$i?>"><?=$i?></option>
                                                <?php } ?>
                                     </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                         <div class="col-md-12">
                                <div class="form-group col-md-3"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Reason</label>
                                    <input type="text" name="reason" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-md-3"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Enter Amount</label>
                                    <input type="text" name="amount" class="form-control" maxlength="50" minlength="2" id="exampleInputEmail1" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div>
                                    <button type="submit" class="btn btn-primary col-sm-1">Save</button>
                                </div>
                            </div>
                        </form>
                        <?php //} else{
                            //echo '<h1>No data</h1>';    
                            //}?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>

