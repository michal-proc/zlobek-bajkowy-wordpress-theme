<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
    <a href="/" class="logo-box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="">
        <div>
            <h2><?php bloginfo('name'); ?></h2>
            <p><?php bloginfo('description'); ?></p>
        </div>
    </a>

    <ul class="navbar">
        <?php
        $menu_name = 'primary-menu';
        if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
            $menu = wp_get_nav_menu_object($locations[$menu_name]);
            $menu_items = wp_get_nav_menu_items($menu->term_id);

            $menu_list = '';
            foreach ((array)$menu_items as $key => $menu_item) {
                $acf_parent_fields = get_fields($menu_item->ID);
                if ($menu_item->menu_item_parent == 0) {
                    $parent = $menu_item->ID;
                    $menu_list .= '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a>';

                    $submenu = '';
                    foreach ($menu_items as $sub_key => $sub_menu_item) {
                        if ($sub_menu_item->menu_item_parent == $parent) {
                            $submenu .= '<li><a href="' . $sub_menu_item->url . '">' . $sub_menu_item->title . '</a></li>';
                        }
                    }

                    if ($submenu) {
                        $menu_list .= '<div class="dropdown"><ul>' . $submenu . '</ul>';
                        ob_start();
                        get_dropdown_content($menu_item->url, $acf_parent_fields);
                        $menu_list .= ob_get_clean();
                        $menu_list .= '</div>';
                    }
                    $menu_list .= '</li>';
                }
            }
            echo $menu_list;
        }
        ?>
    </ul>
    <div class="hamburger">
        <div></div>
        <div></div>
        <div></div>
    </div>
</header>
<div class="bg-back"></div>
<canvas class="bg-canvas" id="bg-starfall"></canvas>
<!-- <div class="bg-front"></div> -->
<div class="container">