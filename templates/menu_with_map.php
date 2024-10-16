<?php
/*
Template Name: Menu with Map
*/

get_header();

// Fetch ACF fields
$pageTitle = get_field('pageTitle');
$image = get_field('image');

// Map info
$address = get_field('address_first_line', 'option');
$addressDetails = get_field('address_second_line', 'option');;
$mapIframe = get_field('address_iframe', 'option');

// Card 1
$card1Title = get_field('card1Title');
$card1Link = get_field('card1Link');
$card1Content = get_field('card1Content');

// Card 2
$card2Title = get_field('card2Title');
$card2Link = get_field('card2Link');
$card2Content = get_field('card2Content');

// Card 3
$card3Title = get_field('card3Title');
$card3Link = get_field('card3Link');
$card3Content = get_field('card3Content');
?>

<h1 class="page-title" data-aos="fade-in"><?php echo esc_html($pageTitle); ?></h1>
<div class="offer-additional">
    <div class="offer-additional-information-container" data-aos="fade-up">
        <div class="offer-additional-information-container-column" data-aos="fade-right">
            <img src="<?php echo esc_url($image['url']); ?>" alt="Address Image">
        </div>
        <div class="offer-additional-information-container-column" data-aos="fade-left">
            <div class="offer-additional-information-container-column-subcontent">
                <img id="pin-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/address.svg"
                     alt="Address Icon">
                <div style="z-index: 1">
                    <p><?php echo esc_html($address); ?></p>
                    <p><?php echo esc_html($addressDetails); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="offer-additional-iframe-container" data-aos="zoom-in">
        <?php echo $mapIframe; ?>
    </div>
</div>

<div class="page-card-container">
    <a href="<?php echo esc_url($card1Link); ?>" class="page-card page-card-1-additional page-card-1"
       data-aos="fade-up">
        <h3><?php echo esc_html($card1Title); ?></h3>
        <p><?php echo $card1Content; ?></p>
    </a>
    <a href="<?php echo esc_url($card2Link); ?>" class="page-card page-card-2-additional page-card-2" data-aos="fade-up"
       data-aos-delay="100">
        <h3><?php echo esc_html($card2Title); ?></h3>
        <p><?php echo $card2Content; ?></p>
    </a>
    <a href="<?php echo esc_url($card3Link); ?>" class="page-card page-card-3-additional page-card-3" data-aos="fade-up"
       data-aos-delay="200">
        <h3><?php echo esc_html($card3Title); ?></h3>
        <p><?php echo $card3Content; ?></p>
    </a>
</div>

<?php get_footer(); ?>
