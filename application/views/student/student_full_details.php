<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->

    <!-- Content Wrapper. Contains page content -->
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

        <div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Note:</h4>
                This page has been enhanced for printing.Press Ctrl+P.
                                <!--<pre>
                                <?php /* print_r($arr); */?>
                                <?php /* print_r($std_info); */?>
                                --><?php /* print_r($class_info); */?>
            </div>
        </div>

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-sm-12 col-xs-12">

                    <img src="<?php echo site_url() ?>public/img/kivsp_logo.jpg" class="img-responsive" style="height:100px;margin-bottom:-40px;  "/>
                    <h2 class="page-header text-center">
                        Seeds School of Excellence
                        <small class="pull-right" style="margin-right:20px; ">Date&nbsp;:&nbsp;<?php echo date("d-M-Y"); ?></small>
                    </h2>
                </div><!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>Khyber Institute of Veterinary Sciences Peshawar</strong><br>
                        Khyber Pukhtunkhwa Peshawar,<br>
                        KPK,Pakistan<br>
                        Phone:091-5845678<br>
                        Email: info@kivspschool.com
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <?php foreach($data as $fulldata)?>
                        <strong>
                            <?php echo $fulldata->student_name; ?>
                        </strong><br>
                        Father Name: <?php echo $fulldata->std_father_name; ?><br>
                        Address: <?php echo $fulldata->student_address; ?><br>
                        Phone: <?php echo  $fulldata->student_phone; ?><br>
                        CNIC: <?php echo  $fulldata->student_cnic; ?><br>
                        
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Course
                    <address>
                        <strong>
                            <?php echo $fulldata->co_name; ?>
                        </strong><br>
                        Class: <?php echo $fulldata->class_course_name; ?><br>
                        Section: <?php echo  $fulldata->c_section_name; ?><br>
                        
                    </address>
                </div><!-- /.col -->
            </div><!-- /.row -->

           
            <div class="row">
                <!-- accepted payments column -->
            </div><!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
                        Back</a>
                </div>
            </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
    </div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
