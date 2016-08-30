<?php
class Test_m extends CI_Model{
    
    
    //--//-------selection of subject ------------//--/////////////
    
    
    public function subject_info($course_id,$class_course_id,$class_section_id){
        $this->db->where('co_id', $course_id);
        $dvm =$this->db->get('course');
        $result['dvm'] = $dvm->result_array();
        $this->db->select('*');
        $class = $this->db->get('class_course');
        $result['class'] =$class->result_array();
        $result['section'] =$class_section_id;
        return $result;
        
    }
    
    
    //--//-------test insertion --------//--//////////////////////
    
    
    public function test_insertion(){
        $exam_type                = $this->input->post('exam_type');
        $field_study              = $this->input->post('field_study');
        $course_id                = $this->input->post('course_id');
        $class_course_id          = $this->input->post('class_course_id');
        $class_section_name       = $this->input->post('class_section');
        $exam_date                = $this->input->post('exam_date');
        $total_marks              = $this->input->post('total_mark');
        $exam_month               = $this->input->post('exam_month');
        $data = array(
             'field_study'        =>     $field_study,
            'exam_type'           =>     $exam_type,
            'class_course_id'     =>     $course_id,
            'class_section_name'  =>     $class_section_name,
            'exam_date'           =>     $exam_date,
            'exam_month'          =>     $exam_month,
            'exam_marks'          =>     $total_marks

         );
        
        $result=$this->db->insert('exam',$data);
        $insert_id = $this->db->insert_id();
        $show =array(
            'course_id'         => $course_id,
            'class_course_id'   => $class_course_id,
            'class_section'     => $class_section_name,
            'insert_id'         =>$insert_id
        ); 
        return $show;
       
    }
    
    
    //--//-------subject displaying -------//--///////////////
    
    
    public function  subject_display($show){
        $this->db->select('*');
        $sub=$this->db->get('subject');
        $result['result'] = $sub->result_array();
        $this->db->where('c_section_name',$show['class_section']);
        $section_query=$this->db->get('class_sections');
        $show_section_query = $section_query->result_array();

        $this->db->where('c_section_name',$show['class_section']);
        $section_name = $this->db->get('class_sections');
        $ful_section_name = $section_name->result_array();
               
       for($counter=0;$counter<count($ful_section_name);$counter++)
        {
        
        $this->db->where('c_section_id',$ful_section_name[$counter]['c_section_id']);
        $this->db->where('co_id',$show['course_id']);
        $this->db->where('class_course_id',$show['class_course_id']);
        $show1 = $this->db->get('student_section');
        $student_section_data[$counter]=$show1->result_array();
        }
        //echo "<pre>"; print_r($student_section_data);die;
        //$err = array_filter($student_section_data);
        for($counter2=0;$counter2<count($student_section_data);$counter2++)
        {
            $errors = array_filter($student_section_data[$counter2]);
            if(!empty($errors))
                {
            
                    for($counter3=0;$counter3<count($student_section_data[$counter2]);$counter3++)
                    {
                        $check = count($student_section_data[$counter2]);
                        if($check>0)
                        {
                            $this->db->where('student_id',$student_section_data[$counter2][$counter3]['student_id']);
                            $show4 =$this->db->get('student');
                            $final_data['s_data'][$counter3] = $show4->result_array();
                        }
                    }
                }
        }
        
        $result['student_name'] = $final_data['s_data'];
        $result['class_course_id'] = $show['class_course_id'];
        $result['course_id'] = $show['course_id'];
        $result['class_section'] = $show['class_section'];
        $result['exam_insert_id'] = $show['insert_id'];
        return $result;
    }
    
    
    //--//-------exam obt marks submition -------//--///////////////
    
    
    public function exam_result_p(){
        
        
         $counter = $this->input->post('counter');
         $course_id = $this->input->post('course_id');
         $class_section = $this->input->post('class_section');
         $exam_insert_id = $this->input->post('exam_insert_id');
         $class_course_id = $this->input->post('class_course_id');
//                    echo $obt_marks1 = $this->input->post("writing_marks_chem_1");
//                    echo $obt_marks2 = $this->input->post("writing_marks_maths_1");
//                    echo $obt_marks3 = $this->input->post("writing_marks_bio_1");
//                    echo $obt_marks4 = $this->input->post("writing_marks_eng_1");
//                    echo $obt_marks5 = $this->input->post("writing_marks_pak_1");
//                    echo $obt_marks6 = $this->input->post("writing_marks_urdu_1");
//                    echo $obt_marks7 = $this->input->post("writing_marks_pastho_1");die;
//                    echo $obt_marks8 = $this->input->post("writing_marks_farsi_1");
//                    echo $obt_marks9 = $this->input->post("writing_marks_mt_1");
//                    echo $obt_marks10 = $this->input->post("writing_marks_hindi_1");die;
       
	for( $i=0; $i <= $counter; $i++ ){
            
                    $writing_marks_chem_='writing_marks_chem_' .$i;
                    $writing_marks_maths_ = 'writing_marks_maths_' .$i;
                    $writing_marks_bio_ = 'writing_marks_bio_' .$i;
                    $writing_marks_eng_ = 'writing_marks_eng_' .$i;
                    $writing_marks_pak_ = 'writing_marks_pak_' .$i;
                    $writing_marks_urdu_ = 'writing_marks_urdu_' .$i;
                    $writing_marks_pashto_ = 'writing_marks_pashto_' .$i;
                    $writing_marks_farsi_ = 'writing_marks_farsi_' .$i;
                    $writing_marks_mt_ = 'writing_marks_mt_' .$i;
                    $writing_marks_hindi_ = 'writing_marks_hindi_' .$i;
                    $obt_marks1 = $this->input->post($writing_marks_chem_);
                    $obt_marks2 = $this->input->post($writing_marks_maths_);
                    $obt_marks3 = $this->input->post($writing_marks_bio_);
                    $obt_marks4 = $this->input->post($writing_marks_eng_);
                    $obt_marks5 = $this->input->post($writing_marks_pak_);
                    $obt_marks6 = $this->input->post($writing_marks_urdu_);
                    $obt_marks7 = $this->input->post($writing_marks_pashto_);
                    $obt_marks8 = $this->input->post($writing_marks_farsi_);
                    $obt_marks9 = $this->input->post($writing_marks_mt_);
                    $obt_marks10 = $this->input->post($writing_marks_hindi_);


//            $writing_m        = 'writing_marks_' . $i;
	    $temp_s_i         = 'student_id_' . $i;
//	    $writing_marks    = $this->input->post($writing_m);
	    $student_id       = $this->input->post($temp_s_i);
		$insert_marks = $this->db->insert('exam_result',
		    [
			'student_id'  => $student_id,
                        'class_course_id'=>$class_course_id,
                        'subject_id'  =>1,
                        'course_id'   => $course_id,
                        'class_section_name' =>$class_section,
                        'test_id' =>    $exam_insert_id,
			'marks_obt'      => $obt_marks1
		    ]
		);
                $insert_marks = $this->db->insert('exam_result',
		    [
			'student_id'  => $student_id,
                        'class_course_id'=>$class_course_id,
                        'subject_id'  =>2,
                        'course_id'   => $course_id,
                        'class_section_name' =>$class_section,
                        'test_id' =>    $exam_insert_id,
			'marks_obt'      => $obt_marks2
		    ]
		);
                $insert_marks = $this->db->insert('exam_result',
		    [
			'student_id'  => $student_id,
                        'class_course_id'=>$class_course_id,
                        'subject_id'  =>3,
                        'course_id'   => $course_id,
                        'class_section_name' =>$class_section,
                        'test_id' =>    $exam_insert_id,
			'marks_obt'      => $obt_marks3
		    ]
		);
                $insert_marks = $this->db->insert('exam_result',
		    [
			'student_id'  => $student_id,
                        'class_course_id'=>$class_course_id,
                        'subject_id'  =>4,
                        'course_id'   => $course_id,
                        'class_section_name' =>$class_section,
                        'test_id' =>    $exam_insert_id,
			'marks_obt'      => $obt_marks4
		    ]
		);
                $insert_marks = $this->db->insert('exam_result',
		    [
			'student_id'  => $student_id,
                        'class_course_id'=>$class_course_id,
                        'subject_id'  =>5,
                        'course_id'   => $course_id,
                        'class_section_name' =>$class_section,
                        'test_id' =>    $exam_insert_id,
			'marks_obt'      => $obt_marks5
		    ]
		);
                $insert_marks = $this->db->insert('exam_result',
		    [
			'student_id'  => $student_id,
                        'class_course_id'=>$class_course_id,
                        'subject_id'  =>6,
                        'course_id'   => $course_id,
                        'class_section_name' =>$class_section,
                        'test_id' =>    $exam_insert_id,
			'marks_obt'      => $obt_marks6
		    ]
		);
                $insert_marks = $this->db->insert('exam_result',
		    [
			'student_id'  => $student_id,
                        'class_course_id'=>$class_course_id,
                        'subject_id'  =>7,
                        'course_id'   => $course_id,
                        'class_section_name' =>$class_section,
                        'test_id' =>    $exam_insert_id,
			'marks_obt'      => $obt_marks7
		    ]
		);
                $insert_marks = $this->db->insert('exam_result',
		    [
			'student_id'  => $student_id,
                        'class_course_id'=>$class_course_id,
                        'subject_id'  =>8,
                        'course_id'   => $course_id,
                        'class_section_name' =>$class_section,
                        'test_id' =>    $exam_insert_id,
			'marks_obt'      => $obt_marks8
		    ]
		);
                $insert_marks = $this->db->insert('exam_result',
		    [
			'student_id'  => $student_id,
                        'class_course_id'=>$class_course_id,
                        'subject_id'  =>9,
                        'course_id'   => $course_id,
                        'class_section_name' =>$class_section,
                        'test_id' =>    $exam_insert_id,
			'marks_obt'      => $obt_marks9
		    ]
		);
                $insert_marks = $this->db->insert('exam_result',
		    [
			'student_id'  => $student_id,
                        'class_course_id'=>$class_course_id,
                        'subject_id'  =>10,
                        'course_id'   => $course_id,
                        'class_section_name' =>$class_section,
                        'test_id' =>    $exam_insert_id,
			'marks_obt'      => $obt_marks10
		    ]
		);
           
	}
       
     
        
        
        
        
//        $class_course_id    = $this->input->post('class_course_id');
//        $course_id          = $this->input->post('course_id');
//        $class_section      = $this->input->post('class_section');
//        $exam_insert_id     = $this->input->post('exam_insert_id');
//        $subject_counter    = $this->input->post('subject_counter1');
//        $student_counter1   = $this->input->post('student_counter1');
////        echo $obt_marks1 = $this->input->post("obt_marks_chem_0");die;
//        echo $obt_marks1 = $this->input->post("obt_marks_chem_0");die;
//        for($student_model_counter=0;$student_model_counter<=$student_counter1;$student_model_counter++)
//        {
//            $final_student_id = $this->input->post("student_id_$student_model_counter");
//                    for($counter=0;$counter<=$subject_counter;$counter++)
//                {
//                    $obt_marks1 = $this->input->post("obt_marks_chem_$counter");
//                    $obt_marks2 = $this->input->post("obt_marks_maths_$counter");
//                    $obt_marks3 = $this->input->post("obt_marks_bio_$counter");
//                    $obt_marks4 = $this->input->post("obt_marks_eng_$counter");
//                    $obt_marks5 = $this->input->post("obt_marks_pak_$counter");
//                    $obt_marks6 = $this->input->post("obt_marks_urdu_$counter");
//                    $obt_marks7 = $this->input->post("obt_marks_pashto_$counter");
//                    $obt_marks8 = $this->input->post("obt_marks_farsi_$counter");
//                    $obt_marks9 = $this->input->post("obt_marks_mobile_$counter");
//                    $obt_marks10 = $this->input->post("obt_marks_hindi_$counter");
//                    $subject_id = $this->input->post("subject_id_$counter");
//                    $data1      =array(
//                        'marks_obt'             => $obt_marks1,
//                        'subject_id'            => $subject_id,
//                        'course_id'             => $course_id,
//                        'class_course_id'       => $class_course_id,
//                        'student_id'            => $final_student_id,
//                        'class_section_name'      => $class_section
//                    );
//                    $this->db->insert('exam_result',$data1);
//                    $data2      =array(
//                        'marks_obt'             => $obt_marks2,
//                        'subject_id'            => $subject_id,
//                        'course_id'             => $course_id,
//                        'class_course_id'       => $class_course_id,
//                        'student_id'            => $final_student_id,
//                        'class_section_name'      => $class_section
//                    );
//                    $this->db->insert('exam_result',$data2);
//                    $data3      =array(
//                        'marks_obt'             => $obt_marks3,
//                        'subject_id'            => $subject_id,
//                        'course_id'             => $course_id,
//                        'class_course_id'       => $class_course_id,
//                        'student_id'            => $final_student_id,
//                        'class_section_name'      => $class_section
//                    );
//                    $this->db->insert('exam_result',$data3);
//                    $data4      =array(
//                        'marks_obt'             => $obt_marks4,
//                        'subject_id'            => $subject_id,
//                        'course_id'             => $course_id,
//                        'class_course_id'       => $class_course_id,
//                        'student_id'            => $final_student_id,
//                        'class_section_name'      => $class_section
//                    );
//                    $this->db->insert('exam_result',$data4);
//                    $data5      =array(
//                        'marks_obt'             => $obt_marks5,
//                        'subject_id'            => $subject_id,
//                        'course_id'             => $course_id,
//                        'class_course_id'       => $class_course_id,
//                        'student_id'            => $final_student_id,
//                        'class_section_name'      => $class_section
//                    );
//                    $this->db->insert('exam_result',$data5);
//                    $data6      =array(
//                        'marks_obt'             => $obt_marks6,
//                        'subject_id'            => $subject_id,
//                        'course_id'             => $course_id,
//                        'class_course_id'       => $class_course_id,
//                        'student_id'            => $final_student_id,
//                        'class_section_name'      => $class_section
//                    );
//                    $this->db->insert('exam_result',$data6);
//                    $data7      =array(
//                        'marks_obt'             => $obt_marks7,
//                        'subject_id'            => $subject_id,
//                        'course_id'             => $course_id,
//                        'class_course_id'       => $class_course_id,
//                        'student_id'            => $final_student_id,
//                        'class_section_name'      => $class_section
//                    );
//                    $this->db->insert('exam_result',$data7);
//                    $data8      =array(
//                        'marks_obt'             => $obt_marks8,
//                        'subject_id'            => $subject_id,
//                        'course_id'             => $course_id,
//                        'class_course_id'       => $class_course_id,
//                        'student_id'            => $final_student_id,
//                        'class_section_name'      => $class_section
//                    );
//                    $this->db->insert('exam_result',$data8);
//                    $data9      =array(
//                        'marks_obt'             => $obt_marks9,
//                        'subject_id'            => $subject_id,
//                        'course_id'             => $course_id,
//                        'class_course_id'       => $class_course_id,
//                        'student_id'            => $final_student_id,
//                        'class_section_name'      => $class_section
//                    );
//                    $this->db->insert('exam_result',$data9);
//                    $data10      =array(
//                        'marks_obt'             => $obt_marks10,
//                        'subject_id'            => $subject_id,
//                        'course_id'             => $course_id,
//                        'class_course_id'       => $class_course_id,
//                        'student_id'            => $final_student_id,
//                        'class_section_name'      => $class_section
//                    );
//                    $this->db->insert('exam_result',$data10);
//
//
//                    $exam_result_id = $this->db->insert_id();
//                }
       // }
        
        
        
    }
    
    
    //--//---------test report -------------------//--//////////
    
    
    public function test_report_m(){
//        $this->db->select('*,SUM(marks_obt) AS marks_obt', FALSE);
//        $this->db->group_by("student_id");
//        $success        = $this->db->get('exam_result');
//        $success_result = $success->result_array();
        
        
        $this->db->select('* ,SUM(marks_obt) AS marks_obt', FALSE);
        $this->db->group_by("student.student_id");
        $this->db->from('exam_result');
        $this->db->join('subject', 'subject.su_id = exam_result.subject_id');
        $this->db->join('student','student.student_id=exam_result.student_id');
        $this->db->join('course', 'course.co_id = exam_result.course_id');
        $this->db->join('class_course', 'class_course.class_course_id = exam_result.class_course_id');
        $this->db->join('exam', 'exam.e_id = exam_result.test_id');
        
        $success =$this->db->get();
        
        $success_result = $success->result_array();
        
        return $success_result;
    }
    
    //--//---------test report exam type vise -------------------//--//////////
    
    public function test_report_exam_m(){
        $exam_type = $this->input->post('exam_type');
        $this->db->select('*,SUM(marks_obt) AS marks_obt');
        $this->db->group_by("student.student_id");
        //$this->db->group_by("exam.exam_type");
        //$this->db->where('exam_type',"1stterm");
        $this->db->from('exam_result');
        $this->db->join('subject', 'subject.su_id = exam_result.subject_id');
        $this->db->join('student','student.student_id=exam_result.student_id');
        $this->db->join('course', 'course.co_id = exam_result.course_id');
        $this->db->join('class_course', 'class_course.class_course_id = exam_result.class_course_id');
        $this->db->join('exam', 'exam.e_id = exam_result.test_id');
        $this->db->where('exam.exam_type',$exam_type);
        
        $success =$this->db->get();
        
        $success_result = $success->result_array();
        //echo "<pre>";print_r($success_result);die;
        return $success_result;
    }
    
    //--//---------displaying data of to class vise view -------------------//--//////////
    
    public function class_vise_m(){
        $course = $this->db->get('course');
        $course_result = $course->result_array();
        $class_course = $this->db->get('class_course');
        $class_course_result = $class_course->result_array();
        
        $result['course_result'] = $course_result;
        $result['class_course_result'] = $class_course_result;
        return $result;
        
        
    }
    
    //--//---------displaying report of to class vise view -------------------//--//////////
    
    public function test_report_class_m(){
        $course         = $this->input->post('course');
        $class_course   = $this->input->post('class_course');
        $section        = $this->input->post('section');
        
        $this->db->select('*,SUM(marks_obt) AS marks_obt');
        $this->db->group_by("student.student_id");
        $this->db->from('exam_result');
        $this->db->join('subject', 'subject.su_id = exam_result.subject_id');
        $this->db->join('student','student.student_id=exam_result.student_id');
        $this->db->join('course', 'course.co_id = exam_result.course_id');
        $this->db->join('class_course', 'class_course.class_course_id = exam_result.class_course_id');
        $this->db->join('exam', 'exam.e_id = exam_result.test_id');
        $this->db->where('course.co_id',$course);
        $this->db->where('class_course.class_course_id',$class_course);
        $this->db->where('exam_result.class_section_name',$section);
        
        $success =$this->db->get();
        
        $success_result = $success->result_array();
        //echo "<pre>";print_r($success_result);die;
        return $success_result;
    }
}

?>
