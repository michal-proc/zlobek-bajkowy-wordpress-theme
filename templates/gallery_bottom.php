<?php
/*
Template Name: Gallery Bottom
*/

get_header();

// Fetch ACF fields
$galleryTitle = get_field('gallery_title');
$galleryText = get_field('gallery_text');
$galleryImages = get_field('gallery_images');
?>

<?php if ($galleryTitle): ?>
    <h1 class="gallery-title" data-aos="fade-in"><?php echo esc_html($galleryTitle); ?></h1>
<?php endif; ?>

<div class="page-card-container" data-aos="fade-up">
    <div class="gallery-text">
        <?php if ($galleryText): ?>
            <?php echo $galleryText; ?>
        <?php endif; ?>
    </div>
</div>
<div class="gallery">
    <?php if ($galleryImages): ?>
        <?php foreach ($galleryImages as $image): ?>
            <img src="<?php echo esc_url($image['image']['url']); ?>"
                 alt="<?php echo esc_attr($image['image']['alt']); ?>" data-aos="zoom-in">
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
