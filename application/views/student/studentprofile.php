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

                        <h3 class="box-title">Student Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php foreach ($student as $std)?>
                        <div class="col-md-12 "><h3>Personal Information</h3> 
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Student Name : </label><?= $std->student_name; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Father Name
                                        : </label><?= $std->std_father_name; ?></div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group name"><label>Adress 
                                        : </label><?= $std->student_address; ?></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Student CNIC : </label><?= $std->student_cnic; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Student Contact : </label><?= $std->student_phone; ?>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Date : </label><?= $std->student_created_date; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Time : </label><?= $std->student_created_time; ?>
                                </div>
                            </div>
                         </div>
                       
                        <!-- for class-->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-12"><h3>More Information</h3>
                            </div>
   <!------------table start----------------------------------->
                            <div class="box-body">
                                <table id="" class="table table-bordered table-hover" style="margin-top:20px;">
                                    <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Course</th>
                                        <th>Section</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($course as $cors);
                                        foreach($class_course as $c_course);
                                        foreach($c_section as $class_section);
                                            ?>
                                            <tr>
                                                <td><?= $c_course->class_course_name; ?></td>
                                                <td><?= $cors->co_name; ?></td>
                                                <td><?= $class_section->c_section_name; ?></td>
                                            </tr>
                                    </tbody>
                                </table>    
                            </div>
                        </div>


                        <!-- end of class-->
                        <div class="col-md-12">
                            <div class="col-md-12"><h3>Fee Information</h3></div>
                            <!------------table start----------------------------------->
                            <?php foreach ($student_fee as $std_fee);?>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Fee to be pay : &nbsp;&nbsp;</label><?= $std_fee->to_be_pay; ?>
                                </div>
                            </div>
                                    
                                
                                   
                            </div>

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


