
$.validator.addMethod( "ukDate", function( value, element ) {
			var check = false,
				re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
				adata, gg, mm, aaaa, xdata;
			if ( re.test( value ) ) {
				adata = value.split( "/" );
				gg = parseInt( adata[ 0 ], 10 );
				mm = parseInt( adata[ 1 ], 10 );
				aaaa = parseInt( adata[ 2 ], 10 );
				xdata = new Date( Date.UTC( aaaa, mm - 1, gg, 12, 0, 0, 0 ) );
				if ( ( xdata.getUTCFullYear() === aaaa ) && ( xdata.getUTCMonth() === mm - 1 ) && ( xdata.getUTCDate() === gg ) ) {
					check = true;
				} else {
					check = false;
				}
			} else {
				check = false;
			}
			return this.optional( element ) || check;
		}, //$.validator.messages.date );
			"Please enter a valid date in the format dd/mm/yyyy."
		);

	    
	    $.validator.addMethod(
			"phone", 
			function(phone_number, element) {
				
				return this.optional(element) || phone_number.match(/^([0][7][0-9]{9})|([0][8][1-9]{1,2}[0-9]{7})$/);
			}, 
			"Please specify a valid phone number" 

		);

		$.validator.addMethod(
			"postcode", 
			function(value, element) {
				
				return this.optional(element) || /^([AC-FHKNPRTV-Y]{1}[0-9]{1}[0-9W]{1}[ \-]?[0-9AC-FHKNPRTV-Y]{4})|((([A-PR-UWYZ][0-9])|([A-PR-UWYZ][0-9][0-9])|([A-PR-UWYZ][A-HK-Y][0-9])|([A-PR-UWYZ][A-HK-Y][0-9][0-9])|([A-PR-UWYZ][0-9][A-HJKSTUW])|([A-PR-UWYZ][A-HK-Y][0-9][ABEHMNPRVWXY]))\s?([0-9][ABD-HJLNP-UW-Z]{2})|(GIR)\s?(0AA))$/i.test( value );
			}, 
			"Please specify a valid Postcode"
		);

		$.validator.addMethod("over18", function(value, element) {
			var dob =$('#date_of_birth').val();
			//console.log(dob);
	        var afterSplit = dob.split('/');
	        //console.log(afterSplit);
	        var day = parseInt(afterSplit[0]);
	        //console.log(day);
		    var month = parseInt(afterSplit[1]);
		    //console.log(month);
		    var year = parseInt(afterSplit[2]);
		    //console.log(year);
		    var age =  18;

		    var mydate = new Date();
		    mydate.setFullYear(year, month-1, day-1);

		    var currdate = new Date();
		    currdate.setFullYear(currdate.getFullYear() - age);

		    return currdate > mydate;

		}, "You must be at least 18 years of age.");


		//phone_number.match(/^([0][7][0-9]{9})|([0][8][1-9]{1,2}[0-9]{7})$/);

		$.validator.addMethod( 
			"lettersonly", 
			function( value, element ) {
				return this.optional( element ) || /^[a-z]+$/i.test( value );
		}, "Letters only please" );

		$.validator.addMethod( 
			"emailRFC_Standard", 
			function( value, element ) {
				return this.optional( element ) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test( value );
		}, "Letters only please" );

$(function(){


		   
	    $("#payment-form").validate({
			  rules: {
			    firstname:{ 
			    	lettersonly: true,
			    	required: true
				},
			    email: {
			      required: true,
			      emailRFC_Standard: true
			    },
			    postcode:{
			    	required: true,
			    	postcode: true
			    },
			    mobile: {
			    	required: true,
			    	phone: true,
			    	number: true,
			    	maxlength: 11,
			    	minlength: 10
			    },
			    date_of_birth: {
			    	required: true,
					ukDate: true,
					over18: true
				},
				employment: {
					required: true
				},
				income: {
					required: true
				},
				marital_status: {
					required: true
				},
				cars: {
					required: true
				},
				num_children: {
					required: true
				},
				shopping_frequency: {
					required: true
				},
				texts: {
					required: true
				},
				gender: {
					required: true
				},
				staff:{
					required: true
				},
			    messages: {
				  firstname: {
					  required: "We need your email address to contact you"
				  },
				  email: {
				  	  required: "We need your email address to contact you"
				  },
			      date_of_birth:{
			      	  required: "Please enter a Date",
					 
				  },
				  employment:{
					  required: "Please select your Employment Status"
				  },
				  income:{
					  required: "Please select your Income"
				  },
				  marital_status:{
					  required: "Please select your Marital Status"
				  },
				  cars:{
					  required: "Please select how many cars you currently own"
				  },
				  children:{
					  required: "Please select the amount of children you have"
				  },
				  shopping_frequency:{
					  required: "Please select the amount of times you vist the shopping centre"
				  },
				  opt_in_text:{
					  required: "Please opt in or out of  recieving texts "
				  },
				  staff:{
				  	  required: "Please choose one of the above options"
				  }
				}
			  }
			});
})