<?php
// Comment / <?php / before pasting in functions.php or Code Snippets

// This will add a custom message on the WooCommerce Thank you page (depending on the current WPML language)
add_filter( 'woocommerce_thankyou_order_received_text', 'misha_thank_you_subtitle', 20, 2 );

function misha_thank_you_subtitle( $thank_you_title, $order ){
if (ICL_LANGUAGE_CODE == "en") {
	return 'YOUR MESSAGE IN ENGLISH';
			} else {
	return 'YOUR MESSAGE IN OTHER LANGUAGE';
}
}
