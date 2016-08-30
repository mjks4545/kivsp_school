<?php

class Course_m extends CI_Model{
    function view_courses(){
//        $this->db->order_by('co_id','desc');
//        $query  = $this->db->get('course');
//        $result = $query->result();
//
//        if($result){
//            return $result;
//        }else{
//            return 0;
//        }
        $this->db->select('*');
        $this->db->from("course");
        $this->db->join('class_sections','class_sections.co_id = course.co_id','right');
        $this->db->join('class_course', 'class_course.class_course_id = class_sections.class_course_id');
        
        $query  = $this->db->get();
        $result = $query->result();

        if($result){
            return $result;
        }else{
            return 0;
        }
    }
  function view_class_courses(){
        $this->db->order_by('class_course_id','aesc');
        $query  = $this->db->get('class_course');
        $result = $query->result();

        if($result){
            return $result;
        }else{
            return 0;
        }
    }
function view_course(){
        $this->db->order_by('co_name','aesc');
        $query  = $this->db->get('course');
        $result = $query->result();

        if($result){
            return $result;
        }else{
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function addcoursepro(){
        $course_title   = $this->input->post('course_title');
        $created_date   = date("d-M-Y");
        $created_time   = date("h:i:sa");

        $insert_array = array(
            'co_name'       => $course_title,
            'created_date'  => $created_date,
            'created_time'  => $created_time,
        );
        $result = $this->db->insert('course',$insert_array);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }

    function addclasssectionpro()
    {   $course = $this->input->post('course');
        $class_section = $this->input->post('class_section');
        $class_course = $this->input->post('class_course');
        $class_name = $this->input->post('class_name');
        
        $created_date   = date("d-M-Y");
        $created_time   = date("h:i:sa");
        
        $insert_array = array(
            'c_section_name'=> $class_section,
            'subjects'      => $class_course,
            'class_course_id' => $class_name,
            'co_id' => $course,
            'created_date'  => $created_date,
            'created_time'  => $created_time,
        );
        $result = $this->db->insert('class_sections',$insert_array);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }
    //------------------------------------------------------------------------------------------------------------------
    function updatecourse($id){
        $this->db->where('co_id',$id);
        $query = $this->db->get('course');
        $result = $query->result();
        if ($result){
            return $result;
        }else{
            return 0;
        }

    }

        function updateclasscourse($cs_id,$cc_id,$c_id){
           $cs_id =  $this->uri->segment(3);
           $cc_id =  $this->uri->segment(4);
           $c_id = $this->uri->segment(5);
        $this->db->select('*');
        $this->db->from('course');
        $this->db->join('class_course', 'class_course.co_id = course.co_id');
        $this->db->join('class_sections', 'class_sections.class_course_id = class_course.class_course_id');
        $this->db->where('class_course.class_course_id',$cc_id);
        $this->db->where('course.co_id',$c_id);
        $query  = $this->db->get();
        $result = $query->result();
        if($result){
            return $result;
        }else{
            return 0;
        }

    }
     function updateclasscoursepro(){
        $course_name    = $this->input->post('course_title');
        $class_course = $this->input->post('class_name');
        $class_section = $this->input->post('class_section');
        $class_subject = $this->input->post('class_course');
        $cs_id = $this->input->post('cs_id');
        $cc_id = $this->input->post('cc_id');
        $c_id = $this->input->post('c_id');
        $updated_date   = date("d-M-Y");
        $updated_time   = date("h:i:sa");
        $this->db->where('co_id',$c_id);
        $update_array = array(
            'co_name'      => $course_name,    
            'updated_date' => $updated_date,
            'updated_time' => $updated_time,
        );
        $result = $this->db->update('course',$update_array);
       
        $this->db->where('c_section_id',$cs_id);
        
        $update_array = array(
            'c_section_name'      => $class_section,
            'subjects' => $class_subject,
            'updated_date' => $updated_date,
            'updated_time' => $updated_time,
        );
        $result = $this->db->update('class_sections',$update_array);
        
        $this->db->where('class_course_id',$cc_id);
        $update_array = array(
            'class_course_name'      => $class_course,
            'updated_date' => $updated_date,
            'updated_time' => $updated_time,
        );
        $result = $this->db->update('class_course',$update_array);

        if ($result){
            return $result;
        }else{
            return 0;
        }
    }
        
    //------------------------------------------------------------------------------------------------------------------
    function updatecoursepro($id){
        $course_name    = $this->input->post('course_title');
        $updated_date   = date("d-M-Y");
        $updated_time   = date("h:i:sa");
        $this->db->where('co_id',$id);

        $update_array = array(
            'co_name'      => $course_name,
            'updated_date' => $updated_date,
            'updated_time' => $updated_time,
        );
        $result = $this->db->update('course',$update_array);
        if ($result){
            return $result;
        }else{
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function deletecourse($id){
        $query = $this->db->delete('course',['co_id' => $id]);
        if ($query){
            return 1;
        }else{
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
}