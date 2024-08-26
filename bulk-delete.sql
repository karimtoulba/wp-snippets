/* ORDERS */
/* Bulk Delete WooCommerce Orders */
DELETE FROM wp_woocommerce_order_itemmeta;
DELETE FROM wp_woocommerce_order_items;
DELETE FROM wp_comments WHERE comment_type = 'order_note';
DELETE FROM wp_postmeta WHERE post_id IN ( SELECT ID FROM wp_posts WHERE post_type = 'shop_order' );
DELETE FROM wp_posts WHERE post_type = 'shop_order';

/* Bulk Delete WooCommerce Order Notes */
DELETE FROM wp_commentmeta WHERE comment_id IN ( SELECT ID FROM wp_comments WHERE comment_type = 'order_note' );
DELETE FROM wp_comments WHERE comment_type = 'order_note';

/* PRODUCTS */
/* Bulk Delete Products */
DELETE FROM wp_postmeta WHERE post_id IN ( SELECT ID FROM wp_posts WHERE post_type IN ( 'product', 'product_variation' ));
DELETE FROM wp_posts WHERE post_type IN ( 'product', 'product_variation' );

/* Bulk Delete Trashed Products (Permenantly Delete) */
DELETE FROM wp_postmeta WHERE post_id IN ( SELECT ID FROM wp_posts WHERE post_type = 'product' AND post_status = 'trash' );
DELETE FROM wp_posts WHERE post_type = 'product' AND post_status = 'trash';

/* COUPONS */
/* Bulk Delete WooCommerce Coupons */
DELETE FROM wp_postmeta WHERE post_id IN ( SELECT ID FROM wp_posts WHERE post_type = 'shop_coupon' );
DELETE FROM wp_posts WHERE post_type = 'shop_coupon';
