<?php
/*
Template Name: Two Images Page
*/

get_header();

// Fetch ACF fields
$pageTitle = get_field('page_title');
$pageImageOne = get_field('page_image_one');
$pageImageTwo = get_field('page_image_two');
?>

<?php if ($pageTitle): ?>
    <h1 class="page-title" data-aos="fade-in"><?php echo esc_html($pageTitle); ?></h1>
<?php endif; ?>

    <div class="page-two-images-image-container" data-aos="fade-down" style="margin-bottom: 1rem">
        <?php if ($pageImageOne) : ?>
            <img class="page-two-images-image" src="<?php echo esc_url($pageImageOne['url']); ?>"
                 alt="<?php echo esc_attr($pageImageOne['alt']); ?>">
        <?php endif; ?>
    </div>

    <div class="page-two-images-image-container" data-aos="fade-up">
        <?php if ($pageImageTwo) : ?>
            <img class="page-two-images-image" src="<?php echo esc_url($pageImageTwo['url']); ?>"
                 alt="<?php echo esc_attr($pageImageTwo['alt']); ?>">
        <?php endif; ?>
    </div>


<?php get_footer(); ?>