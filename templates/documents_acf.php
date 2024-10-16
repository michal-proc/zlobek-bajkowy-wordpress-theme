<?php
/*
Template Name: Documents List with ACF
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
            $file = $block['file'];
            $backgroundClass = $index % 2 == 0 ? 'posts-list-background-2' : 'posts-list-background-1';
            ?>
            <div class="posts-list-element <?php echo $backgroundClass; ?>" data-aos="fade-up">
                <div class="posts-list-element-image posts-list-element-pdf" data-aos="fade-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pdf.svg"
                         alt="<?php echo esc_attr($title); ?>">
                </div>
                <div class="posts-list-element-text" data-aos="fade-left">
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo $text; ?></p>
                    <?php if ($file): ?>
                        <a href="<?php echo esc_url($file['url']); ?>" class="arrow-button arrow-button-other" style="width: 100%" download>
                            <i class="fa fa-file" style="color: white; font-size: 1rem"></i> Pobierz
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php $index++; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
