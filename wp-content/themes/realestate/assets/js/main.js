$(window).load(function () { // makes sure the whole site is loaded
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(350).css({'overflow': 'visible'});
})


$(document).ready(function () {

    
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-yellow',
        radioClass: 'iradio_square-yellow',
        increaseArea: '20%' // optional
    });


    $('.layout-grid').on('click', function () {
        $('.layout-grid').addClass('active');
        $('.layout-list').removeClass('active');

        $('#list-type').removeClass('proerty-th-list');
        $('#list-type').addClass('proerty-th');

    });

    $('.layout-list').on('click', function () {
        $('.layout-grid').removeClass('active');
        $('.layout-list').addClass('active');

        $('#list-type').addClass('proerty-th-list');
        $('#list-type').removeClass('proerty-th');

    });



});



$(document).ready(function () {
   
    $("#bg-slider").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 100,
        autoPlay: 5000,
        paginationSpeed: 100,
        singleItem: true,
        mouseDrag: false,
        transitionStyle: "fade"
                // "singleItem:true" is a shortcut for:
                // items : 1, 
                // itemsDesktop : false,
                // itemsDesktopSmall : false,
                // itemsTablet: false,
                // itemsMobile : false 
    });
    $("#prop-smlr-slide_0").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 100,
        pagination: true,
        paginationSpeed: 100,
        items: 3

    });
    $("#testimonial-slider").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 100,
        pagination: true,
        paginationSpeed: 100,
        items: 3
    });

    $('#price-range').slider();
    $('#property-geo').slider();
    $('#min-baths').slider();
    $('#min-bed').slider();

    var RGBChange = function () {
        $('#RGB').css('background', '#FDC600')
    };

    // Advanced search toggle
    var $SearchToggle = $('.search-form .search-toggle');
    $SearchToggle.hide();

    $('.search-form .toggle-btn').on('click', function (e) {
        e.preventDefault();
        $SearchToggle.slideToggle(300);
    });

    setTimeout(function () {
        $('#counter').text('0');
        $('#counter1').text('0');
        $('#counter2').text('0');
        $('#counter3').text('0');
        setInterval(function () {
            var curval = parseInt($('#counter').text());
            var curval1 = parseInt($('#counter1').text().replace(' ', ''));
            var curval2 = parseInt($('#counter2').text());
            var curval3 = parseInt($('#counter3').text());
            if (curval <= 1007) {
                $('#counter').text(curval + 1);
            }
            if (curval1 <= 1280) {
                $('#counter1').text(sdf_FTS((curval1 + 20), 0, ' '));
            }
            if (curval2 <= 145) {
                $('#counter2').text(curval2 + 1);
            }
            if (curval3 <= 1022) {
                $('#counter3').text(curval3 + 1);
            }
        }, 2);
    }, 500);

    function sdf_FTS(_number, _decimal, _separator) {
        var decimal = (typeof (_decimal) != 'undefined') ? _decimal : 2;
        var separator = (typeof (_separator) != 'undefined') ? _separator : '';
        var r = parseFloat(_number)
        var exp10 = Math.pow(10, decimal);
        r = Math.round(r * exp10) / exp10;
        rr = Number(r).toFixed(decimal).toString().split('.');
        b = rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g, "\$1" + separator);
        r = (rr[1] ? b + '.' + rr[1] : b);

        return r;
    }

})

// Initializing WOW.JS

new WOW().init();



$(document).ready(function () {

  var page = 1;
  var per_page = $('#items_per_page').val();
  var loading = false;
  var endOfData = false;
  var current_page = 1; // текущая страница
  var total_pages=2;

  // Функция для выполнения Ajax-запроса и обновления товаров
  function loadProducts(orderby, order) {
    if (loading) {
      return;
    }

    loading = true;
    $('#loader').show();
    data= {
        action: 'sort_properties',
        page: current_page, // добавляем текущую страницу в параметры запроса
        posts_per_page: per_page,
       /* orderby: 'date', // сортировка по дате
        order: 'DESC'*/ // по убыванию
      }
    // выполнить сортировку
    if (orderby && order) {
        data['orderby'] = orderby;
        data['order'] = order;
    }

    $.ajax({
      url: my_script_vars.ajaxurl, // Переменная ajaxurl определена в WordPress
      type: 'POST',
      data: data,
      beforeSend: function() {
        // Перед отправкой запроса плавно скрываем результаты
        $('#list-type').fadeTo(300, 0.5);
       
      },
      success: function(response) {
        if(response) {
          $('#list-type').html(response);
          // После обновления данных плавно их отображаем
        $('#list-type').fadeTo(300, 1);;
          loading = false;
          $('#loader').hide();
        } else {
          endOfData = true;
          loading = false;
          $('#loader').hide();
        }
      }
    });
  }

  // Обработчик события scroll для загрузки новых товаров
  $(window).scroll(function() {
    var scrollTop = $(this).scrollTop();
    var windowHeight = $(this).height();
    var documentHeight = $(document).height();

    if (scrollTop + windowHeight >= documentHeight - 100 && !loading) {
        page++;
      //loadProducts();
    }
  });

  // Обработчик события change для изменения количества товаров на странице
  $('#items_per_page').on('change', function() {
    //page = 1;
    per_page = $(this).val();
    $('#list-type').html('');
    loadProducts();
  });

  // Обработчик клика на кнопке "Property Date" and "Property Price
    $('.sort-by-list a').click( function() {
        $(this).parent().addClass('active').siblings().removeClass('active'); // выделить кнопку сортировки
        var orderby = $(this).data('orderby'); // получить значение data-атрибута для сортировки
        var order = $(this).data('order'); // получить значение data-атрибута для порядка сортировки
         page = 1;
         $('#list-type').html('');
        loadProducts(order, orderby); // вызвать функцию загрузки контента с новыми параметрами сортировки
    });
    // обработчик клика на ссылку страницы
    $(document).on('click','a.page_link', function() {
       current_page = $(this).data('page');
       //$(this).parent().addClass('active').siblings().removeClass('active'); // выделить кнопку 
       loadProducts(); // вызвать функцию загрузки контента с новыми параметрами сортировки
    });
      // обработчик клика на ссылку "Prev"
       $(document).on('click','a.prev_page', function() {
        //if (current_page > 1) {
          current_page = $(this).data('page');
           //current_page--;
         loadProducts(); // вызвать функцию загрузки контента с новыми параметрами сортировки
      //}
  });
      
      // обработчик клика на ссылку "Next"
     $(document).on('click','a.next_page', function() {
    //if (current_page < total_pages) {
       current_page = $(this).data('page');
        //current_page++;
        loadProducts(); // вызвать функцию загрузки контента с новыми параметрами сортировки
    //} 
    });      

  loadProducts();

})


//function for plugin Load More Ajax
/*
jQuery(function($) {

    function ajax_load_more(order_by, order) {
    var button = $('.alm-load-more-button'); // выбрать кнопку "Загрузить больше"
    var container = button.prev('.alm-listing'); // выбрать контейнер для загруженного контента
    var template = container.data('alm-template'); // получить значение data-атрибута для шаблона
    var query_args = container.data('query-args'); // получить значение data-атрибута для аргументов запроса
    var max_pages = container.data('max-pages'); // получить значение data-атрибута для максимального количества страниц
    var current_page = container.data('current-page'); // получить значение data-атрибута для текущей страницы
   

    // Получить значения сортировки
    var orderby = button.attr('data-orderby');
    var order = button.attr('data-order');

    // выполнить сортировку
    if (orderby && order) {
        ajax_data['orderby'] = orderby;
        ajax_data['order'] = order;
    }

    // добавить параметры для сортировки в URL-адрес запроса
    var url = ajax_load_more_params.ajaxurl + '?action=ajax_load_more&page=' + current_page + '&query_args=' + query_args + '&order_by=' + order_by + '&order=' + order;

    button.addClass('loading'); // добавить класс "loading" для кнопки "Загрузить больше"

    $.ajax({
        url: url,
        type: 'post',
        success: function(data) {
            if (data) {
                button.removeClass('loading'); // удалить класс "loading" для кнопки "Загрузить больше"
                container.append(data); // добавить загруженный контент
                 current_page++; // увеличить текущую страницу на 1
                container.data('current-page', current_page); // обновить значение data-атрибута для текущей страницы

               
            }
            if (order_by == 'date') {
                // отсортировать элементы списка в порядке убывания даты
                var items = container.find('.property-item');
                items.sort(function(a, b) {
                    var date_a = new Date($(a).find('.property-date').text());
                    var date_b = new Date($(b).find('.property-date').text());
                    return date_b - date_a;
                });
                container.empty().append(items); // заменить содержимое контейнера отсортированными элементами
                } else if (order_by == 'meta_value_num') {
                // отсортировать элементы списка в порядке возрастания цены
                var items = container.find('.property-item');
                items.sort(function(a, b) {
                    var price_a = parseFloat($(a).find('.property-price').text().replace(/\D/g, ''));
                    var price_b = parseFloat($(b).find('.property-price').text().replace(/\D/g, ''));
                    return price_a - price_b;
                });
                container.empty().append(items); // заменить содержимое контейнера отсортированными элементами
            }

            // скрыть кнопку "Загрузить больше", если достигнут максимальный номер страницы
            if (current_page >= max_pages) {
                button.hide();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }
    });
}
*/

//изменение параметров фильтра в шорткоде от ajax_load_more(


/*$('.sort-by-list a').click(function() {

    $(this).parent().addClass('active').siblings().removeClass('active');
    var orderby = $(this).data('orderby');
    var order = $(this).data('order');
     var button = $('.alm-load-more-button'); // выбрать кнопку "Загрузить больше"
    var container = button.prev('.alm-listing'); // выбрать контейнер для загруженного контента
    
   
    
    var url = '<?php echo esc_url( home_url( "admin-ajax.php") ); ?>';
    
    $.ajax({
        url: my_script_vars.ajaxurl,
        type: 'post',
        data: {
            action: 'sort_properties',
            //shortcode: shortcode,
            orderby: orderby,
            order: order
        },
        beforeSend: function() {
            button.addClass('loading');
        },
        success: function(data) {
            if (data) {
                button.removeClass('loading');
                $('#list-type').html('')
                $('#list-type').html(data); // Перерисовываем содержимое контейнера
            }
        },
        error: function() {
            alert('Error!');
        }
    });
});

});*/

//FORM COMTACT TO Mailchimp

$(document).ready(function() {
  $('#myForm').submit(function(event) {
    event.preventDefault();

    var firstName = $('input[name="firstname"]').val();
    var lastName = $('#lastname').val();
    var email = $('#email').val();
    var subject = $('#subject').val();
    var message = $('#message').val();



    // Отправка данных на сервер WordPress
    $.ajax({
      url: my_script_vars.ajaxurl,
      type: 'POST',
      data: {
        action: 'submit_form',
        firstName: firstName,
        lastName: lastName,
        email: email,
        subject: subject,
        message: message
      },
      success: function(response) {
        // Действия при успешной отправке данных на сервер WordPress
        console.log('Данные успешно отправлены на сервер WordPress');
      },
      error: function(xhr, status, error) {
        // Действия при ошибке отправки данных на сервер WordPress
        console.log('Ошибка при отправке данных на сервер WordPress');
      }
    });
  });
});
