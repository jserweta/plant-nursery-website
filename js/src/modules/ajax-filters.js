(function ($) {
    //---------------------------------------------------------------
    //AJAX filtering for products page
    //---------------------------------------------------------------
    $(document).ready(function () {
      $(document).on('click', '.js-filter-item > a', function () {
  
        var category = $(this).data('category');
        $.ajax({
          url: '/wp-admin/admin-ajax.php',
          data: {
            action: 'ajaxFilterProducts',
            category: category
          },
          type: 'POST',
          success: function (result) {
            $('.posts-container').html(result);
  
            $('.posts-container ul').attr("data-page", 1);

            $('.posts-container #pagination').attr("data-category", category);
           
          },
          error: function (result) {
            console.warn(result);
          },
        });
  
  
        return false;
      });
    });
  })(jQuery);