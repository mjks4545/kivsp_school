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
                Test Marks Form
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
                        <h3 class="box-title">Test Marks</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <?php //$i=0; foreach($data['student_name'][$i] as $result){$i++; echo $result['student_id']; } die; 
                        //echo "<pre>"; print_r($data);die; ?>
                        <form role="form" method="post" action="<?=site_url();?>examination/exam_result" >
                            <input  type="hidden" name="class_course_id" value="<?=$data['class_course_id'];?>" />
                            <input  type="hidden" name="course_id" value="<?=$data['course_id'];?>" />
                            <input  type="hidden" name="class_section" value="<?=$data['class_section'];?>" />
                            <input  type="hidden" name="exam_insert_id" value="<?=$data['exam_insert_id'];?>" />
                            <table id="table-hover" class="table-no-hover" data-toggle="table" data-show-refresh="false" data-search="true" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc">
					<thead>
					<tr>
					    <th  data-sortable="true"><b>Student Name</b></th>
					    <?php foreach($data['result'] as $result){ ?>
                                            <th  data-sortable="true"><b><?=$result['su_name'];?></b></th>
                                            <?php } ?>
					</tr>
					</thead>
					<tbody>
					    
					<?php
					    $i = 0;
                                            for($counter_static=0;$counter_static<count($data['student_name']);$counter_static++){
					?>
                    <tr>
					   
					    <td><?=$data['student_name'][$counter_static][0]['student_name'];?></td>
                        <td><input type="hidden" name="student_id_<?=$i?>" value="<?=$data['student_name'][$counter_static][0]['student_id'];?>">
                        <input type="text"  name="writing_marks_chem_<?=$i;?>"  class="form-control col-sm-1" required></td>
                        
                        <td><input type="hidden" name="student_id_<?=$i?>" value="<?=$data['student_name'][$counter_static][0]['student_id'];?>">
                        <input type="text" name="writing_marks_maths_<?=$i?>" class="form-control col-sm-1" required></td>
                        
                        <td><input type="hidden" name="student_id_<?=$i?>" value="<?=$data['student_name'][$counter_static][0]['student_id'];?>">
                        <input type="text" name="writing_marks_bio_<?=$i?>"  class="form-control col-sm-1" required></td>
                        
                        <td><input type="hidden" name="student_id_<?=$i?>" value="<?=$data['student_name'][$counter_static][0]['student_id'];?>">
                        <input type="text" name="writing_marks_eng_<?=$i?>"  class="form-control col-sm-1" required></td>
                        
                        <td><input type="hidden" name="student_id_<?=$i?>" value="<?=$data['student_name'][$counter_static][0]['student_id'];?>">
                        <input type="text" name="writing_marks_pak_<?=$i?>"  class="form-control col-sm-1" required></td>
                        
                        <td><input type="hidden" name="student_id_<?=$i?>" value="<?=$data['student_name'][$counter_static][0]['student_id'];?>">
                        <input type="text" name="writing_marks_urdu_<?=$i?>" class="form-control col-sm-1" required></td>
                        
                        <td><input type="hidden" name="student_id_<?=$i?>" value="<?=$data['student_name'][$counter_static][0]['student_id'];?>" />
                            <input type="text"  name="writing_marks_pashto_<?=$i;?>"  class="form-control col-sm-1"  /></td>

                        <td><input type="hidden" name="student_id_<?=$i?>" value="<?=$data['student_name'][$counter_static][0]['student_id'];?>">
                            <input type="text"  name="writing_marks_farsi_<?=$i?>"  class="form-control col-sm-1" required></td>

                        <td><input type="hidden" name="student_id_<?=$i?>" value="<?=$data['student_name'][$counter_static][0]['student_id'];?>">
                        <input type="text" name="writing_marks_mt_<?=$i?>" class="form-control col-sm-1" required></td>

                        <td><input type="hidden" name="student_id_<?=$i?>" value="<?=$data['student_name'][$counter_static][0]['student_id'];?>">
                        <input type="text" name="writing_marks_hindi_<?=$i?>"  class="form-control col-sm-1" required></td>
                                            <input type="hidden" name="counter" value="<?=$i;?>">
					</tr>
					<?php
					    $i++;
					    } 
					    ?>
					</tbody>
				    </table>
				    
				    <input class="btn btn-primary pull-right" style="position: relative;top: 15px;;" type="submit" value="Save results" />
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

