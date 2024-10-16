<?php
/*
Single article page
*/
get_header();
?>

<div class="post-image-container" data-aos="fade-down">
    <?php
    $article_image = get_field('article_image');
    if ($article_image) : ?>
        <img class="post-image" src="<?php echo esc_url($article_image['url']); ?>"
             alt="<?php echo esc_attr($article_image['alt']); ?>">
    <?php endif; ?>
</div>

<div class="page-card-container" data-aos="fade-up">
    <h1 class="post-title"><?php the_field('article_title'); ?></h1>
    <div class="post-text">
        <?php the_field('article_text'); ?>
    </div>
</div>

<?php get_footer(); ?>
