<?php
/**
 * Form note
 *
 * This template is the form for user to input note on flower.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

    
    sprintf( '<input alt="#TB_inline?height=170&amp;width=450&amp;inlineId=add_note_popup_%s" title="%s" class="thickbox button" type="button" value="%s" />',
                        $product_id,
                        esc_html__('Add note to ribbon', 'note-on-flower'),
                        esc_html__('Add note and to cart', 'note-on-flower')
                        );

?>
    <div id="add_note_popup_' . $product_id . '" style="display:none">
        <div class="woocommerce">
	        <div style="float:left;padding:10px;">
                <?php echo esc_html__('Your note here', 'note-on-flower'); ?>
	        </div>
	        <p><input type="text" style="width: 270px;" id="custom_note_' . $product_id . '" /></p>
                <?php echo $link; ?>
	        <p>Bạn có thể copy những kí tự dễ thương này vào tin nhắn: ★ ♫ ☺ ♠ ♣ ♥ ♦</p>
	    </div>
    </div>
    abc