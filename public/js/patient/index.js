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
              console.log(d);
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
    var centreId = $(this).val();                        //Variable centreId = the value of the centre selected
    $('.doctorOptions').not("." + centreId ).hide();     //Hide all Doctors without the centreId in their class
    $('.'+ centreId).show();                             //Show aLL Doctors with the centreId in their class
  });

  $('#search').on('click', function() {           //when a centre is selected
    searchAvailability();
  });
  $.get('/patient/indexAjax', function(d){
        console.log(d['centres']);
        $.each(d['centres'] , function (index, value){
          console.log(value.id + ':' + value.name  );
        });

          //$("#centreDropdown").append('<a class="dropdown-item" href="#">'+ +'</a><div class="dropdown-divider"></div>');

    });





});
