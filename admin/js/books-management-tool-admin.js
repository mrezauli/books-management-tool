(function ($) {
  "use strict";

  /**
   * All of the code for your admin-facing JavaScript source
   * should reside in this file.
   *
   * Note: It has been assumed you will write jQuery code here, so the
   * $ function reference has been prepared for usage within the scope
   * of this function.
   *
   * This enables you to define handlers, for when the DOM is ready:
   *
   * $(function() {
   *
   * });
   *
   * When the window is loaded:
   *
   * $( window ).load(function() {
   *
   * });
   *
   * ...and/or other possibilities.
   *
   * Ideally, it is not considered best practise to attach more than a
   * single DOM-ready or window-load handler for a particular page.
   * Although scripts in the WordPress core, Plugins and Themes may be
   * practising this, we should strive to set a better example in our own work.
   */

  $(document).ready(function () {
    $("#browseBooks").DataTable();
    $("#browseBookshelvs").DataTable();

    // $("#ajaxSubmit").on("click", function (e) {
    //   e.preventDefault();

    //   let data = "action=first_ajax_action&param=first_ajax_param";

    //   $.post(bmt_book.adminUrlAdminAjax, data, function (response) {
    //     console.log(response);
    //   });
    // });

    let addBookshelf = $("#addBookshelf");
    addBookshelf.submit(function (e) {
      e.preventDefault();
      let formData = addBookshelf.serialize();
      formData += "&action=action_add_bookshelf&param=param_add_bookshelf";
      console.log(formData);

      $.post(bmt_book.adminUrlAdminAjax, formData, function (response) {
        console.log(response);
      });
    });
  });
})(jQuery);
