<?php
/*
Template Name: Two items menu 3
*/

get_header(); ?>

<?php
// Fetch ACF fields
$pageTitle = get_field('pageTitle');
$card1Title = get_field('card1Title');
$card1Link = get_field('card1Link');
$card1Content = get_field('card1Content');
$card2Title = get_field('card2Title');
$card2Link = get_field('card2Link');
$card2Content = get_field('card2Content');
?>

<h1 class="page-title" data-aos="fade-in"><?php echo esc_html($pageTitle); ?></h1>
<div class="page-card-container">
    <a href="<?php echo esc_url($card1Link); ?>" class="page-card page-card-1-additional page-card-1"
       data-aos="fade-up">
        <h3><?php echo esc_html($card1Title); ?></h3>
        <p><?php echo $card1Content; ?></p>
    </a>
    <a href="<?php echo esc_url($card2Link); ?>" class="page-card page-card-3-additional page-card-3" data-aos="fade-up"
       data-aos-delay="100">
        <h3><?php echo esc_html($card2Title); ?></h3>
        <p><?php echo $card2Content; ?></p>
    </a>
</div>

<?php get_footer(); ?>
