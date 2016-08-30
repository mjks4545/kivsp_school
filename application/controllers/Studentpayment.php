<?php
class Studentpayment extends CI_Controller{
    function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $session = $this->session->userdata("session_data");
        $logged_in=$session['logged_in'];
        if($logged_in==0){
            redirect(site_url()."home/");
        }
    }
//-------------------------------------------------------------------
   function viewstd()
   {
       $this->load->view('include/header');
       $this->load->view('include/sidebar');
       $data['result'] = $this->studentpayment_m->viewstd();
//        echo "<pre>";print_r($data); die();
       $this->load->view('student/studentpayment/viewstd', $data);
       $this->load->view('include/footer');
   }
    //---------------------------------------------------------------
    function studentclass(){
        $st_id = $this->uri->segment(3);
        $data['result'] = $this->studentpayment_m->studentclass($st_id);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
//        echo "<pre>";print_r($data); die();
        $this->load->view('student/studentpayment/student_class', $data);
        $this->load->view('include/footer');
    }
    //---------------------------------------------------------------
    function paynow(){
//        $classfee_id = $this->uri->segment(3);
//        $st_id = $this->uri->segment(4);
        $data['result'] = $this->studentpayment_m->paynow();
//        $data['checkad'] = $this->studentpayment_m->checkad();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
//        echo "<pre>";print_r($data); die();
        $this->load->view('student/studentpayment/paynow',$data);
        $this->load->view('include/footer');
        $this->session->set_userdata("paymentdetail",'');
    }
    function studentpayfee()
    {
        $data = $this->studentpayment_m->studentfeepayment();
        if ($data['result_1']==1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url().'student/studentclassview');
        }else{
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect(site_url().'student/studentclassview/');
        }  
    }
    
    function studentchalanview()
    {
        $data['result'] = $this->studentpayment_m->studentchalanview();
        $data['class'] = $this->studentpayment_m->studentchalanclass();
        $data['course'] = $this->studentpayment_m->studentcourse();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
//        echo "<pre>";print_r($data); die();
        $this->load->view('student/chalan/student_chalanview',$data);
        $this->load->view('include/footer');
    }
    function stdpayment()
    {
         $data['result'] = $this->studentpayment_m->studentpaymentfeeview();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/chalan/std_payment',$data);
        $this->load->view('include/footer');
    }
            function createfullchalan()
    {
        $data['std_feechalan'] = $this->studentpayment_m->createfullchalan();
    //    $data['std_paid'] = $this->studentpayment_m->student_paid();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
//        echo "<pre>";print_r($data); die();
        $this->load->view('student/chalan/createfullchalan',$data);
        $this->load->view('include/footer');
    }
   
    //---------------------------------------------------------------
    function paymonthlyfeepro(){
        $std_id = $this->input->post('fkstd_id');
        $data=$this->studentpayment_m->paymonthlyfeepro();
        $classfee_id =  $data['arr']['student_fee_id'];
        $data['std_info']=$this->student_m->student_details($std_id);
        $data['class_info']=$this->student_m->class_details($classfee_id);
        $this->session->set_userdata("paymentdetail",$data);
//       echo "<pre>";print_r($data); die();
        if ($data['result']==1){
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url().'studentpayment/slip');
        }
        if ($data['result']==0){
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            $this->load->view('student/studentpayment/paynow',$std_id);
        }
    }

    //----------------------------------------------------------------
    function slip(){
//        $result['data'] = $this->studentpayment_m->slip();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        
        $data = $this->session->userdata("paymentdetail");
        
            //   echo "<pre>";print_r($data); die();

        $this->load->view('student/studentpayment/payment_slip',$data);
        $this->load->view('include/footer');


    }
    //----------------------------------------------------------------
    function classpaymentdetail(){
        $classfee_id=$this->uri->segment(3);
        $std_id=$this->uri->segment(4);
        $data['result']=$this->studentpayment_m->classpaymentdetail($classfee_id,$std_id);
//        echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/studentpayment/student_paymentdetails',$data);
        $this->load->view('include/footer');
    }

    //------------------------------------------------------------------
    function otherpay(){
        $std_id=$this->uri->segment(3);
        $data['result']=$this->studentpayment_m->otherpay($std_id);
        $data['check']=$this->studentpayment_m->otherpaycheckad($std_id);
        // echo '<pre>';print_r($data);die();
        
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('student/studentpayment/otherpay',$data);
        $this->load->view('include/footer');

        
    }

    //-----------------------------------------------------------------
     function payotherfeepro(){
        echo $std_id = $this->input->post('fkstd_id');
        $data=$this->studentpayment_m->payotherfeepro($std_id);
        $data['std_info']=$this->student_m->student_details($std_id);
         $this->session->set_userdata("otherpaymentdetail",$data);

        // echo '<pre>';print_r($data);die();

        if ($data['result']==1) {
            $this->session->set_flashdata('msg', 'Sucessfully Added');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url().'studentpayment/otherpayment_slip');
        }else{
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('type', 'danger');
            redirect(site_url().'studentpayment/otherpay/'.$std_id);
        }  
    }
    //----------------------------------------------------------------
    function otherpayment_slip(){
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data = $this->session->userdata("otherpaymentdetail");
           //echo "<pre>";print_r($data); die();

        $this->load->view('student/studentpayment/otherpayment_slip',$data);
        $this->load->view('include/footer');


    }
    //-----------------------------------------------------------------
    function viewotherpaymentdetail($std_id)
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['result']=$this->studentpayment_m->otherpaymentdetail($std_id);
//        echo "<pre>"; print_r($data); die;
        $this->load->view('student/studentpayment/otherpaymentdetail',$data);
        $this->load->view('include/footer');
    }
    //-----------------------------------------------------------------

}