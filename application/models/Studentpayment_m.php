<?php

class Studentpayment_m extends CI_Model
{

    function viewstd()
    {
        $this->db->select("*");
        $this->db->from("student_class_fee");
//        $this->db->where("st_class_fee_status",1);
        $this->db->group_by("fkstudent_id");
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->where("student_status", 1);
        $query = $this->db->get();
        $result = $query->result();
        echo "<pre>";
        print_r($result);
        die();
        return $result;
    }

    //---------------------------------------------------------------
    function studentclass($st_id)
    {
        $this->db->select("*");
        $this->db->from("student_class_fee");
        $this->db->where("fkstudent_id", $st_id);
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->join("subject", "subject.su_id=class.su_id");
        $query = $this->db->get();
        return $query->result();
    }

    //---------------------------------------------------------------
    function checkad($st_id, $classfee_id)
    {
        $this->db->select("*");
        $this->db->from("student_payment");
        $this->db->join("student_class_fee", "student_class_fee.classfee_id=student_payment.fkstudentclassfee_id");
        $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
        $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
        $this->db->where("class_status", 1);
        $this->db->where("fkstudent_id", $st_id);
        $this->db->where("fkstudentclassfee_id", $classfee_id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function studentchalanview()
    {
        $st_id = $this->uri->segment(3);
        $this->db->select("*");
        $this->db->from("student");
        $this->db->where('student_id',$st_id);
        $this->db->where("student_status", 1);
        $query = $this->db->get();
        return $query->result();
    }
    function studentchalanclass()
    {
        $co_id = $this->uri->segment(4);
        $this->db->select("*");
        $this->db->from("class_course");
        $this->db->where('class_course_id',$co_id);
        $query = $this->db->get();
        return $query->result();
    }
   
    function studentcourse()
    {
        $st_id = $this->uri->segment(3);
        $co_id = $this->uri->segment(4);
        $this->db->select("*");
        $this->db->from("course");
        $this->db->join('student_section', 'student_section.co_id = course.co_id');
        $this->db->where('student_id',$st_id);
        $this->db->where('class_course_id',$co_id);
        $query = $this->db->get();
        return $query->result();
        
    }
    function studentpaymentfeeview()
    {
        $st_id = $this->uri->segment(3);
        $co_id = $this->uri->segment(4);
        $course = $this->uri->segment(5);
        $section_id = $this->uri->segment(6);
        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('student_section', 'student_section.student_id = student.student_id');
        $this->db->join('class_sections','class_sections.c_section_id=student_section.c_section_id');
        $this->db->join('course','course.co_id=student_section.co_id');
        $this->db->join('class_course','class_course.class_course_id=student_section.class_course_id');
        $this->db->where('student.student_id',$st_id);
        $this->db->where('course.co_id',$co_id);
        $this->db->where('class_course.class_course_id',$course);
        $this->db->where('class_sections.c_section_name',$section_id);
//        $this->db->where('class.co_id', $crs_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    //---------------------------------------------------------------
    function paynow()
    {
        $st_id = $this->uri->segment(3);
        $class_id = $this->uri->segment(4);
        $co_id = $this->uri->segment(5);
        $this->db->select("*");
        $this->db->from("student");
        $this->db->join("student_fee", "student_fee.student_id=student.student_id");
        $this->db->join("course", "course.co_id=student_fee.co_id");
        $this->db->join("class_course", "class_course.class_course_id=student_fee.class_course_id");
        $this->db->where('student.student_id',$st_id);
        $this->db->where('course.co_id',$class_id);
        $query = $this->db->get();
//        $num = $query->num_rows();
//        if ($num == 0) {
//            $this->db->select("*");
//            $this->db->from("student_class_fee");
//            $this->db->where("classfee_id", $classfee_id);
//            $this->db->join("student", "student.student_id=student_class_fee.fkstudent_id");
//            $this->db->join("class", "class.cl_id=student_class_fee.fkclass_id");
//            $query = $this->db->get();
//        }
         $result = $query->result();
         return $result;
        
    }
    
//    function slip()
//    {
//        echo $student_id = $this->input->post('fkstd_id');
//        echo $student_fee_id = $this->input->post('fkclass_id');
//        $this->db->select('*');
//        $this->db->from('student_fee');
//        $this->db->join('student_pay_fee', 'student_pay_fee.student_fee_id=student_fee.student_fee_id');
//        $query = $this->db->get();
//        $result = $query->result();
//        echo "<pre>";
//        print_r($result);
//        die();
//        if ($result) {
//            return $result;
//        } else {
//            return 0;
//        }
//    }
        function studentfeepayment()
        {
        $s_name = $this->input->post('s_name');
        $s_course = $this->input->post('s_course');
        $s_class = $this->input->post('s_class');
        $fee_type = $this->input->post('fee_type');
        $fee = $this->input->post('fee');
        //$rem_fee = $fee-$pay_fee;
        $std_date = date('d-M-Y');
        $std_time = date('h-m-s');
        $year = date('Y');
        $month= date('M');
        $inser_array = array(
                'student_id' => $s_name,
                'class_course_id' => $s_class,
                'co_id' => $s_course,
                'fee' => $fee,
                'fee_type' => $fee_type,
                'to_be_pay' => $fee,
          //      'remaining_fee' => $rem_fee,
                'time' => $std_time,
                'date' => $std_date,
                'month'=>$month,
                'year'=>$year
            );

            $result_1 = $this->db->insert('student_fee', $inser_array);
           if($result){
            return 1;
        }else{
            return 0;
        }
    }
function createfullchalan()
{
        $c_id = $this->uri->segment(3);
        $cc_id = $this->uri->segment(4);
        $cs_id = $this->uri->segment(5);
        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('student_fee', 'student_fee.student_id = student.student_id');
//        $this->db->join('student_section', 'student_section.student_id = student.student_id');
//        $this->db->join('class_sections', 'class_sections.c_section_id = student_section.c_section_id');
        $this->db->join('class_course', 'class_course.class_course_id = student_fee.class_course_id');
        $this->db->join('course','course.co_id = student_fee.co_id');
//        $this->db->where('course.co_id',$c_id);
        $this->db->where('class_course.class_course_id',$cc_id);
//        $this->db->where('class_sections.c_section_name',$cs_id);
        $query = $this->db->get();
        $result = $query->result();
        $fee = $result[0]->fee;
        $fee_type = $result[0]->fee_type;
        $mon = $result[0]->month;
        $month = date('M');
        if($month!=$mon)
        {
        for($counter=0;$counter < count($result);$counter++)
        {
            $student_id = $result[$counter]->student_id;
            $co_id = $result[$counter]->co_id;
            $class_id = $result[$counter]->class_course_id;
            $date = date('d-M-Y');
            $time = date('h-m-s');
            $year = date('Y');
            $month= date('M');
            
            $data = array(
                'student_id' => $student_id,
                'co_id'=> $co_id,
                'class_course_id' => $class_id,
                'fee' => $fee,
                'fee_type' => $fee_type,
                'to_be_pay' => $fee,
                'time' => $time,
                'date'=>$date,
                'month' => $month,
                'year'=> $year
            );
            $this->db->insert('student_fee',$data);
        }
        }
        else
        {
        $this->db->select('*,SUM(fee) AS total_fee',FALSE);
        $this->db->group_by('student.student_id');
        $this->db->from('student');
        $this->db->join('student_fee', 'student_fee.student_id = student.student_id');
//        $this->db->join('student_pay_fee','student_pay_fee.student_fee_id=student_fee.student_fee_id');
        $this->db->join('student_section', 'student_section.student_id = student.student_id');
        $this->db->join('class_sections', 'class_sections.c_section_id = student_section.c_section_id');
        $this->db->join('class_course', 'class_course.class_course_id = student_section.class_course_id');
        $this->db->join('course','course.co_id = student_section.co_id');
//        $this->db->where('course.co_id',$c_id);
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
            
}
    
//function updatestudentfee()
//{
//        $student = $this->input->post('student');
//        $fee_type = $this->input->post('fee_type');
//        $remaining = $this->input->post('remaining');
//    
//        $data = array(
//               'remaining_fee' => $remaining
//                     );
//        $this->db->where('student_id',$student);
//        $this->db->where('fee_type',$fee_type);
//        $d = $this->db->update('student_fee', $data);
//
//}

    //---------------------------------------------------------------
    function paymonthlyfeepro()
    {
        $student_fee_id = $this->input->post('fkclass_id');
        $std_payment = $this->input->post('total');
        $std_paid = $this->input->post('amountpay');
        $std_month = $this->input->post('month');
        $std_reason = $this->input->post('reason');
        $std_year = date('Y');
        $std_date = date('d-M-Y');
// for cheking if they have already a remaining balnce
        $this->db->select("*");
        $this->db->from("student_fee");
        $this->db->where('student_fee_id', $student_fee_id);
        
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->result();
        $num = $query->num_rows();
        if ($num > 0 && ($result[0]->student_month == $std_month)) {
            $std_remain = ($result[0]->remaining_fee) - ($std_paid);
            $inser_array = array(
                'student_fee_id' => $student_fee_id,
                'student_payment' => $result[0]->remaining_fee,
                'student_paid' => $std_paid,
                'remaining_fee' => $std_remain,
                'std_month' => $std_month,
                'std_year' => $std_year,
                'std_date' => $std_date,
                'std_reason' => $std_reason,
            );

            $result_1 = $this->db->insert('student_pay_fee', $inser_array);
        } else {
            $std_remain = $std_payment - ($std_paid);
            $inser_array = array(
                'student_fee_id' => $student_fee_id,
                'student_payment' => $std_payment,
                'student_paid' => $std_paid,
                'remaining_fee' => $std_remain,
                'std_month' => $std_month,
                'std_year' => $std_year,
                'std_date' => $std_date,
                'std_reason' => $std_reason,
            );
            $result_1 = $this->db->insert('student_pay_fee', $inser_array);
        }
        if ($result_1) {
            $data['arr'] = $inser_array;
            $data['result'] = 1;
            return $data;
        } else {
            return $data['result'] = 0;
        }
    }

    //----------------------------------------------------------------------------
    function classpaymentdetail($class_id, $std_id)
    {
        $this->db->select('*');
        $this->db->from('student_fee');
        $this->db->join('student_pay_fee', 'student_pay_fee.student_fee_id=student_fee.student_fee_id');
        $this->db->where('student_id', $std_id);
        $this->db->where('student_fee_id', $class_id);
        $query = $this->db->get();
        $result = $query->result();
        
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------
    function otherpaycheckad($std_id)
    {
        $this->db->select('*');
        $this->db->from('student_fee');
        $this->db->where('student_fee.student_id', $std_id);
        $this->db->join('student_other_payment', 'student_other_payment.student_id=student_fee.student_id');

        $query = $this->db->get();
        return $query->num_rows();
    }

    //------------------------------------------------------------------------------
    function otherpay($std_id)
    {
        echo $std_id = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('student_fee');
        $this->db->where('student_fee.student_id', $std_id);
        $this->db->join('student_other_payment', 'student_other_payment.student_id=student_fee.student_id');
        $this->db->limit(1);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num == 0) {
            $this->db->select('*');
            $this->db->from('student_fee');
            $this->db->where('student_id', $std_id);
            $query = $this->db->get();
        }
        $result = $query->result();
        return $result;

    }

    //-------------------------------------------------------------------------------
    function payotherfeepro($std_id)
    {
        // $fkstd_id               = $this->input->post('fkstd_id');
        if ($this->input->post('total_remain') != null) {
            $total_remain = $this->input->post('total_remain');
        } else {
            $total_remain = 0;
        }
        $total_amt = $this->input->post('total');
        $paid_amt = $this->input->post('amountpay');
        $reason = $this->input->post('reason');
        $total_remain = ($total_remain + $total_amt) - ($paid_amt);
        $otherfee_created_date = date('d-M-Y');
        $insert_array = array(
            'student_id' => $std_id,
            'total_amt' => $total_amt,
            'paid_amt' => $paid_amt,
            'otherfee_remain' => $total_remain,
            'amt_reason' => $reason,
            'other_month' => date("M"),
            'other_year' => date("Y"),
            'otherpay_created_date' => $otherfee_created_date,
        );
        $result = $this->db->insert('student_other_payment', $insert_array);
        if ($result) {
            $data['arr'] = $insert_array;
            $data['result'] = 1;
            return $data;
        } else {
            $data['result'] = 0;
            return $data;
        }
    }

    //---------------------------------------------------------------------
    function otherpaymentdetail($std_id)
    {
        $this->db->select("*");
        $this->db->from("student_other_payment");
        $this->db->join("student", "student.student_id=student_other_payment.student_id");
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;

    }

//-----------------------------------------------------------------------
    function monthlyfee()
    {
        $year = date("Y");
        $cmonth = date("m");
        for ($i = 1; $i <= $cmonth; $i++) {
            $paid = 0;
            $unpaid = 0;
            $month = date('M', strtotime("01-" . $i . "-2001"));
            $this->db->select('*');
            $this->db->from('student_payment');
            $this->db->where("std_year", $year);
            $this->db->where("std_month", $month);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->std_paid;
                $unpaid = $unpaid + $row->std_remain;
            }
            $data["paid"][] = $paid;
            $data["unpaid"][] = $unpaid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function yearlyfee()
    {
        $year = date("Y") - 9;
        $cyear = date("Y");
        for ($i = $year; $i <= $cyear; $i++) {
            $paid = 0;
            $unpaid = 0;
            $this->db->select('*');
            $this->db->from('student_payment');
            $this->db->where("std_year", $i);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->std_paid;
                $unpaid = $unpaid + $row->std_remain;
            }
            $data["paid"][] = $paid;
            $data["unpaid"][] = $unpaid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function otherpermonthfee()
    {
        $year = date("Y");
        $cmonth = date("m");
        for ($i = 1; $i <= $cmonth; $i++) {
            $paid = 0;
            $unpaid = 0;
            $month = date('M', strtotime("01-" . $i . "-2001"));
            $this->db->select('*');
            $this->db->from('student_other_payment');
            $this->db->where("other_year", $year);
            $this->db->where("other_month", $month);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_amt;
                $unpaid = $unpaid + $row->otherfee_remain;
            }
            $data["paid"][] = $paid;
            $data["unpaid"][] = $unpaid;
        }
        return $data;
    }

    //-----------------------------------------------------------------------
    function yearlyotherfee()
    {
        $year = date("Y") - 9;
        $cyear = date("Y");
        for ($i = $year; $i <= $cyear; $i++) {
            $paid = 0;
            $unpaid = 0;
            $this->db->select('*');
            $this->db->from('student_other_payment');
            $this->db->where("other_year", $i);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_amt;
                $unpaid = $unpaid + $row->otherfee_remain;
            }
            $data["paid"][] = $paid;
            $data["unpaid"][] = $unpaid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function monthlyteacherpaid()
    {
        $year = date("Y");
        $cmonth = date("m");
        for ($i = 1; $i <= $cmonth; $i++) {
            $paid = 0;
            $unpaid = 0;
            $month = date('m', strtotime("01-" . $i . "-2001"));
            $this->db->select('*');
            $this->db->from('teacher_salaries');
            $this->db->where("salary_year", $year);
            $this->db->where("paid_month", $month);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_salary;
            }
            $data[] = $paid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function monthlyotherstaffpaid()
    {
        $year = date("Y");
        $cmonth = date("m");
        for ($i = 1; $i <= $cmonth; $i++) {
            $paid = 0;
            $unpaid = 0;
            $month = date('m', strtotime("01-" . $i . "-2001"));
            $this->db->select('*');
            $this->db->from('staff_salaries');
            $this->db->where("paid_year", $year);
            $this->db->where("paid_month", $month);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_salary;
            }
            $data[] = $paid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function monthlyexpense()
    {
        $year = date("Y");
        $cmonth = date("m");
        for ($i = 1; $i <= $cmonth; $i++) {
            $paid = 0;
            $unpaid = 0;
            $month = date('M', strtotime("01-" . $i . "-2001"));
            $this->db->select('*');
            $this->db->from('expense');
            $this->db->where("expense_year", $year);
            $this->db->where("expense_month", $month);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->expense_paid_amount;
            }
            $data[] = $paid;
        }
        return $data;
    }

//-----------------------------------------------------------------------
    function monthlyreport()
    {
        /********* for total monthly income *********************************/
        $data['fee'] = $this->monthlyfee();
        $data['otherfee'] = $this->otherpermonthfee();
        $fee['monthlyfee'] = $data['fee']['paid'];
        $fee['monthlyotherfee'] = $data['otherfee']['paid'];
        /* for add values of two arrays */
        $data['monthly_income'] = array_map(function () {
            return array_sum(func_get_args());
        }, $fee['monthlyfee'], $fee['monthlyotherfee']);

        /********* for total monthly expenses *********************************/
        $expense['t_paid'] = $this->monthlyteacherpaid();
        $expense['otherstaff_paid'] = $this->monthlyotherstaffpaid();
        $expense['expense_paid'] = $this->monthlyexpense();
        $data['monthly_expense'] = array_map(function () {
            return array_sum(func_get_args());
        }, $expense['t_paid'], $expense['otherstaff_paid'], $expense['expense_paid']);
        return $data;
    }

//-----------------------------------------------------------------------
    function yearteacherpaid()
    {
        $year = date("Y") - 9;
        $cyear = date("Y");
        for ($i = $year; $i <= $cyear; $i++) {
            $paid = 0;
            $this->db->select('*');
            $this->db->from('teacher_salaries');
            $this->db->where("salary_year", $i);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_salary;
            }
            $data["paid"][] = $paid;
        }
        return $data;
    }
//-----------------------------------------------------------------------
    function yearotherpaid()
    {
        $year = date("Y") - 9;
        $cyear = date("Y");
        for ($i = $year; $i <= $cyear; $i++) {
            $paid = 0;
            $this->db->select('*');
            $this->db->from('staff_salaries');
            $this->db->where("paid_year", $i);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->paid_salary;
            }
            $data["paid"][] = $paid;
        }
        return $data;
    }
//-----------------------------------------------------------------------
    function yearexpense()
    {
        $year = date("Y") - 9;
        $cyear = date("Y");
        for ($i = $year; $i <= $cyear; $i++) {
            $paid = 0;
            $this->db->select('*');
            $this->db->from('expense');
            $this->db->where("expense_year", $i);
            $query = $this->db->get();
            $result = $query->result();
            foreach ($result as $row) {
                $paid = $paid + $row->expense_paid_amount;
            }
            $data["paid"][] = $paid;
        }
        return $data;
    }
//-----------------------------------------------------------------------
    function yearlyreport()
    {
        $fee['fee'] = $this->yearlyfee();
        $other['otherfee'] = $this->yearlyotherfee();
        $fee['fee'] = $fee['fee']['paid'];
        $other['other'] = $other['otherfee']['paid'];
    /* for add values of income arrays */
        $data['yearly_income'] = array_map(function () {
            return array_sum(func_get_args());
        }, $fee['fee'], $other['other']);
    /* for  yearly expenses *********************/
        $expense['t_paid'] = $this->yearteacherpaid();
        $expense['t_paid'] = $expense['t_paid']['paid'];
        $expense['otherstaff_paid'] = $this->yearotherpaid();
        $expense['otherstaff_paid'] = $expense['otherstaff_paid']['paid'];
        $expense['expense'] = $this->yearexpense();
        $expense['expense'] = $expense['expense']['paid'];


        /* for add expenses arry */
        $data['yearly_expense'] = array_map(function () {
            return array_sum(func_get_args());
        }, $expense['t_paid'],$expense['otherstaff_paid'],$expense['expense']);


        return $data;
    }
//-----------------------------------------------------------------------
}