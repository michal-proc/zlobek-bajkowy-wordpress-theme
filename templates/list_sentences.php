<?php
/*
Template Name: List Sentences
*/

get_header();

// Get the current page title from ACF
$pageTitle = get_field('page_title');
$sentences = get_field('sentences');
?>

<?php if ($pageTitle): ?>
    <h1 class="page-title" data-aos="fade-in"><?php echo esc_html($pageTitle); ?></h1>
<?php endif; ?>

<div class="list-points">
    <?php if ($sentences): ?>
        <?php $index = 0; ?>
        <?php foreach ($sentences as $sentence): ?>
            <?php
            $sentenceText = $sentence['sentence'];
            $class = $index % 2 == 0 ? 'list-points-left' : 'list-points-right';
            $aosAnimation = $index % 2 == 0 ? 'fade-right' : 'fade-left';
            ?>
            <div class="<?php echo $class; ?>" data-aos="<?php echo $aosAnimation; ?>">
                <?php echo esc_html($sentenceText); ?>
            </div>
            <?php $index++; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
