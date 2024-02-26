jQuery(function ($) {
  $('.has-child > a').on('click', function() {
    $(this).parent('li').toggleClass('is-slide');
    $(this).parent('li').find('.sub-menu').slideToggle(250);
  });

  $('.menu-trigger').on('click', function() {
    $('.slide-menu').fadeIn(250);
  });
  $('.search a').on('click', function () {
    $('.slide-menu').fadeIn(250);
  });

  $('.menu-head .close').on('click', function () {
    $('.slide-menu').fadeOut(250);
  });
});

jQuery(function ($) {
  $(window).scroll(function () {
    $('.fadein').each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 200) {
        $(this).addClass('scrollin');
      }
    });
  });
});


// top feature-slide
jQuery(function ($) {
  // $('.feature-slide').slick({
  //   dots: true,
  //   slidesToShow: 1,
  //   arrows: true,
  //   infinite: true,
  //   autoplay: true,
  //   autoplaySpeed: 4000,
  // });

  $('.feature-list').slick({
    slidesToShow: 3,
    // arrows: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 4000,
    prevArrow: '<img src="https://one-organic-day.life/wpfile/wp-content/themes/one-organic-theme/lib/images/arrow-left.png" class="slide-arrow prev-arrow">',
    nextArrow: '<img src="https://one-organic-day.life/wpfile/wp-content/themes/one-organic-theme/lib/images/arrow-right.png" class="slide-arrow next-arrow">',
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2
        }
      },
    ]
  });
});


jQuery(function ($) {
  $('a[href^="#"]').click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});

jQuery(function ($) {
  let list = '';
  const limit = 20; //表示件数
  const url = `https://graph.facebook.com/v15.0/18316973965045053/top_media?fields=id%2Cmedia_type%2Cthumbnail_url%2Ccomments_count%2Clike_count%2Cmedia_url%2Cpermalink&user_id=17841403113142677&limit=1000&access_token=EAAHBAFPzuMMBANofKc2ZAx8qGTvlF9x41qAo2JxYJEkzIm94Y1TZCzzWWUv8NF2zxVTIbZAmIj611ZAt19GTZCM856eGBKOiNgrIkDeazHGW6dVQZChT2ndoqy7AzNKZB59ZCgtQn1kVkoDdKPjxz9q9am1JjACqzaKPrf7y8ZAF3JnD7ZChdHWgCfQ4T2WWaR9j4ZD`;
  // const url = `https://graph.facebook.com/v15.0/${businessID}?fields=name,media.limit(${limit}){caption,media_url,thumbnail_url,permalink,like_count,comments_count,media_type}&access_token=${accessToken}`;
  $.ajax({
    url: url
  }).done((res) => {
    const data = res.media;
    $.each(data, function (index, val) {
      $.each(val, function (i, item) {
        console.log(item);
        if (item.media_url) {
          //メディアのタイプがビデオの場合、サムネを取得
          media = (item.media_type == 'VIDEO' ? item.thumbnail_url : item.media_url);

          // 一覧を変数listに格納
          list +=
            `<li>
            <a href="${item.permalink}" target="_blank" rel="noopener">
            <img src="${media}">
            <span class="like"><i class="fa fa-heart"></i>${item.like_count}</span></a>
          </li>`;
        }

      })
    });
    $('#insta').html(`<ul>${list}</ul>`);
  }).fail(function (jqXHR, status) {
    $('#insta').html('<p>読み込みに失敗しました。</p>');
  });
});