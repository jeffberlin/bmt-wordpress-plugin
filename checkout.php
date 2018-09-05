<?php

defined( 'ABSPATH' ) or die( 'Checkout BMTMicro.com for more info!' );

function bmt_checkout_handler($atts) {
  $checkout = get_option('checkoutButtonName');
  if(!$checkout || ($checkout == '')) {
    $checkout = __("Checkout", "wordpress-simple-paypal-shopping-cart");
  }

  $vendor_cid = get_option('vendorCid');

  $replacement = '<div class="bmt_checkout_button_wrapper">';

  $replacement .= '<form method="POST" class="bmt-cart-button-form" id="bmt_checkout" style="display:inline" action="' . BMT_URL . '">';

  $replacement .= '<input type="hidden" name="CID" value="' . $vendor_cid . '">';

  // This is for the 'Checkout' button option
  if (isset($atts['button_image']) && !empty($atts['button_image'])) {
      //Use the custom button image specified in the shortcode
      $replacement .= '<input type="image" src="' . $atts['button_image'] . '" class="bmt_checkout_button" alt="' . (__("Checkout", "wordpress-simple-paypal-shopping-cart")) . '"/>';
  } else if (isset($atts['button_text']) && !empty($atts['button_text'])) {
      //Use the custom button text specified in the shortcode
      $replacement .= '<input type="submit" class="bmt_checkout_submit" name="bmt_checkout_submit" value="' . apply_filters('bmt_checkout_submit_button_value', $atts['button_text']) . '" />';
  } else {
      //Use the button text or image value from the settings
      if (preg_match("/http:/", $checkout) || preg_match("/https:/", $checkout)) {
          //Use the image as the add to cart button
          $replacement .= '<input type="image" src="' . $checkout . '" class="bmt_checkout_button" alt="' . (__("Checkout", "wordpress-simple-paypal-shopping-cart")) . '"/>';
      } else {
          //Use plain text add to cart button
          $replacement .= '<input type="submit" class="bmt_checkout_submit" id="bmt_checkout_submit" name="bmt_checkout_submit" value="' . apply_filters('bmt_checkout_submit_button_value', $checkout) . '" />';
      }
  }

  $replacement .= '</form>';
  $replacement .= '</div>';
  return $replacement;
}
