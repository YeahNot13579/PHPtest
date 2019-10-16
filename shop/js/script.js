$(function() {
  $('#sel_category').on('change', function() {
    let category_id = $(this).val();
    $.ajax({
      type: 'POST',
      url: 'pages/list_ajax.php',
      data: { category_id: category_id },
      success: function(data) {
        let categories = JSON.parse(data);
        let teamplate = '';

        categories.forEach(item => {
          let html = ` 
            <div class="col-md-3">
                <div class="image_block">
                    <div class="panel panel-success">
                        <div class="panel-heading">${item.item_name}</div>
                        <div class="panel-body" style="height: 200px">
                            <img src="${item.image_path}" alt="picture" class="img-responsive img-rounded" style="height:100%; margin:0 auto;">
                        </div>
                        <div class="panel-footer clearfix">
                            <div class="pull-left">${item.price_sale}$</div>
                            <div class="pull-right">
                                <button data-cart="${item.id}" class="btn btn-warning btn_to_cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
          teamplate += html;
        });
        $('.catalog').html(teamplate);
        $('.btn_to_cart').on('click', function() {
          alert('loh');
        });
      },
      error: function(data) {
        alert('something is bad' + data.status);
      }
    });
  });
  $('.btn_to_cart').on('click', function() {
    let date = new Date(new Date().getTime() + 60 * 1000 * 30);
    document.cookie =
      $(this).data('cart') + '=ok; path=/ ;expires=' + date.toUTCString();
  });

  function removeCookies() {
    let cookies_array = document.cookie.split(';');
    cookies_array.forEach(function(cookie_item) {
      if (cookie_item.indexOf('cart') === 1) {
        let cook = cookie_item.split('=');
        let date = new Date(new Date().getTime() - 60000);
        document.cookie = cook[0] + '=ok;path=/;expires=' + date.toUTCString();
      }
    });
  }
  function removeCookie(name) {
    let date = new Date(new Date().getTime() - 60000);
    document.cookie = name + '=ok;path=/;expires=' + date.toUTCString();
  }

  $('.glyphicon').on('click', function() {
    removeCookie($(this).data('target'));
    document.location.reload();
  });

  $('.buy_btn').on('click', function() {
    $.ajax({
      type: 'POST',
      url: 'pages/list_ajax.php',
      data: { category_id: category_id },
    removeCookies();
  });
});
