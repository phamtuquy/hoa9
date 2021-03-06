<?php
/**
 * Header section
 *
 * @package Azera Shop
 */

$azera_shop_header_logo             = get_theme_mod( 'azera_shop_header_logo' );
$azera_website_name                 = get_bloginfo( 'name', 'display' );
$azera_website_description          = get_bloginfo( 'description' );
$azera_shop_header_title            = get_theme_mod( 'azera_shop_header_title', $azera_website_name );
$azera_shop_header_subtitle         = get_theme_mod( 'azera_shop_header_subtitle', $azera_website_description );
$azera_shop_header_button_text      = get_theme_mod( 'azera_shop_header_button_text', esc_html__( 'GET STARTED', 'azera-shop' ) );
$azera_shop_header_button_link      = get_theme_mod( 'azera_shop_header_button_link', '#' );
$azera_shop_header_button_more_text = get_theme_mod( 'azera_shop_header_button_more_text', esc_html__( 'FIND OUT MORE', 'azera-shop' ) );
$azera_shop_header_button_more_link = get_theme_mod( 'azera_shop_header_button_more_link', '#' );
$azera_shop_enable_move             = get_theme_mod( 'azera_shop_enable_move' );
$azera_shop_first_layer             = get_theme_mod( 'azera_shop_first_layer', azera_shop_get_file( '/images/background1.png' ) );
$azera_shop_second_layer            = get_theme_mod( 'azera_shop_second_layer', azera_shop_get_file( '/images/background2.png' ) );
$azera_shop_header_layout           = get_theme_mod( 'azera_shop_header_layout', 'layout2' );

if ( ! empty( $azera_shop_header_title ) || ! empty( $azera_shop_header_subtitle ) || ! empty( $azera_shop_header_button_text ) ) {
	?>

	<div class="header-section-inner-wrap">

	<?php
	if ( ! empty( $azera_shop_enable_move ) && $azera_shop_enable_move ) {

		echo '<ul id="azera_shop_move">';


		if ( empty( $azera_shop_first_layer ) && empty( $azera_shop_second_layer ) ) {

			$azera_shop_header_image2 = get_header_image();
			echo '<li class="layer layer1" data-depth="0.10" style="background-image: url(' . $azera_shop_header_image2 . ');"></li>';

		} else {

			if ( ! empty( $azera_shop_first_layer ) ) {
				echo '<li class="layer layer1" data-depth="0.10" style="background-image: url(' . $azera_shop_first_layer . ');"></li>';
			}
			if ( ! empty( $azera_shop_second_layer ) ) {
				echo '<li class="layer layer2" data-depth="0.20" style="background-image: url(' . $azera_shop_second_layer . ');"></li>';
			}
		}

		echo '</ul>';

	}
	?>

	<div class="overlay-layer-wrap1"> <!-- remove style #hoa9 -->
		<div class="container overlay-layer" id="parallax_header">
			<?php
			if ( ! empty( $azera_shop_header_logo ) ) {
				echo '<div class="only-logo">';
				echo '<div id="only-logo-inner" class="navbar">';
				echo '<div id="azera_only_logo" class="navbar-header"><img src="' . esc_url( $azera_shop_header_logo ) . '" alt="' . get_bloginfo( 'title' ) . '"></div>';
				echo '</div>';
				echo '</div>';
			} elseif ( is_customize_preview() ) {
				echo '<div class="only-logo">';
				echo '<div id="only-logo-inner" class="navbar">';
				echo '<div id="azera_only_logo" class="navbar-header"><img src="" alt=""></div>';
				echo '</div>';
				echo '</div>';
			} ?>
			<div class="row">
				<?php
				if ( ! empty( $azera_shop_header_layout ) && ( $azera_shop_header_layout == 'layout2' ) ) {
					echo '<div class="col-md-7-custom text-left second-header-layout">';
				} else {
					echo '<div class="col-md-12 intro-section-text-wrap">';
				}
				?>

				<!-- HEADING AND BUTTONS -->
				<?php
				if ( ! empty( $azera_shop_header_title ) || ! empty( $azera_shop_header_subtitle ) || ! empty( $azera_shop_header_button_text ) ) { ?>
					<div id="intro-section" class="intro-section">

						<!-- WELCOM MESSAGE -->

						<?php

						if ( ! empty( $azera_shop_header_title ) ) {
							//echo '<h2 id="intro_section_text_1" class="intro white-text">' . esc_attr( $azera_shop_header_title ) . '</h2>';
							echo '<h2 id="intro_section_text_1" class="intro orange-text">' .  $azera_shop_header_title  . '</h2>'; //##hoa9
						} elseif ( isset( $wp_customize ) ) {
							echo '<h2 id="intro_section_text_1" class="intro orange-text azera_shop_only_customizer"></h2>'; //##hoa9
						}

						if ( ! empty( $azera_shop_header_subtitle ) ) {
							echo '<h3 id="intro_section_text_2" class="orange-text">' .  $azera_shop_header_subtitle  . '</h3>'; //##hoa9
						} elseif ( isset( $wp_customize ) ) {
							echo '<h3 id="intro_section_text_2" class="orange-text azera_shop_only_customizer"></h3>'; //##hoa9
						}

						if ( ! empty( $azera_shop_header_button_text ) ) {
							if ( empty( $azera_shop_header_button_link ) ) {
								echo '<button id="inpage_scroll_btn" class="btn btn-primary standard-button inpage-scroll"><span class="screen-reader-text">' . esc_html__( 'Header button label:', 'azera-shop' ) . $azera_shop_header_button_text . '</span>' . $azera_shop_header_button_text . '</button>&nbsp;&nbsp;';
							} else {
								if ( strpos( $azera_shop_header_button_link, '#' ) === 0 ) {
									echo '<button id="inpage_scroll_btn" class="btn btn-primary standard-button inpage-scroll" data-anchor="' . $azera_shop_header_button_link . '"><span class="screen-reader-text">' . esc_html__( 'Header button label:', 'azera-shop' ) . $azera_shop_header_button_text . '</span>' . $azera_shop_header_button_text . '</button>&nbsp;&nbsp;';
								} else {
									echo '<button id="inpage_scroll_btn" class="btn btn-primary standard-button inpage-scroll" onClick="parent.location=\'' . esc_url( $azera_shop_header_button_link ) . '\'"><span class="screen-reader-text">' . esc_html__( 'Header button label:', 'azera-shop' ) . $azera_shop_header_button_text . '</span>' . $azera_shop_header_button_text . '</button>&nbsp;&nbsp;';
								}
							}
						} elseif ( isset( $wp_customize ) ) {
							echo '<div id="intro_section_text_3" class="button"><div id="inpage_scroll_btn"><a href="" class="btn btn-primary standard-button inpage-scroll azera_shop_only_customizer"></a></div></div>';
						}
						
						
						if ( ! empty( $azera_shop_header_button_more_text ) ) {
							if ( empty( $azera_shop_header_button_more_link ) ) {
								echo '<button id="inpage_scroll_btn" class="btn btn-primary secondary-button inpage-scroll custom_margin_left"><span class="screen-reader-text">' . esc_html__( 'Header button label:', 'azera-shop' ) . $azera_shop_header_button_more_text . '</span>' . $azera_shop_header_button_more_text . '</button>';
							} else {
								if ( strpos( $azera_shop_header_button_more_link, '#' ) === 0 ) {
									//echo '<button id="inpage_scroll_btn" class="btn btn-primary secondary-button inpage-scroll custom_margin_left" data-anchor="' . $azera_shop_header_button_more_link . '"><span class="screen-reader-text">' . esc_html__( 'Header button label:', 'azera-shop' ) . $azera_shop_header_button_more_text . '</span>' . $azera_shop_header_button_more_text . '</button>';
									echo '<button id="inpage_scroll_btn" class="btn btn-primary secondary-button inpage-scroll custom_margin_left" onClick="window.location=\'' . esc_url( $azera_shop_header_button_more_link ) . '\';"><span class="screen-reader-text">' . esc_html__( 'Header button label:', 'azera-shop' ) . $azera_shop_header_button_more_text . '</span>' . $azera_shop_header_button_more_text . '</button>';
								} else {
									echo '<button id="inpage_scroll_btn" class="btn btn-primary secondary-button inpage-scroll custom_margin_left" onClick="parent.location=\'' . esc_url( $azera_shop_header_button_more_link ) . '\'"><span class="screen-reader-text">' . esc_html__( 'Header button label:', 'azera-shop' ) . $azera_shop_header_button_more_text . '</span>' . $azera_shop_header_button_more_text . '</button>';
								}
							}
						} elseif ( isset( $wp_customize ) ) {
							echo '<div id="intro_section_text_3" class="button"><div id="inpage_scroll_btn"><a href="" class="btn btn-primary standard-button inpage-scroll azera_shop_only_customizer"></a></div></div>';
						}
						?>
						<!-- /END BUTTON -->

					</div>
					<!-- /END HEADNING AND BUTTONS -->
					<?php
				}// End if().
				?>
			</div><!-- .col-md-12 or .col-md-7 -->
		</div>
	</div>
	</div>
	
	</div><!-- .header-section-inner-wrap -->

	<?php
}// End if().
?>
