/**
 * EC-CUBE フロント用 軽量バリデーション
 * 
 * サーバー側（Symfony Constraint）と矛盾しない軽量チェックを提供
 * UX向上目的の入力補助機能
 */
(function($) {
    'use strict';

    // バリデーションエラーメッセージ
    var messages = {
        required: 'が入力されていません。',
        email: 'メールアドレスの形式が正しくありません。',
        phone: '電話番号は数字とハイフンのみで入力してください。',
        kana: '全角カタカナで入力してください。',
        postalCode: '郵便番号は数字とハイフンで入力してください。',
        passwordLength: '6文字以上で入力してください。'
    };

    // エラーメッセージ用CSSクラス
    var errorClass = 'js-validation-error';
    var errorMessageClass = 'js-validation-error-message';

    /**
     * 入力要素の値を取得（トリム済み）
     */
    function getValue(element) {
        return $(element).val() ? $(element).val().trim() : '';
    }

    /**
     * エラーメッセージを表示
     */
    function showError(element, message, label) {
        var $element = $(element);
        var $parent = $element.parent();

        // 既存のエラーメッセージを削除
        removeError(element);

        // 入力要素にエラークラスを追加
        $element.addClass(errorClass);

        // 必須エラーの場合は項目名を付加
        if (label && message === messages.required) {
            message = label + message;
        }

        // エラーメッセージ要素を作成して追加
        var $errorMessage = $('<span>')
            .addClass(errorMessageClass)
            .addClass('attention_text')
            .addClass('mini')
            .text(message)
            .css({
                'display': 'block',
                'color': '#c00',
                'font-size': '12px',
                'margin-top': '4px'
            });

        $element.before($errorMessage);
    }

    /**
     * エラーメッセージを削除
     */
    function removeError(element) {
        var $element = $(element);
        
        // エラークラスを削除
        $element.removeClass(errorClass);
        
        // エラーメッセージ要素を削除
        $element.siblings('.' + errorMessageClass).remove();
    }

    /**
     * バリデーションルール
     */
    var validators = {
        /**
         * 必須チェック
         */
        required: function(value) {
            return value !== '';
        },

        /**
         * メールアドレスの軽量チェック
         * - @ とドメインの有無のみ確認
         * - RFC レベルの厳格判定はしない
         */
        email: function(value) {
            if (value === '') return true; // 空の場合はrequiredでチェック
            // @ が含まれ、@ の後ろに . が含まれること
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
        },

        /**
         * 電話番号の軽量チェック
         * - 数字とハイフンのみ許容
         * - 桁数チェックは行わない
         */
        phone: function(value) {
            if (value === '') return true; // 空の場合はrequiredでチェック
            return /^[\d\-]+$/.test(value);
        },

        /**
         * カナの軽量チェック
         * - 全角カタカナのみ許容
         * - 半角は禁止
         */
        kana: function(value) {
            if (value === '') return true; // 空の場合はrequiredでチェック
            // 全角カタカナ、全角スペース、長音符を許容
            return /^[ァ-ヶー　]+$/.test(value);
        },

        /**
         * 郵便番号の軽量チェック
         * - 数字とハイフンのみ許容
         * - 123-4567 / 1234567 のどちらも許容
         * - 桁数判定はしない
         */
        postalCode: function(value) {
            if (value === '') return true; // 空の場合はrequiredでチェック
            return /^[\d\-]+$/.test(value);
        },

        /**
         * パスワードの簡易チェック
         * - 8文字以上を推奨
         * - 厳密な強度判定は行わない
         */
        passwordLength: function(value) {
            if (value === '') return true; // 空の場合はrequiredでチェック
            return value.length >= 6;
        }
    };

    /**
     * 単一要素のバリデーション実行
     */
    function validateElement(element) {
        var $element = $(element);
        var value = getValue(element);
        var validationTypes = ($element.data('validation') || '').split(' ');
        var label = $element.data('label') || '';

        // エラーをクリア
        removeError(element);

        // 各バリデーションルールをチェック
        for (var i = 0; i < validationTypes.length; i++) {
            var type = validationTypes[i].trim();
            if (type === '') continue;

            if (validators[type] && !validators[type](value)) {
                showError(element, messages[type], label);
                return false;
            }
        }

        return true;
    }

    /**
     * フォーム内の全要素をバリデーション
     */
    function validateForm(form) {
        var $form = $(form);
        var isValid = true;
        
        $form.find('[data-validation]').each(function() {
            if (!validateElement(this)) {
                isValid = false;
            }
        });
        
        return isValid;
    }

    /**
     * バリデーション初期化
     */
    function initValidation() {
        // blur イベントでバリデーション実行
        $(document).on('blur', '[data-validation]', function() {
            validateElement(this);
        });

        // input イベントでエラークリア（入力中の再チェック）
        $(document).on('input', '[data-validation]', function() {
            var $element = $(this);
            // エラー状態の場合のみ再バリデーション
            if ($element.hasClass(errorClass)) {
                validateElement(this);
            }
        });
    }

    // DOM Ready で初期化
    $(function() {
        initValidation();
    });

    // グローバルに公開（必要に応じて他のスクリプトから呼び出し可能）
    window.EccubeValidation = {
        validate: validateElement,
        validateForm: validateForm,
        showError: showError,
        removeError: removeError,
        validators: validators,
        messages: messages
    };

})(jQuery);
