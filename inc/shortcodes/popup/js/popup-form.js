// let title = '';

window.addEventListener('load', function () {
	let overlay = document.querySelector('.overlay');
	let close = document.querySelector('.btn_close');
		// Инициализируем маску для поля телефона
	phoneMask('input[name="phone"]');
	// let formTitle = document.querySelector('.form_title');



	// Функция для сохранения данных в localStorage
	function saveFormData() {
		let form = document.querySelector('.contact_form_amts');
		let formData = {};

		form.querySelectorAll('input, textarea, select').forEach(function (field) {
			if (field.type === 'checkbox') {
				formData[field.name] = field.checked;
			} else {
				formData[field.name] = field.value;
			}
		});

		localStorage.setItem('formData', JSON.stringify(formData));
	}

	// Функция для восстановления данных из localStorage
	function restoreFormData() {
		let form = document.querySelector('.contact_form_amts');
		let savedData = localStorage.getItem('formData');

		if (savedData) {
			let formData = JSON.parse(savedData);

			form.querySelectorAll('input, textarea, select').forEach(function (field) {
				if (field.type === 'checkbox') {
					field.checked = formData[field.name] || false;
				} else {
					field.value = formData[field.name] || '';
				}
			});
		}
	}

	// Восстанавливаем данные при загрузке
	restoreFormData();

	// Слушаем изменения в форме
	document.querySelector('.contact_form_amts').addEventListener('change', function (e) {
		saveFormData();
	});

	// Слушаем ввод в текстовых полях
	document.querySelector('.contact_form_amts').addEventListener('input', function (e) {
		if (e.target.type === 'text' || e.target.type === 'tel' || e.target.type === 'textarea') {
			saveFormData();
		}
	});

	// Очищаем localStorage после успешной отправки
	document.querySelector('.amts_submit_btn').addEventListener('click', function () {
		if (document.querySelector('.err_message').textContent === 'Сообщени отправлено!') {
			localStorage.removeItem('formData');
		}
	});

	//показываем попап по нажатию кнопки
	document.querySelectorAll('.btn_popup_amts').forEach((el) => {

		el.addEventListener('click', function () {
			title = el.getAttribute('data-title');
			// formTitle.innerHTML = title;
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
		e.preventDefault();

		const form = jQuery('.contact_form_amts');
		if (!form.length) {
			console.error('Форма не найдена');
			return;
		}

		const formData = new FormData();
		const err = $('.err_message');
		const btn = $('button[type="submit"]');

		// Проверяем существование необходимых элементов
		if (!err.length || !btn.length) {
			console.error('Не найдены необходимые элементы формы');
			return;
		}

		// Собираем все поля формы
		Array.from(form[0].elements).forEach(function (field) {
			let name = field.name;
			let type = field.type;
			let value = field.value;

			// console.log('Field:', name, type, value); // Отладочная информация

			if (type === 'checkbox') {
				if (field.checked) {
					formData.append(name, value || 'on');
				}
			} else if (type === 'radio') {
				if (field.checked) {
					formData.append(name, value);
				}
			} else {
				formData.append(name, value);
			}
		});

		// Отладочная информация
		for (let pair of formData.entries()) {
			console.log(pair[0] + ': ' + pair[1]);
		}

		formData.append('action', 'popup_form_amts');
		formData.append('nonce', amts_obj.nonce);

		$.ajax({
			url: amts_obj.ajaxurl,
			method: 'post',
			dataType: 'json',
			data: formData,
			processData: false,
			contentType: false,
			success: function (respose) {
				console.log(respose);
				let text_response = {
					'0': 'Поле не должно быть пустым',
					'<5': 'Минимум 5 символов',
					'<8': 'Минимум 8 символов',
					'<2': 'Минимум 2 символа',
					'>10': 'Минимум 10 символов',
					'<15': 'Максимума 15 символов',
					'>25': 'Максимум 25 символов',
					'>240': 'Максимум 24 символа',
					'agree': 'Примите соглашение',
					'ok': 'Сообщени отправлено!',
					'email_invalid': 'Неправильный Емаил'
				};

				let message = respose.data.message;
				// console.log(message);
				if (message.sent == 'ok') {
					err.css('color', '#007B32')
					showErrorMessage(0, text_response['ok']);
					removeBorderError();
					form.find('input').attr('disabled', 'disabled').addClass('disabled');
					btn.attr('disabled', 'disabled').addClass('disabled');
					form.addClass('disabled');

					// Очищаем localStorage после успешной отправки
					try {
						localStorage.removeItem('formData');
						console.log('Данные формы очищены из localStorage');
					} catch (e) {
						console.error('Ошибка при очистке localStorage:', e);
					}

					console.log(message.sent);
				}
				// name
				else if (message.name == '0') {
					removeBorderError();
					showErrorMessage(form.find('input[name="name"]'), text_response[0]);
					console.log(message.name);
				} else if (message.name == '<2') {
					removeBorderError();
					showErrorMessage(form.find('input[name="name"]'), text_response['<2']);
					console.log(message.name);
				} else if (message.name == '>15') {
					removeBorderError();
					showErrorMessage(form.find('input[name="name"]'), text_response['>15']);
					console.log(message.name);
				}

				// email
				else if (message.email == '0') {
					removeBorderError();
					showErrorMessage(form.find('input[name="email"]'), text_response[0]);
					console.log(message.email);
				} else if (message.email == '<8') {
					removeBorderError();
					showErrorMessage(form.find('input[name="email"]'), text_response['<8']);
					console.log(message.email);
				} else if (message.email == '>25') {
					removeBorderError();
					showErrorMessage(form.find('input[name="email"]'), text_response['>25']);
					console.log(message.email);
				} else if (message.email == 'email_invalid') {
					removeBorderError();
					showErrorMessage(form.find('input[name="email"]'), text_response['email_invalid']);
					console.log(message.email);
				}

				// phone
				else if (message.phone == '0') {
					removeBorderError();
					showErrorMessage(form.find('input[name="phone"]'), text_response[0]);
					console.log(message.phone);
				} else if (message.phone == '>10') {
					removeBorderError();
					showErrorMessage(form.find('input[name="phone"]'), text_response['>10']);
					console.log(message.phone);
				} else if (message.phone == '<15') {
					removeBorderError();
					showErrorMessage(form.find('input[name="phone"]'), text_response['<15']);
					console.log(message.phone);
				}

				// message
				else if (message.message == '0') {
					removeBorderError();
					showErrorMessage(form.find('textarea[name="message"]'), text_response[0]);
					console.log(message.message);
				} else if (message.message == '<5') {
					removeBorderError();
					showErrorMessage(form.find('textarea[name="message"]'), text_response['<5']);
					console.log(message.message);
				} else if (message.message == '>240') {
					removeBorderError();
					showErrorMessage(form.find('textarea[name="message"]'), text_response['>240']);
					console.log(message.message);
				}
				else if (message.agreement == 'agree') {
					removeBorderError();
					showErrorMessage(form.find('label.label_checkbox_amts'), text_response['agree']);
					console.log(message.message);
				}

				function removeBorderError() {
					form.find('.contact_form_input').removeClass('error');
					form.find('label.label_checkbox_amts').removeClass('error');
				}

				function showErrorMessage(elem, str) {
					if (!elem == 0) {
						elem.addClass('error');
					}
					form.find('.err_message').text(str);
					form.find('.err_message').addClass('err_message_ative');
					setTimeout(() => {
						form.find('.err_message').removeClass('err_message_ative')
					}, 4000);
				}

			
			}
		});
		
	

	});

});

	// Функция для маски телефона
	function phoneMask(inputInit) {
		const phoneInput = document.querySelector(inputInit);
		const phoneError = document.querySelector('.err_message');

		// Маска для ввода телефона
		phoneInput.addEventListener('input', function (event) {
			let value = phoneInput.value.replace(/\D/g, ''); // Удаляем все нецифры

			// Если первая цифра 8, заменяем на 7
			if (value[0] === '8') {
				value = '7' + value.slice(1);
			} else if (value[0] !== '7' && value.length > 0) {
				value = '7' + value; // Добавляем 7 в начало, если первая цифра не 7 и не 8
			}

			// Форматируем номер в маску +7(___) ___-__-__
			let formattedValue = '';
			if (value.length > 0) {
				formattedValue = '+7';
				if (value.length > 1) {
					formattedValue += '(' + value.slice(1, 4);
				}
				if (value.length > 4) {
					formattedValue += ')' + value.slice(4, 7);
				}
				if (value.length > 7) {
					formattedValue += '-' + value.slice(7, 9);
				}
				if (value.length > 9) {
					formattedValue += '-' + value.slice(9, 11);
				}
			}

			phoneInput.value = formattedValue;

			// Показываем ошибку только после ввода 11 цифр
			if (value.length === 11) {
				phoneInput.classList.remove('error');
				phoneError.style.display = 'none';
			} else if (value.length > 11) {
				phoneInput.classList.add('error');
				phoneError.style.display = 'block';
				phoneError.textContent = 'Номер телефона не должен содержать больше 11 цифр.';
			} else if (value.length > 0) {
				// Показываем ошибку только если пользователь начал вводить номер
				phoneInput.classList.add('error');
				phoneError.style.display = 'block';
				phoneError.textContent = 'Номер телефона должен содержать 11 цифр.';
			}
		});
	}
