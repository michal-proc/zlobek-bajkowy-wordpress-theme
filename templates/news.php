<?php
/*
Template Name: Posts List
*/

get_header();

// Get the current page title
$pageTitle = get_the_title();
?>

<h1 class="page-title" data-aos="fade-in"><?php echo esc_html($pageTitle); ?></h1>
<div class="posts-list">
    <?php
    // Query for posts
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1, // Change this number to limit the posts displayed
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        $index = 0;
        while ($query->have_posts()) : $query->the_post();
            // Get ACF fields
            $articleTitle = get_field('article_title');
            $articleText = get_field('article_text');
            $articleImage = get_field('article_image');
            $postLink = get_permalink();
            $backgroundClass = $index % 2 == 0 ? 'posts-list-background-2' : 'posts-list-background-1';
            $aosAnimation = $index % 2 == 0 ? 'fade-right' : 'fade-left';
            ?>
            <div class="posts-list-element <?php echo $backgroundClass; ?>" data-aos="<?php echo $aosAnimation; ?>">
                <div class="posts-list-element-image" data-aos="zoom-in">
                    <?php if ($articleImage) : ?>
                        <img src="<?php echo esc_url($articleImage['url']); ?>"
                             alt="<?php echo esc_attr($articleTitle); ?>">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default.jpg"
                             alt="<?php echo esc_attr($articleTitle); ?>">
                    <?php endif; ?>
                </div>
                <div class="posts-list-element-text">
                    <i><?php echo get_the_date('Y-m-d H:i'); ?></i>
                    <a href="<?php echo esc_url($postLink); ?>">
                        <button class="arrow-button arrow-button-top">Przejdź</button>
                    </a>
                    <h3><?php echo esc_html($articleTitle); ?></h3>
                    <p><?php echo wp_trim_words($articleText, 30, '...'); ?></p>
                    <a href="<?php echo esc_url($postLink); ?>">
                        <button class="arrow-button arrow-button-bottom">Przejdź</button>
                    </a>
                </div>
            </div>
            <?php
            $index++;
        endwhile;
        wp_reset_postdata();
    else:
        ?>
        <p class="not-found-text">Nic tu jeszcze nie ma. W przyszłości będą dostępne wpisy.</p>
    <?php
    endif;
    ?>
</div>

<?php get_footer(); ?>
