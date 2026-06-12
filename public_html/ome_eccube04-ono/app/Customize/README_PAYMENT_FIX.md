# 代引き手数料の不具合修正について

## 概要
支払い方法の利用条件判定を、「お支払い合計金額」から「商品小計」に変更しました。

## 修正内容

### 修正ファイル
1. `/app/Customize/Form/Type/Shopping/OrderType.php` (新規作成)
   - EC-CUBE標準の `Eccube\Form\Type\Shopping\OrderType` をオーバーライド
   - 支払い方法フィルタリングロジックを変更

2. `/app/Customize/Resource/config/services.yaml` (更新)
   - カスタムOrderTypeをDIコンテナに登録

### 変更箇所

#### 変更前（EC-CUBE標準）
```php
// 138行目・166行目
$charge = $Order->getPayment() ? $Order->getPayment()->getCharge() : 0;
$Payments = $this->filterPayments($Payments, $Order->getPaymentTotal() - $charge);

// filterPayments()内
if (null !== $min && ($total + $charge) < $min) {
    return false;
}
```

**問題点:**
- `getPaymentTotal()` は「商品小計 + 送料 + 手数料 + 税 - 割引」を含む
- 送料が含まれるため、商品小計7000円未満でも送料込みで7000円以上になると手数料無料の判定になってしまう
- 逆に、商品小計6670-6999円の場合、送料込みで7000円以上になり、手数料無料の条件に該当するが、まだ手数料が含まれていないため、合計が7000円未満になり、どの代引きも表示されない

#### 変更後（カスタマイズ版）
```php
// 138行目・164行目
$Payments = $this->filterPayments($Payments, $Order->getSubtotal());

// filterPayments()内
if (null !== $min && $total < $min) {
    return false;
}
```

**改善点:**
- `getSubtotal()` は「商品小計」のみを返す
- 送料や手数料を含まない金額で判定するため、正しい支払い方法が表示される
- 手数料の加算判定を削除（商品小計のみで判定）

## 期待される動作

### 設定前提
- 代金引換（手数料あり330円）：利用条件 0円～6999円
- 代金引換（手数料無料）：利用条件 7000円～300000円
- 送料：1～6999円は770円、7000円以上は無料

### テストケース

#### ケース1: 商品小計 6000円
- **期待:** 代金引換（手数料あり330円）が表示される
- **結果:** 最終金額 = 6000円 + 770円（送料） + 330円（手数料） = 7100円

#### ケース2: 商品小計 6800円（修正前は表示されなかった）
- **期待:** 代金引換（手数料あり330円）が表示される
- **結果:** 最終金額 = 6800円 + 770円（送料） + 330円（手数料） = 7900円

#### ケース3: 商品小計 7000円
- **期待:** 代金引換（手数料無料）が表示される
- **結果:** 最終金額 = 7000円 + 0円（送料無料） + 0円（手数料無料） = 7000円

## デプロイ手順

1. キャッシュクリア
```bash
php bin/console cache:clear
```

2. ブラウザのキャッシュもクリア

## ロールバック方法

カスタマイズを無効化する場合は、以下のファイルを削除またはコメントアウトしてください：

1. `/app/Customize/Form/Type/Shopping/OrderType.php` を削除
2. `/app/Customize/Resource/config/services.yaml` 内の以下の部分をコメントアウト:
```yaml
# Customize\Form\Type\Shopping\OrderType:
#   decorates: Eccube\Form\Type\Shopping\OrderType
#   arguments:
#     - '@Eccube\Repository\OrderRepository'
#     - '@Eccube\Repository\DeliveryRepository'
#     - '@Eccube\Repository\PaymentRepository'
#     - '@Eccube\Repository\BaseInfoRepository'
#     - '@Eccube\Request\Context'
```

3. キャッシュクリア
```bash
php bin/console cache:clear
```

## 関連Issue
- Issue番号: [該当Issueへのリンク]
- PR番号: [該当PRへのリンク]
