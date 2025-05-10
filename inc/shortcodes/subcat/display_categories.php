<?php

class AMTS_display_categories
{

    public function __construct()
    {
        // Регистрируем шорткод
        add_shortcode('amts_display_categories', array($this, 'render_shortcode'));

        // Подключаем стили и скрипты
//        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    public function enqueue_scripts()
    {
        // Подключение стилей
        wp_enqueue_style('display_categories', MASTERNG_URI . '/inc/shortcodes/subcat/css/display_categories.css');

        // Подключение скрипта
        wp_enqueue_script('display_categories', MASTERNG_URI . '/inc/shortcodes/subcat/js/display_categories.js', array('jquery'), null, true);
    }

    public function render_shortcode($atts)
    {
        $atts = shortcode_atts(
            array(
                'template' => 'default', // По умолчанию используем шаблон default
            ),
            $atts,
            'wc_category_accordion'
        );

        // Получаем слаг шаблона
        $template_slug = sanitize_file_name($atts['template']);

				// Начало буферизации вывода
        ob_start();
        $this->display_category_accordion($template_slug);

				// Возвращаем содержимое буфера как строку
        return ob_get_clean();
    }

    private function display_categories_with_subcategories($template_slug)
    {
        $args = array(
            'taxonomy' => 'product_cat',
            'parent' => 0, // Получаем только категории первого уровня
            'hide_empty' => true, // Показываем также пустые категории
        );

        $categories = get_terms($args);

        if ($categories && !is_wp_error($categories)) {
            // Проверяем, существует ли кастомный шаблон в папке темы
            $template_path = locate_template("/inc/shortcodes/subcat/template-parts/{$template_slug}.php");
//            vd ($template_path);
            if (!$template_path) {
                // Если шаблон не найден, используем стандартный шаблон из плагина
                $template_path = plugin_dir_path(__FILE__) . "templates/{$template_slug}.php";
            }

            if (file_exists($template_path)) {
                // Передаем категории в шаблон
                include $template_path;
            } else {
                echo '<p>Шаблон не найден.</p>';
            }
        }
    }

	private function display_category_accordion($template_slug) {

		$args = array(
			'taxonomy'     => 'product_cat',
			'parent'       => 0, // Получаем только категории первого уровня
			'hide_empty'   => true, // Показываем также пустые категории
		);

		$categories = get_terms($args);

		if ($categories && !is_wp_error($categories)) {
			// Проверяем, существует ли кастомный шаблон в папке темы

			$template_path = locate_template("/inc/shortcodes/subcat/template-parts/{$template_slug}.php");

			if (!$template_path) {
				// Если шаблон не найден, используем стандартный шаблон из плагина
				$template_path = plugin_dir_path(__FILE__) . "templates/{$template_slug}.php";
			}

			if (file_exists($template_path)) {
				// Передаем категории в шаблон
				include $template_path;
			} else {
				echo '<p>Шаблон не найден.</p>';
			}
		}
	}

}

$AMTS_display_categories = new AMTS_display_categories();

