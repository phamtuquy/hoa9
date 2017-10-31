<?php
/**
 * Propositions section of the homepage.
 *
 * @package azera-shop
 */
$default                 = current_user_can( 'edit_theme_options' ) ? azera_shop_propositions_get_default_content() : false;
//$default = '';
$azera_shop_propositions = get_theme_mod( 'azera_shop_propositions_content', $default );

$azera_shop_propositions_text_one = get_theme_mod( 'azera_shop_propositions_text_one', '' );
$azera_shop_propositions_title_one = get_theme_mod( 'azera_shop_propositions_title_one', '' );
$azera_shop_propositions_image_one = get_theme_mod( 'azera_shop_propositions_image_one', '' );

$azera_shop_propositions_text_two = get_theme_mod( 'azera_shop_propositions_text_two', '' );
$azera_shop_propositions_title_two = get_theme_mod( 'azera_shop_propositions_title_two', '' );
$azera_shop_propositions_image_two = get_theme_mod( 'azera_shop_propositions_image_two', '' );
$azera_shop_propositions_video_two = get_theme_mod( 'azera_shop_propositions_video_two', '' );

$azera_shop_propositions_text_three = get_theme_mod( 'azera_shop_propositions_text_three', '' );
$azera_shop_propositions_title_three = get_theme_mod( 'azera_shop_propositions_title_three', '' );
$azera_shop_propositions_image_three = get_theme_mod( 'azera_shop_propositions_image_three', '' );

$azera_shop_header_button_text = get_theme_mod( 'azera_shop_header_button_text', '' );
$azera_shop_header_button_link = get_theme_mod( 'azera_shop_header_button_link', '' );

if ( ! empty( $azera_shop_header_button_text ) ) {
	if ( empty( $azera_shop_header_button_link ) ) {
		$azera_shop_header_button_render = '<button id="inpage_scroll_btn" class="btn btn-primary standard-button inpage-scroll"><span class="screen-reader-text">' . esc_html__( 'Header button label:', 'azera-shop' ) . $azera_shop_header_button_text . '</span>' . $azera_shop_header_button_text . '</button>';
	} else {
		if ( strpos( $azera_shop_header_button_link, '#' ) === 0 ) {
			$azera_shop_header_button_render = '<button id="inpage_scroll_btn" class="btn btn-primary standard-button inpage-scroll" data-anchor="' . $azera_shop_header_button_link . '"><span class="screen-reader-text">' . esc_html__( 'Header button label:', 'azera-shop' ) . $azera_shop_header_button_text . '</span>' . $azera_shop_header_button_text . '</button>';
		} else {
			$azera_shop_header_button_render = '<button id="inpage_scroll_btn" class="btn btn-primary standard-button inpage-scroll" onClick="parent.location=\'' . esc_url( $azera_shop_header_button_link ) . '\'"><span class="screen-reader-text">' . esc_html__( 'Header button label:', 'azera-shop' ) . $azera_shop_header_button_text . '</span>' . $azera_shop_header_button_text . '</button>';
		}
	}
} elseif ( isset( $wp_customize ) ) {
	$azera_shop_header_button_render = '<div id="intro_section_text_3" class="button"><div id="inpage_scroll_btn"><a href="" class="btn btn-primary standard-button inpage-scroll azera_shop_only_customizer"></a></div></div>';
}

if ( ! azera_shop_general_repeater_is_empty( $azera_shop_propositions ) ) {
	$azera_shop_propositions_decoded = json_decode( $azera_shop_propositions ); 
	$switch = 0;
	foreach ( $azera_shop_propositions_decoded as $azera_shop_proposition ) { 
	    $image = ! empty( $azera_shop_proposition->image_url ) ? apply_filters( 'azera_shop_translate_single_string', $azera_shop_proposition->image_url, 'Propositions Section' ) : '';
		$title  = ! empty( $azera_shop_proposition->title ) ? apply_filters( 'azera_shop_translate_single_string', $azera_shop_proposition->title, 'Propositions Section' ) : '';
		$text  = ! empty( $azera_shop_proposition->text ) ? apply_filters( 'azera_shop_translate_single_string', $azera_shop_proposition->text, 'Propositions Section' ) : '';
        
        if ($switch % 2 == 0){
            $div_style_1 = 'brief-content-two';
            $div_style_2 = 'brief-content-one';
            $img_style = 'brief-image-right';
        }
        else {
            $div_style_1 = 'brief-content-one';
            $div_style_2 = 'brief-content-two';
            $img_style = 'brief-image-left';
        }
        
        if (false){
    ?>
        
<!-- section class="brief text-left brief-design-one brief-left" id="story" role="region" aria-label="About" -->
		<div class="section-overlay-layer">
	        <div class="container">
		        <div class="row">
				    <!-- BRIEF IMAGE -->
					<div class="col-md-6 <?php echo $div_style_1 ?>">
						<div class="<?php echo $img_style ?>">
							<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr__( 'Logo', 'azera-shop' ); ?>">
						</div>
					</div>
								
    				<!-- BRIEF HEADING -->
    				<div class="col-md-6 content-section <?php echo $div_style_2 ?>">
    				    <h2 class="text-left dark-text"><?php echo esc_html__($title) ?></h2><div class="colored-line-left">
    			    </div>
    				<div class="brief-content-text"><?php echo $text ?></div>
			    </div><!-- .brief-content-one-->
		    </div>
		</div>
		</div>
				<!--	</section> -->
				
<?php   
        } //end of if false
        $switch ++;
	}
}
?>
<a name="m"></a><p>&nbsp;</p>
<!-- PROPOSITION ONE -->
<?php
	if (! empty($azera_shop_propositions_title_one) && ! empty($azera_shop_propositions_text_one) && ! empty($azera_shop_propositions_image_one) ){ ?>
		<div class="section-overlay-layer">
	        <div class="container bottom-line">
		        <div class="row">
				    <!-- BRIEF IMAGE -->
					<div class="col-md-6 brief-content-two">
						<div class="brief-image-right">
							<img src="<?php echo esc_url( $azera_shop_propositions_image_one ); ?>" alt="<?php echo esc_attr__( 'Logo', 'azera-shop' ); ?>">
						</div>
					</div>
								
    				<!-- BRIEF HEADING -->
    				<div class="col-md-6 content-section brief-content-one">
    				    <h2 class="text-left dark-text"><?php echo esc_html__($azera_shop_propositions_title_one) ?></h2><div class="colored-line-left">
    			    </div>
    				<div class="brief-content-text"><?php echo $azera_shop_propositions_text_one ?></div>
    				
    				<?php echo $azera_shop_header_button_render ?>
    				
			    </div><!-- .brief-content-one-->
		    </div>
		</div>
<?php
	} ?>

<!-- PROPOSITION TWO -->
<?php
	if (! empty($azera_shop_propositions_title_two) && ! empty($azera_shop_propositions_text_two) && ! empty($azera_shop_propositions_image_two) ){ ?>
		<div class="section-overlay-layer">
	        <div class="container bottom-line">
		        <div class="row">
				    <!-- BRIEF IMAGE -->
					<div class="col-md-6 brief-content-one">
						<div class="brief-image-left">
							<?php 
								if (strpos($azera_shop_propositions_video_two, 'youtube') !== false || true)
								{
							?>
									<iframe src="<?php echo esc_url( $azera_shop_propositions_video_two ) ; ?>" width="560" height="315" allowfullscreen></iframe>
							<?php
								}
								else {
							?>
									<img src="<?php echo esc_url( $azera_shop_propositions_image_two ); ?>" alt="<?php echo esc_attr__( 'Logo', 'azera-shop' ); ?>">
							<?php
								}
							?>
						</div>
					</div>
								
    				<!-- BRIEF HEADING -->
    				<div class="col-md-6 content-section brief-content-two">
    				    <h2 class="text-left dark-text"><?php echo esc_html__($azera_shop_propositions_title_two) ?></h2><div class="colored-line-left">
    			    </div>
    				<div class="brief-content-text"><?php echo $azera_shop_propositions_text_two ?></div>
    				
    				<?php echo $azera_shop_header_button_render ?>
    				
			    </div><!-- .brief-content-two-->
		    </div>
		</div>
<?php
	} ?>
	
<!-- PROPOSITION THREE -->
<?php
	if (! empty($azera_shop_propositions_title_three) && ! empty($azera_shop_propositions_text_three) && ! empty($azera_shop_propositions_image_three) ){ ?>
		<div class="section-overlay-layer">
	        <div class="container bottom-line">
		        <div class="row">
				    <!-- BRIEF IMAGE -->
					<div class="col-md-6 brief-content-two">
						<div class="brief-image-right">
							<img src="<?php echo esc_url( $azera_shop_propositions_image_three ); ?>" alt="<?php echo esc_attr__( 'Logo', 'azera-shop' ); ?>">
						</div>
					</div>
								
    				<!-- BRIEF HEADING -->
    				<div class="col-md-6 content-section brief-content-one">
    				    <h2 class="text-left dark-text"><?php echo esc_html__($azera_shop_propositions_title_three) ?></h2><div class="colored-line-left">
    			    </div>
    				<div class="brief-content-text"><?php echo $azera_shop_propositions_text_three ?></div>
    				
    				<?php echo $azera_shop_header_button_render ?>
    				
			    </div><!-- .brief-content-three-->
		    </div>
		</div>
<?php
	} ?>