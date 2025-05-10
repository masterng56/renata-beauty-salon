<?php
//скрипты
function masterng_block_init()
{
  // Путь к папке с блоками
  $blocks_dir = __DIR__ . '/blocks/build';

  // Если доступна функция wp_register_block_types_from_metadata_collection
  if (function_exists('wp_register_block_types_from_metadata_collection')) {
    wp_register_block_types_from_metadata_collection($blocks_dir, $blocks_dir . '/blocks-manifest.php');
    return;
  }

  // Если доступна функция wp_register_block_metadata_collection
  if (function_exists('wp_register_block_metadata_collection')) {
    wp_register_block_metadata_collection($blocks_dir, $blocks_dir . '/blocks-manifest.php');
  }

  // Загрузка манифеста блоков
  $manifest_data = require $blocks_dir . '/blocks-manifest.php';
  // vd($manifest_data); // Раскомментируйте для отладки

  // Регистрация каждого блока из манифеста
  foreach (array_keys($manifest_data) as $block_type) {
    register_block_type("{$blocks_dir}/{$block_type}");
  }
}
add_action('init', 'masterng_block_init');

require_once get_template_directory() . '/inc/enqueue.php';

//Кастомный тип постов
require_once get_template_directory() . '/inc/cpt.php';

//Форма обратной связи
require_once get_template_directory() . '/inc/shortcodes/popup/popup.php';

function log_data($data) {
    error_log(print_r($data, true));
}
