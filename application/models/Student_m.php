<?php

class Student_m extends CI_Model
{

    function addstudentpro()
    {
        $student_name = $this->input->post('student_name');
        $father_name = $this->input->post('father_name');
        $address = $this->input->post('address');
        $s_cnic = $this->input->post('cnic');
        $phone = $this->input->post('phone');
        $created_date = date("d-M-Y");
        $created_time = date("h:i:sa");
        $month = date("M");
        $year = date("Y");
        //---------------------------duplication----------------------
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('student_name', $student_name);
        $this->db->where('std_father_name', $father_name);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return 2;

        } else {


            //-----------------------------------------------------------
            $img_up = $this->img_upload();
            $length = 6;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,@#$%*';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            $insert_array = array(
                'student_name' => $student_name,
                'std_father_name' => $father_name,
                'student_address' => $address,
                'student_phone' => $phone,
                'student_cnic' => $s_cnic,
                'student_created_date' => $created_date,
                'student_created_time' => $created_time,
                'student_month' => $month,
                'student_year' => $year
            );
           $result = $this->db->insert('student', $insert_array);
            if ($result) {
                $fkstudent_id = $this->db->insert_id();
                $ids = array(
                    'student_id' => $fkstudent_id,
                    'course_id' => $course_id,
                );
                return $ids;
            } else {
                return 0;
            }
        }
    }//-------------------------------------------------------------------------------

    function img_upload()
    {
        $config['upload_path'] = 'public/user_img';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
        $config['max_size'] = '10240000';
        //$config['max_width']  = '1024';
        //$config['max_height']  = '768';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('img')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;

        } else {
            $data = array('upload_data' => $this->upload->data());
            $image_path = $data['upload_data']['file_name'];
            return $image_path;
        }
    }

    function addstudent_section(){
        $student_id = $this->input->post('student_id');
        $std_id   = $this->input->post('s_name');
        $std_section  = $this->input->post('s_section');
        $std_course = $this->input->post('c_name');
        $std_class = $this->input->post('class_name');
        $adm_fee = $this->input->post('adm_fee');
        $mon_fee = $this->input->post('mon_fee');
        $other_fee = $this->input->post('other_fee');
        $created_date   = date("d-M-Y");
        $created_time   = date("h:i:sa");
     
        $insert_array = array(
            'student_id'       => $std_id,
            'c_section_id'       => $std_section,
            'co_id' => $std_course,
            'class_course_id' => $std_class,
            'admission_fee' =>$adm_fee,
            'monthly_fee' => $mon_fee,
            'other_fee' => $other_fee,
            'created_date'  => $created_date,
            'created_time'  => $created_time,
        );
        $result = $this->db->insert('student_section',$insert_array);
        if($result){
            return $result;
        }else{
            return 0;
        }
    }
    function studentclassview()
    {
        $this->db->select('*');
        $this->db->from("course");
        $this->db->join('class_sections','class_sections.co_id = course.co_id');
        $this->db->join('class_course', 'class_course.class_course_id = class_sections.class_course_id');
        
        
//        $this->db->select('*');
//        $this->db->from('student_section');
//        $this->db->join('course', 'course.co_id = student_section.co_id');
//        $this->db->join('student', 'student.student_id = student_section.student_id');
//        $this->db->join('class_course', 'class_course.class_course_id = student_section.class_course_id');
//        $this->db->join('class_sections', 'class_sections.c_section_id = student_section.c_section_id');
//        $this->db->where('class.co_id', $crs_id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
    function student_classvice_view()
    {
        $c_id = $this->uri->segment(3);
        $cc_id = $this->uri->segment(4);
        $cs_id = $this->uri->segment(5);
        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('student_section', 'student_section.student_id = student.student_id');
        $this->db->join('class_sections', 'class_sections.c_section_id = student_section.c_section_id');
        $this->db->join('class_course', 'class_course.class_course_id = student_section.class_course_id');
        $this->db->join('course','course.co_id = student_section.co_id');
        $this->db->where('course.co_id',$c_id);
        $this->db->where('class_course.class_course_id',$cc_id);
        $this->db->where('class_sections.c_section_name',$cs_id);
//        $this->db->where('class.co_id', $crs_id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
    //------------------------------------------------------------------------------------------------------------------
    function studentclasses($crs_id)
    {

        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('course', 'course.co_id = class.co_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('teacher', 'teacher.id = class.t_id');
//        $this->db->where('class.co_id', $crs_id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
    function view_studentdetails($sid)
    {
        $this->db->select('*');
        $this->db->where('student_id', $sid);
        $this->db->from('student');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function view_studentcourse($cid)
    {
        $this->db->select("*");
        $this->db->where('co_id',$cid);
        $this->db->from("course");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function view_studentclass($ccid)
    {
        $this->db->select("*");
        $this->db->where('class_course_id',$ccid);
        $this->db->from("class_course");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function view_studentsection($csid)
    {
        $this->db->select("*");
        $this->db->where('c_section_name',$csid);
        $this->db->from("class_sections");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function view_studentfee()
    {
        $sid = $this->uri->segment(3);
        $cid = $this->uri->segment(4);
        $ccid = $this->uri->segment(5);
        $this->db->select("*");
        $this->db->from("student_fee");
        $this->db->join("student","student.student_id=student_fee.student_id");
        $this->db->join("course","course.co_id=student_fee.co_id");
        $this->db->join("class_course","class_course.class_course_id=student_fee.class_course_id");
        $this->db->where("student.student_id",$sid);
        $this->db->where("course.co_id",$cid);
        $this->db->where("class_course.class_course_id",$ccid);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    function studentname()
    {
        $std_id = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('student_id',$std_id);
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
    function studentsection()
    {
         $this->db->select('*');
         $this->db->group_by('c_section_name');
        $this->db->from('class_sections');
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
    function studentcourse()
    {
        $this->db->select('*');
        $this->db->from('course');
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
     function studentclass()
    {
        $this->db->select('*');
        $this->db->from('class_course');
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
    function studentfulldetails($id=null)
    {
//      $std_id = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('student_section', 'student_section.student_id = student.student_id');
        $this->db->join('course','course.co_id=student_section.co_id');
        $this->db->join('class_sections', 'class_sections.c_section_id = student_section.c_section_id');
        $this->db->join('class_course', 'class_course.class_course_id = student_section.class_course_id');
        $this->db->where('student.student_id',$id);
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
    //------------------------------------------------------------------------------------------------------------------
    function studentall_classes($id)
    {

        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('student_section', 'student_section.student_id = student.student_id');
        $this->db->join('course', 'course.co_id = student_section.co_id');
        $this->db->join('class_course', 'class_course.class_course_id = student_section.class_course_id');
        $this->db->join('class_sections', 'class_sections.c_section_id = student_section.c_section_id');
        $this->db->where('student.student_id', $id);

        $query = $this->db->get();
        $result = $query->result();
        
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentall_fee()
    {  
        $id = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('student_fee', 'student_fee.student_id = student.student_id');
//        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->where('student.student_id', $id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //---------------------------------------------------------------------------------------------------------------------
    function studentclasspro($std_id)
    {
        $co_id = $this->input->post('co_id');
       $r_c = $this->input->post('r_c');
        $this->db->select('*');
        $this->db->from('class');
//        $this->db->where('co_id', $co_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        for ($i = 1; $i <= $num; $i++) {
            $subject = $this->input->post('select_' . $i);
            if ($subject == 'on') {
                $cl_id = $this->input->post('class_' . $i);

                $insert_array['student_classes' . $i] = array(
                    'fkclass_id' => $cl_id,
                    'fkstudent_id' => $std_id,
                    'st_class_fee_status' => 0
                );
                $insert_table = $this->db->insert('student_class_fee', $insert_array['student_classes' . $i]);

            }
        }
        if ($insert_table) {
            $this->db->where("student_id",$std_id);
            $this->db->update("student",["reason_concision"=>$r_c]);
            return $insert_table;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function student_class_fee($std_id)
    {

        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->join('class', 'class.cl_id = student_class_fee.fkclass_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->where('fkstudent_id', $std_id);
        $query = $this->db->get();
        $result = $query->result();

        if ($result) {
            return $result;
        } else {
            return 0;
        }

    }

//-----------------------------------------------------
    function add_admissionfee($std_id, $admission_fee)
    {
        $inser_arr = array(
            "fkstudent_id" => $std_id,
            "total_amt" => $admission_fee,
            "paid_amt" => 0,
            "otherfee_remain" => $admission_fee,
            "amt_reason" => 'Admission Fee',
            "other_month"=>date("M"),
            "other_year"=>date("Y"),
            "otherpay_created_date" => date("d-M-Y")
        );
        $this->db->insert("student_other_payment", $inser_arr);
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentclassfeepro()
    {
        $std_id = $this->input->post('student_id');
        $r_c = $this->input->post('r_c');
        $admission_fee = $this->input->post('admission_fee');
        for ($i = 1; $i <= 20; $i++) {
            $id = $this->input->post("std_cls_fee_id_" . $i);
            $sub_fee = $this->input->post("subject_fee_" . $i);
            $fee_to_pay = $this->input->post("fee_to_pay_" . $i);
            $created_date = date("d-M-Y");
            $created_time = date("h:i:sa");

            $this->db->where('classfee_id', $id);
            $update = array(
                'class_fee' => $sub_fee,
                'admission_fee' => $admission_fee,
                'to_be_pay' => $fee_to_pay,
                'classfee_created_date' => $created_date,
                'classfee_created_time' => $created_time,
                'st_class_fee_status' => 1,
            );
            $query = $this->db->update('student_class_fee', $update);
        }
        $this->add_admissionfee($std_id, $admission_fee);
        if ($query) {
            $this->db->where("student_id",$std_id);
            $this->db->update("student",["reason_concision"=>$r_c]);
            return 1;
        } else {
            return 0;
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function view_students()
    {
        $this->db->select('*');
        $this->db->from('student');
        $this->db->order_by('student_id', 'desc');
        
//        $this->db->join('subject','subject.su_id = class.co_id');

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function student_details($id)
    {
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('student_id', $id);
//        $this->db->join('class','class.co_id = student.fkcourse_id');
//        $this->db->join('subject','subject.su_id = class.su_id');
//        $this->db->join('teacher','teacher.id = class.t_id');
//        $this->db->where('student_id',$id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function class_details($classfee_id)
    {
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('classfee_id', $classfee_id);
        $this->db->join('class', 'class.cl_id = student_class_fee.fkclass_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
//        $this->db->join('teacher','teacher.id = class.t_id');
//        $this->db->where('student_id',$id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestudent($id)
    {
        $this->db->where('student_id', $id);
        $query = $this->db->get('student');
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestudentpro($id)
    {

        $student_name = $this->input->post('student_name');
        $father_name = $this->input->post('father_name');
        $address = $this->input->post('address');
        $s_phone = $this->input->post('phone');
        $s_fee = $this->input->post('fee');
        $updated_date = date("d-M-Y");
        $updated_time = date("h:i:sa");

        $this->db->where('student_id', $id);

        $update_array = array(
            'student_name' => $student_name,
            'std_father_name' => $father_name,
            'student_address' => $address,
            'student_phone' => $s_phone,
            'student_fee' => $s_fee,
            'student_updated_date' => $updated_date,
            'student_updated_time' => $updated_time,
        );

        $result = $this->db->update('student', $update_array);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    //----------------------------------------------------------------------------
    function studentclassstatus($st_id)
    {
        $status = $this->uri->segment(4);
        $classfee_id = $this->uri->segment(5);
        $this->db->where('fkstudent_id', $st_id);
        $this->db->where('classfee_id', $classfee_id);
        $up = array(
            "st_class_fee_status" => $status
        );
        $query = $this->db->update('student_class_fee', $up);
        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

//-------------------------------------------------------------------
    function monthlyfeedetails()
    {
        $std_id = $this->uri->segment(3);
        $this->db->select('*,SUM(student_paid) as total_paid,SUM(remaining_fee) as remain_fee',FALSE);
        $this->db->from('student_fee');
        $this->db->where('student_fee.student_id', $std_id);
        $this->db->join('student_pay_fee',
            'student_pay_fee.student_fee_id=student_fee.student_fee_id');

        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }

    //-------------------------------------------------------------------
    function monthlyfeeremaining($std_id)
    {
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->where('student_id', $std_id);
        $this->db->join('student_payment',
            'student_payment.fkstudentclassfee_id=student_class_fee.classfee_id');

        $query = $this->db->get();
        $result = $query->result();
        $remain = 0;
        foreach ($result as $row) {
            $remain = $row->std_remain;
        }
        return $remain;
    }

    //--------------------------------------------------------------------
    function monthlyfeedate()
    {
        $std_id = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('student_fee',
            'student_fee.student_id=student.student_id');
        $this->db->where('student.student_id', $std_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    //-------------------------------------------------------------------
    function otherfeedetails()
    {
        $std_id = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('student_other_payment');
        $this->db->where('student_id', $std_id);

        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }

    //------------------------------------------------------------------
    function otherfeeremaining($std_id)
    {
        $this->db->select('*');
        $this->db->from('student_other_payment');
        $this->db->where('student_id', $std_id);

        $query = $this->db->get();
        $result = $query->result();
        $remain = 0;
        foreach ($result as $row) {
            $remain = $row->otherfee_remain;
        }
        return $remain;
    }

    //---------------------------------------------------------
    function otherfeedate()
    {
        $std_id = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('student_other_payment');
        $this->db->where('student_id', $std_id);
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    //-----------------------------------------------------------------
    function std_search()
    {
        $search = $this->input->post("std_search");
        $this->db->select("*");
        $this->db->from("student");
        $this->db->like('student_name', $search);
        $this->db->or_like('std_father_name', $search);
        $this->db->or_like('student_contact', $search);
        $this->db->or_like('student_email', $search);
        $this->db->or_like('student_id', $search);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

//-----------------------------------------------------------------------
    function add_newclass($std_id)
    {
        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('student_class_fee', 'student_class_fee.fkclass_id = class.cl_id');
        $this->db->where("student_class_fee.fkstudent_id", $std_id);
        $query = $this->db->get();
        $result1 = $query->result();
        $num_offer = $query->num_rows();
        if ($num_offer>0) {
        foreach ($result1 as $ids) {
            $array_ids[] = $ids->cl_id;
        }
            $this->db->select('*');
            $this->db->from('class');
            $this->db->join('subject', 'subject.su_id = class.su_id');
            $this->db->join('course', 'course.co_id = class.co_id');
            $this->db->join('teacher', 'teacher.id = class.t_id');
            $query2 = $this->db->get();
            $num = $query2->num_rows();
            if ($num_offer < $num) {
                $result = $query2->result();
                for ($i = 0; $i <= $num - 1; $i++) {
                    if (in_array($result[$i]->cl_id, $array_ids)) {
                        continue;
                    }
                    $data[] = $result[$i];

                }
                return $data;
            } else {
                return 0;
            }
        } // for add class when no class selected by student
        else {
            $this->db->select('*');
            $this->db->from('class');
            $this->db->join('course', 'course.co_id = class.co_id');

            $this->db->join('subject', 'subject.su_id = class.su_id');
            $this->db->join('teacher', 'teacher.id = class.t_id');
            $query2 = $this->db->get();
            $result = $query2->result();
            if($result) {
                return $result;
            }
        else{
                return 0;
            }

        }
    }
//-----------------------------------------------
    function addnewclasspro($std_id)
    {
        $co_id = $this->input->post('co_id');
        $this->db->select('*');
        $this->db->from('class');
        //$this->db->where('co_id', $co_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        for ($i = 1; $i <= $num; $i++) {
            $subject = $this->input->post('select_' . $i);
            if ($subject == 'on') {
                $cl_id = $this->input->post('class_' . $i);

                $insert_array['student_classes' . $i] = array(
                    'fkclass_id' => $cl_id,
                    'fkstudent_id' => $std_id,
                    'st_class_fee_status' => 0,
                );
                //--------------------for latest inserted recored-----
                $insert_table = $this->db->insert('student_class_fee', $insert_array['student_classes' . $i]);
                $arr_cl[] = $cl_id;
            }
        }
        if ($insert_table) {
            return $arr_cl;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function addnewclass_fee($std_id)
    {
        $arr = $this->session->userdata("cl_ids");
        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->join('class', 'class.cl_id = student_class_fee.fkclass_id');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->where('fkstudent_id', $std_id);
        $this->db->where_in('fkclass_id', $arr);

        $query = $this->db->get();
        $result = $query->result();

        if ($result) {
            return $result;
        } else {
            return 0;
        }

    }
//---------------------------------------------------------------------
    function studentpermonth()
    {
        $year = date("Y");
        $cmonth = date("m");
        for($i=1; $i<=$cmonth;$i++){
            $month = date('M',strtotime("01-".$i."-2001"));
            $this->db->select('*');
            $this->db->from('student');
            $this->db->where("student_year",$year);
            $this->db->where("student_month",$month);
            $query = $this->db->get();
            $num_spm[] = $query->num_rows();

        }
        return $num_spm;
    }
//----------------------------------------------------------------
    function studentperyear()
    {

        $year = date("Y")-9;
        $cyear = date("Y");
        for($i=$year; $i<=$cyear; $i++){
            $this->db->select('*');
            $this->db->from('student');
            $this->db->where("student_year",$i);
            $query = $this->db->get();
            $num_spy[] = $query->num_rows();
        }
        return $num_spy;

    }
//------------------------------------------------------------------------
 function studentlevel()
 {
     $query = $this->db->get("course");
     return $query->result();
 }
//------------------------------------------------------------------------
 function levelclass($co_id)
 {
     $this->db->select("*");
     $this->db->from("class");
     $this->db->join("course","course.co_id=class.co_id");
     $this->db->join("teacher","teacher.id=class.t_id");
     $this->db->join("subject","subject.su_id=class.su_id");
     $this->db->where("class.co_id",$co_id);
     $query = $this->db->get();
     return $query->result();
 }
 //------------------------------------------------------------------------
 function clstudent($cl_id)
 {
     $this->db->select("*");
     $this->db->from("student_class_fee");
     $this->db->join("student","student.student_id=student_class_fee.fkstudent_id");
     $this->db->where("student_class_fee.fkclass_id",$cl_id);
     $query = $this->db->get();
     return $query->result();
 }
 //------------------------------------------------------------------------
     function chalanperstudent($clfee_id)
     {
         $this->db->select("*");
         $this->db->from("student_payment");
         $this->db->join("student_class_fee","student_class_fee.classfee_id=student_payment.fkstudentclassfee_id");
         $this->db->join("student","student.student_id=student_class_fee.fkstudent_id");
         $this->db->join("class","class.cl_id=student_class_fee.fkclass_id");
         $this->db->join("course","course.co_id=class.co_id");
         $this->db->join("subject","subject.su_id=class.su_id");
         $this->db->where("fkstudentclassfee_id",$clfee_id);
         $this->db->order_by("p_id","desc");
         $this->db->limit("1");
         $query = $this->db->get();
         return $query->result();
     }
 //------------------------------------------------------------------------
    function chalanperclass($cl_id)
    {
        $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("fkclass_id",$cl_id);
        /*$this->db->join("student_payment","student_payment.	fkstudentclassfee_id=student_class_fee.classfee_id");
        $this->db->order_by("student_payment.p_id");
        $this->db->limit("1");*/
        $query = $this->db->get();
        foreach($query->result() as $row_c)
        {
            $classfee_id = $row_c->classfee_id;
            $this->db->select("*");
            $this->db->from("student_payment");
            $this->db->where("fkstudentclassfee_id",$classfee_id);
            $this->db->join("student_class_fee","student_class_fee.classfee_id=student_payment.fkstudentclassfee_id");
            $this->db->join("student","student.student_id=student_class_fee.fkstudent_id");
            $this->db->join("class","class.cl_id=student_class_fee.fkclass_id");
            $this->db->join("course","course.co_id=class.co_id");
            $this->db->join("subject","subject.su_id=class.su_id");
            $this->db->order_by("student_payment.p_id","desc");
            $this->db->limit("1");
            $query1 = $this->db->get();
             $std_p[] =$query1->result();


        }
        return $std_p;
    }
 //------------------------------------------------------------------------
   function chalanperlevel($co_id)
   {
       $this->db->select("*");
       $this->db->from("class");
       $this->db->join("student_class_fee","student_class_fee.fkclass_id=class.cl_id");
       //$this->db->join('student_payment','student_payment.fkstudentclassfee_id = student_class_fee.classfee_id');
       $this->db->where("class.co_id",$co_id);
       $this->db->where("class.class_status",'1');
       $this->db->where("student_class_fee.st_class_fee_status",'1');
       $this->db->group_by("student_class_fee.fkstudent_id");
       $query = $this->db->get();
       if($query->num_rows()>0) {
           foreach ($query->result() as $row) {
               $student_id = $row->fkstudent_id;
               $this->db->select("*");
               $this->db->from("student_class_fee");
               $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
               $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
               $this->db->join("course", "course.co_id=class.co_id");
               $this->db->join("subject", "subject.su_id=class.su_id");
               $this->db->where("fkstudent_id", $student_id);
               $this->db->where("student_class_fee.st_class_fee_status", '1');
               $query1 = $this->db->get();
               $std_p[] = $query1->result();
               /*$i = 1;
               foreach( $std_p as $classinfo){
                    $this->db->where( $classinfo['classfee_id']);
                    $this->db->order_by('p_id','DESC');
                    $this->db->limit(1);
                    $queryvar = $this->db->get('student_payment');
                   $somethingarray[$i]['id'] = $classinfo['classfee_id'];
                   $somethingarray[$i]['fee'] = $queryvar->result();
                   $i++;
                }*/
               /* foreach($query1->result() as $row1){
                    $classfee_id = $row1->classfee_id;
                    $this->db->select("*");
                    $this->db->from("student_payment");
                    $this->db->where("fkstudentclassfee_id",$classfee_id);
                    $this->db->join("student_class_fee","student_class_fee.classfee_id=student_payment.fkstudentclassfee_id");
                    $this->db->join("student","student.student_id=student_class_fee.fkstudent_id");
                    $this->db->join("class","class.cl_id=student_class_fee.fkclass_id");
                    $this->db->join("course","course.co_id=class.co_id");
                    $this->db->join("subject","subject.su_id=class.su_id");
                    $this->db->order_by("student_payment.p_id","desc");
                    $this->db->limit("1");
                    $query2 =$this->db->get();
                    $std_p1["fee"][] = $query2->result();
                }*/
           }
           for ($i = 0; $i < sizeof($std_p); $i++) {
               for ($j = 0; $j < sizeof($std_p[$i]); $j++) {
                   $std_p[$i][$j]->classfee_id;
                   $this->db->order_by('p_id', 'DESC');
                   $this->db->where('fkstudentclassfee_id', $std_p[$i][$j]->classfee_id);
                   $lavana = $this->db->get('student_payment');
                   $std_j = $lavana->result();
                   $std_j = $std_j[0];
                   $std_p[$i][$j]->p_id = $std_j->p_id;
                   $std_p[$i][$j]->std_payment = $std_j->std_payment;
                   $std_p[$i][$j]->std_paid = $std_j->std_paid;
                   $std_p[$i][$j]->std_remain = $std_j->std_remain;
                   $std_p[$i][$j]->std_date = $std_j->std_date;
                   $std_p[$i][$j]->std_reason = $std_j->std_reason;
               }
           }

           return $std_p;
       }
       else{
           return 0;
       }
   }
 //------------------------------------------------------------------------
}