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
       /*
        $('#client-name').empty();
        $('#client-name').append(clientName);
        $('#clendar-hide').hide();
        $('#attend').show();
        $('#records').html(data);
        $('#clinician-tabs  a:first').tab('show');
        $('#questionaire-tab').addClass('disabled');
        $('#tests-tab').addClass('disabled');
        $('#results-tab').addClass('disabled');
       */
         window.location = 'http://localhost/wellness/dashboard/?&reload=true&clientNumber='+clientNumber+'&clientName='+clientName+'&timein='+timein;
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

                                console.log(data['package']);

                                switch(data['package']){

                                    case 'Once Off Test':
                                 $('#basic-tab').removeClass('active').addClass('disabled');
                                 $('#basic').removeClass('active').addClass('disabled');
                                 $('#comprehensive-tab').removeClass('active').addClass('disabled');
                                 $('#comprehensive').removeClass('active').addClass('disabled');
                                 $('#standard-tab').removeClass('active').addClass('disabled');
                                 $('#standard').removeClass('active').addClass('disabled');
                                 $('#once-tab').addClass('active');
                                 $('#once').addClass('active');

                                  var selected = [];
                                for (var prop in data['tests']) {
                                    selected.push(data['tests'][prop]);
                                }       

                                selected.forEach(function(item){
                                    switch(item){
                                        case 'lipidprofile':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/lipidprofile.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case  'psa':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/psa.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'hpylori':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/hpylori.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'haemoglobin':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/haemoglobin.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'hiv':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/hiv.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'bloodsugar':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/bloodsugar.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'urine':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/urined.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'hba1c':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/hba1c.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'hepatitis':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/hepatitis.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'bloodgroup':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/bloodgroup.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'syphilis':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/syphilis.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'chlamydia':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/chlamydia.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'gonorrhea':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/gonorrhea.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'hsv':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/hsv.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'typhoid':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/typhoid.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'torch':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/torch.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'pregnancytest':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/pregnancy.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'malaria':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/malaria.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;

                                        case 'ovulation':
                                        $.ajax({
                                            type:'GET',
                                            url:'http://localhost/wellness/application/views/scientist/tests/ovulation.html',
                                            success:function(data){
                                                $('#once-off').append(data);
                                            }
                                        });
                                        break;
                                    }
                                });
                                    break;

                                    case 'basic':
                                 $('#basic-tab').removeClass('disabled').addClass('active');
                                 $('#basic').removeClass('disabled').addClass('active');
                                 $('#comprehensive-tab').removeClass('active').addClass('disabled');
                                 $('#comprehensive').removeClass('active');
                                 $('#standard-tab').removeClass('active').addClass('disabled');
                                 $('#standard').removeClass('active').addClass('disabled');

                                var selected = [];
                                for (var prop in data['tests']) {
                                    selected.push(data['tests'][prop]);
                                }       

                                var tests = ['hemoglobin'];
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

                                    case 'standard':
                                 $('#basic-tab').removeClass('active').addClass('disabled');
                                 $('#basic').removeClass('active').addClass('disabled');
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
                             $('#basic-tab').removeClass('active').addClass('disabled');
                             $('#basic').removeClass('active').addClass('disabled');
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



        //form once of once-off tests
        $('form.form-once').on('submit',function(e){
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'http://localhost/wellness/dashboard/onceOffTest',
                crossDomain: true,
                data: data,
                success: function(data){
                    console.log(data);
                
                if(data == 'Please select packages to proceed. You have not selected anything yet.'){
                    alert(data);
                }else if(data == 'Please select a different package test, these tests are not available yet.'){
                    alert(data);
                }else if(data == 'tests')
                    $('#questionaire-tab').addClass('disabled');
                    $('#tests-tab').removeClass('disabled');
                    $('#clinician-tabs li:eq(3) a').tab('show')
                                            
                    $.ajax({
                        type: 'POST',
                        url: 'http://localhost/wellness/dashboard/getOnceOffClinicianTets/',
                        success: function(data){
                        $('#tests').html(data);}
                    });
                },
                error: function(er){
                    console.log(er);
                }
            });
        });
        //end of form once-off tests
       


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
                    $('#clinician-tabs li:eq(3) a').tab('show');
                    
                    //get the file and dump the content into our DIV tag
                    $.get('http://localhost/wellness/application/views/clinician/tests/visual_screen.html', function(data){
                        $('#tests').html(data);
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

                    $('#tests-tab').removeClass('active');
                    $('#tests').removeClass('active');
                    $('#results-tab').removeClass('disabled').addClass('active');
                    $('#results').removeClass('disabled').addClass('active');
             
             //console.log(data)
              

              $('#items').empty();
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

         //submitting of clinician visual test
          $('#tests').on('submit','form.form-clinician-visual-test',function(e){
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
      //booking a new client on a certain date
      $openFormForBooking = "
         $('#clientsDropDown').on('click','#bookNewClientToday',function(e) {
            e.preventDefault();
            var selectedDay = $('.selected .d').text().trim();

            if(selectedDay == ''){  
              alert('Please select a valid day.')
              $('.day_listing').removeClass('selected')
              return false;
            }else{
              var date = $('#dates').text().toString()
            }
            
            if(selectedDay.length < 2){selectedDay = '0'+selectedDay;}
            date = date +'/'+ selectedDay;

            $('#clendar-hide').html('<form action=http://localhost/wellness/dashboard/bookACertainDay/ name=date method=POST style=display:none;><input type=hidden name=date value='+date+' /></form>');

            document.forms['date'].submit();
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

   $staticFunctions = "
   //placed on Document.load() to check if a user was selected for assesment
   //and then attend to them having stored their value in the cookie
   //bug fix for when the previous user was being checked because the server had
   //not replied with the value of the new selected user.

        $(window).load(function() {
          function getUrlParameter(sParam){
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++) 
            {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam) 
                {
                    return sParameterName[1];
                }
            }
        } 

        var clientNumber = decodeURI(getUrlParameter('clientNumber'));
        var clientName = decodeURI(getUrlParameter('clientName'));
        var timein = decodeURI(getUrlParameter('timein'));
        var reload = decodeURI(getUrlParameter('reload'));

        var data = {'clientNumber' : clientNumber,'timein':timein};

       if(reload == 'true'){
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

        //window.location = 'http://localhost/wellness/dashboard/#';
        },
        error: function (err) {
            console.log(err);
        }});
       }

        });
   ";

   $submitDoctorsEvaluation = "
     $('form#drAssesment').on('submit',function(e){ 
        e.preventDefault();                 
        var data = $(this).serialize();
       
        $.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/saveDrAssesment/',
        crossDomain: true,
        data: data,
        success: function (data) {
         alert(data);
        },
        error: function(err){
            console.log(err);
        }
      });
     });
   ";

   $clearPatient = "
   $('#clearPatient').on('click',function(e){
     e.preventDefault();
     var data = {'clientNumber' : $(this).attr('clientNumber'),'date':$(this).attr('date')};
     $.ajax({
        type:'POST',
        url: 'http://localhost/wellness/dashboard/clearPatient/',
        crossDomain:true,
        data:data,
        success:function(data){
            console.log(data);
        },
        error:function(err){
            console.log(err);
        }
     });
   });
   ";

            

            $this->javascript->output($hideForm);
            $this->javascript->output($showIncomingClients);
            $this->javascript->output($showIncomingTestClients);
            $this->javascript->output($showInComingBloodResults);
            $this->javascript->output($attachStaticEventHandlers);
            $this->javascript->output($getMoreClients);
            $this->javascript->output($bookingRequest);
            $this->javascript->output($showDatePicker);
            $this->javascript->output($openFormForBooking);
            $this->javascript->output($staticFunctions);
            $this->javascript->output($submitDoctorsEvaluation);
            $this->javascript->output($clearPatient);
            $this->javascript->click('.day',$getDay);
            $this->javascript->click('.day',$showClients);
            //$this->javascript->click('.clickBook',$bookRequest);  
            $this->javascript->compile();
        }


}