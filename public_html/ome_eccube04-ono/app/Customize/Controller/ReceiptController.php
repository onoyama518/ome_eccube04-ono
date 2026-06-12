<?php

namespace Customize\Controller;

use Eccube\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use setasign\Fpdi\Tcpdf\Fpdi;

class ReceiptController extends AbstractController
{
    /**
     * 領収書のHTML表示.
     *
     * @Route("/mypage/receipt/{id}", name="mypage_receipt", methods={"GET"})
     */
    public function detail(Order $Order): Response
    {
        $allowedStatuses = ['発送済み'];
        $returnStatuses = ['返品済み'];

        // 発送済みでない場合
        if (!in_array($Order->getOrderStatus()->getName(), $allowedStatuses, true)) {
            $this->addFlash('error', '領収書は発送済みの注文のみダウンロード可能です。');
            return $this->redirectToRoute('homepage');
        }

        // 返品済みの場合
        if (in_array($Order->getOrderStatus()->getName(), $returnStatuses, true)) {
            $this->addFlash('error', '返品済みの注文は領収書をダウンロードできません。');
            return $this->redirectToRoute('homepage');
        }

        return $this->render('@user_data/Mypage/receipt.twig', [
            'Order' => $Order,
            'issue_date' => (new \DateTime())->format('Y/m/d'),
        ]);
    }


    /**
     * 領収書のPDFダウンロード.
     *
     * @Route("/mypage/receipt-pdf/{id}", name="mypage_receipt_pdf", methods={"GET"})
     */
    public function downloadPdf(Order $Order): Response
    {
        $pdf = new Fpdi();
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->SetMargins(10, 10);
        $pdf->AddPage();




        $imageUrl = 'html/template/default/assets/img/ome_receipt_logo.jpg';
        $auth = base64_encode('mg:view');
        $context = stream_context_create([
            'http' => [
                'header' => "Authorization: Basic $auth"
            ]
        ]);
        $imageData = file_get_contents($imageUrl, false, $context);
        if ($imageData !== false) {
            $pdf->Image('@' . $imageData, 10, 5, 70);
        } else {
            // エラーハンドリング
        }


        $pdf->SetXY(10, 10);
        $pdf->SetFont('kozgopromedium', '', 10);
        $shipping = $Order->getShippings()[0];
        if ($shipping && $shipping->getShippingDate() !== null) {
            $formattedDate = $shipping->getShippingDate()->format('Y年m月d日');
        } else {
            $formattedDate = '日付が設定されていません';
        }
        $pdf->Cell(0, 5, '発行日：' . $formattedDate, 0, 1, 'R');


        // タイトル

        $pdf->SetFont('kozgopromedium', 'B', 14);
        $pdf->Ln(15);
        $pdf->Cell(0, 10, '領収書', 0, 1, 'C');

        // 注文者情報と店舗情報
        $pdf->SetFont('kozgopromedium', '', 10);
        $pdf->Ln(5);
        $customerInfo = "{$Order->getCompanyName()}\n" // 会社名
            . "{$Order->getCustomer()->getName01()} {$Order->getCustomer()->getName02()} 様\n" // 名前
            . "ご注文日：" . $Order->getOrderDate()->format('Y年m月d日') . "\n" // 注文日
            . "ご注文番号：" . $Order->getOrderNo() . "\n" // 注文番号
            . "ご注文状況：" . $Order->getOrderStatus()->getName() . "\n" // 注文状況
            . "下記の通り領収致しました。"; // 固定メッセージ
        $pdf->MultiCell(150, 6, $customerInfo, 0, 'L');

        $pdf->Ln(5);
        $shopInfo = "株式会社kichi\n"
            . "〒550-0013\n"
            . "大阪市西区新町1-4-26\n"
            . "四ツ橋グランドビル8F\n"
            . "TEL：0120-965-583\n"
            . "E-mail：info@ome-shouzai.com\n"
            . "登録番号：T7120001117915";
        $pdf->SetXY(140, 46);
        $pdf->SetFont('kozgopromedium', '', 10);
        $pdf->MultiCell(60, 6, $shopInfo, 0, 'L');

        // ハンコ
        $imageUrl = 'html/template/default/assets/img/company_kakuin.png';
        $auth = base64_encode('mg:view');
        $context = stream_context_create([
            'http' => [
                'header' => "Authorization: Basic $auth"
            ]
        ]);
        $imageData = file_get_contents($imageUrl, false, $context);
        if ($imageData !== false) {
            $pdf->Image('@' . $imageData, 180, 45, 20);
        } else {
            // エラーハンドリング
        }
        // 商品情報テーブル
        $pdf->Ln(10);
        $pdf->SetLineWidth(0.3);
        $pdf->SetFont('kozgopromedium', '', 12);
        $pdf->Cell(190, 10, 'ご購入商品情報', 'B', 1, 'L');

        // 商品情報
        $pdf->SetFont('kozgopromedium', 'B', 10);
        $pdf->Ln(5);

        $pdf->SetLineWidth(0.1);
        $pdf->Cell(80, 6, '商品名', 1, 0, 'L');
        $pdf->Cell(55, 6, '価格', 1, 0, 'L');
        $pdf->Cell(55, 6, '小計', 1, 1, 'L');

        $pdf->SetFont('kozgopromedium', '', 10);
        foreach ($Order->getShippings() as $shipping) {
            foreach ($shipping->getProductOrderItems() as $item) {
                $productName = $item->getProductName();
                $pricePerUnit = $item->getPriceIncTax(); // 単価
                $quantity = $item->getQuantity(); // 数量
                $price = "¥" . number_format($pricePerUnit) . " × " . $quantity; // 単価 × 数量
                $subtotal = "¥" . number_format($pricePerUnit * $quantity); // 小計

                // 商品名を折り返し表示
                $pdf->SetLineWidth(0.1);
                $startX = $pdf->GetX(); // 現在のX位置を取得
                $startY = $pdf->GetY(); // 現在のY位置を取得

                $pdf->MultiCell(80, 5, $productName, 1, 'L'); // 商品名を折り返し表示

                $currentY = $pdf->GetY(); // MultiCell後のY位置を取得
                $height = $currentY - $startY; // 高さを計算

                // 他のセルを同じ高さに調整
                $pdf->SetXY($startX + 80, $startY); // 次のセル位置に移動
                $pdf->Cell(55, $height, $price, 1, 0, 'L'); // 「価格（数量含む）」を表示
                $pdf->Cell(55, $height, $subtotal, 1, 1, 'L'); // 小計を表示
            }
        }


        // 合計金額
        $pdf->Ln(5);

        // 小計
        $subtotal = number_format($Order->getSubtotal());
        $pdf->Cell(140, 6, '小計：', 0, 0, 'R');
        $pdf->Cell(50, 6, "¥{$subtotal}", 0, 1, 'R');

        // 課税割引項目
        foreach ($Order->getTaxableDiscountItems() as $item) {
            $productName = $item->getProductName();
            $totalPrice = number_format($item->getTotalPrice());
            $pdf->Cell(140, 6, "{$productName}：", 0, 0, 'R');
            $pdf->Cell(50, 6, "¥{$totalPrice}", 0, 1, 'R');
        }

        // 非課税割引項目
        foreach ($Order->getTaxFreeDiscountItems() as $item) {
            $productName = $item->getProductName();
            $totalPrice = number_format($item->getTotalPrice());
            $pdf->Cell(140, 6, "{$productName}：", 0, 0, 'R');
            $pdf->Cell(50, 6, "¥{$totalPrice}", 0, 1, 'R');
        }

        // 送料
        $deliveryFee = number_format($Order->getDeliveryFeeTotal());
        $pdf->Cell(140, 6, '送料：', 0, 0, 'R');
        $pdf->Cell(50, 6, "¥{$deliveryFee}", 0, 1, 'R');

        // 手数料
        $charge = number_format($Order->getCharge());
        $pdf->Cell(140, 6, '手数料：', 0, 0, 'R');
        $pdf->Cell(50, 6, "¥{$charge}", 0, 1, 'R');

        // 合計
        $total = number_format($Order->getPaymentTotal());
        $pdf->Cell(140, 6, '合計：', 0, 0, 'R');
        $pdf->Cell(50, 6, "¥{$total} ( 税込 )", 0, 1, 'R');

        // 税率10%対象
        $tax = floor($Order->getPaymentTotal() / 1.1 * 0.1);
        $taxFormatted = number_format($tax);
        $pdf->Cell(140, 6, '税率10%対象：', 0, 0, 'R');
        $pdf->Cell(50, 6, "¥{$total} ( 内消費税 ¥{$taxFormatted} )", 0, 1, 'R');




        // 配送情報
        $pdf->Ln(5);
        $pdf->SetFont('kozgopromedium', '', 12);

        $pdf->SetLineWidth(0.3);
        $pdf->Cell(0, 10, '配送情報', 'B', 1, 'L');

        $pdf->SetFont('kozgopromedium', '', 10);
        foreach ($Order->getShippings() as $shipping) {
            $pdf->Ln(5);

            // 基本情報（会社名、名前、住所、電話番号）
            $shippingInfo = "";
            if ($shipping->getCompanyName()) {
                $shippingInfo .= "{$shipping->getCompanyName()}\n";
            }
            $shippingInfo .=
                "{$shipping->getName01()} {$shipping->getName02()} 様\n"
                . "〒{$shipping->getPostalCode()}\n"
                . "{$shipping->getPref()}{$shipping->getAddr01()}{$shipping->getAddr02()}\n"
                . "TEL：{$shipping->getPhoneNumber()}";

            $pdf->MultiCell(0, 6, $shippingInfo, 0, 'L');

            // 配送方法
            if (!empty($shipping->getShippingDeliveryName())) {
                $pdf->Cell(0, 6, "配送方法：{$shipping->getShippingDeliveryName()}", 0, 1, 'L');
            }
        }


        // 支払い情報
        $pdf->Ln(5);
        $pdf->SetFont('kozgopromedium', '', 12);
        $pdf->SetLineWidth(0.3); // 線の太さを0.5mmに設定
        $pdf->Cell(0, 10, 'お支払い情報', 'B', 1, 'L');

        $pdf->SetFont('kozgopromedium', '', 10);
        $pdf->Ln(5);
        $pdf->Cell(0, 6, $Order->getPayment()->getMethod(), 0, 1, 'L');


        // PDF出力
        $pdfFileName = 'receipt-' . $Order->getId() . '.pdf';
        return new Response(
            $pdf->Output($pdfFileName, 'S'),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $pdfFileName . '"',
            ]
        );
    }
}
