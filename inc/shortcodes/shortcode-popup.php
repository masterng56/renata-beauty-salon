<?php
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
/**
 * PopUp
 */

add_action( 'wp_enqueue_scripts', 'amts_localize_script', 101);

function amts_localize_script(){
	wp_localize_script( 'amts-popup-form', 'amts_obj', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( '_amtsnonce' ),
		'title'   => esc_html__( 'AMTS Form', 'amts' )
	) );
}

add_shortcode( 'popup-amts', 'popup_amts' );
function popup_amts() {
	ob_start();
	?>
    <div class="overlay">
        <div class="form_wrapper">
            <form class="contact_form_amts" >
                <span class="close"></span>
                <p class="res err"></p>
                <input class="contact_form_input" type="text" placeholder="Фамилия" name="lastname">
                <input class="contact_form_input" type="text" placeholder="Имя" name="name">
                <input class="contact_form_input" type="text" placeholder="Отчество" name="patronymic">
                <input class="contact_form_input" type="text" placeholder="Ваше Email" name="email">
                <textarea class="contact_form_input" placeholder="Учебное заведение" name="education"></textarea>
                <label for="form_checkbox_amts">
                    <input class="contact_form_input" type="checkbox" checked id="form_checkbox_amts" value="on" name="agreement">
                    <span>Я соглашаюсь на обработку моих данных</span>
                </label>
                <button class="submit_btn basic_btn" type="submit">отправить</button>
            </form>
        </div>
    </div>
    <div class="container">
        <button class="btn_popup_amts">Подать заявку</button>
    </div>

	<?php return ob_get_clean();
}