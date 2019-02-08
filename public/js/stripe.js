Stripe.setPublishableKey('pk_test_VTdKuwXCD0igWtxaIhJXdRhD');
  //Stripe.setPublishableKey(config('services.stripe.test_key'));
$(function() {
    
   
 /* 
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(e.target).closest('#payment-form'),
        inputSelector = ['input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;

    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault(); // cancel on first error
      }
    });
  });
*/
});

/*
// add validation functions
function validateCCNo() {
  var card;
  card = jQuery('#cardNumber').val();
  console.log(card);
  return jQuery.payment.validateCardNumber(card);
}

function validateCVCNo() {
  var card, type, cvc;
  card = jQuery('#cardNumber').val();
  type = jQuery.payment.cardType(card);
  cvc  = jQuery('#cardCvc').val();
  console.log(cvc);
  return jQuery.payment.validateCardCVC(cvc, type);
}

function validateCCExpiry() {
  var cc_date;
  cc_date = jQuery('#cardExpiry').payment('cardExpiryVal');
  console.log(cc_date);

  return jQuery.payment.validateCardExpiry(cc_date['month'], cc_date['year']);
  console.log(cc_date[month]);

}
*/

$(function() {

  Stripe.setPublishableKey('pk_test_VTdKuwXCD0igWtxaIhJXdRhD');
  //Stripe.setPublishableKey('pk_live_dVMSdt9kzfCvWE1JZx2rSOft');
  //Stripe.setPublishableKey(config('services.stripe.test_key'));

  var $form = $('#payment-form');
 
   $('#cardNumber').payment('formatCardNumber');
    $('#cardExpiry').payment('formatCardExpiry');
    $('#cardCvc').payment('formatCardCVC');
    
    $.fn.toggleInputError = function(erred) {
        this.parent('.form-group').toggleClass('has-error', erred);
        this.closest('label').toggleClass('has-error', erred);
        return this;
      };
  
 
  $('#paymentSubmit').click(function() {
      
     // $errorText = $('#errorText');
      console.log('1');
      $('.cardCheck').attr('hidden', true);
      $('#errorThrown').remove();

        var cardType = $.payment.cardType($('#cardNumber').val());
        $('#cardNumber').toggleInputError(!$.payment.validateCardNumber($('#cardNumber').val()));
        $('#cardExpiry').toggleInputError(!$.payment.validateCardExpiry($('#cardExpiry').payment('cardExpiryVal')));
        $('#cardCvc').toggleInputError(!$.payment.validateCardCVC($('#cardCvc').val(), cardType));
        $('.cardBrand').text(cardType);

        $('.validation').removeClass('text-danger text-success');
        $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');

        var data =$('#cardExpiry').val();
        var expiry = data.split('/')
        var month = parseInt(expiry[0]);
        console.log(month);
        var year = parseInt(expiry[1]);
        console.log(year);
      Stripe.card.createToken({
        number: $('#cardNumber').val(),
        cvc: $('#cardCvc').val(),
        exp_month: month,
        exp_year: year,
        address_zip: $('#paymentPostcode').val(),
      }, stripeResponseHandler,
      console.log('2')
      );
      return false;
  });



  function stripeResponseHandler(status, response) {
    console.log('3');
    
    if (response.error) {
      $('charge-error').show();
      $('charge-error').text(response.error.message);
      $form.find('#btn-stripe').prop('disabled', false);
    } else {
     run_waitMe();
      // token contains id, last4, and card type
      var token = response.id;
      var name = $('#firstname').val();
      console.log(name);
      var email = $('#email').val();
      console.log(email);
      var uuid = $('#uuid').val();
      console.log(uuid);
      // insert the token into the form so it gets submitted to the server
      $form.append($('<input type="hidden" name="stripeToken" />').val(token));
      $.ajax({
          type: "POST",
          url: '/application_form/payment/post',
          data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            stripeToken: token,
            email: email,
            uuid: uuid,
            card_name: $('#card-name').val(),
            name: name,
            card_num: $('#cardNumber').val()

          }, 
          cache: false,
          success: function( d ) {
              console.log(d);
              if(d[0] == null){
                
                console.log('a');
              $uuid = $('#uuid').val();
              window.location = '/application_form/form_submitted?id' + $uuid;
              }else{
                  console.log(d[0]);
                  console.log(d);
                  $('.validation').removeClass('text-danger text-success ');
                  $('.cardCheck').attr('hidden', false);
                  $('.cardCheck').append("<p id='errorThrown' style='font-size: 1vw'>- " + d + "</p>");
                  $('#paymentTab').waitMe("hide");

              }
          },
           error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
            console.log(JSON.stringify(jqXHR.responseText));
            //console.log("Ajax error:" + errorThrown); //+ textStatus + ' : ' -- add in to see the whole html file
           //console.log("Ajax error:" + textStatus); //+ textStatus + ' : ' -- add in to see the whole html file
            console.log(JSON.stringify(jqXHR.error));
            $('#errorThrown').empty();
            $('.cardCheck').attr('hidden', false);
            $('.cardCheck').append("<p id='errorThrown' style='font-size: 1vw'>- Please reload the application_form and try again</p>");
            $('#paymentTab').waitMe("hide");
          }
      });
     
  }

  function run_waitMe(){

    $('#paymentTab').waitMe({
      //none, rotateplane, stretch, orbit, roundBounce, win8,
      //win8_linear, ios, facebook, rotation, timer, pulse,
      //progressBar, bouncePulse or img
      effect: 'bounce',
       
      //place text under the effect (string).
      ext: 'Processing Payment...',
       
      //background for container (string).
      bg: 'rgba(255,255,255,0.7)',
       
      //color for background animation and text (string).
      color: '#428bca',
       
      //max size
      //maxSize: '',
       
      //wait time im ms to close
      waitTime: -1,
       
      //url to image
      //source: '',
       
      //or 'horizontal'
      textPos: 'vertical',
       
      //font size
      fontSize: '16px',

      //font color
      fontColor: '#428bca'

      
       
      // callback

    })

  }
}
});