<?php

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

namespace Eccube\Twig\Extension;

use Eccube\Entity\Product;
use Eccube\Repository\ProductRepository;
use Eccube\Repository\ProductClassRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Eccube\Form\Type\AddCartType;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Symfony\Component\HttpFoundation\JsonResponse;

class CartFormExtension extends AbstractExtension
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var ProductClassRepository
     */
    private $productClassRepository;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    public function __construct(
        ProductRepository $productRepository,
        ProductClassRepository $productClassRepository,
        FormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->productRepository = $productRepository;
        $this->productClassRepository = $productClassRepository;
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('render_cart_form', [$this, 'renderCartForm'], ['is_safe' => ['html']]),
            new TwigFunction('render_cart_modal', [$this, 'renderCartModal'], ['is_safe' => ['html']]),
            new TwigFunction('render_cart_success_js', [$this, 'getCartSuccessJS'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * モーダル形式でカートフォームを表示するモーダルを生成
     */
    public function renderCartModal(int $productId): string
    {
        static $renderedModalProductIds = [];
        if (isset($renderedModalProductIds[$productId])) {
            return '';
        }

        $product = $this->productRepository->find($productId);
        if (!$product) {
            return '<!-- 商品が見つかりません -->';
        }

        $renderedModalProductIds[$productId] = true;

        $html = '';
        
        // モーダルウィンドウ
        $html .= '<div id="cart-modal-' . $productId . '" class="cart-modal" style="display: none;">';
        $html .= '<div class="cart-modal-overlay" onclick="closeCartModal(' . $productId . ')"></div>';
        $html .= '<div class="cart-modal-content">';
        $html .= '<div class="cart-modal-header">';
        $html .= '<h3>' . htmlspecialchars($product->getName()) . '</h3>';
        $html .= '<button type="button" class="cart-modal-close" onclick="closeCartModal(' . $productId . ')">&times;</button>';
        $html .= '</div>';
        $html .= '<div class="cart-modal-body">';
        
        // カートフォーム内容を埋め込み
        $html .= $this->renderCartForm($productId);
        
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        // JavaScript（1回だけ追加）
        static $jsAdded = false;
        if (!$jsAdded) {
            $html .= $this->getModalJS();
            $jsAdded = true;
        }

        return $html;
    }

    /**
     * 要件に基づくカートフォーム生成
     * TOP ページで使用するカートフォーム
     */
    public function renderCartForm(int $productId): string
    {
        $product = $this->productRepository->find($productId);
        if (!$product) {
            return '<!-- 商品が見つかりません -->';
        }

        // 商品に規格があるかチェック
        if ($product->hasProductClass()) {
            return $this->renderCartFormWithClass($product);
        } else {
            return $this->renderSimpleCartForm($product);
        }
    }

    /**
     * 規格あり商品用のカートフォーム生成
     */
    private function renderCartFormWithClass($product): string
    {
        // 規格情報を取得
        $productClasses = $product->getProductClasses();
        $classCategories1 = [];
        $classCategories2 = [];
        $classCategoriesJson = [];
        foreach ($productClasses as $productClass) {
            if ($productClass->getClassCategory1() && $productClass->isVisible()) {
                $classCategories1[$productClass->getClassCategory1()->getId()] = $productClass->getClassCategory1();
            }
            if ($productClass->getClassCategory2() && $productClass->isVisible()) {
                $classCategories2[$productClass->getClassCategory2()->getId()] = $productClass->getClassCategory2();
            }
        }

        foreach ($productClasses as $productClass) {
            if ($productClass->isVisible()) {
                $id1 = $productClass->getClassCategory1() ? $productClass->getClassCategory1()->getId() : '';
                $id2 = $productClass->getClassCategory2() ? $productClass->getClassCategory2()->getId() : '';
                $classCategoriesJson[$id1]['#' . $id2] = [
                    'product_class_id' => $productClass->getId(),
                    'name' => $productClass->getClassCategory2() ? $productClass->getClassCategory2()->getName() : '',
                    'classcategory_id2' => $id2,
                ];
            }
        }

        // フォーム開始
        $html = '<div class="cart-form-container">';

        // 標準のAddCartTypeフォームを作成してCSRFトークンを取得
        $form = $this->formFactory->create(AddCartType::class, null, [
            'product' => $product,
            'csrf_token_id' => 'add_cart',
        ]);
        $formView = $form->createView();

        $html .= '<form method="post" action="' . $this->urlGenerator->generate('product_add_cart', ['id' => $product->getId()]) . '" class="cart-form" id="cart_form_' . $product->getId() . '" onsubmit="return validateCartForm(' . $product->getId() . ')" data-product-name="' . htmlspecialchars($product->getName()) . '">';

        // 標準フォームからすべての隠しフィールドを取得
        if (isset($formView['product_id'])) {
            $html .= '<input type="hidden" name="product_id" value="' . $formView['product_id']->vars['value'] . '">';
        }
        
        // EC-CUBE標準のProductClass IDフィールド名に修正
        if (isset($formView['ProductClass'])) {
            $html .= '<input type="hidden" name="ProductClass" id="ProductClass_' . $product->getId() . '" value="' . ($formView['ProductClass']->vars['value'] ?: '') . '">';
        }

        // 標準フォームからCSRFトークンを取得
        if (isset($formView['_token'])) {
            $html .= '<input type="hidden" name="_token" value="' . $formView['_token']->vars['value'] . '">';
        }

        // 規格1のセレクトボックス
        if (!empty($classCategories1)) {
            $html .= '<div class="form-group">';
            $html .= '<label>' . ($product->getClassName1() ?: '規格を選択') . '</label>';
            $html .= '<select name="classcategory_id1" id="classcategory_id1_' . $product->getId() . '" class="form-control" required>';
            $html .= '<option value="">選択してください</option>';
            foreach ($classCategories1 as $classCategory) {
                $html .= '<option value="' . $classCategory->getId() . '">' . htmlspecialchars($classCategory->getName()) . '</option>';
            }
            $html .= '</select>';
            $html .= '</div>';
        }

        // 規格2のセレクトボックス
        if (!empty($classCategories2)) {
            $html .= '<div class="form-group">';
            $html .= '<label>' . ($product->getClassName2() ?: '規格2') . '</label>';
            $html .= '<select name="classcategory_id2" id="classcategory_id2_' . $product->getId() . '" class="form-control" required>';
            $html .= '<option value="">選択してください</option>';
            $html .= '</select>';
            $html .= '</div>';
        }

        // ▼ここから追加：注意事項リンク
        $html .= '<p class="review-detail">';
        $html .= '<a href="/user_data/reviewpoint" target="_blank">レビュー特典に関する注意事項はこちら</a>';
        $html .= '</p>';
        // ▲ここまで追加

        // ▼数量の増減を「+」「-」ボタンで（増減幅は1固定）
        $html .= '<div class="form-group quantity-group">';
        $html .= '<div class="quantity-controls">';
        $html .= '<button type="button" class="cart_minus">-</button>';
        $html .= '<input type="number" name="quantity" id="quantity_' . $product->getId() . '" value="1" min="1" class="form-control quantity-input">';
        $html .= '<button type="button" class="cart_plus">+</button>';
        $html .= '</div>';
        $html .= '</div>';
        // ▲ここまで追加

        $html .= '<button type="submit" class="btn btn-primary">カートに入れる</button>';
        $html .= '</form>';
        $html .= '</div>';

        // JavaScript初期化
        $html .= '<script>';
        $html .= 'if (typeof window.eccube === "undefined") window.eccube = {};';
        $html .= 'if (typeof window.eccube.classCategories === "undefined") window.eccube.classCategories = {};';
        $html .= 'window.eccube.classCategories[' . $product->getId() . '] = ' . json_encode($classCategoriesJson) . ';';

        $html .= '
        $(function() {
            var productId = ' . $product->getId() . ';
            var $form = $("#cart_form_" + productId);
            var classCategories = window.eccube.classCategories[productId] || {};
            function updateClassCategory2Options() {
                var id1 = $form.find("#classcategory_id1_" + productId).val();
                var $sele2 = $form.find("#classcategory_id2_" + productId);
                if ($sele2.length) {
                    $sele2.empty();
                    $sele2.append($("<option>").val("").text("選択してください"));
                    if (classCategories[id1]) {
                        for (var key in classCategories[id1]) {
                            var data = classCategories[id1][key];
                            if (data.classcategory_id2 && data.name) {
                                $sele2.append($("<option>").val(data.classcategory_id2).text(data.name));
                            }
                        }
                    }
                }
            }
            function setProductClassId() {
                var id1 = $form.find("#classcategory_id1_" + productId).val();
                var id2 = $form.find("#classcategory_id2_" + productId).val() || "";
                var productClassId = "";
                if (classCategories[id1]) {
                    if ($form.find("#classcategory_id2_" + productId).length) {
                        if (classCategories[id1]["#" + id2]) {
                            productClassId = classCategories[id1]["#" + id2].product_class_id;
                        }
                    } else {
                        for (var key in classCategories[id1]) {
                            if (classCategories[id1][key].product_class_id) {
                                productClassId = classCategories[id1][key].product_class_id;
                                break;
                            }
                        }
                    }
                }
                $form.find("#ProductClass_" + productId).val(productClassId);
            }
            $form.on("change", "#classcategory_id1_" + productId, function() {
                updateClassCategory2Options();
                setProductClassId();
            });
            $form.on("change", "#classcategory_id2_" + productId, setProductClassId);
            // 初期値セット
            updateClassCategory2Options();
            setProductClassId();
        });
        ';
        
        // CartFormExtension初期化
        $html .= 'if (typeof CartFormExtension !== "undefined") {';
        $html .= 'CartFormExtension.initProductForm(' . $product->getId() . ', ' . json_encode($classCategoriesJson) . ');';
        $html .= '}';

        // ProductClassをセットするJS
        $html .= '
        $(function() {
            var $form = $("#cart_form_' . $product->getId() . '");
            var classCategories = window.eccube.classCategories[' . $product->getId() . '] || {};
            function updateClassCategory2Options() {
                var id1 = $form.find("select[name=\'classcategory_id1\']").val();
                var $sele2 = $form.find("select[name=\'classcategory_id2\']");
                if ($sele2.length) {
                    $sele2.empty();
                    $sele2.append($("<option>").val("").text("選択してください"));
                    if (classCategories[id1]) {
                        for (var key in classCategories[id1]) {
                            var data = classCategories[id1][key];
                            if (data.classcategory_id2 && data.name) {
                                $sele2.append($("<option>").val(data.classcategory_id2).text(data.name));
                            }
                        }
                    }
                }
            }
            function setProductClassId() {
                var id1 = $form.find("select[name=\'classcategory_id1\']").val();
                var id2 = $form.find("select[name=\'classcategory_id2\']").val() || "";
                var productClassId = "";
                if (classCategories[id1]) {
                    if ($form.find("select[name=\'classcategory_id2\']").length) {
                        if (classCategories[id1]["#" + id2]) {
                            productClassId = classCategories[id1]["#" + id2].product_class_id;
                        }
                    } else {
                        for (var key in classCategories[id1]) {
                            if (classCategories[id1][key].product_class_id) {
                                productClassId = classCategories[id1][key].product_class_id;
                                break;
                            }
                        }
                    }
                }
                $form.find("input[name=\'ProductClass\']").val(productClassId);
            }
            $form.on("change", "select[name=\'classcategory_id1\']", function() {
                updateClassCategory2Options();
                setProductClassId();
            });
            $form.on("change", "select[name=\'classcategory_id2\']", setProductClassId);
            // 初期値セット
            updateClassCategory2Options();
            setProductClassId();
        });
        ';
        
        // フォームバリデーション関数追加
        $html .= 'function validateCartForm(productId) {';
        $html .= '  var $form = $("#cart_form_" + productId);';
        $html .= '  var productClassField = $form.find("[id^=ProductClass]");';
        $html .= '  if (productClassField.length === 0) {';
        $html .= '    productClassField = $form.find("input[name=\"ProductClass\"]");';
        $html .= '  }';
        $html .= '  if (productClassField.length && !productClassField.val()) {';
        $html .= '    alert("規格を選択してください。");';
        $html .= '    return false;';
        $html .= '  }';
        $html .= '  return true;';
        $html .= '}';
        
        // カートフォーム送信処理
        $html .= '
        $(function() {
            $("#cart_form_' . $product->getId() . '").on("submit", function(e) {
                e.preventDefault();
                var form = this;
                var $form = $(form);
                var productId = ' . $product->getId() . ';
                var productName = form.getAttribute("data-product-name");

                if ($form.data("cartSubmitting")) {
                    return false;
                }
                $form.data("cartSubmitting", true);
                
                if (!validateCartForm(productId)) {
                    $form.data("cartSubmitting", false);
                    return false;
                }
                
                $.ajax({
                    url: form.action,
                    method: "POST",
                    data: $form.serialize(),
                    success: function(response) {
                        // カート追加成功時にモーダル表示
                        if (typeof showCartSuccessModal === "function") {
                            showCartSuccessModal(productId, productName);
                        }
                        // モーダル内の場合は閉じる
                        closeCartModal(productId);
                    },
                    error: function(xhr) {
                        alert("カートへの追加に失敗しました。");
                    },
                    complete: function() {
                        $form.data("cartSubmitting", false);
                    }
                });
                
                return false;
            });
        });
        ';
        
        $html .= '</script>';

        // 数量増減JS（商品ごとに1回だけ出力）
        static $quantityJsAdded = [];
        if (empty($quantityJsAdded[$product->getId()])) {
            $html .= '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var quantityInput = document.getElementById("quantity_' . $product->getId() . '");
        var minusButton = document.querySelector("#cart_form_' . $product->getId() . ' .cart_minus");
        var plusButton = document.querySelector("#cart_form_' . $product->getId() . ' .cart_plus");

        function updateQuantity() {
            var currentValue = parseInt(quantityInput.value, 10) || 1;
            if (currentValue <= 1) {
                minusButton.classList.add("not_zero");
            } else {
                minusButton.classList.remove("not_zero");
            }
        }

        minusButton.addEventListener("click", function() {
            var currentValue = parseInt(quantityInput.value, 10) || 1;
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateQuantity();
            }
        });

        plusButton.addEventListener("click", function() {
            var currentValue = parseInt(quantityInput.value, 10) || 1;
            quantityInput.value = currentValue + 1;
            updateQuantity();
        });

        quantityInput.addEventListener("input", function() {
            var value = parseInt(quantityInput.value, 10);
            if (isNaN(value) || value < 1) {
                quantityInput.value = 1;
            }
            updateQuantity();
        });

        updateQuantity();
    });
    </script>';
            $quantityJsAdded[$product->getId()] = true;
        }

        return $html;
    }

    /**
     * 規格なし商品用のカートフォーム生成
     */
    private function renderSimpleCartForm($product): string
    {
        // 規格なし商品の場合
        $productClasses = $product->getProductClasses();
        $productClass = null;

        foreach ($productClasses as $pc) {
            if (!$pc->getClassCategory1() && !$pc->getClassCategory2() && $pc->isVisible()) {
                $productClass = $pc;
                break;
            }
        }

        if (!$productClass) {
            return '<!-- 商品情報が見つかりません -->';
        }

        $html = '<div class="cart-form-container">';

        // 標準のAddCartTypeフォームを作成してCSRFトークンを取得
        $form = $this->formFactory->create(AddCartType::class, null, [
            'product' => $product,
        ]);
        $formView = $form->createView();

        $html .= '<form method="post" action="' . $this->urlGenerator->generate('product_add_cart', ['id' => $product->getId()]) . '" class="cart-form" id="cart_form_' . $product->getId() . '" data-product-name="' . htmlspecialchars($product->getName()) . '">';

        // 標準フォームからすべての隠しフィールドを取得
        if (isset($formView['product_id'])) {
            $html .= '<input type="hidden" name="product_id" value="' . $formView['product_id']->vars['value'] . '">';
        }
        
        if (isset($formView['ProductClass'])) {
            $html .= '<input type="hidden" name="ProductClass" id="ProductClass_' . $product->getId() . '" value="' . $formView['ProductClass']->vars['value'] . '">';
        }

        // 標準フォームからCSRFトークンを取得
        if (isset($formView['_token'])) {
            $html .= '<input type="hidden" name="_token" value="' . $formView['_token']->vars['value'] . '">';
        }

        // 数量フィールド
        $html .= '<div class="form-group">';
        $html .= '<label>数量</label>';
        if (isset($formView['quantity'])) {
            $html .= '<input type="number" name="quantity" value="1" min="1" class="form-control quantity-input" style="width: 80px;">';
        }
        $html .= '</div>';

        $html .= '<button type="submit" class="btn btn-primary">カートに追加</button>';
        $html .= '</form>';
        $html .= '</div>';

        // 規格なし商品用のAjax処理
        $html .= '<script>
        $(function() {
            $("#cart_form_' . $product->getId() . '").on("submit", function(e) {
                e.preventDefault();
                var form = this;
                var $form = $(form);
                var productId = ' . $product->getId() . ';
                var productName = form.getAttribute("data-product-name");

                if ($form.data("cartSubmitting")) {
                    return false;
                }
                $form.data("cartSubmitting", true);
                
                $.ajax({
                    url: form.action,
                    method: "POST",
                    data: $form.serialize(),
                    success: function(response) {
                        // カート追加成功時にモーダル表示
                        if (typeof showCartSuccessModal === "function") {
                            showCartSuccessModal(productId, productName);
                        }
                        // モーダル内の場合は閉じる
                        if (typeof closeCartModal === "function") {
                            closeCartModal(productId);
                        }
                    },
                    error: function(xhr) {
                        alert("カートへの追加に失敗しました。");
                    },
                    complete: function() {
                        $form.data("cartSubmitting", false);
                    }
                });
                
                return false;
            });
        });
        </script>';

        return $html;
    }

    /**
     * モーダル用JavaScriptを取得
     */
    private function getModalJS(): string
    {
        return '<script>
        function openCartModal(productId) {
            const modal = document.getElementById("cart-modal-" + productId);
            if (modal) {
                modal.style.display = "block";
                document.body.style.overflow = "hidden";
            }
        }

        function closeCartModal(productId) {
            const modal = document.getElementById("cart-modal-" + productId);
            if (modal) {
                modal.style.display = "none";
                document.body.style.overflow = "";
            }
        }

        // ESCキーでモーダルを閉じる
        document.addEventListener("keydown", function(event) {
            if (event.key === "Escape") {
                const modals = document.querySelectorAll(".cart-modal[style*=\'block\']");
                modals.forEach(function(modal) {
                    modal.style.display = "none";
                });
                document.body.style.overflow = "";
            }
        });
        </script>';
    }

    /**
     * カート成功時のJavaScript関数を追加
     */
    public function getCartSuccessJS(): string
    {
        return '<script>
        function showCartSuccessModal(productId, productName) {
            const modal = document.querySelector(".ec-modal");
            const modalHeader = document.getElementById("ec-modal-header");
            const continueBtn = document.getElementById("continue-shopping");
            const cartBtn = document.getElementById("go-to-cart");
            
            if (modal && modalHeader) {
                // モーダルの内容を成功メッセージに変更
                modalHeader.innerHTML = "カートに追加されました";
                modalHeader.classList.add("cart-success");
                
                // ボタンの設定
                if (continueBtn) {
                    continueBtn.onclick = function() {
                        closeCartSuccessModal();
                    };
                }
                
                if (cartBtn) {
                    cartBtn.innerHTML = "カートを見る";
                    cartBtn.onclick = function() {
                        window.location.href = "/cart";
                    };
                }
                
                // モーダルを表示
                modal.style.display = "block";
                document.body.style.overflow = "hidden";
            }
        }
        
        function closeCartSuccessModal() {
            const modal = document.querySelector(".ec-modal");
            if (modal) {
                modal.style.display = "none";
                document.body.style.overflow = "";
                
                // 成功時のスタイルをリセット
                const modalHeader = document.getElementById("ec-modal-header");
                if (modalHeader) {
                    modalHeader.classList.remove("cart-success");
                    modalHeader.style.color = "";
                    modalHeader.innerHTML = "最近見た商品"; // 元のタイトルに戻す
                }
                
                // ボタンも元に戻す
                const cartBtn = document.getElementById("go-to-cart");
                if (cartBtn) {
                    cartBtn.innerHTML = "カートに<br class=\\"br_recent_sp\\">移動する";
                    cartBtn.onclick = null;
                }
            }
        }
        
        // モーダルを閉じる処理を強化
        document.addEventListener("click", function(e) {
            const modal = document.querySelector(".ec-modal");
            
            // ×ボタンまたはオーバーレイクリックで閉じる
            if (e.target.classList.contains("ec-modal-close") || 
                e.target.classList.contains("ec-modal-overlay")) {
                closeCartSuccessModal();
            }
        });
        
        // ESCキーでも閉じられるように
        document.addEventListener("keydown", function(e) {
            if (e.key === "Escape") {
                closeCartSuccessModal();
            }
        });
        </script>';
    }
}