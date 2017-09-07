<?php
   /*
   Plugin Name: Note on Flower
   Plugin URI: n/a
   Description: a plugin to create a custom text that consumer uses to attach to his flower bouque
   Version: 1.0
   Author: Pham Tu Quy
   #hoa9
   */

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}


//==Add custom Note to cart item data================
function nof_inject_note_to_cart_item( $cart_item_data, $product_id, $variation_id ) {
    session_start();
    if (isset($_SESSION['wdm_user_custom_data']))
        $cart_item_data['note_on_flower'] = $_SESSION['wdm_user_custom_data'];
    else
        $cart_item_data['note_on_flower'] = 'n/a';

    $cart_item_data['note_on_flower'] = $_SESSION['wdm_user_custom_data'];
    
    unset($_SESSION['wdm_user_custom_data']);
    
    return $cart_item_data;
}

add_filter( 'woocommerce_add_cart_item_data', 'nof_inject_note_to_cart_item', 1, 3 );


//==Assign custom Note to cart item data when session
function nof_get_cart_item_data_from_session( $cart_item_data, $cart_item_session_data, $cart_item_key ) {
    if ( isset( $cart_item_session_data['note_on_flower'] ) ) {
        $cart_item_data['note_on_flower'] = $cart_item_session_data['note_on_flower'];
    }

    return $cart_item_data;
}

add_filter( 'woocommerce_get_cart_item_from_session', 'nof_get_cart_item_data_from_session', 10, 3 );


//==Add custom Note to order item data===============
function nof_inject_note_to_order_item_meta( $itemId, $values, $key ) {
    if ( isset( $values['note_on_flower'] ) ) {
        wc_add_order_item_meta( $itemId, '_note_on_flower', $values['note_on_flower'] );
    }
};

add_action( 'woocommerce_add_order_item_meta', 'nof_inject_note_to_order_item_meta', 10, 3 );


//==Override Add To Cart Link========================
function custom_add_to_cart_link($link, $product)
{
    $product_id = $product->id;
    
    
    $link_render = sprintf( '<input alt="#TB_inline?height=250&amp;width=450&amp;inlineId=add_note_popup_%s" title="%s" class="thickbox button" type="button" value="%s" />',
                        $product_id,
                        esc_html__('Add note to ribbon', 'note-on-flower'),
                        esc_html__('Add note and to cart', 'note-on-flower')
                        );
    /*
    $link_render = '<input alt="#TB_inline?height=300&amp;width=400&amp;inlineId=add_note_popup_' . 
                        $product_id .'" title="' . 
                        esc_html__('Add note to ribbon', 'note-on-flower') . '" class="thickbox button" type="button" value="' .
                        esc_html__('Add note and to cart', 'note-on-flower') . '" />';
    */
    //$link_render = $link_render . '';
    $link_render = $link_render . '<div id="add_note_popup_' . $product_id . '" style="display:none">';
    $link_render = $link_render . '<div class="woocommerce">';
	$link_render = $link_render . '<div style="float:left;padding:10px;">';
	$link_render = $link_render . esc_html__('Your note here', 'note-on-flower');
	$link_render = $link_render . '</div>';
	$link_render = $link_render . '<p><input type="text" style="width: 270px;" id="custom_note_' . $product_id . '" /></p>';
	$link_render = $link_render . $link;
	$link_render = $link_render . '<p>Bạn có thể copy những kí tự dễ thương này vào tin nhắn: ★ ♫ ☺ ♠ ♣ ♥ ♦</p>';
	$link_render = $link_render . '<p>* Vì chiều dài ruy băng có hạn, để in tốt, tin nhắn nên dưới 40 kí tự.';
	$link_render = $link_render . '</div>';
    $link_render = $link_render . '</div>';
    
    //wc_get_template( 'form-note.php', array( 'product_id' => $product_id, 'link' => $link ) );
    
    return $link_render;
}

add_filter('woocommerce_loop_add_to_cart_link', 'custom_add_to_cart_link', 10, 2);


//==Init Thickbox====================================
function add_thichbox_init_theme_method() {
   add_thickbox();
}

add_action('init', 'add_thichbox_init_theme_method');
 

//==Add custom data callback==========================
add_action('wp_ajax_wdm_add_user_custom_data_options', 'wdm_add_user_custom_data_options_callback');
add_action('wp_ajax_nopriv_wdm_add_user_custom_data_options', 'wdm_add_user_custom_data_options_callback');

function wdm_add_user_custom_data_options_callback()
{
      //Custom data - Sent Via AJAX post method
      $product_id = $_POST['id']; //This is product ID
      $user_custom_data_values =  $_POST['custom_note']; //This is User custom value sent via AJAX
      session_start();
      $_SESSION['wdm_user_custom_data'] = $user_custom_data_values;
      die();
}


//==Show Note content to cart item name================
function add_note_to_cart_item_name($product_name, $cart_item, $cart_item_key)
{
	$cart_item_note = $cart_item[note_on_flower];
	
	if (! empty($cart_item_note))
		return $product_name . ' (' . esc_html__('With:', 'note-on-flower') . ' ' . $cart_item_note . ')';
	else
		return $product_name;
}

add_filter( 'woocommerce_cart_item_name', 'add_note_to_cart_item_name', 10, 3 );


//==Show Note content to cart order name===============
function add_note_to_order_item_name($item_name, $item, $is_visible)
{
    $item_id = $item->get_id();
    $custom_note = wc_get_order_item_meta( $item_id, '_note_on_flower', true );
    return $item_name . ' (' . esc_html__('With:', 'note-on-flower') . ' ' . $custom_note . ')';
}

add_filter( 'woocommerce_order_item_name', 'add_note_to_order_item_name', 10, 3);


//==Register script for plugin=========================
function wptuts_scripts_with_jquery()
{
    // Register the script like this for a plugin:
    wp_register_script( 'note-on-flower_script', plugins_url( '/assets/js/scripts.js', __FILE__ ), array( 'jquery' ) );

    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'note-on-flower_script' );
}

add_action( 'wp_enqueue_scripts', 'wptuts_scripts_with_jquery' );

//https://codepad.co/snippet/iYzo5bGg