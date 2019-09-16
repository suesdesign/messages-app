$(document).ready(function() {
	$("#contact_form").validate({
  		messages : {
			firstname: {
				required: "Please enter your first name"
			},
			lastname: {
				required: "Please enter your last name"
			},
			emailaddress: {
				required: "Please enter a valid email address"
			},
			message: {
				required: "Please enter your message"
			}
  		}
  	});
});