<style>
    .Level{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add New Student
            <small><!-- <a href="<?= site_url()?>student/">Student Home</a>  -->
            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Add New Student
            </small>
          </h1>
        </section>
        <!-- Main content -->
        <?php $this->load->view('include/alert')?>
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title text-primary ">Step-I</h2>
                  <a href="<?= site_url()?>student/"class="pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                <form role="form" data-toggle="validator" enctype="multipart/form-data" action="<?= site_url()?>student/addstudentsection/<?php echo $this->uri->segment(3);?>" method="post">
                 <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Student</label>
                          <select name="s_name" class="form-control">
                              <?php foreach ($result as $name)
                              {?>
                              <option value="<?php echo $name->student_id?>"><?php echo $name->student_name?></option>
                              <?php }?>
                          </select>
                          <input type="hidden" name="student_id" value="<?php echo $name->student_id?>">
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                         <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Admission Fee</label>
                           <input type="number" name="adm_fee" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Admission Fee" required/>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                     </div>
                        
                    </div>
                     <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Course</label>
                          <select name="c_name" class="form-control">
                              <?php foreach ($course as $cours)
                              {?>
                              <option value="<?php echo $cours->co_id?>"><?php echo $cours->co_name?></option>
                              <?php }?>
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Monthly Fee</label>
                           <input type="number" name="mon_fee" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Monthly Fee" required/>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>  
                        
                    </div>
                     <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Class</label>
                          <select name="class_name" class="form-control">
                              <?php foreach ($class as $clas)
                              {?>
                              <option value="<?php echo $clas->class_course_id?>"><?php echo $clas->class_course_name?></option>
                              <?php }?>
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                  <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Other Fee</label>
                           <input type="number" name="other_fee" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Other Fee" required/>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>                  
                    </div>
                     
                     <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Section</label>
                          <select name="s_section" class="form-control">
                              <?php foreach($section as $sec)
                                  
                              {?>
                              <option value="<?php echo $sec->c_section_id?>"><?php echo $sec->c_section_name?></option>
                              <?php }?>
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                        </div>

                    </div>
                     </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary col-sm-1 pull-right ">Next  <div class="fa fa-angle-double-right"></div></button>
                </div>
             </form>
          </div><!-- /.box -->
       </div>
     </div>
   </section>
</div>
              