<?php
function register_my_custom_block() {
    register_block_type( __DIR__ . '/blocks/my-custom-block' );
}
add_action('init', 'register_my_custom_block');

function my_block_theme_register_patterns() {
  register_block_pattern(
      'my-block-theme/hero-section',
      array(
          'title'       => __( 'Hero Section', 'my-block-theme' ),
          'description' => __( 'A hero section with a title, text, and a button.', 'my-block-theme' ),
          'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}} -->
          <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);margin-top:0;margin-bottom:0">
              <!-- wp:heading {"textAlign":"center","level":1} -->
              <h1 class="has-text-align-center">Добро пожаловать на наш сайт!</h1>
              <!-- /wp:heading -->
              <!-- wp:paragraph {"align":"center"} -->
              <p class="has-text-align-center">Мы создаем крутые темы для WordPress.</p>
              <!-- /wp:paragraph -->
              <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
              <div class="wp-block-buttons">
                  <!-- wp:button {"backgroundColor":"primary","textColor":"white"} -->
                  <div class="wp-block-button"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background">Начать</a></div>
                  <!-- /wp:button -->
              </div>
              <!-- /wp:buttons -->
          </div>
          <!-- /wp:group -->',
      )
  );
}
add_action( 'init', 'my_block_theme_register_patterns' );

function my_block_theme_register_custom_block() {
    wp_enqueue_script(
        'my-custom-block',
        get_template_directory_uri() . '/build/index.js',
        array('wp-blocks', 'wp-element', 'wp-editor'),
        filemtime(get_template_directory() . '/build/index.js')
    );
}
add_action('enqueue_block_editor_assets', 'my_block_theme_register_custom_block');
