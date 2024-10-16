<?php
/*
Template Name: Posts List ACF
*/

get_header();

// Get the current page title from ACF
$pageTitle = get_field('page_title');
$contentBlocks = get_field('content_blocks');
?>

<?php if ($pageTitle): ?>
    <h1 class="page-title" data-aos="fade-in"><?php echo esc_html($pageTitle); ?></h1>
<?php endif; ?>

<div class="posts-list">
    <?php if ($contentBlocks): ?>
        <?php $index = 0; ?>
        <?php foreach ($contentBlocks as $block): ?>
            <?php
            $title = $block['title'];
            $text = $block['text'];
            $image = $block['image'];
            $backgroundClass = $index % 2 == 0 ? 'posts-list-background-2' : 'posts-list-background-1';
            $aosAnimation = $index % 2 == 0 ? 'fade-right' : 'fade-left';
            ?>
            <div class="posts-list-element <?php echo $backgroundClass; ?>" data-aos="<?php echo $aosAnimation; ?>">
                <div class="posts-list-element-image" data-aos="zoom-in">
                    <?php if ($image): ?>
                        <img src="<?php echo esc_url($image['url']); ?>"
                             alt="<?php echo esc_attr($title); ?>">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default.jpg"
                             alt="<?php echo esc_attr($title); ?>">
                    <?php endif; ?>
                </div>
                <div class="posts-list-element-text">
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo $text; ?></p>
                </div>
            </div>
            <?php $index++; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="not-found-text">Nic tu jeszcze nie ma. W przyszłości będą dostępne wpisy.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
