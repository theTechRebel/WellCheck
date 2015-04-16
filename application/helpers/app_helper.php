<?php

//MySQL date time format
	function get_time(){
	$currenttime = time();
	$mysql_date_time = strftime("%Y-%m-%d", $currenttime);
	$time = $mysql_date_time;
	return $time;
	}

  function getCalendarDateToday(){
  $currenttime = time();
  $mysql_date_time = strftime("%Y/%m", $currenttime);
  $time = $mysql_date_time;
  return $time;
  }


	 function isLoggedIn() {
	 	 $ci=& get_instance();
     $isLoggedIn = $ci->session->userdata('loggedin'); 
     if($isLoggedIn == FALSE){redirect('home/');}
  }

  function isLoggedOut(){
     $ci=& get_instance();
     $isLoggedIn = $ci->session->userdata('loggedin'); 
     if($isLoggedIn == TRUE){redirect('dashboard/');}
  }

   function logout() {
    	$ci=& get_instance();
     $ci->session->unset_userdata('loggedin');
					$ci->session->sess_destroy();
        redirect('home');
    }

    function js(){
      $ci=& get_instance();
      $ci->jquery->script(base_url()."uiux/jquery/dist/jquery.min.js",TRUE);
    }


?>
