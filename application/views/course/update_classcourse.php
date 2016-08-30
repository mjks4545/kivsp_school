<style>
    .course{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Level
            <small><a href="<?= site_url()?>course/">Levels</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url()?>course/viewcourses">View Levels</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Update Level
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
                        <?php
                        $this->load->view('include/alert');
                        ?>
                        <h3 class="box-title">Update Level</h3>
                        <a href="<?= site_url()?>course/viewcourses" class="pull-right"> Back</a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url()?>course/updateclasscoursepro" method="post">
                        <?php 
                        foreach ($result as $res)
                            
                        ?>
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Level Title</label>
                                    <input type="text" name="course_title" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?= $res->co_name?>" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <input type="hidden" name="cs_id" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?= $this->uri->segment(3)?>" required/>
                                <input type="hidden" name="cc_id" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?= $this->uri->segment(4)?>" required/>
                                <input type="hidden" name="c_id" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?= $this->uri->segment(5)?>" required/>
                                 
                            </div>
                             <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Course Course</label>
                                    <select name="class_name" id="exampleInputClasscourse" class="form-control">
                                         <?php echo "<option selected>$res->class_course_name</option>"?>
                                        
                                        <?php foreach($c_result as $resl)
                                        { ?>
                                        <option value="<?= $resl->class_course_id;?>"><?= $resl->class_course_name;?></option>
                                        <?php }?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Sections</label>
                                    <select name="class_section" id="exampleInputClasscourse" class="form-control">
                                        <?php echo "<option selected>$res->c_section_name</option>"?>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Course Course</label>
                                    <select name="class_course" id="exampleInputClasscourse" class="form-control">
                                         <?php echo "<option selected>$res->subjects</option>"?>
                                        <option value="Maths">Maths</option>
                                        <option value="Biology">Biology</option>
                                        <option value="Physics">Physics</option>
                                        <option value="Chemistry">Chemistry</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                        
                        </div>
                        </div>
                        
                        <div class="box-footer">
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <button type="submit" class="btn btn-primary col-sm-1">Update</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>