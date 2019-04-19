//global variables
var centre;
var doctor;
var reason;
var date;
var appointmentTime;

function searchAvailability(){
  //centre = $('#centreSelect').val();
  doctor = $('#doctorSelect').val();
//  reason = $('#reason').val();
  date = $('#date').val();

  $.ajax({
           type:'POST',
           url:'/patient/searchAvailability',
           data:{doctor:doctor, date:date},
           success:function(d){
              console.log(d.appointments);
              if(d.appointments.length == 0){
                console.log("no appointments")
                $('#avaiableTimes').show();
              }else{
                console.log("length > 0")
              }
           }
        });
}
function createAppointment(){
  $.ajax({
           type:'POST',
           url:'/patient/createAppointment',
           data:{doctor:doctor, date:date, centre:centre, time:appointmentTime, reason:reason },
           success:function(d){
              console.log('success');
              window.location.href = "/patient";
           }
        });
}

$(function() {
//  var centres= {{json($centres)}};
//  var doctors= @json($doctors);
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('#centreSelect').on('change', function() {           //when a centre is selected
    $('#doctorSelect').removeAttr('disabled');           //remove disabled attribute from doctor select list
    centre = $(this).val();
    var centreText = $( "#centreSelect option:selected" ).text();                      //Variable centreId = the value of the centre selected
    $('.doctorOptions').not("." + centre ).hide();     //Hide all Doctors without the centreId in their class
    $('.'+ centre).show();
    $('#centreModal').val(centreText);                            //Show aLL Doctors with the centreId in their class
  });
  $('#doctorSelect').on('change', function() {
    var doctorText = $( "#doctorSelect option:selected" ).text();
    $('#doctorModal').val(doctorText);
  });
  $('#date').on('change', function() {
    console.log($(this).val());
    date = $(this).val();
    var x = date.split('-');
    var date1 = x[2] + "/" + x[1] + "/" + x[0];
    console.log(date);
    $('#dateModal').val(date1);
    reason = $('#reason').val();
    $('#reasonModal').val(reason);
  });
  $('.apt-time').on('click', function() {
    appointmentTime = $(this).val();
    $('#timeModal').val($('#'+ appointmentTime).text());
    console.log($('#'+ appointmentTime).text());
  });
  $('#search').on('click', function() {           //when a centre is selected
    searchAvailability();
  });

  $('#confirmBtn').click(function(){
    console.log(date + " " + centre + " " + reason + " " + doctor + " " + appointmentTime);
    createAppointment();
  });
  $.get('/patient/indexAjax', function(d){
        console.log(d);
        $.each(d['centres'] , function (index, value){
          console.log(value.id + ':' + value.name  );
        });

          //$("#centreDropdown").append('<a class="dropdown-item" href="#">'+ +'</a><div class="dropdown-divider"></div>');

    });





});
