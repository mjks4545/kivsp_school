<style>
    td, th {
        text-align: center;
    }

    .name {
        margin-top: 10px;
    }

    .ad {
        text-align: center;
    }
    
</style>
<style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the initial value */
            margin: 0mm;  
            /* this affects the margin in the printer settings */
     }
        @media print {
        strong.note {
            display:block;
            bottom:0;
            position:fixed;
            font-size:15px;
            margin-left: 150px;  
          
        }
    }
</style>

<?php $session = $this->session->userdata('session_data');
$role = $session['role']; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <h3>
                Invoice:
                <span><?php
                    $length = 10;
                    $characters = '0123456789';
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, strlen($characters) - 1)];
                    }
                    echo  $randomString;

                    ?></span>
            </h3>
        </section>
    
   
    <!-- Main content -->
    <div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Note:</h4>
                This page has been enhanced for printing.Press Ctrl+P.
                <?php // print_r($teacher); ?>
                <?php // print_r($paymentdetail); ?>
            </div>
        </div>
     <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-sm-12 col-xs-12">

                        <img src="<?php echo site_url() ?>public/img/kivsp_logo.jpg" class="img-responsive" style="height:100px;margin-bottom:-40px;  "/>
                    <h2 class="page-header text-center">
                        Khyber Institute of Veterinary Science Peshawar
                        <small class="pull-right" style="margin-right:20px; ">Date&nbsp;:&nbsp;<?php echo date("d-M-Y"); ?></small>
                    </h2>
                </div><!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Khyber Institute of veterinary science</strong><br>
                        Khyber pakhtunkhwa Peshawar,<br>
                        KPK,Pakistan<br>
                        Phone:091-5845678<br>
                        Email: info@kivsp_school.com
                    </address>
                </div><!-- /.col -->
            </div>
     </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>

                        <h3 class="box-title">Teacher Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php foreach ($teachers as $teacher){ ?>
                        <div class="col-md-12 "><h3>Personal Information</h3>
                           
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Teacher Name : </label><?= $teachers['0']->name; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Contact Number
                                        : </label><?= $teachers['0']->contact; ?></div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Teacher CNIC : </label><?= $teachers['0']->cnic; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Address : </label><?= $teachers['0']->address; ?>
                                </div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Date : </label><?= $teachers['0']->created_date; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Time : </label><?= $teachers['0']->created_time; ?>
                                </div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Gender :</label>
                                    <?= $teachers[0]->t_gender; ?>
                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>
                            <?php if ($role == "admin"){ ?>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Password : </label><?= $teachers['0']->password; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name">

                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">Change
                                        Password </a>

                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Email :</label>
                                    <?= $teachers[0]->email; ?>
                                </div>
                            </div>

                        </div>
                        <!-- for class-->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <br>
                            <br>
                            <div class="col-md-12"><h3>Subject Information</h3>
                            </div>


                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Change Teacher Password</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form method="post"
                                                  action="<?php echo base_url('teacher/change_teacher_password') ?>">
                                                <div class="form-group">
                                                    <label>Old Password:</label>
                                                    <input type="text" class="form-control" name="oldPassword"
                                                           value="<?= $teachers[0]->password; ?>" readonly />
                                                    <input type="hidden" class="form-control" name="pass_id"
                                                           value="<?= $teachers[0]->id; ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>New Password:</label>
                                                    <input type="text" name="pwd" maxlength="18" minlength="6" required class="form-control"/>
                                                </div>

                                                <button type="submit" class="btn btn-info">Change Password</button>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!------------table start----------------------------------->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover" style="margin-top:20px;">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Subject</th>
                                        <th>Salary</th>
                                        <td>Total</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($subject == 0) {
                                    } else {
                                        $sno = 1;
                                        foreach ($subject as $sub) {
                                            ?>
                                            <tr>
                                                <td><?= $sno; ?></td>
                                                <td><?= $sub->su_name; ?></td>
                                                <td><?= $sub->salary; ?>&nbsp;Rs.</td>
                                                <?php $per = $sub->salary / 100;?>
                                                <?php $salary = $per * $teacher_pesi = $this->teacher_m->sallrypersubject($sub->t_id, $sub->su_id);?>
                                                <td><?php if ($salary == '') {
                                                    } else {
                                                        echo $salary;
                                                    } ?></td>
                                            </tr>
                                            <?php $sno++;
                                        }
                                    } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- end of class-->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12"><h3>Class Information</h3></div>
                            <!------------table start----------------------------------->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover" style="margin-top:20px;">
                                    <thead>
                                    <tr>
                                        <th>Level</th>
                                        <th>Subject</th>
                                        <th>Class time</th>
                                        <th>Starting date</th>
                                        <th>Ending date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($academic == 0) {
                                    } else {
                                        foreach ($academic as $array) {
                                            ?>
                                            <tr>
                                                <td><?= $array->co_name ?></td>
                                                <td><?= $array->su_name ?></td>
                                                <td><?= $array->time ?></td>
                                                <td><?= $array->s_date ?></td>
                                                <td><?= $array->e_date ?></td>
                                                <td><?php if ($array->t_status == 1) { ?>
                                                        <i class="label label-success">Active</i>
                                                    <?php } else { ?>
                                                        <i class="label label-danger">Deactive</i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
                            <!------------table end------------------------------------->

                        </div>
                        <!-- for teacher Salary Detail -->
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <h3>Remuneration Information
                            </h3>
                        </div>
                        <!------------table start----------------------------------->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Date</th>
                                    <th>Amount Reason</th>
                                    <th>Paid Month</th>
                                    <th>Total Remuneration</th>
                                    <th>Paid Remuneration</th>
                                    <th>Remain Remuneration</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($result == 0) { ?>

                                <?php } else {
                                    $sno = 1;
                                    $total_salary = 0;
                                    $total_paid = 0;
                                    $total_remain = 0;
                                    foreach ($result as $t) {
                                        ?>
                                        <tr>
                                            <td><?php echo $sno ?></td>
                                            <td><?php echo $t->created_date; ?></td>
                                            <td><?php echo $t->amount_reason; ?></td>
                                            <td><?php $t->paid_month;
                                                switch ($t->paid_month) {
                                                    case 1:
                                                        echo 'Jan';
                                                        break;
                                                    case 2:
                                                        echo 'Feb';
                                                        break;
                                                    case 3:
                                                        echo 'Mar';
                                                        break;
                                                    case 4:
                                                        echo 'Apr';
                                                        break;
                                                    case 5:
                                                        echo 'May';
                                                        break;
                                                    case 6:
                                                        echo 'Jun';
                                                        break;
                                                    case 7:
                                                        echo 'Jul';
                                                        break;
                                                    case 8:
                                                        echo 'Aug';
                                                        break;
                                                    case 9:
                                                        echo 'Sep';
                                                        break;
                                                    case 10:
                                                        echo 'Oct';
                                                        break;
                                                    case 11:
                                                        echo 'Nov';
                                                        break;
                                                    case 12:
                                                        echo 'Dec';
                                                        break;
                                                }?></td>
                                            <td><?php echo $t->total_salary; ?></td>
                                            <td><?php echo $t->paid_salary; ?></td>
                                            <td><?php echo $t->remaining_salary; ?></td>

                                        </tr>
                                        <?php $sno++;
                                        $total_paid = $total_paid + $t->paid_salary;
                                        $total_remain = $t->remaining_salary;
                                    }
                                } ?>
                                </tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="bg-info"><b>Total:</b></td>
                                    <td class="bg-info">
                                        <b><?php echo $total_salary = $total_paid + ($total_remain); ?></b>.PKR
                                    </td>
                                    <td class="bg-info"><b><?php echo $total_paid; ?></b>.PKR</td>
                                    <td class="bg-info"><b><?php echo $total_remain; ?></b>.PKR</td>
                                </tr>
                            </table>
                        </div>
                        <!------------table end------------------------------------->

                    </div>
                    <!-- end of teacher Salary Detail -->

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.box -->
        <div class="row no-print">
                <div class="col-xs-12">
                    <a class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
                    
                </div>
            </div>
</div>

</section>
</div>
</div>
</body>


