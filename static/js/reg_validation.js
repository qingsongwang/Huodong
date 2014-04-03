//
//	jQuery Validate example script
//
//	Prepared by David Cochran
//
//	Free for your use -- No warranties, no guarantees!
//

$(document).ready(function(){

	// Validate
	// http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	// http://docs.jquery.com/Plugins/Validation/
	// http://docs.jquery.com/Plugins/Validation/validate#toptions

		$('#contact-form').validate({
	    rules: {
		 
	      regname: {
	        minlength: 2,
			isName: true,
	        required: true
	      },
	      email: {
  		    
			required: true,
	        email: true
	      },
	      regpwd1: {
	      	minlength: 6,
	        required: true
	      },
		  regpwd2:
		  {
			minlength: 6,
	        required: true,
			equalTo: "#regpwd1",
		  },
		  
		  regtel:
		  {
			required: true,
			isTel:true,
		  },
		  
		  regstuId:
		  {
			required: true,
			isStuid: true
		  }
	    },
		
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			},
			
			
	  });

}); // end document.ready