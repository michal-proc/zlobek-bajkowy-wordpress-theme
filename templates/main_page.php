<?php
/**
 * Template Name: Main Page
 */

get_header(); ?>

<div class="slider-container">
    <div class="slider" data-aos="fade-up">
        <?php if (have_rows('slider')): ?>
            <?php while (have_rows('slider')): the_row(); ?>
                <div class="slider-element">
                    <?php $slider_image = get_sub_field('slider_image'); ?>
                    <img src="<?php echo esc_url($slider_image['url']); ?>"
                         alt="<?php the_sub_field('slider_text'); ?>">
                    <div class="slider-caption"><?php the_sub_field('slider_text'); ?></div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<div class="page-card-container">
    <a href="<?php the_field('tile1_link'); ?>" class="page-card page-card-1-additional page-card-1" data-aos="fade-up">
        <h3><?php the_field('tile1_title'); ?></h3>
        <p><?php the_field('tile1_content'); ?></p>
    </a>
    <a href="<?php the_field('tile2_link'); ?>" class="page-card page-card-2-additional page-card-2" data-aos="fade-up"
       data-aos-delay="100">
        <h3><?php the_field('tile2_title'); ?></h3>
        <p><?php the_field('tile2_content'); ?></p>
    </a>
    <a href="<?php the_field('tile3_link'); ?>" class="page-card page-card-3-additional page-card-3" data-aos="fade-up"
       data-aos-delay="200">
        <h3><?php the_field('tile3_title'); ?></h3>
        <p><?php the_field('tile3_content'); ?></p>
    </a>
</div>

<a href="<?php the_field('tile_bottom_link'); ?>" class="banner-with-image-right" data-aos="fade-left">
    <div class="banner-with-image-right-content">
        <h3><?php the_field('tile_bottom_title'); ?></h3>
        <p><?php the_field('tile_bottom_text'); ?></p>
    </div>
    <div class="banner-with-image-right-image">
        <?php $tile_bottom_image = get_field('tile_bottom_image'); ?>
        <img src="<?php echo esc_url($tile_bottom_image['url']); ?>" alt="">
    </div>
</a>

<?php
// Get the latest post
$latest_post = new WP_Query(array(
    'posts_per_page' => 1,
));
if ($latest_post->have_posts()) :
    while ($latest_post->have_posts()) : $latest_post->the_post();
        // Get ACF fields for the post
        $article_title = get_field('article_title');
        $article_text = get_field('article_text');
        $article_image = get_field('article_image');
        ?>
        <a class="banner-with-image-left" href="<?php the_permalink(); ?>" data-aos="fade-right">
            <div class="banner-with-image-left-image">
                <?php if ($article_image) : ?>
                    <img src="<?php echo esc_url($article_image['url']); ?>"
                         alt="<?php echo esc_attr($article_title); ?>">
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default.jpg"
                         alt="Default Image">
                <?php endif; ?>
            </div>
            <div class="banner-with-image-left-content">
                <h3><?php echo esc_html($article_title); ?></h3>
                <p><?php echo wp_trim_words($article_text, 30); ?></p>
            </div>
        </a>
    <?php endwhile;
    wp_reset_postdata();
endif;
?>

<?php get_footer(); ?>
