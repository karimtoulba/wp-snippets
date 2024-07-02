
<?php
// Comment / <?php / before pasting in functions.php or Code Snippets

// This custom snippet will trigger sending out an email notification to customer if order status has been changed to Cancelled.

add_action('woocommerce_order_status_changed', 'send_cancelled_email_notifications', 10, 4 );
function send_cancelled_email_notifications( $order_id, $old_status, $new_status, $order ){
    if ( $new_status == 'cancelled' || $new_status == 'failed' ){
        $wc_emails = WC()->mailer()->get_emails(); // Get all WC_emails objects instances
        $customer_email = $order->get_billing_email(); // Get the customer email
    }
 
    if ( $new_status == 'cancelled' ) {
        // change the recipient of the instance
        $wc_emails['WC_Email_Cancelled_Order']->recipient = $customer_email;
        // Sending the email from this instance
        $wc_emails['WC_Email_Cancelled_Order']->trigger( $order_id );
    } 
    elseif ( $new_status == 'failed' ) {
        // change the recipient of the instance
        $wc_emails['WC_Email_Failed_Order']->recipient = $customer_email;
        // Sending the email from this instance
        $wc_emails['WC_Email_Failed_Order']->trigger( $order_id );
    } 
}