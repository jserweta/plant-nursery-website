(function ($) {
  function find_page_number(element) {
    element.find('span').remove();
    return parseInt(element.html());
  }

  // $(document).ready(function () {
  //     $('#pagination a').addClass('js-trigger');
  //     $('#pagination a').attr('href', '#products-container');
  // });
  // function scrollToAnchor(aid) {
  //   // var aTag = $("ul[name='"+ aid +"']");
  //   $('html,body').animate({ scrollTop: aid.offset().top }, 'slow');
  // }

  $(document).on('click', '#pagination a', function (event) {
    event.preventDefault();
    page = find_page_number($(this).clone());

    const category = $('#pagination').data('category');

    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      data: {
        action: 'paginationAjax',
        category,
        next_page: page,
      },
      type: 'POST',
      success(html) {
        $('.posts-container').find('ul').remove();
        $('.posts-container').find('#pagination').remove();

        $('.posts-container').append(html);
        $('html,body').animate({ scrollTop: $('#products-container-anchor').offset().top - 90 }, 'slow');

        $('.posts-container ul').attr('data-page', page);
        $('#pagination').attr('data-category', category);
      },
      error(html) {
        console.warn(html);
      },
    });
  });
}(jQuery));
