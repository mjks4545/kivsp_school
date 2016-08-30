<?php

class Student extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }

//-------------------------------------------------------------------
    function index()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $result['result'] = $this->student_m->view_students();
        $this->load->view('student/student_home',$result);
        $this->load->view('include/footer');

    }
    function studentprofile()
    {
        $sid = $this->uri->segment(3);
        $cid = $this->uri->segment(4);
        $ccid = $this->uri->segment(5);
        $csid = $this->uri->segment(6);
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['student'] = $this->student_m->view_studentdetails($sid);
        $data['course'] = $this->student_m->view_studentcourse($cid);
        $data['class_course'] = $this->student_m->view_studentclass($ccid);
        $data['c_section'] = $this->student_m->view_studentsection($csid);
        $data['student_fee'] = $this->student_m->view_studentfee();
        
        $this->load->view('student/studentprofile', $data);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function addstudent()
    {
        $data['course'] = $this->class_m->get_course();
//        echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/addstudent', $data);
        $this->load->view('include/footer');

    }
    
     function asignsection()
    {
         $data['result'] = $this->student_m->studentname();
         $data['section'] = $this->student_m->studentsection();
         $data['course'] = $this->student_m->studentcourse();
         $data['class'] = $this->student_m->studentclass();
         //$data['course'] = $this->class_m->get_course();
//        echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/asign_section',$data);
        $this->load->view('include/footer');

    }
    function studentfulldetails($id=null)
    {
        $result['data'] = $this->student_m->studentfulldetails($id);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_full_details',$result);
        $this->load->view('include/footer');
    }
    function addstudentsection($id=null)
    {
        $result = $this->student_m->addstudent_section();
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
             $this->studentfulldetails($id);
        }
        if ($result == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/assignsection");
        }
       
    }
    
    
    
    //------------------------------------------------------------------------------------------------------------------
    function addstudentpro()
    {
        $data['result'] = $this->student_m->addstudentpro();
        if ($data['result'] == 0) {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/addstudent");
        }
        if ($data['result'] == 2) {
            $this->session->set_flashdata('msg', 'Student Already exist');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/addstudent");
        } else {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            $student_id = $data['result']['student_id'];
            $course_id = $data['result']['course_id'];
            redirect("student/asignsection/" . $student_id . '/' . $course_id);
        }
    }
    

    //------------------------------------------------------------------------------------------------------------------
    function studentclasses()
    {
        $std_id = $this->uri->segment(3);
        $crs_id = $this->uri->segment(4);
        $result['result'] = $this->student_m->studentclasses($crs_id);
        $result['std_id'] = $std_id;
//        echo '<pre>'; print_r($result);die();

        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_classes', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentclasspro()
    {
        $std_id = $this->uri->segment(3);
        $data = $this->student_m->studentclasspro($std_id);
        if ($data) {
            redirect(site_url() . 'student/student_class_fee/' . $std_id);
        } else {
            redirect(site_url() . 'student/studentclasses');
        }

    }
    function studentclassview()
    {
        $result['result'] = $this->student_m->studentclassview();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_class_view',$result);
        $this->load->view('include/footer');
    }
    function studentclassviceview()
    {
        $result['result'] = $this->student_m->student_classvice_view();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_classvice_view',$result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function student_class_fee()
    {
        $std_id = $this->uri->segment(3);
        $result['result'] = $this->student_m->student_class_fee($std_id);
//            echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_classfee', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function viewstudents()
    {
        $result['result'] = $this->student_m->view_students();
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/students_view', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentdetails()
    {
        $id = $this->uri->segment(3);
        $result['resul'] = $this->student_m->student_details($id);
        $result['class'] = $this->student_m->studentall_classes($id);
        $result['fee'] = $this->student_m->studentall_fee();
        $result['date'] = $this->student_m->monthlyfeedate();
        $result['monthlydetail'] = $this->student_m->monthlyfeedetails();
        $result['otherpaydate'] = $this->student_m->otherfeedate();
        $result['otherfeed'] = $this->student_m->otherfeedetails();
//          echo '<pre>';print_r($result);die();
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_detailsview', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentclassfeepro()
    {
        $result = $this->student_m->studentclassfeepro();
        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect("student/viewstudents");
        } else {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/student_class_fee");
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestudent()
    {
        $id = $this->uri->segment(3);
        $result['result'] = $this->student_m->updatestudent($id);
//        echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_update', $result);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestudentpro()
    {
        $id = $this->uri->segment(3);
        $result = $this->student_m->updatestudentpro($id);

        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Updated');
            $this->session->set_flashdata('type', 'success');
            redirect("student/studentdetails/" . $id);
        } else {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/studentdetails" . $id);
        }
    }

//------------------------------------------------------------------
    function studentclassstatus()
    {
        $st_id = $this->uri->segment(3);
        $result = $this->student_m->studentclassstatus($st_id);

        if ($result == 1) {
            $this->session->set_flashdata('msg', 'Sucessfully Updated');
            $this->session->set_flashdata('type', 'success');
            redirect("student/studentdetails/" .$st_id);
        } else {
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect("student/studentdetails" . $st_id);
        }
    }
 //--------------------------------------------for image-------------------------
    function img_upload()
    {
        $st_id = $this->uri->segment(3);
        $this->db->select("*");
        $this->db->where("student_id", $st_id);
        $query = $this->db->get('student');
        $result = $query->result();
        foreach ($result as $row) {
            if (($row->pic != "") && ($row->pic == 'user.jpg')) {
                $config['upload_path'] = 'public/user_img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '10240000';
                //$config['max_width']  = '1024';
                //$config['max_height']  = '768';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);
                    $this->session->set_flashdata('type',"danger");
                        redirect(site_url() . 'student/studentdetails/' . $st_id);

                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image_path = $data['upload_data']['file_name'];
                    $update = array(
                        'pic' => $image_path
                    );
                    $this->db->where('student_id', $st_id);
                    $this->db->update('student', $update);
                        redirect(site_url() . 'student/studentdetails/'.$st_id);
                }

            }
            if (($row->pic != "") && ($row->pic != 'user.jpg')) {
                $path = $config['upload_path'] = 'public/user_img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite']= true;
                $config['max_size'] = '10240000';
               //$config['max_width']  = '1024';
                //$config['max_height']  = '768';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);
                    $this->session->set_flashdata('type',"danger");

                       redirect(site_url() . 'student/studentdetails/'.$st_id);

                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image_path = $data['upload_data']['file_name'];
                    unlink($path . '/' . $row->pic);
                    $update = array(
                        'pic' => $image_path
                    );
                    $this->db->where('student_id', $st_id);
                    $this->db->update('student', $update);
                       redirect(site_url() . 'student/studentdetails/'.$st_id);
                }
            }
            if (($row->pic == "")) {
                $config['upload_path'] = 'public/user_img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '10240000';// 10 mb
                //$config['max_width']  = '1024';
                //$config['max_height']  = '768';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);
                    $this->session->set_flashdata('type',"danger");

                        redirect(site_url() . 'student/studentdetails/'.$st_id);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $image_path = $data['upload_data']['file_name'];
                    $update = array(
                        'pic' => $image_path
                    );
                    $this->db->where('student_id', $st_id);
                    $this->db->update('student', $update);
                        redirect(site_url() . 'student/studentdetails/' . $st_id);
                }

            }
        }
        /**/
    }
//--------------------------------------------------------------

        function add_newclass()
    {
        $std_id = $this->uri->segment(3);
        $data['result'] = $this->student_m->add_newclass($std_id);
        $data['std_id'] = $std_id;
//    echo '<pre>'; print_r($data);die();
        if ($data['result'] == 0) {
            $this->session->set_flashdata('msg', 'Student have Already all Subjects.');
            $this->session->set_flashdata('type', 'danger');
            redirect(site_url() . "student/studentdetails/" . $std_id);
        } else {
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
            $this->load->view('student/add_newclass', $data);
            $this->load->view('include/footer');
        }
    }



    //------------------------------------------------------------------------------------------------------------------
    function addnewclasspro()
    {
        $std_id = $this->uri->segment(3);
        $data['result'] = $this->student_m->addnewclasspro($std_id);
        $data['std_id']=$std_id;
       // echo '<pre>';print_r($data);die();
        $this->session->set_userdata("cl_ids",$data['result']);
        if ($data) {
            redirect(site_url().'student/addnewclass_fee/' . $std_id);
        } else {
            redirect(site_url().'student/studentclasses');
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function addnewclass_fee()
    {
        $std_id = $this->uri->segment(3);
        $result['result'] = $this->student_m->addnewclass_fee($std_id);
         // echo '<pre>';print_r($result);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/student_classfee', $result);
        $this->load->view('include/footer');
    }
    //--------------------------------------------------------
    function studentlevel()
    {
        $data['level']=$this->student_m->studentlevel();
//         echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/studentlevel',$data);
        $this->load->view('include/footer');

    }
 //-----------------------------------------------------------------
    function levelclass($co_id)
    {
        $data['class']=$this->student_m->levelclass($co_id);
//         echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/levelclasses',$data);
        $this->load->view('include/footer');

    }
//-----------------------------------------------------------------
    function clstudent($cl_id)
    {
        $data['student']=$this->student_m->clstudent($cl_id);
//         echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/clstudent',$data);
        $this->load->view('include/footer');

    }
//-----------------------------------------------------------------
    function chalanperstudent($clfee_id)
    {
        $data['std_info']=$this->student_m->chalanperstudent($clfee_id);
//         echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/studentperclass_slip',$data);
        $this->load->view('include/footer');

    }
//-----------------------------------------------------------------
    function chalanperclass($cl_id)
    {
        $data['std_info']=$this->student_m->chalanperclass($cl_id);
//         echo '<pre>';print_r($data["std_info"]);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/chalanperclass_slip',$data);
        $this->load->view('include/footer');

    }
//-----------------------------------------------------------------
    function chalanperlevel($co_id)
    {
        $data['std_info']=$this->student_m->chalanperlevel($co_id);
//         echo '<pre>';print_r($data["std_info"]);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/chalanpercourse_slip',$data);
        $this->load->view('include/footer');

    }
    //-----------------------------------------
}