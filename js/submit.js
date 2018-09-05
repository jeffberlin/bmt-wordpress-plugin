jQuery.noConflict();

jQuery(document).ready(function($){
  console.log("JS file working");

  $(function() {
    // Reloads the page to update # of items in cart (for custom images)
    $(".bmt_add_cart_button").click(function() {
      location.reload();
    })

    // Reloads the page to update # of items in cart (for default button)
    $(".bmt_add_cart_submit").click(function() {
      location.reload();
    })
  });

});
