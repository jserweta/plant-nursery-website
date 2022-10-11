(function ($) {
  //---------------------------------------------------------------
  // AJAX filtering for products page
  //---------------------------------------------------------------
  $(document).ready(() => {
    $(document).on('click', '.js-filter-item > a', function () {
      const category = $(this).data('category');

      $('.js-filter-item > a').removeClass('active');
      $(this).addClass('active');

      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        data: {
          action: 'ajaxFilterProducts',
          category,
        },
        type: 'POST',
        success(result) {
          $('.posts-container').html(result);

          $('.posts-container ul').attr('data-page', 1);

          $('.posts-container #pagination').attr('data-category', category);
        },
        error(result) {
          console.warn(result);
        },
      });

      return false;
    });
  });
}(jQuery));
