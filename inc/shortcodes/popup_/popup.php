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

	public function validation()
	{

		$error = [];
		$success = [];

		if ($_POST) {
			if($_POST['title']){
				$title = sanitize_text_field($_POST['title']);
			}
			if($_POST['name']){
				$name = sanitize_text_field($_POST['name']);
			}
			if($_POST['email']){
				$email = sanitize_text_field($_POST['email']);
			}
			if($_POST['phone']){
				$phone = sanitize_text_field($_POST['phone']);
				$phone = preg_replace('/[^+0-9]/', '', $phone);
			}
			if($_POST['message']){
				$message = sanitize_text_field($_POST['message']);
			}

			$agreement = $_POST['agree'];

			if ($name == '') {
				$error['name'] = 'Поле не заполнено';
			} else if (mb_strlen($name, 'UTF8') < 2) {
				$error['name'] = 'Минимум два символа';
			} else if (mb_strlen($name, 'UTF8') > 15) {
				$error['name'] = 'Имя слишком длинное';
			} else if ($email == '') {
				$error['email'] = 'Поле не заполнено';
			} else if (mb_strlen($email, 'UTF8') < 8) {
				$error['email'] = 'Минимум восемь символов';
			} else if (mb_strlen($email, 'UTF8') > 25) {
				$error['email'] = 'Максимум двадцать пять цифр';
			} else if ($phone == '') {
				$error['phone'] = 'Поле не заполнено';
			} else if (mb_strlen($phone, 'UTF8') < 11) {
				$error['phone'] = 'Минимум одиннадцать символов';
			} else if (mb_strlen($phone, 'UTF8') > 15) {
				$error['phone'] = 'Максимум пятнадцать символов';
			} else if ($message == '') {
				$error['message'] = 'Поле не заполнено';
			} else if (mb_strlen($message, 'UTF8') < 3) {
				$error['message'] = 'Текст слишком маленький';
			} else if (mb_strlen($message, 'UTF8') > 240) {
				$error['message'] = 'Текст слишком большой';
			} else if ($agreement == '') {
				$error['agreement'] = 'Примите соглашение';
			} else {
				$sitename = $_SERVER["SERVER_NAME"];
				$data = date("d-m-Y H:i:s");
				$content = "
					Дата: {$data} \r\n
					Тема: {$title} \r\n
					Имя: {$name} \r\n
					Email: {$email} \r\n
					Телефон: {$phone} \r\n
					Сообщение: {$message} \r\n
					";

				$response_data = [
					'post_type' => 'orders', //custom post type
					'post_status' => 'publish',
					'post_title' => $name,
					'post_content' => $content,
				];

				$post_id = wp_insert_post(wp_slash($response_data));
				//				CFS()->save(['rate' => $rate], ['ID' => $post_id]);
				wp_mail("info@auras.su", "Заявка с {$sitename}", $content);
				$success['sent'] = 'Заявка отправлена!';
			}
		}

		if ($error) {
			$this->error($error);
		}
		if ($success) {
			$this->success($success);
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
	

	public function popup()
	{
		ob_start();
?>
		<!-- <div class="overlay"> -->
		<div class="form_wrapper">
			<form class="contact_form_amts">
				<!-- <span class="btn_close"></span> -->
				<p class="err_message"></p>
				<div class="input_wrapper">
					<h2 class="appointment-title ">Записаться сейчас</h2>
					<div class="form-name form-item">
						<p class="form-text">Ваше имя:</p>
						<input class="form-input contact_form_input" type="text" name="name">
					</div>


					<div class="form-phone form-item">
						<p class="form-text contact_form_input">Ваш телефон:</p>
						<input class="form-input" type="tel" name="phone">
					</div>
					<p class="form-checkbox-title">Выберите услуги:</p>
					<div class="form-checkbox row">
						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Стрижка</p>
							<input class="checkbox-input" id="haircut" type="checkbox" name="haircut"
								value="Стрижка">
							<label class="label" for="haircut"></label>
						</div>
						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Окрашивание</p>
							<input class="checkbox-input" id="coloring" type="checkbox" name="coloring"
								value="Окрашивание">
							<label class="label" for="coloring"></label>
						</div>
						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Манекюр</p>
							<input class="checkbox-input" id="manicure" type="checkbox" name="manicure"
								value="Манекюр">
							<label class="label" for="manicure"></label>
						</div>
						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Шугаринг</p>
							<input class="checkbox-input" id="sugaring" type="checkbox" name="sugaring"
								value="Шугаринг">
							<label class="label" for="sugaring"></label>
						</div>
						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Консультция</p>
							<input class="checkbox-input" id="consultation" type="checkbox" name="consultation"
								value="Консультция">
							<label class="label" for="consultation"></label>
						</div>
						<div class="checkbox-item col-12 col-sm-12 col-md-6 col-lg-4">
							<p class="checkbox-text">Мелирование</p>
							<input class="checkbox-input" id="Highlighting" type="checkbox" name="Highlighting"
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

				<!-- <button class="amts_form amts_submit_btn basic_btn btn btn_blue" type="submit">отправить</button> -->
			</form>
		</div>
		<!-- </div> -->

	<?php
		return ob_get_clean();
	}
	public function policy_popup()
	{
		ob_start();
	?>
		<div class="policy_popup display_none">
			<div class="policy_text">
				Этот сайт собирает cookie-файлы, данные об IP-адресе и местоположении пользователей. Дальнейшее использование сайта означает ваше согласие на обработку таких данных.
			</div>
			<div class="policy_btn">
				<button class="btn btn_policy btn_blue">Я согласен</button>
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
				width: 122px;
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
			<button class="btn btn_order btn_quest btn_popup_amts" data-title="Задать вопрос"><?php echo $atts['text']; ?></button>
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
