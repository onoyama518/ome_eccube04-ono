/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

(function (window, undefined) {
  // 名前空間の重複を防ぐ
  if (window.eccube === undefined) {
    window.eccube = {};
  }

  var eccube = window.eccube;

  // グローバルに使用できるようにする
  window.eccube = eccube;

  /**
   * 規格2のプルダウンを設定する.
   */
  eccube.setClassCategories = function ($form, product_id, $sele1, $sele2, selected_id2) {
    if ($sele1 && $sele1.length) {
      var classcat_id1 = $sele1.val() ? $sele1.val() : '';
      if ($sele2 && $sele2.length) {
        // 規格2の選択肢をクリア
        $sele2.children().remove();

        var classcat2;

        if (eccube.hasOwnProperty('productsClassCategories')) {
          // 商品一覧時
          classcat2 = eccube.productsClassCategories[product_id][classcat_id1];
        } else {
          // 詳細表示時
          classcat2 = eccube.classCategories[classcat_id1];
        }

        // 規格2の要素を設定
        for (var key in classcat2) {
          if (classcat2.hasOwnProperty(key)) {
            var id = classcat2[key].classcategory_id2;
            var name = classcat2[key].name;
            var option = $('<option />')
              .val(id ? id : '')
              .text(name);
            if (id === selected_id2) {
              option.attr('selected', true);
            }
            $sele2.append(option);
          }
        }
        eccube.checkStock(
          $form,
          product_id,
          $sele1.val() ? $sele1.val() : '__unselected2',
          $sele2.val() ? $sele2.val() : ''
        );
      }
    }
  };

  /**
   * 規格の選択状態に応じて, フィールドを設定する.
   */
  var price02_origin = [];
  eccube.checkStock = function ($form, product_id, classcat_id1, classcat_id2) {
    classcat_id2 = classcat_id2 ? classcat_id2 : '';

    var classcat2;

    if (eccube.hasOwnProperty('productsClassCategories')) {
      // 商品一覧時
      classcat2 = eccube.productsClassCategories[product_id][classcat_id1]['#' + classcat_id2];
    } else {
      // 詳細表示時
      if (typeof eccube.classCategories[classcat_id1] !== 'undefined') {
        classcat2 = eccube.classCategories[classcat_id1]['#' + classcat_id2];
      }
    }

    if (typeof classcat2 === 'undefined') {
      // 商品コード
      var $product_code = $('.product-code-default');
      if (typeof this.product_code_origin === 'undefined') {
        // 初期値を保持しておく
        this.product_code_origin = $product_code.text();
      }
      $product_code.text(this.product_code_origin);

      // 在庫(品切れ)
      var $cartbtn = $form.parent().find('.add-cart').first();
      if (typeof this.product_cart_origin === 'undefined') {
        // 初期値を保持しておく
        this.product_cart_origin = $cartbtn.html();
      }
      $cartbtn.prop('disabled', false);
      $cartbtn.html(this.product_cart_origin);

      // 通常価格
      var $price01 = $form.parent().find('.price01-default').first();
      if (typeof this.price01_origin === 'undefined') {
        // 初期値を保持しておく
        this.price01_origin = $price01.html();
      }
      $price01.html(this.price01_origin);

      // 販売価格
      var $price02 = $form.parent().find('.price02-default').first();
      if (typeof price02_origin[product_id] === 'undefined') {
        // 初期値を保持しておく
        price02_origin[product_id] = $price02.html();
      }
      $price02.html(price02_origin[product_id]);

      // 商品規格
      var $product_class_id_dynamic = $form.find('[id^=ProductClass]');
      $product_class_id_dynamic.val('');
    } else {
      // 商品コード
      var $product_code = $('.product-code-default');
      if (classcat2 && typeof classcat2.product_code !== 'undefined') {
        $product_code.text(classcat2.product_code);
      } else {
        $product_code.text(this.product_code_origin);
      }

      // 在庫(品切れ)
      var $cartbtn = $form.parent().find('.add-cart').first();
      if (typeof this.product_cart_origin === 'undefined') {
        // 初期値を保持しておく
        this.product_cart_origin = $cartbtn.html();
      }
      if (classcat2 && classcat2.stock_find === false) {
        $cartbtn.prop('disabled', true);
        $cartbtn.text(eccube_lang['front.product.out_of_stock']);
      } else {
        $cartbtn.prop('disabled', false);
        $cartbtn.html(this.product_cart_origin);
      }

      // 通常価格
      var $price01 = $form.parent().find('.price01-default').first();
      if (typeof this.price01_origin === 'undefined') {
        // 初期値を保持しておく
        this.price01_origin = $price01.html();
      }
      if (
        classcat2 &&
        typeof classcat2.price01_inc_tax !== 'undefined' &&
        String(classcat2.price01_inc_tax).length >= 1
      ) {
        $price01.text(classcat2.price01_inc_tax_with_currency);
      } else {
        $price01.html(this.price01_origin);
      }

      // 販売価格
      var $price02 = $form.parent().find('.price02-default').first();
      if (typeof price02_origin[product_id] === 'undefined') {
        // 初期値を保持しておく
        price02_origin[product_id] = $price02.html();
      }
      if (
        classcat2 &&
        typeof classcat2.price02_inc_tax !== 'undefined' &&
        String(classcat2.price02_inc_tax).length >= 1
      ) {
        $price02.text(classcat2.price02_inc_tax_with_currency);
      } else {
        $price02.html(price02_origin[product_id]);
      }

      // ポイント
      var $point_default = $form.find('[id^=point_default]');
      var $point_dynamic = $form.find('[id^=point_dynamic]');
      if (
        classcat2 &&
        typeof classcat2.point !== 'undefined' &&
        String(classcat2.point).length >= 1
      ) {
        $point_dynamic.text(classcat2.point).show();
        $point_default.hide();
      } else {
        $point_dynamic.hide();
        $point_default.show();
      }

      // 商品規格
      var $product_class_id_dynamic = $form.find('[id^=ProductClass]');
      if (
        classcat2 &&
        typeof classcat2.product_class_id !== 'undefined' &&
        String(classcat2.product_class_id).length >= 1
      ) {
        $product_class_id_dynamic.val(classcat2.product_class_id);
      } else {
        $product_class_id_dynamic.val('');
      }
    }
  };

  /**
   * Initialize.
   */
  $(function () {
    // 規格1選択時
    $('select[name=classcategory_id1]').change(function () {
      var $form = $(this).parents('form');
      var product_id = $form.find('input[name=product_id]').val();
      var $sele1 = $(this);
      var $sele2 = $form.find('select[name=classcategory_id2]');

      // 規格1のみの場合
      if (!$sele2.length) {
        eccube.checkStock($form, product_id, $sele1.val(), null);
        // 規格2ありの場合
      } else {
        eccube.setClassCategories($form, product_id, $sele1, $sele2);
      }
    });

    // 規格2選択時
    $('select[name=classcategory_id2]').change(function () {
      var $form = $(this).parents('form');
      var product_id = $form.find('input[name=product_id]').val();
      var $sele1 = $form.find('select[name=classcategory_id1]');
      var $sele2 = $(this);
      eccube.checkStock($form, product_id, $sele1.val(), $sele2.val());
    });
  });
})(window);

// ここから今回のスライダー調整。
// スマホの縦スクロールやPCホバーでは自動再生を止めず、横スワイプ時だけ通常の手動操作を残す。
// 指定した Slick スライダーの autoplay 関連フラグを強制的に再開状態へ戻す。
// タップ、縦スクロール、ホバーで止まったままになるケースをここで吸収する。
function keepSliderAutoplayRunning($slider) {
  if (!$slider.hasClass('slick-initialized')) {
    return;
  }

  var slick = $slider.slick('getSlick');

  if (!slick) {
    return;
  }

  slick.interrupted = false;
  slick.focussed = false;
  slick.paused = false;
  slick.autoPlay();
}

// Slick 本体の swipeStart 実行後に interrupted を false に戻すための差し込み。
// 初回タッチ時点で autoplay が止まるのを防ぐため、対象スライダーごとに一度だけ適用する。
function patchSliderSwipeStart($slider) {
  if (!$slider.hasClass('slick-initialized')) {
    return;
  }

  var slick = $slider.slick('getSlick');

  if (!slick || slick.__autoplaySwipePatched) {
    return;
  }

  var originalSwipeStart = slick.swipeStart;

  slick.swipeStart = function (event) {
    originalSwipeStart.call(this, event);
    this.interrupted = false;
  };

  slick.__autoplaySwipePatched = true;
}

// Slick の interrupt(true) で autoplay が止まる経路を対象スライダー単位で抑止する。
// main-slider では hover や touch による停止を無効にし、interrupt(false) の通常復帰だけ通す。
function patchSliderInterrupt($slider, allowInterrupt) {
  if (!$slider.hasClass('slick-initialized')) {
    return;
  }

  var slick = $slider.slick('getSlick');

  if (!slick || slick.__autoplayInterruptPatched) {
    return;
  }

  var originalInterrupt = slick.interrupt;

  slick.interrupt = function (isInterrupted) {
    if (allowInterrupt && allowInterrupt(isInterrupted, this)) {
      originalInterrupt.call(this, isInterrupted);
      return;
    }

    if (!isInterrupted) {
      originalInterrupt.call(this, isInterrupted);
      return;
    }

    this.interrupted = false;
    this.autoPlay();
  };

  slick.__autoplayInterruptPatched = true;
}

// 対象スライダーに PC と SP の補助イベントをまとめて付与する。
// 縦スクロールや単なる接触では autoplay を維持し、横移動量が一定以上の時だけ手動スワイプとして扱う。
function bindSliderTouchAutoplayResume($slider, namespace) {
  var eventNamespace = namespace || 'slickAutoplayFix';
  var activeSlider = null;
  var touchState = null;
  var horizontalSwipeThreshold = 12;

  patchSliderSwipeStart($slider);

  var $interactionTarget = $slider.find('.slick-list');

  if (!$interactionTarget.length) {
    $interactionTarget = $slider;
  }

  function getPointerPosition(event) {
    var originalEvent = event.originalEvent;

    if (originalEvent && originalEvent.touches && originalEvent.touches.length) {
      return originalEvent.touches[0];
    }

    if (originalEvent && originalEvent.changedTouches && originalEvent.changedTouches.length) {
      return originalEvent.changedTouches[0];
    }

    return event;
  }

  $slider
    .off(
      'mouseenter.' + eventNamespace + ' mousemove.' + eventNamespace + ' focusin.' + eventNamespace
    )
    .on(
      'mouseenter.' + eventNamespace + ' mousemove.' + eventNamespace + ' focusin.' + eventNamespace,
      function () {
        activeSlider = $(this);
        keepSliderAutoplayRunning(activeSlider);
      }
    );

  $interactionTarget
    .off(
      'touchstart.' +
        eventNamespace +
        ' touchmove.' +
        eventNamespace +
        ' mousedown.' +
        eventNamespace
    )
    .on('touchstart.' + eventNamespace, function (event) {
      var pointer = getPointerPosition(event);

      activeSlider = $slider;
      touchState = {
        startX: pointer.clientX,
        startY: pointer.clientY,
        isHorizontalSwipe: false,
      };

      keepSliderAutoplayRunning($slider);
    })
    .on('touchmove.' + eventNamespace, function (event) {
      if (!touchState) {
        return;
      }

      var pointer = getPointerPosition(event);
      var deltaX = Math.abs(pointer.clientX - touchState.startX);
      var deltaY = Math.abs(pointer.clientY - touchState.startY);

      touchState.isHorizontalSwipe =
        deltaX > horizontalSwipeThreshold && deltaX > deltaY;

      if (touchState.isHorizontalSwipe) {
        var slick = $slider.hasClass('slick-initialized') ? $slider.slick('getSlick') : null;

        if (slick) {
          slick.interrupted = true;
        }
      } else {
        keepSliderAutoplayRunning($slider);
      }
    })
    .on('mousedown.' + eventNamespace, function () {
      activeSlider = $slider;
      keepSliderAutoplayRunning($slider);
    });

  $(document)
    .off(
      'touchend.' +
        eventNamespace +
        ' touchcancel.' +
        eventNamespace +
        ' mouseup.' +
        eventNamespace
    )
    .on(
      'touchend.' +
        eventNamespace +
        ' touchcancel.' +
        eventNamespace +
        ' mouseup.' +
        eventNamespace,
      function () {
        if (!activeSlider) {
          return;
        }

        var $currentSlider = activeSlider;
        var shouldResumeImmediately = !touchState || !touchState.isHorizontalSwipe;

        activeSlider = null;
        touchState = null;

        window.setTimeout(function () {
          if (shouldResumeImmediately) {
            keepSliderAutoplayRunning($currentSlider);
          }
        }, 0);
      }
    );
}

// 共通設定と差分設定を分けるためのヘルパー。
  // 全スライダーで共通に使う Slick 基本設定を作り、必要な差分だけ上書きできるようにする。
function buildSliderOptions(overrides) {
  return $.extend(
    true,
    {
      slidesToShow: 1,
      centerMode: true,
      centerPadding: '0px',
      dots: true,
      arrows: true,
      speed: 1000,
    },
    overrides || {}
  );
}

// autoplay を使うスライダー向けの共通設定を作る。
// pauseOnFocus / pauseOnHover をここで無効化して、各スライダーとの差分だけを残す。
function buildAutoplaySliderOptions(overrides) {
  return buildSliderOptions(
    $.extend(
      true,
      {
        autoplay: true,
        pauseOnFocus: false,
        pauseOnHover: false,
        dotsClass: 'main-slide-dots',
      },
      overrides || {}
    )
  );
}

// 1つのスライダーを初期化する共通入口。
// Slick 初期化と、必要な場合の autoplay 維持用イベント設定をまとめて行う。
function initSlider($slider, options, autoplayNamespace) {
  if (!$slider.length) {
    return;
  }

  $slider.each(function (index) {
    var $currentSlider = $(this);
    var currentNamespace = autoplayNamespace ? autoplayNamespace + '-' + index : null;

    $currentSlider.slick(options);

    if (autoplayNamespace === 'mainSliderAutoplayFix') {
      patchSliderInterrupt($currentSlider);
    }

    if (currentNamespace) {
      bindSliderTouchAutoplayResume($currentSlider, currentNamespace);
    }
  });
}

// スマホだけで有効にしたいスライダー用の共通入口。
// 画面幅に応じて Slick の初期化と破棄を切り替え、recommend / review の重複コードを減らす。
function initMobileOnlySlider(config) {
  var $slider = $(config.selector);
  var breakpoint = config.breakpoint || 768;

  function toggleSlider() {
    if ($(window).width() <= breakpoint) {
      if (!$slider.hasClass('slick-initialized')) {
        initSlider($slider, config.options, config.autoplayNamespace);
      }
    } else if ($slider.hasClass('slick-initialized')) {
      $slider.slick('unslick');
    }
  }

  toggleSlider();
  $(window).resize(toggleSlider);
}

$(function () {
  function setMainSliderActiveClass(slick, targetSlide) {
    var slideCount = slick.slideCount;
    var currentSlide = typeof targetSlide === 'number' ? targetSlide : slick.currentSlide;

    $(slick.$slider)
      .find('.slick-slide')
      .removeClass('is-main-slide-active')
      .filter(function () {
        var slickIndex = Number($(this).attr('data-slick-index'));
        var normalizedIndex = ((slickIndex % slideCount) + slideCount) % slideCount;

        return normalizedIndex === currentSlide;
      })
      .addClass('is-main-slide-active');
  }

  $('.main-slider')
    .on('init', function (event, slick) {
      setMainSliderActiveClass(slick);
    })
    .on('beforeChange', function (event, slick, currentSlide, nextSlide) {
      setMainSliderActiveClass(slick, nextSlide);
    })
    .on('afterChange', function (event, slick, currentSlide) {
      setMainSliderActiveClass(slick, currentSlide);
    });

  initSlider(
    $('.main-slider'),
    buildAutoplaySliderOptions({
      centerPadding: '191px',
      responsive: [
        {
          breakpoint: 1919,
          settings: {
            centerPadding: '10%',
          },
        },
        {
          breakpoint: 768,
          settings: {
            centerPadding: '27.5px',
          },
        },
      ],
    }),
    'mainSliderAutoplayFix'
  );
});

$(function () {
  initSlider(
    $('.info-area_slider'),
    buildAutoplaySliderOptions({
      slidesToShow: 3,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            centerMode: false,
            centerPadding: '0px',
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            centerMode: true,
            centerPadding: '0px',
          },
        },
      ],
    }),
    'infoAreaSliderAutoplayFix'
  );
});

$(function () {
  initSlider(
    $('.lp-slider'),
    buildSliderOptions({
      centerPadding: '100px',
      dots: false,
      dotsClass: 'slide-dots',
    })
  );
});

$(function () {
  // .slider_lp は他スライダーと切り離して個別管理にしている。
  $('.slider_lp').slick({
    slidesToShow: 1,
    centerMode: true,
    centerPadding: '100px',
    dots: false,
    arrows: true,
    speed: 1000,
  });
});

$(function () {
  initMobileOnlySlider({
    selector: '.recommend-slider',
    options: buildAutoplaySliderOptions(),
    autoplayNamespace: 'recommendSliderAutoplayFix',
  });

  $('.btn_cart').on('click', function () {
    $('.recommend-slider').slick('slickPause');
  });

  $('.cart-modal-close').on('click', function () {
    $('.recommend-slider').slick('slickPlay');
  });

  // ESCキー押下時にも再開
  $(document).on('keydown', function (e) {
    if (e.key === 'Escape' || e.keyCode === 27) {
      $('.recommend-slider').slick('slickPlay');
    }
  });
});

$(function () {
  initMobileOnlySlider({
    selector: '.review-slider',
    options: buildAutoplaySliderOptions(),
    autoplayNamespace: 'reviewSliderAutoplayFix',
  });
});

document.addEventListener('DOMContentLoaded', function () {
  var exText = document.getElementById('exText');
  var fullText = exText.textContent.trim();

  function showShort() {
    exText.innerHTML =
      '<span class="exTextShort">' +
      fullText +
      '</span>' +
      '<div style="text-align:right;"><span id="moreBtn" style="cursor:pointer; border-bottom:solid 1px #000; padding-bottom:1px;">もっと見る</span></div>';
    var areaExReview = exText.closest('.area_ex_review');
    if (areaExReview) {
      areaExReview.style.height = '';
    }
    document.getElementById('moreBtn').onclick = showFull;
  }

  function showFull() {
    exText.innerHTML =
      fullText +
      '<div style="text-align:right;"><span id="closeBtn" style="cursor:pointer; border-bottom:solid 1px #000; padding-bottom:1px;">閉じる</span></div>';
    var areaExReview = exText.closest('.area_ex_review');
    if (areaExReview) {
      areaExReview.style.height = 'auto';
    }
    document.getElementById('closeBtn').onclick = showShort;
  }

  if (fullText.length > 0) {
    showShort();
  }
});
