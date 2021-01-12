<?php
// Gallery template
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php

$img1 = get_field( 'slider_image_1' )['url'];
$img2 = get_field( 'slider_image_2' )['url'];
$img3 = get_field( 'slider_image_3' )['url'];

?>
<div id="page" class="site">
    <h1 class="corus__gallery-title"><?php echo get_the_title(); ?></h1>
	<?php if ( $img1 || $img2 || $img3 ) { ?>
        <div class="corus__gallery slider fade">

			<?php if ( $img1 ) { ?>
                <div>
                    <div class="image">
                        <img class="" src="<?php echo $img1; ?>">
                    </div>
                </div>
			<?php } ?>
			<?php if ( $img2 ) { ?>
                <div>
                    <div class="image">
                        <img class="" src="<?php echo $img2; ?>">
                    </div>
                </div>
			<?php } ?>
			<?php if ( $img3 ) { ?>
                <div>
                    <div class="image">
                        <img class="" src="<?php echo $img3; ?>">
                    </div>
                </div>
			<?php } ?>
        </div>
	<?php } else { ?>
        <div class="corus_gallery-no-images">No images in this gallery</div>
	<?php } ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
