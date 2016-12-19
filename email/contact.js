// Get the form.
	var form = $('#emailForm');

	// Get the messages div.
	var formMessages = $('#form-messages');

// Set up an event listener for the contact form.
	$(form).on('submit', function() {
		// // Stop the browser from submitting the form.
			// e.preventDefault();

		// Serialize the form data.
		var formData = $(form).serialize();

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: 'email/mailer.php',
			data: formData,
			success: function(resp) {
				// Make sure that the formMessages div has the 'success' class.
				$(formMessages).removeClass('error');
				$(formMessages).addClass('success');

				// Set the message text.
				$(formMessages).text(resp);

				// Clear the form.
				document.getElementById('emailForm').reset();
			},
			error: function(xhr, data) {
				console.log(xhr);

				// Make sure that the formMessages div has the 'error' class.
				$(formMessages).removeClass('success');
				$(formMessages).addClass('error');

				// Set the message text.
				if (data.responseText !== '') {
					$(formMessages).text(data.responseText = "Oops! An error occured and your message could not be sent.");
				} else {
					$(formMessages).text('Oops! An error occured and your message could not be sent.');
				}

			}
		});

		return false;
	});
