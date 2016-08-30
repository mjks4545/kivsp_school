<?php
class Examination extends CI_Controller{
    
    //--//-------test form-------------//--///////////
    
    public function test_form(){
        $course_id=$this->uri->segment(3);
        $class_course_id=$this->uri->segment(4);
        $class_section_id =$this->uri->segment(5);
        $data['data']=$this->test_m->subject_info($course_id,$class_course_id,$class_section_id);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('examination_view/test_form_view',$data);
        $this->load->view('include/footer');
    }
    
    //--//-------submition of test for-------------//--///////////
    
    public function test_submition(){
        $show=$this->test_m->test_insertion();
        $this->test_display($show);
    }
    
    //--//-------test  display form-------------//--///////////
    
    public function test_display($show){
        $data['data'] = $this->test_m->subject_display($show);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('examination_view/test_display_form',$data);
        $this->load->view('include/footer');
    }
    
    //--//-------test result submition process-------------//--///////////
    
    public function exam_result(){
        $this->test_m->exam_result_p();
        $this->test_report_v();
        $this->test_report_v();
    }
    
    //--//-------test result reports-------------//--///////////
    
    public function test_report_v(){
        $data['result'] = $this->test_m->test_report_m();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('examination_view/test_report',$data);
        $this->load->view('include/footer');
        
    }
    
    //--//-------admin page examination tyles-------------//--///////////
    
    public function examination_tyles(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('examination_view/main_page_report_view');
        $this->load->view('include/footer');
    }
    
    //--//-------selection of exam type for filtering-------------//--///////////
    
    
    public function exam_type_v(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('examination_view/selection_exam_vise');
        $this->load->view('include/footer');
        
    }
    
    
    //--//-------selection of exam type and fetching data-------------//--///////////

    
    public function test_report_exam_w(){
        $data['result']=$this->test_m->test_report_exam_m();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('examination_view/exam_vise_view',$data);
        $this->load->view('include/footer');
    }
    
    //--//-------class vise view only-------------//--///////////
    
    public function class_vise_v(){
        $data['result']=$this->test_m->class_vise_m();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('examination_view/class_vise_view',$data);
        $this->load->view('include/footer');
    }
    
    //--//-------class vise report display-------------//--///////////
    
    public function test_report_class_w(){
     $data['result']=$this->test_m->test_report_class_m(); 
     $this->load->view('include/header');
     $this->load->view('include/sidebar');
     $this->load->view('examination_view/class_vise_report',$data);
     $this->load->view('include/footer');
     
    }
}
?>
<?php

/* licence to hanif jadoon 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

