# WooCommerce Hide Checkout Email Field

A lightweight PHP snippet to hide the billing email field on the WooCommerce checkout page using CSS.

## Overview

WooCommerce does not provide a standard checkout setting to simply hide the billing email field. This snippet adds that functionality by injecting CSS into the page header when the checkout page is displayed.

## PHP Snippet

```php
// Hide the email field using CSS.
add_action( 'wp_head', 'ts_hide_email_checkout_css' );

function ts_hide_email_checkout_css() {
    if ( is_checkout() ) {
        echo '<style>#billing_email_field { display: none !important; }</style>';
    }
}
```

## How It Works

- `wp_head` runs the function when WordPress generates the page header.
- `is_checkout()` checks whether the current page is the WooCommerce checkout page.
- `#billing_email_field` targets the billing email field wrapper.
- `display: none !important` hides the field visually.

The CSS is added only on the checkout page, rather than across the entire website.

## Installation

1. Back up your website before making changes.
2. Open your child theme's `functions.php` file or use a PHP snippets plugin.
3. Add the PHP snippet above.
4. Save the changes and clear any relevant page or CSS cache.
5. Open the WooCommerce checkout page and verify that the email field is hidden.

Avoid adding the snippet to both `functions.php` and a snippets plugin, as this can cause a function redeclaration error.

## Expected Result

Before adding the snippet, the billing email field is displayed according to the checkout configuration.

After adding the snippet, the field targeted by `#billing_email_field` is hidden visually on the checkout page.

## Important Notes

- **Visual hiding only:** CSS does not remove the field from WooCommerce's checkout processing.
- **Email validation:** WooCommerce or another plugin may still require an email address. Hiding the field does not disable validation.
- **Order processing:** Test checkout and order placement before using this snippet on a live store.
- **Checkout Blocks:** This selector targets the classic WooCommerce checkout markup. The Checkout Block may require a different solution.
- **Theme compatibility:** Confirm that your checkout template uses the `billing_email_field` element ID.
- **Maintenance:** Recheck the snippet after major WooCommerce or checkout-plugin updates.

## Troubleshooting

### The email field is still visible

- Inspect the field wrapper in your browser's developer tools.
- Confirm that its ID is `billing_email_field`.
- Clear your website cache and browser cache.
- Check whether the site uses the classic checkout or Checkout Block.

### Checkout returns an email validation error

The snippet only hides the field. Review your WooCommerce checkout configuration and any custom validation hooks to determine why an email address is still required.

### A PHP error appears

Check for duplicate function declarations and verify that the snippet was added as PHP code in the appropriate location.

## Compatibility

Designed for WordPress websites using WooCommerce's classic checkout and the standard billing email field markup.

Test compatibility with your active theme, checkout extensions, and WooCommerce version before deploying to production.

## Disclaimer

This snippet is provided for educational and customization purposes. Always test checkout functionality on a staging site or test order before applying changes to a live store.
