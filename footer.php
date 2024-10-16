</div> <!-- Closing the main content div -->
<div class="footer-container">
    <svg class="clouds" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 800 800">
        <defs>
            <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="cccloud-grad">
                <stop stop-color="hsl(37, 99%, 67%)" stop-opacity="1" offset="0%"></stop>
                <stop stop-color="hsl(316, 73%, 52%)" stop-opacity="1" offset="100%"></stop>
            </linearGradient>
            <linearGradient id="Gradient1">
                <stop class="stop1" offset="0%" stop-color="rgba(103, 217, 254, 1)" />
                <stop class="stop2" offset="41%" stop-color="rgba(205, 234, 125, 1)" />
                <stop class="stop3" offset="100%" stop-color="rgba(249, 136, 115, 1)" />
            </linearGradient>
        </defs>
        <g fill="url(#cccloud-grad)" id="cloud">
            <path class="cloud1" d="M 62.133891120258454 343.72384936573275 A  50 50 0 1 1 214.64435147995687 208.36820084568967 A  50 50 0 1 1 421.12971264349403 179.07949662330276 A  50 50 0 1 1 661.9246637735994 223.64017142898706 A  50 50 0 1 1 701.4644390414064 426.15064391466876 A  50 50 0 1 1 501.8828680800243 471.7573137604795 A  50 50 0 1 1 249.58158985172395 503.3472803912716 A  50 50 0 1 1 62.133891120258454 343.72384936573275 Z" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
        <g fill="url(#cccloud-grad)" id="cloud">
            <path class="cloud2" d="M 460.2510459829741 440.7949791227371 A  50 50 0 1 1 264.4351461564454 465.06276627288526 A  50 50 0 1 1 126.56903752607741 284.3096234143319 A  50 50 0 1 1 348.95397615676177 196.65271748902208 A  50 50 0 1 1 525.104625978556 191.6317995595501 A  50 50 0 1 1 628.242679568669 316.9456076227507 A  50 50 0 1 1 460.2510459829741 440.7949791227371 Z" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
        <g fill="url(#cccloud-grad)" id="cloud">
            <path class="cloud3" d="M 491.63179915431033 296.0251046512932 A  50 50 0 1 1 450 400 A  50 50 0 1 1 213.38912130010772 356.27615063426725 A  50 50 0 1 1 260.251045982974 241.63179915431033 A  50 50 0 1 1 491.63179915431033 296.0251046512932 Z" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
    </svg>
    <footer>
        <div class="footer-column footer-column-left">
            <p class="footer-section-title"><b> <?php the_field('contact_field_name', 'option'); ?></b></p>
            <p><i class="fa fa-envelope"></i> <?php the_field('contact_email', 'option'); ?></p>
            <p><i class="fa fa-phone"></i> <?php the_field('contact_phone', 'option'); ?></p>
        </div>
        <div class="footer-column footer-column-middle">
            <p class="footer-section-title"><b><?php the_field('address_field_name', 'option'); ?></b></p>
            <div>
                <div>
                    <p><?php the_field('address_first_line', 'option'); ?></p>
                    <p><?php the_field('address_second_line', 'option'); ?></p>
                </div>
            </div>
        </div>
        <div class="footer-column footer-column-menu">
            <p><b>Menu</b></p>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'container' => false,
                'items_wrap' => '<ul>%3$s</ul>',
                'depth' => 1,
            ));
            ?>
        </div>
        <div class="footer-copyright">
            <p>&copy; <?php echo date('Y'); ?> Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>
</div>
<svg class="svg-stars">
    <defs>
        <mask id="starMask" maskUnits="userSpaceOnUse">
        </mask>
    </defs>
</svg>

<?php wp_footer(); ?>
</body>

</html>