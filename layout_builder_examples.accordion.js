(function ($, Drupal) {
  Drupal.behaviors.LayoutBuilderExamplesAccordion = {
    attach: function (context) {
      $(".js-layout-builder-examples-accordion", context).click(function (event) {
        event.preventDefault();
        var $element = $("#" + $(this).attr("data-accordion-id"), context);
        $element.toggle(300);
      });
    }
  };
})(jQuery, Drupal);
