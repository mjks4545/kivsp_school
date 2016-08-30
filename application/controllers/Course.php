<?php

class Course extends CI_Controller{
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
  //------------------------------------
    function viewcourses(){
        $result['result'] = $this->course_m->view_courses();
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('course/view_courses',$result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function addcourseview(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('course/addcourse');
        $this->load->view('include/footer');
    }
    function addclasscourseview()
    {
        $data['result'] = $this->course_m->view_class_courses();
        $data['course'] = $this->course_m->view_course();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('course/addclass_course',$data);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function addcoursepro(){
        $result = $this->course_m->addcoursepro();
        if($result == 1){
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect("course/viewcourses");
        }
        if($result == 0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("course/viewcourses");
        }
    }

    function addclasscoursepro(){
        $result = $this->course_m->addclasssectionpro();
        if($result == 1){
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect("course/viewcourses");
        }
        if($result == 0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("course/viewcourses");
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function updateclasscourse(){
        $result['result'] = $this->course_m->updateclasscourse();
        $result['c_result'] = $this->course_m->view_class_courses();
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('course/update_classcourse',$result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatecoursepro(){
        $id = $this->uri->segment(3);
        $result = $this->course_m->updatecoursepro($id);
        if($result == 1){
            $this->session->set_flashdata('msg', 'Sucessfully Update');
            $this->session->set_flashdata('type', 'success');
            redirect("course/viewcourses");
        }
        if($result == 0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("course/viewcourses");
        }
    }
     function updateclasscoursepro(){
        $result = $this->course_m->updateclasscoursepro();
        if($result == 1){
            $this->session->set_flashdata('msg', 'Sucessfully Update');
            $this->session->set_flashdata('type', 'success');
            redirect("course/viewcourses");
        }
        if($result == 0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("course/viewcourses");
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function deletecourse(){
        $id = $this->uri->segment(3);
        $result = $this->course_m->deletecourse($id);
        if($result == 1){
            $this->session->set_flashdata('msg', 'Sucessfully Deleted');
            $this->session->set_flashdata('type', 'success');
            redirect("course/viewcourses");
        }
        if($result == 0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("course/viewcourses");
        }
    }

    //------------------------------------------------------------------------------------------------------------------
}