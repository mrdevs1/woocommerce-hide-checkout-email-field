
<?php
/**
 * Hide the WooCommerce checkout billing email field visually.
 *
 * Intended for the classic WooCommerce checkout.
 */

add_action( 'wp_head', 'ts_hide_email_checkout_css' );

function ts_hide_email_checkout_css() {
    if ( is_checkout() && ! is_order_received_page() ) {
        echo '<style>#billing_email_field { display: none !important; }</style>';
    }
}
