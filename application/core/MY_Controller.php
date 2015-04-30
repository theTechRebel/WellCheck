<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $data = Array(); //protected variables goes here its declaration

    function __construct() {

        parent::__construct();
        $this->output->enable_profiler(FALSE); // I keep this here so I dont have to manualy edit each controller to see profiler or not
    }

public function javascript_functions(){

            $hideForm = "
            $('#hidden-form').hide(); 
            $('#attend').hide();
         $('.nav .disabled>a').on('click', function(e) {
            e.preventDefault(); 
            return false; 
         });
            ";

            $click_function ="alert('ok');";

            $getDay = "$('#hidden-form').fadeIn(600);
                        $('.day').removeClass('selected');
                        $(this).addClass('selected');
                ";

                $bookRequest = "
                    var selectedDay = $('.selected .d').text().trim();
        
                    console.log(selectedDay)

                    if(selectedDay == ''){  
                        alert('Please select a valid day.')
                        $('.day_listing').removeClass('selected')
                    }else{

                        var data = {
                        'idnumber' : $(this).attr('id'),
                        'status'            :   'qued',
                        'day'                       :   selectedDay,
                        'date'                  : $('#dates').text().toString()}

                        //provide full domain URL because we are using controllers and url mapping
                        //request could get lost in space
                        $.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/bookClient/',
        crossDomain: true,
        data: data,
        success: function (data) {
            alert(data)
            location.reload(true)
        },
        error: function (err) {
            console.log(err)
        }
    });

                        //$.post('dashboard/bookClient/',data,function(data){
                            //console.log(data)
                        //})

                        //alert('client booked.')
                    };";

                    $showClients = "
                        var selectedDay = $('.selected .d').text().trim();

                        if(selectedDay.length < 2){
                            selectedDay = '0'+selectedDay;
                        }

                        if(selectedDay != ''){
                            var fullDate = $('#dates').text().toString();
                            fullDate = fullDate + '/' + selectedDay;
                            
                            var data = {'date' : fullDate};

                            $.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/getBookings/',
        crossDomain: true,
        data: data,
        success: function (data) {
        $('#table-generated').remove();
                                $('#dynamic-table').append(data);
        },
        error: function (err) {
            console.log(err)
        }});
                            }";

                            $showIncomingClients = "

                            setInterval(function(){
                                $.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/getIncomingClients/',
        crossDomain: true,
        success: function (data) {
        $('#table-generated-incoming').remove();
                                $('#dynamic-table-incoming').html(data);
        },
        error: function (err) {
            console.log(err);
        }});
                            },2500);";

                            $showIncomingTestClients = "

                            setInterval(function(){
                                $.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/getIncomingTestClients/',
        crossDomain: true,
        success: function (data) {
        $('#table-generated-incoming-tests').remove();
                                $('#dynamic-table-incoming-tests').html(data);
        },
        error: function (err) {
            console.log(err);
        }});
                            },2500);";

       $showInComingBloodResults = "
        setInterval(function(){
                                $.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/getIncomingBloodResults/',
        crossDomain: true,
        success: function (data) {
        $('#table-generated-incoming-tests-bloods').remove();
                                $('#dynamic-table-incoming-bloods').html(data);
        },
        error: function (err) {
            console.log(err);
        }});
                            },2500);";

                        $attachStaticEventHandlers = "
                        $('#dynamic-table-incoming-bloods').on('click','.openResults',function(){

                             var clientName = $(this).attr('val');
        var timein = $(this).attr('time');
                             var clientNumber = $(this).attr('id');
                                var data = {'clientNumber' : clientNumber}; 
          
          $.ajax({
         type:'POST',
                                    data:data,
                                    url:'http://localhost/wellness/dashboard/getSavedTests/',
                                    dataType:'json',
                                    success: function(data){
                                        $('#client-name').empty();
            $('#client-name').append(clientName);
            $('#clendar-hide').hide();
            $('#attend').show();

            //$('#clinician-tabs').find('li').each(function(){
         //   $(this).removeClass('active')
            //});

          $('#records-tab').removeClass('active');
          $('#records').removeClass('active');
          $('#tests-tab').removeClass('active').addClass('disabled');
                    $('#tests').removeClass('active').addClass('disabled');
                    $('#results-tab').removeClass('disabled').addClass('active');
                    $('#results').removeClass('disabled').addClass('active');
             //$('#questionaire-tab').addClass('disabled');
                                     //$('#tests-tab').removeClass('disabled');
                                     $('#clinician-tabs li:eq(4) a').tab('show');

          $('#items-results').empty();
          
                                    $.each(data, function(key,val){

                                          if(val!=''){
                                       $('#items-results').append('<tr><td> '+key+' </td> <td> '+val+' </td></tr>');                                                    
                                          }});
                                    },
                                    error:function(err){
                                        console.log(err);
                                    }
          });
                                
                                });
       
    


                            $('#dynamic-table-incoming').on('click', '.openAttend', function(){

        var clientNumber = $(this).attr('id');
        var clientName = $(this).attr('val');
        var timein = $(this).attr('time');
                                var data = {'clientNumber' : clientNumber,
                                         'timein':timein};

                                $.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/getClientDetails/',
        data : data,
        crossDomain: true,
        success: function (data) {
        $('#client-name').empty();
        $('#client-name').append(clientName);
        $('#clendar-hide').hide();
        $('#attend').show();
        $('#records').html(data);
        $('#clinician-tabs  a:first').tab('show');
        $('#questionaire-tab').addClass('disabled');
        $('#tests-tab').addClass('disabled');
        $('#results-tab').addClass('disabled');
        },
        error: function (err) {
            console.log(err);
        }});
            });

                        $('#dynamic-table-incoming-tests').on('click','.openTest',function(){
                             var clientNumber = $(this).attr('id');
        var clientName = $(this).attr('val');
        var timein = $(this).attr('time');
                                var data = {'clientNumber' : clientNumber,
                                         'timein':timein};
                             var data1 = data;
                                console.log(data);
                             $.ajax({
                                type:'POST',
                                url:'http://localhost/wellness/dashboard/getClientDetails/',
                                data:data,
                                success: function(data){
                       $('#client-name').empty();
                       $('#client-name').append(clientName);
                        $('#clendar-hide').hide();
                        $('#attend').show();
                        $('#records').html(data);
                        $('#clinician-tabs  a:first').tab('show');
                        $('#results-tab').addClass('disabled');

                                                $.ajax({
                                                    type:'POST',
                                                    dataType:'json',
                                                    url:'http://localhost/wellness/dashboard/getClientTestDetails/',
                                                    data:data1,
                                                    success: function(data){

                                                            switch(data['package']){
                                                                case 'standard':
                     $('#comprehensive-tab').removeClass('active').addClass('disabled');
                     $('#comprehensive').removeClass('active');
                     $('#standard-tab').addClass('active');
                     $('#standard').addClass('active');

                   var selected = [];
                                                                for (var prop in data['tests']) {
                                                                    selected.push(data['tests'][prop]);
                                                                }

                                        var tests = ['hiv','hdltcholesterol','urine'];
                   var notSelected =$(tests).not(selected).get();
                   
                   tests.forEach(function(entry){
                    $('#'+entry).removeProp('disabled');
                   });

                   if(notSelected.length > 0){
                    notSelected.forEach(function(entry) {
                                    $('#'+entry).attr('disabled', 'true');
                                                                        });
                    }

                                                                break;

                                                                case 'comprehensive':
                     $('#comprehensive-tab').removeClass('disabled').addClass('active');
                     $('#standard-tab').removeClass('active').addClass('disabled');
                     $('#standard').removeClass('active');
                     $('#comprehensive').addClass('active');

                           var selected = [];
                                                                        for (var prop in data['tests']) {
                                                                            selected.push(data['tests'][prop]);
                                                                        }

                     var tests = ['ldl','trigs','hba1c','ecg','hepatitisscreen','psaviac','bloodgroup'];
                     var notSelected =$(tests).not(selected).get();

                     tests.forEach(function(entry){
                    $('#'+entry).removeProp('disabled');
                   });

                   if(notSelected.length > 0){
                    notSelected.forEach(function(entry) {
                                    $('#'+entry).attr('disabled', 'true');
                                                                        });
                    }
                                                                break;
                                                            }
                                                        },
                                                        error: function(err){
                                                            console.log(err)
                                                    }
                                                });


                      }
                             });
                        });
       
       //form for packages
       $('form.form-packages').on('submit',function(e){
                                
        var data = $(this).serialize();

                $.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/stage/',
        crossDomain: true,
        data: data,
        success: function (data) {

            if(data == 'Please select packages to proceed. You have not selected anything yet.'){
                alert(data);
            }else if(data == 'Please select a different package test, these tests are not available yet.'){
                                        alert(data);

                                        //basic & quick wellcheck tests
            }else if(data=='tests'){
                $('#questionaire-tab').addClass('disabled');
                                        $('#tests-tab').removeClass('disabled');
                                        $('#clinician-tabs li:eq(3) a').tab('show')
                                            
                                            $.ajax({
                                            type: 'POST',
                                            url: 'http://localhost/wellness/dashboard/getTests/',
                                            success: function(data){
                                                $('#tests').html(data);
                        console.log(tests);
                                            }
                                            });

                //visual screen
            }else if(data == 'tests visualscreen'){
                    $('#questionaire-tab').addClass('disabled');
                                        $('#tests-tab').removeClass('disabled');
                                        $('#clinician-tabs li:eq(3) a').tab('show')

                                            $.ajax({
                                            type: 'POST',
                                            url: 'http://localhost/wellness/dashboard/getTests/',
                                            success: function(data){
                                                var tests = data.split(',');
                                                $('#tests').html('http://localhost/wellness/application/views/clinician/tests/wellness.html')
                        console.log(tests);
                                            }
                                            });



                //wellcheck tests with questionaire
            }else if(data=='questionaire'){
                $('#tests-tab').removeClass('disabled');
                $('#questionaire-tab').removeClass('disabled');
                    $('#clinician-tabs li:eq(2) a').tab('show')
                    //append questionaire interface
                    //append tests interface

                    $.ajax({
                                            type: 'POST',
                                            url: 'http://localhost/wellness/dashboard/getTests/',
                                            success: function(data){
                                                $('#tests').html(data);
                        console.log(tests);
                                            }
                                            });

                console.log(data);
            }else{
                console.log(data);
            }
            
        },
        error: function (err) {
            console.log(err);
        }});

                                e.preventDefault();
                                });

        
        //form test results [scientist]
        $('form.form-tests').on('submit',function(e){
            e.preventDefault();
            var data = $(this).serialize();
              $.ajax({
                type:'POST',
                data:data,
                url: 'http://localhost/wellness/dashboard/saveTests/',
                dataType:'json',
                success: function(data){
                    alert('Test results saved successfully.');

                    $('#tests-tab').removeClass('active').addClass('disabled');
                    $('#tests').removeClass('active').addClass('disabled');
                    $('#results-tab').removeClass('disabled').addClass('active');
                    $('#results').removeClass('disabled').addClass('active');
             
             console.log(data)
              

              
                                            $.each(data, function(key,val){
                                                  if(val!=''){
                                               $('#items').append('<tr><td> '+key+' </td> <td> '+val+' </td></tr>');                                                    
                                                  }

                                            });

                },error:function(err){
                    alert('Please attempt saving again.')
                    console.log(err);
                }
              })
        });
         //end of form test results [scientist]

         //form form-questionaire
        $('form.form-questionaire').on('submit',function(e){
           e.preventDefault();
           var data = $(this).serialize();
                      $.ajax({
            type:'POST',
                data:data,
                url: 'http://localhost/wellness/dashboard/saveQuestionaire/',
                success: function(data){
                    alert(data);

                    $('#questionaire-tab').removeClass('active').addClass('disabled');
                    $('#questionaire').removeClass('active').addClass('disabled');
                    $('#tests-tab').addClass('active');
                    $('#tests').addClass('active');
           }
         });
        });

         //submitting of clinician tests
          $('#tests').on('submit','form.form-clinician',function(e){
           e.preventDefault();
           var data = $(this).serialize();
           $.ajax({
            type:'POST',
             data:data,
             url: 'http://localhost/wellness/dashboard/saveClinicianTests/',
             success: function(data){
                    alert(data);

                    $('#tests-tab').removeClass('active');
                    $('#tests').removeClass('active');
                    $('#results-tab').addClass('active');
                    $('#results').addClass('active');
           }
         });
         });
         //end of submitting of clincician tests

        ";

   $getMoreClients = "
         $('#clientsDropDown').on('click','.dropDownMoreClients',function(e) {
            e.preventDefault();
            var location = $(this).attr('href');
            $.ajax({
                        type:'GET',
                        url:location,
                        success:function(data){
                            $('#clientsDropDown').empty().html(data);
                        }
            });
    return false; 
         });
   ";

   $bookingRequest = "
    $('#clientsDropDown').on('click','.clickBook',function(e) {
            //e.preventDefault();
            var selectedDay = $('.selected .d').text().trim();
            if(selectedDay == ''){  
                        alert('Please select a valid day.')
                        $('.day_listing').removeClass('selected')
                    }else{
                        var data = {
                        'idnumber' : $(this).attr('id'),
                        'status'            :   'qued',
                        'day'                       :   selectedDay,
                        'date'                  : $('#dates').text().toString()}

                        //provide full domain URL because we are using controllers and url mapping
                        //request could get lost in space
                        $.ajax({
                        type: 'POST',
                        url: 'http://localhost/wellness/dashboard/bookClient/',
                        crossDomain: true,
                        data: data,
                        success: function (data) {
                        alert(data)
                        location.reload(true)
                        },
                        error: function (err) {
                        console.log(err)
                        }
                        });
                    }
    return false; 
         });
   ";

   $showDatePicker = "
    $('.bookDay').datepicker({dateFormat:'yy/mm/dd'});
   ";

            

            $this->javascript->output($hideForm);
            $this->javascript->output($showIncomingClients);
            $this->javascript->output($showIncomingTestClients);
            $this->javascript->output($showInComingBloodResults);
            $this->javascript->output($attachStaticEventHandlers);
            $this->javascript->output($getMoreClients);
            $this->javascript->output($bookingRequest);
            $this->javascript->output($showDatePicker);
            $this->javascript->click('.day',$getDay);
            $this->javascript->click('.day',$showClients);
            //$this->javascript->click('.clickBook',$bookRequest);  
            $this->javascript->compile();
        }


}