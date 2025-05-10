let title = '';

window.addEventListener('load', function () {
	let overlay = document.querySelector('.overlay');
	let close = document.querySelector('.btn_close');
	let formTitle = document.querySelector('.form_title');
	document.querySelectorAll('.btn_popup_amts').forEach((el) => {

		el.addEventListener('click', function () {
			title = el.getAttribute('data-title');
			formTitle.innerHTML = title;
			overlay.classList.add('popup_active');
			close.addEventListener('click', function () {
				overlay.classList.remove('popup_active');
			});

		});
	});

	window.addEventListener('click', function (e) {
		if (e.target === overlay) {
			overlay.classList.remove('popup_active');
		}
	});

});

jQuery(function ($) {

	jQuery('.amts_submit_btn').on('click', function (e) {
		// console.log(1);
		e.preventDefault();

		let form = jQuery('.contact_form_amts');
		let nonce = amts_obj.nonce;
		let url = amts_obj.ajaxurl;
		let err = $('.err_message');
		let btn = $('button[type="submit"]');
		let name = $('input[name="name"]');
		let email = $('input[name="email"]');
		let phone = $('input[name="phone"]');
		let feedback = $('textarea[name="message"]');
		let argee = $('label.label_checkbox_amts');
		let agreement = $('input[name="agreement"]:checked');

		$.ajax({
			url: url,
			method: 'post',
			dataType: 'json',
			data: {
				action: 'popup_form_amts',
				nonce: nonce,
				name: name.val(),
				email: email.val(),
				phone: phone.val(),
				message: feedback.val(),
				title: title,
				agree: agreement.val(),
			},
			success: function (respose) {
				let message = respose.data.message;

				if (message.sent == 'Заявка отправлена!') {
					err.css('color', '#007B32')
					showErrorMessage(0, message.sent);
					removeBorderError();
					form.find('.contact_form_input').attr('disabled', 'disabled').addClass('disabled');
					btn.attr('disabled', 'disabled').addClass('disabled');
					form.addClass('disabled');
				}
				// name
				else if (message.name == 'Поле не заполнено') {
					removeBorderError();
					showErrorMessage(name, message.name);
					console.log(message);
				} else if (message.name == 'Минимум два символа') {
					removeBorderError();
					showErrorMessage(name, message.name);
					console.log(message);
				} else if (message.name == 'Имя слишком длинное') {
					removeBorderError();
					showErrorMessage(name, message.name);
					console.log(message);
				}

				// email
				else if (message.email == 'Поле не заполнено') {
					removeBorderError();
					showErrorMessage(email, message.email);
					console.log(message);
				} else if (message.email == 'Минимум восемь символов') {
					removeBorderError();
					showErrorMessage(email, message.email);
					console.log(message);
				} else if (message.email == 'Максимум двадцать пять цифр') {
					removeBorderError();
					showErrorMessage(email, message.email);
					console.log(message);
				}

				// phone
				else if (message.phone == 'Поле не заполнено') {
					removeBorderError();
					showErrorMessage(phone, message.phone);
					console.log(message);
				} else if (message.phone == 'Минимум одиннадцать символов') {
					removeBorderError();
					showErrorMessage(phone, message.phone);
					console.log(message);
				} else if (message.phone == 'Максимум пятнадцать символов') {
					removeBorderError();
					showErrorMessage(phone, message.phone);
					console.log(message);
				}

				// message
				else if (message.message == 'Поле не заполнено') {
					removeBorderError();
					showErrorMessage(feedback, message.message);
					console.log(message);
				} else if (message.message == 'Текст слишком маленький') {
					removeBorderError();
					showErrorMessage(feedback, message.message);
					console.log(message);
				} else if (message.message == 'Текст слишком большой') {
					removeBorderError();
					showErrorMessage(feedback, message.message);
					console.log(message);
				}
				else if(message.agreement == 'Примите соглашение'){
					removeBorderError();
					showErrorMessage(argee, message.agreement);
					console.log(message);
				}

				function removeBorderError() {
					form.find('.contact_form_input').removeClass('error');
					argee.removeClass('error');
				}

				function labelToBack(elem) {
					dataAttr = elem.prev().attr('data-label');
					elem.prev().text(dataAttr);
				}

				function addClassError(elem) {
					elem.addClass('error');
					// form.find('.form_label_text.error').text(str);
				}

				function showErrorMessage(elem, str) {
					if (!elem == 0) {
						elem.addClass('error');
						console.log(elem);
					}
					form.find('.err_message').text(str);
					form.find('.err_message').addClass('err_message_ative');
					setTimeout(() => {
						form.find('.err_message').removeClass('err_message_ative')
					}, 3000);
				}
			}
		});
	});
});


