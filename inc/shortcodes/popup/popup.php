<?php

if (!defined('ABSPATH')) {
	die;
}

/**
 * Шорт код Попап форма
 */
class AMTSpopup
{
	public function __construct()
	{
		add_action('wp_ajax_popup_form_amts', [$this, 'send_to_email_amts']);
		add_action('wp_ajax_nopriv_popup_form_amts', [$this, 'send_to_email_amts']);
		add_action('init', [$this, 'cpt']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue',], 99);
		add_shortcode('amts-popup', [$this, 'popup']);
		add_shortcode('policy-popup', [$this, 'policy_popup']);
		add_shortcode('btn-popup', [$this, 'btn_popup']);
		add_shortcode('amts-form', [$this, 'amts_form']);
	}
	public function send_to_email_amts()
	{
		error_log(print_r($_POST, 1));
		check_ajax_referer('_amtsnonce', 'nonce');
		$this->validation();
		wp_die();
	}

	public function success($message)
	{

		wp_send_json_success(
			[
				'response' => 'SUCCESS',
				'message' => $message
			]
		);
	}

	public function validation(){
		if ($_POST) {
			$post_data = $_POST;
			$sanitized_data = [];
			$errors = [];

			// 1. Санитизация данных
			foreach ($post_data as $key => $value) {
				// Пропускаем служебные поля
				if (in_array($key, ['action', 'nonce'])) {
					continue;
				}

				// Если значение - массив (например, для чекбоксов)
				if (is_array($value)) {
					$sanitized_data[$key] = array_map('sanitize_text_field', $value);
					continue;
				}

				$clean_value = sanitize_text_field($value);

				if ($key === 'phone') {
					$clean_value = preg_replace('/[^\+\d]/', '', $clean_value);
				}

				$sanitized_data[$key] = $clean_value;
			}

			// 2. Валидация данных
			foreach ($sanitized_data as $key => $value) {
				// Пропускаем служебные поля и массивы
				if (in_array($key, ['action', 'nonce']) || is_array($value)) {
					continue;
				}

				// Проверка на пустое значение
				if (empty($value)) {
					$errors[$key] = '0';
					continue;
				}

				// Пропускаем проверку длины для agreement
				if ($key === 'agreement') {
					continue;
				}

				$length = mb_strlen($value, 'UTF-8');

				// Валидация email
				if ($key === 'email') {
					if (!is_email($value)) {
						$errors[$key] = 'email_invalid';
					} elseif ($length < 8) {
						$errors[$key] = '>7';
					} elseif ($length > 25) {
						$errors[$key] = '<25';
					}
					continue;
				}

				// Валидация phone
				if ($key === 'phone') {
					if ($length < 11) {
						$errors[$key] = '>10';
					} elseif ($length > 15) {
						$errors[$key] = '<15';
					}
					continue;
				}

				// Валидация message
				if ($key === 'message') {
					if ($length < 3) {
						$errors[$key] = '>2';
					} elseif ($length > 240) {
						$errors[$key] = '<240';
					}
					continue;
				}

				// Валидация остальных полей (2-25 символов)
				if ($length < 2) {
					$errors[$key] = '>1';
				} elseif ($length > 25) {
					$errors[$key] = '<25';
				}
			}

			// Проверка наличия agreement
			if (!isset($sanitized_data['agreement'])) {
				$errors['agreement'] = 'agree';
			}

			if (count($errors) === 0) {
				$sitename = $_SERVER["SERVER_NAME"];
				$data = date("d-m-Y H:i:s");

				// Формируем список выбранных услуг
				$selected_services = [];
				foreach ($sanitized_data as $key => $value) {
					if ($key !== 'action' && $key !== 'nonce' && $key !== 'agreement' && $key !== 'name' && $key !== 'phone') {
						$selected_services[] = $value;
					}
				}

				$content = "
					Дата: {$data} \r\n
					Имя: {$sanitized_data['name']} \r\n
					Телефон: {$sanitized_data['phone']} \r\n
					Выбранные услуги: " . implode(', ', $selected_services) . " \r\n
					";

				$response_data = [
					'post_type' => 'orders',
					'post_status' => 'publish',
					'post_title' => $sanitized_data['name'],
					'post_content' => $content,
				];

				$post_id = wp_insert_post(wp_slash($response_data));
				wp_mail("masterng@yandex.ru", "Заявка с {$sitename}", $content);
				$success['sent'] = 'ok';
				log_data($success['sent']);
			}


			if ($errors) {
				$this->error($errors);
			}
			if ($success) {
				$this->success($success);
			}
		}
	}

	public function error($message)
	{
		wp_send_json_error(
			[
				'response' => 'ERROR',
				'message' => $message
			]
		);
	}

	public function amts_form()
	{
		ob_start();
?>
		<style>
			.error {
				border: 2px solid red;
			}

			*[disabled] {
				background-color: #EBEBEB;
				/* Серый фон для отключенной кнопки */
				color: #666;
				/* Текст серого цвета */
				cursor: not-allowed;
				/* Курсор "недоступно" */
				border: 2px solid #EBEBEB;
			}
			*[disabled]:hover {
				background-color: #EBEBEB;
				/* Серый фон для отключенной кнопки */
				color: #666;
				/* Текст серого цвета */
				cursor: not-allowed;
				/* Курсор "недоступно" */
				border: 2px solid #EBEBEB;
			}

	
		</style>
		<div class="form_wrapper">
			<form class="contact_form_amts appointment-form">
				<p class="err_message"></p>
				<div class="input_wrapper">
					<h2 class="appointment-title ">Записаться сейчас</h2>

					<div class="form-name form-item">
						<p class="form-text">Ваше имя:</p>
						<input class="form-input contact_form_input" type="text" name="name">
					</div>

					<div class="form-phone form-item">
						<p class="form-text">Ваш телефон:</p>
						<input class="form-input contact_form_input" type="tel" name="phone">
					</div>

					<p class="form-checkbox-title">Выберите услуги:</p>

					<div class="form-checkbox row">

						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Стрижка</p>
							<input class="checkbox-input contact_form_input" checked id="haircut" type="checkbox" name="haircut"
								value="Стрижка">
							<label class="label" for="haircut"></label>
						</div>

						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Окрашивание</p>
							<input class="checkbox-input contact_form_input" id="coloring" type="checkbox" name="coloring"
								value="Окрашивание">
							<label class="label" for="coloring"></label>
						</div>

						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Манекюр</p>
							<input class="checkbox-input contact_form_input" id="manicure" type="checkbox" name="manicure"
								value="Манекюр">
							<label class="label" for="manicure"></label>
						</div>

						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Шугаринг</p>
							<input class="checkbox-input contact_form_input" id="sugaring" type="checkbox" name="sugaring"
								value="Шугаринг">
							<label class="label" for="sugaring"></label>
						</div>

						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Консультция</p>
							<input class="checkbox-input contact_form_input" id="consultation" type="checkbox" name="consultation"
								value="Консультция">
							<label class="label" for="consultation"></label>
						</div>

						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Мелирование</p>
							<input class="checkbox-input contact_form_input" id="Highlighting" type="checkbox" name="Highlighting"
								value="Мелирование">
							<label class="label" for="Highlighting"></label>
						</div>

					</div>

					<label class="label_checkbox_amts" for="form_checkbox_amts">
						<input class="contact_form_input" type="checkbox" value="on" checked="checked" id="form_checkbox_amts"
							name="agreement">
						<span>Я соглашаюсь на обработку моих данных</span>
					</label>
				</div>

				<div>
					<button type="submit" class="amts_form amts_submit_btn btn-appointment appointment-button">Записаться</button>
				</div>

			</form>
		</div>
	<?php
		return ob_get_clean();
	}

	public function popup()
	{
		ob_start();
	?>
		<div class="overlay">
			<div class="form_wrapper">
				<form class="contact_form_amts">
					<span class="btn_close"></span>
					<p class="err_message"></p>
					<div class="input_wrapper">
						<h4 class="form_title"></h4>
						<input class="contact_form_input" type="text" placeholder="Name" name="name">
						<input class="contact_form_input" type="text" placeholder="Email" name="email">
						<input class="contact_form_input" type="text" placeholder="Telefon" name="phone">
						<textarea class="contact_form_input" placeholder="Nachricht" name="message"></textarea>
						<label class="label_checkbox_amts" for="form_checkbox_amts">
							<input class="contact_form_input" type="checkbox" value="on" checked="checked" id="form_checkbox_amts"
								name="agreement">
							<span>Ich stimme der Verarbeitung meiner Daten zu</span>
						</label>
					</div>

					<button class="amts_form amts_submit_btn basic_btn btn btn_blue" type="submit">senden</button>
				</form>
			</div>
		</div>

	<?php
		return ob_get_clean();
	}

	public function policy_popup()
	{
		ob_start();
	?>
		<div class="policy_popup display_none">
			<div class="policy_text">
				Diese Website sammelt Cookies, Informationen zur IP-Adresse und zum Standort der Nutzer. Die weitere Nutzung der Website bedeutet, dass Sie der Verarbeitung solcher Daten zustimmen.
			</div>
			<div class="policy_btn">
				<button class="btn btn_policy btn_blue">Ich bin einverstanden</button>
			</div>

		</div>

		<style>
			footer {
				/*position: relative;*/
			}

			.policy_popup {
				position: fixed;
				bottom: 30px;
				left: 50%;
				margin-left: -180px;
				display: flex;
				flex-direction: column;
				font-size: 13px;
				max-width: 360px;
				padding: 20px;
				color: #fff;
				border-radius: 4px;
				background-color: rgba(40, 40, 40, 0.9);
				row-gap: 10px;
			}

			.policy_btn {
				display: flex;
				align-items: center;
				justify-content: center;
				width: 100%;
			}

			.btn_policy {
				max-width: 185px;
			}

			.display_none {
				display: none;
			}

			.display_flex {
				display: flex;
			}
		</style>
		<script>
			window.addEventListener('load', function() {
				const policy_popup = document.querySelector('.policy_popup')
				const btn_policy = document.querySelector('.btn_policy');

				if (!localStorage.getItem('policy')) {
					policy_popup.classList.add('display_flex')
					btn_policy.addEventListener('click', function() {
						policy_popup.classList.remove('display_flex')
						localStorage['policy'] = 'yes'
					});
				}
			});
		</script>
	<?php
		return ob_get_clean();
	}

	public function btn_popup($atts)
	{
		$atts = shortcode_atts(['text' => 'Задать вопрос'], $atts);

		ob_start();
	?>
		<div class="btn_wrapper">
			<button class="btn btn_order btn_quest btn_popup_amts" data-title="<?php echo $atts['text']; ?>"><?php echo $atts['text']; ?></button>
		</div>
<?php
		return ob_get_clean();
	}

	public function enqueue()
	{

		wp_enqueue_style(
			'amts-popup',
			MASTERNG_URI . '/inc/shortcodes/popup/css/popup.css',
			array(),
			null
		);

		wp_enqueue_script(
			'popup-form',
			MASTERNG_URI . '/inc/shortcodes/popup/js/popup-form.js',
			array('jquery'),
			null
		);

		wp_localize_script('popup-form', 'amts_obj', array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('_amtsnonce'),
			'title' => esc_html__('AMTS Form', 'amts')
		));
	}

	public function cpt()
	{

		register_post_type('orders', [
			'label' => null,
			'labels' => [
				'name' => 'Заявкаи',
				'singular_name' => 'Заявки',
				'add_new' => 'Добавить',
				'add_new_item' => 'Добавить',
				'edit_item' => 'Редактировать',
				'new_item' => 'Новый',
				'all_items' => 'Заявка',
				'view_item' => 'Просмотр',
				'search_items' => 'Искать',
				'not_found' => 'Ничего не найдено.',
				'menu_name' => 'Заявки',
			],
			'description' => 'Заявки',
			'public' => true,
			//			'rewrite' => ['slug'=>'properties'],
			'show_ui' => true,
			//		'taxonomies'    => [ 'actions' ],
			'show_in_rest' => false, //если значение true, то будет использоваться редактор gutenberg
			'has_archive' => false,
			'query_var' => true,
			'menu_icon' => 'dashicons-buddicons-pm',
			'menu_position' => 10,
			'supports' => ['title', 'page-attributes', 'editor'],
		]);
	}
}

$AMTSpopup = new AMTSpopup();
