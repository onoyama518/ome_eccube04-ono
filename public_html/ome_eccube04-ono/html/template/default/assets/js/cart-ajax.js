// public/assets/js/cart-ajax.js など
$(document).on('submit', '.cart-form', function(e) {
    e.preventDefault();

    var $form = $(this);
    if ($form.data('cartSubmitting')) {
        return;
    }
    $form.data('cartSubmitting', true);

    var formData = $form.serialize();

    $.ajax({
        url: $form.attr('action'),
        type: 'POST',
        data: formData,
        dataType: 'json'
    })
    .done(function(response) {
        $('.cart-modal').fadeOut(function() {
            $('.ec-modal').fadeIn();
            $('#ec-modal-header').text('カートに商品が入りました');
        });
    })
    .fail(function(xhr) {
        alert('カート追加に失敗しました');
    })
    .always(function() {
        $form.data('cartSubmitting', false);
    });
});

// 「買い物を続ける」ボタン
$(document).on('click', '#continue-shopping', function() {
    $('.ec-modal').fadeOut();
});

// 「カートに移動する」ボタン
$(document).on('click', '#go-to-cart', function() {
    window.location.href = '/cart';
});

// 「閉じる」ボタン
$(document).on('click', '.ec-modal-close', function() {
    $('.ec-modal').fadeOut();
});

// モーダル外クリックで閉じる（必要なら .ec-modal-overlay も対象に追加）
$(document).on('click', '.ec-modal-overlay', function() {
    $('.ec-modal').fadeOut();
});