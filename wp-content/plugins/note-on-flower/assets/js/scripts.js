/**
 * @author  	: Pham Tu Quy
 * @copyrights	: Pham Tu Quy
 * @purpose 	: Script for note-on-flower plugin
 */
 
 /*
 //$(document).ready(function(){
 (function($) {	
        //code to add validation on "Add to Cart" button
        //jQuery('.single_add_to_cart_button').click(function(){
        $('.add_to_cart_button').click(function(){
            //code to add validation, if any
            //If all values are proper, then send AJAX request
            alert('sending ajax request');
            var product_id = $(this).attr('data-product_id');
            var custom_note_element = 'custom_note_' + product_id;
            var custom_note = $('#' + custom_note_element).val();;
			
			alert(custom_note + product_id);
			
            //var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
            var ajaxurl = '/wp-admin/admin-ajax.php';
            $.ajax({
                url: ajaxurl, //AJAX file path - admin_url('admin-ajax.php')
                type: "POST",
                data: {
                    //action name
                    action:'wdm_add_user_custom_data_options',
                    custom_note : custom_note
                },
                async : false,
                success: function(data){
                    //Code, that need to be executed when data arrives after
                    // successful AJAX request execution
                    alert('ajax response recieved');
                }
            });
            
            $('#' + custom_note_element).val('');
            tb_remove();
        })
    });
*/

jQuery(document).ready(function(){
    //code to add validation on "Add to Cart" button
    //jQuery('.single_add_to_cart_button').click(function(){
    jQuery('.add_to_cart_button').click(function(){
        //code to add validation, if any
        //If all values are proper, then send AJAX request
        //alert('sending ajax request');
        var product_id = jQuery(this).attr('data-product_id');
        var custom_note_element = 'custom_note_' + product_id;
        var custom_note = jQuery('#' + custom_note_element).val();;
		
		//alert(custom_note + product_id);
		
        //var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        var ajaxurl = '/wp-admin/admin-ajax.php';
        jQuery.ajax({
            url: ajaxurl, //AJAX file path - admin_url('admin-ajax.php')
            type: "POST",
            data: {
                //action name
                action:'wdm_add_user_custom_data_options',
                custom_note : custom_note
            },
            async : false,
            success: function(data){
                //Code, that need to be executed when data arrives after
                // successful AJAX request execution
                alert('Sản phẩm của bạn đã vào giỏ hàng!');
            }
        });
        
        jQuery('#' + custom_note_element).val('');
        tb_remove();
    })
});