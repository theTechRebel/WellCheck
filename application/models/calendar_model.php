<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calendar_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();

        			 $prefs = array (
               'show_next_prev'  => TRUE,
               'day_type' => 'long', 
               'next_prev_url'   => base_url().'dashboard/calendar/',
               'template' => '
																{table_open}<table class="calendar table">{/table_open}
																{week_day_cell}<th>{week_day}</th>{/week_day_cell}
																{cal_cell_content}<div class="this-day"><span class="day_listing"><span class="d">{day}</span><br/> {content}&nbsp;</span></div>{/cal_cell_content}
																{cal_cell_content_today}<div class="today"><span class="day_listing"><span class="d">{day}</span><br/> 
                                {content}&nbsp;</span></div>{/cal_cell_content_today}
																{cal_cell_no_content}<span class="day_listing"><span class="d">{day}</span></span>&nbsp;{/cal_cell_no_content}
																{cal_cell_no_content_today}<div class="today"><span class="day_listing"><span class="d">{day}</span></span></div>{/cal_cell_no_content_today}'
             );
			$this->load->library('calendar', $prefs);
    }

    public function getBookings($year,$month){
   	    $table_name = "calendarcount";
   	    $like_condition = array('thedate'=> $year."/".$month);
        $query = $this->app_model->get_all_like($table_name,$like_condition);

        if($query->num_rows() > 0){
        	$query = $query->result();

        foreach($query as $row){
        	$day = (int)substr($row->thedate,-2);
        	$bookings[(int)$day] = $row->qued." in Que <br/>".$row->cancelled." Cancelled <br/>".$row->processed." Processed";
        }

        return $bookings;
       }else{
       	return FALSE;
    }
       }


 }