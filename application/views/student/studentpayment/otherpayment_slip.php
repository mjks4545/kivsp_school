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
               <!-- <pre>
                                <?php /* print_r($arr); */?>
                                --><?php /* print_r($std_info); */?>
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
                        <strong>Khyber Institute of Veterinary</strong><br>
                        Khyber Pukhtunkhwa Peshawar,<br>
                        KPK,Pakistan<br>
                        Phone:091-5845678<br>
                        Email: info@kivspsschool.com
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>
                            <?php echo $std_info[0]->student_name; ?>
                        </strong><br>
                        Address: <?php echo $std_info[0]->student_address; ?><br>
                        Phone: <?php echo  $std_info[0]->student_phone; ?><br>
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #<?php
                        echo  $randomString;

                        ?></b><br>
                    <br>
                    <b>Payment Date&nbsp;: &nbsp;<?php echo  $arr['otherpay_created_date']; ?></b><br>
                    <b>Payment Due:</b> <?php echo $arr['paid_amt']+($arr['otherfee_remain'])."&nbsp;.Rs";?><br>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><?php echo  $arr['amt_reason'];?></td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">

                </div><!-- /.col -->
                <div class="col-xs-6">
                    <p class="lead">Amount Detail</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Total Balance:</th>
                                <td><?php echo $arr['paid_amt']+($arr['otherfee_remain']);?></td>
                            </tr>
                            <tr>
                                <th>Paid</th>
                                <td><?php echo $arr['paid_amt'];?></td>
                            </tr>
                            <tr>
                                <th>Remain</th>
                                <td><?php echo $arr['otherfee_remain'];?></td>
                            </tr>
                            <tr>
                                <th>Total Paid:</th>
                                <td><?php echo $arr['paid_amt']."&nbsp;.Rs";?></td>
                            </tr>
                        </table>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
                    <a href="<?php echo site_url() ?>studentpayment/studentclass/<?php echo $arr['fkstudent_id']; ?>"  class="btn btn-success pull-right"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                        Back</a>
                </div>
            </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
    </div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
