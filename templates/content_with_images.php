<?php
/*
Template Name: Content with Images 1
*/

get_header();

// Fetch ACF fields
$pageTitle = get_field('page_title');
$contentBlocks = get_field('content_blocks'); // This should be a repeater field in ACF
?>

<?php if ($pageTitle): ?>
    <h1 class="page-title" data-aos="fade-in"><?php echo esc_html($pageTitle); ?></h1>
<?php endif; ?>

<?php foreach ($contentBlocks as $index => $block): ?>
    <div class="content <?php echo $index % 2 == 1 ? 'content-right' : ''; ?>" data-aos="fade-up">
        <?php if ($index % 2 == 0 && $block['image']): ?>
            <div class="content-image content-image-50" data-aos="fade-right">
                <img src="<?php echo esc_url($block['image']['url']); ?>"
                     alt="<?php echo esc_attr($block['image']['alt']); ?>">
            </div>
        <?php endif; ?>
        <div class="content-text content-text-50 <?php echo $index % 2 == 0 ? 'content-background-3' : 'content-background-5'; ?>" data-aos="fade-left">
            <?php if ($block['title']): ?>
                <h3><?php echo esc_html($block['title']); ?></h3>
            <?php endif; ?>
            <?php if ($block['text']): ?>
                <p><?php echo $block['text']; ?></p>
            <?php endif; ?>
        </div>
        <?php if ($index % 2 == 1 && $block['image']): ?>
            <div class="content-image content-image-50" data-aos="fade-left">
                <img src="<?php echo esc_url($block['image']['url']); ?>"
                     alt="<?php echo esc_attr($block['image']['alt']); ?>">
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<?php get_footer(); ?>
