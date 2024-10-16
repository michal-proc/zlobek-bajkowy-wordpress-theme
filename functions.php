<?php
// Add support for ACF JSON
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths)
{
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

// Enqueue CSS and JS files
function theme_enqueue_styles()
{
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/index.js', array(), '1.0');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Add support for post thumbnails
add_theme_support('post-thumbnails');

// Register navigation menus
function theme_register_menus()
{
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'pastel-theme'),
    ));
}

add_action('init', 'theme_register_menus');

// Add support for theme translations
function theme_load_textdomain()
{
    load_theme_textdomain('pastel-theme', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'theme_load_textdomain');

// Define constant for assets URL
define('THEME_ASSETS_URL', get_template_directory_uri() . '/assets');

// Function to fetch the latest post
function get_dropdown_content($menu_link, $menu_content)
{
    if (!$menu_content['menu_use_article']) {
        ?>
        <a href="<?php echo esc_url($menu_link); ?>">
            <div class="dd-subcontent">
                <?php if ($menu_content['menu_image']) : ?>
                    <img src="<?php echo esc_url($menu_content['menu_image']['url']); ?>"
                         alt="<?php echo esc_attr($menu_content['menu_title']); ?>">
                <?php endif; ?>
                <p><?php echo wp_trim_words($menu_content['menu_content'], 30); ?></p>
            </div>
        </a>
        <?php
    } else {
        $latest_post = new WP_Query(array(
            'posts_per_page' => 1
        ));
        if ($latest_post->have_posts()) :
            while ($latest_post->have_posts()) : $latest_post->the_post();
                // Get ACF fields for the post
                $article_title = get_field('article_title');
                $article_text = get_field('article_text');
                $article_image = get_field('article_image');
                $article_link = get_permalink();
                ?>
                <a href="<?php echo esc_url($article_link); ?>">
                    <div class="dd-subcontent">
                        <?php if ($article_image) : ?>
                            <img src="<?php echo esc_url($article_image['url']); ?>"
                                 alt="<?php echo esc_attr($article_title); ?>">
                        <?php endif; ?>
                        <p><?php echo wp_trim_words($article_text, 30); ?></p>
                    </div>
                </a>
            <?php
            endwhile;
            wp_reset_postdata();
        endif;
    }
}

function console_log($data, $context = 'PHP LOG')
{
    // Encode the data to JSON format
    $json_data = json_encode($data);

    // Generate the JavaScript code
    $script = "<script>
        console.log($json_data);
    </script>";

    // Print the script to be executed in the browser
    echo $script;
}

function redirect_404_to_homepage()
{
    if (is_404()) {
        wp_redirect(home_url());
        exit();
    }
}

add_action('template_redirect', 'redirect_404_to_homepage');

?>
