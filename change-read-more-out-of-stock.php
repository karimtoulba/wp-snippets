
<?php
// Comment / <?php / before pasting in functions.php or Code Snippets

// This custom snippet will change "Read More" for out of stock products to read "Out of Stock"

add_filter( 'gettext', 'ds_change_readmore_text', 20, 3 );

function ds_change_readmore_text( $translated_text, $text, $domain ) {
if ( ! is_admin() && $domain === 'woocommerce' && $translated_text === 'Read more') {
$translated_text = 'Out of Stock';
}
return $translated_text;
}