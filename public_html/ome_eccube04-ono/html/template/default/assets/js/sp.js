// $(function () {
//   // news-description- で始まるIDを持つ要素のうち、h2タグ**でない**ものをすべて取得
//   $('[id^="news-description-"]:not(h2)').each(function () {
//     let description = $(this).html();
//     let shortDescription = truncateHtml(description, 100); // 20文字に制限
//     $(this).html(shortDescription);
//   });
// });
// クラス名が 'ec-errorMessage' の要素をすべて取得し、
// 要素の内容が '入力必須です。' を含む場合にのみ非表示にします。
document.querySelectorAll(".ec-errorMessage").forEach(function (element) {
  if (element.textContent.includes("入力必須です。")) {
    element.style.display = "none";
  }
});
function truncateHtml(html, maxLength) {
  let parser = new DOMParser();
  let doc = parser.parseFromString(html, "text/html");
  let str = doc.body.textContent;
  return str.slice(0, maxLength) + "...";
}
//レスポンシブ用トグルメニュー
// ※ヘッダーの #open-footer-menu については footer.js 側で制御するため除外
$(function () {
  $(".down-arrow").not("#open-footer-menu").on("click", function () {
    $(".down-arrow").toggleClass("active");
    $("#slide_menu").slideToggle();
    $("body").toggleClass("noscroll");
  });
});

//メニューバーのスクロール固定
$(function () {
  var offset = $(".menu-navi").offset();

  $(window).scroll(function () {
    if ($(window).scrollTop() > offset.top) {
      $(".menu-navi").addClass("fixed");
      $(".head-centerarea").removeClass("head-centerarea-sp");
    } else {
      $(".menu-navi").removeClass("fixed");
      $(".head-centerarea").addClass("head-centerarea-sp");
    }
  });
});

//アコーディオンメニュー（ヘッダー）
var state = false;
$(function () {
  //.accordion01の中のp要素がクリックされたら
  $(".accordion01 p").click(function () {
    //falesの場合 windowの固定
    if (state == false) {
      $(window).on("touchmove.noScroll", function (e) {
        e.preventDefault();
      });
      state = true;
    } else {
      $(window).off(".noScroll");
      state = false;
    }

    //クリックされた.accordion01の中のp要素に隣接するul要素が開いたり閉じたりする。
    $(this).next("ul").slideToggle();
  });
  //.accordion01の中の.innerの中のli要素の中のp要素がクリックされたら
  $(".accordion01 .inner li p").click(function () {
    //クリックされた.accordion01の中の.innerの中のli要素の中のp要素の子要素のul要素が開いたり閉じたりする。
    $(this).children("ul").slideToggle();
  });
});

//アコーディオンメニュー（フッター）
$(function () {
  $(".accordion02 p").click(function () {
    $(this).next("ul").slideToggle();
  });

  $(".accordion02 .inner li p").click(function () {
    $(this).children("ul").slideToggle();
  });
});

$(function () {
  $(".accordion03 p").click(function () {
    $(this).next("ul").slideToggle();
  });

  $(".accordion03 .inner li p").click(function () {
    $(this).children("ul").slideToggle();
  });
});

$(function () {
  $(".accordion04 p").click(function () {
    $(this).next("ul").slideToggle();
  });

  $(".accordion04 .inner li p").click(function () {
    $(this).children("ul").slideToggle();
  });
});

//スムーズスクロール
$(function () {
  // #で始まるアンカーをクリックした場合に処理
  $("a[href^=#]").click(function () {
    headerHeight = $(".head-one").outerHeight() + 55;
    // スクロールの速度
    var speed = 400; // ミリ秒
    // アンカーの値取得
    var href = $(this).attr("href");
    // 移動先を取得
    var target = $(href == "#" || href == "" ? "html" : href);
    // 移動先を数値で取得
    var position = Math.floor(target.offset().top) - headerHeight;
    // スムーススクロール
    $("body,html").animate({ scrollTop: position }, speed, "swing");
    return false;
  });
});

// ×をクリックするとフローティングバナー（追従バナー）が閉じる
window.onload = function () {
  document.getElementById("js_floatingBanner_close").onclick = function () {
    this.parentNode.classList.add("js_close");
  };
};

$(function () {
  // まつげエクステ
  $(".glue").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/Eyelash-Extensions/glue.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".extension").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/Eyelash-Extensions/extension.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".japan-lash").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/Eyelash-Extensions/japan-lash.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".flat-lash").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/Eyelash-Extensions/flat-lash.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".color-lash").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/Eyelash-Extensions/color-lash.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".pre-treatment").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/Eyelash-Extensions/pre-treatment.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".remover").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/Eyelash-Extensions/remover.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".tweezer").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/Eyelash-Extensions/tweezer.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".treatment").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/Eyelash-Extensions/treatment.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".tool").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/Eyelash-Extensions/tool.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".outlet").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/Eyelash-Extensions/outlet.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  // ラッシュリフト
  $(".all-lash-lift").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/lash%20lift/all-lash-lift.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".lash-lift-cream").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/lash%20lift/lash-lift-cream.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".lash-lift-glue").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/lash%20lift/lash-lift-glue.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".middle-after-treatment").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/lash%20lift/middle-after-treatment.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".lash-treatment").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/lash%20lift/lash-treatment.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  // 店販コスメ
  $(".all-cosmetic").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/shop-cosme/all-cosmetic.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".ac-mascara").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/shop-cosme/ac-mascara.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".ac-eyeliner").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/shop-cosme/ac-eyeliner.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".ac-cleansing").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/shop-cosme/ac-cleansing.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".eyelid-serum").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/shop-cosme/eyelid-serum.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
  $(".all-ac").hover(
    function () {
      $(".change_image").attr(
        "src",
        "/html/template/default/assets/img/renewal_top/header/item-thumb/shop-cosme/all-ac.webp",
      );
    },
    function () {
      $(".change_image").attr("src", "/html/template/default/assets/img_2018/top/ome_logo.webp");
    },
  );
});
