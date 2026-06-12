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

namespace Eccube\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\Product;
use Plugin\ProductReview42\Repository\ProductReviewRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;

class TopController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var ProductReviewRepository
     */
    protected $productReviewRepository;

    /**
     * TopController constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param ProductReviewRepository $productReviewRepository
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        ProductReviewRepository $productReviewRepository
    ) {
        $this->entityManager = $entityManager;
        $this->productReviewRepository = $productReviewRepository;
    }

    /**
     * @Route("/", name="homepage", methods={"GET"})
     * @Template("index.twig")
     */
    public function index()
    {
        // --- レビュー対象商品IDの動的取得 ---
        // テンプレートで render_review_block が使用される商品IDを取得
        $reviewTargetProductIds = $this->getReviewTargetProductIds();

        $rankingAvgList = [];
        $rankingCountList = [];

        foreach ($reviewTargetProductIds as $productId) {
            try {
                // EntityManager の find メソッドを使用
                $Product = $this->entityManager->find(Product::class, $productId);
                if ($Product) {
                    $avgResult = $this->productReviewRepository->getAvgAll($Product);
                    $rankingAvgList[$productId] = $avgResult['recommend_avg'] ?? 0;
                    $rankingCountList[$productId] = $avgResult['review_count'] ?? 0;
                } else {
                    $rankingAvgList[$productId] = 0;
                    $rankingCountList[$productId] = 0;
                }
            } catch (\Exception $e) {
                // エラーが発生した場合は0を設定
                $rankingAvgList[$productId] = 0;
                $rankingCountList[$productId] = 0;
            }
        }

        return [
            'RankingReviewAvgList' => $rankingAvgList,
            'RankingReviewCountList' => $rankingCountList,
        ];
    }

    /**
     * レビュー対象商品IDリストを取得
     * 各種ブロックテンプレートで render_review_block が使用されている商品IDを返す
     * 将来的には管理画面から設定可能にするため、メソッド化
     *
     * @return array
     */
    private function getReviewTargetProductIds()
    {
        // EC-CUBEのプロジェクトルートを基準にテンプレートパスを構築
        $projectRoot = dirname(dirname(dirname(__DIR__))); // src/Eccube/Controller から3階層上
        
        // 複数のテンプレートファイルから商品IDを抽出
        $templatePaths = [
            $projectRoot . '/app/template/default/Block/2019_recommend_item.twig', // おすすめ商品ブロック
            $projectRoot . '/app/template/default/Block/2019_ranking.twig',        // ランキングブロック  
            $projectRoot . '/app/template/default/Block/2019_review.twig',         // レビューブロック（もし存在する場合）
        ];
        
        $allProductIds = [];
        
        // 各テンプレートファイルから商品IDを抽出
        foreach ($templatePaths as $templatePath) {
            $extractedIds = $this->extractProductIdsFromTemplate($templatePath);
            $allProductIds = array_merge($allProductIds, $extractedIds);
        }
        
        // 重複を除去
        $allProductIds = array_unique($allProductIds);
        
        if (!empty($allProductIds)) {
            return $allProductIds;
        }

        // フォールバック - テンプレートから抽出できない場合の手動設定
        // 全ブロックテンプレートで render_review_block が使用されている商品ID
        return [
            // 2019_recommend_item.twig から
            299, // ACクレンジングジェル
            13,  // アミノPro
            301, // BUセッティングクリーム1&2
            272, // ACアイライナー ブラック
            310, // BUクリアグルー
            
            // 2019_ranking.twig から
            27,  // ACマスカラ（アフターケアマスカラ）ブラック 12本セット
            14,  // ケラチンPro
            300, // BUスタイリングクリーム1&2
            
            // 2019_review.twig から
            267, // ACマスカラ ブラウン
            279, // ACアイライナーブラックブラウン6本セット
            200,  // 国産ツイーザー
            // 272, // ACアイライナー ブラック (既に上記に含まれている)
        ];
    }

    /**
     * テンプレートファイルからrender_review_blockで使用されている商品IDを抽出
     * 各種ブロックテンプレートで render_review_block(商品ID, RankingReviewAvgList, RankingReviewCountList) 
     * の形で記述されている商品IDを抽出する
     *
     * @param string $templatePath テンプレートファイルのパス
     * @return array 商品IDの配列
     */
    private function extractProductIdsFromTemplate($templatePath)
    {
        try {
            if (!file_exists($templatePath)) {
                return [];
            }

            $templateContent = file_get_contents($templatePath);
            $productIds = [];

            // render_review_block(商品ID, RankingReviewAvgList, RankingReviewCountList) のパターンを検索
            $pattern = '/render_review_block\(\s*(\d+)\s*,\s*RankingReviewAvgList\s*,\s*RankingReviewCountList\s*\)/';
            
            if (preg_match_all($pattern, $templateContent, $matches)) {
                foreach ($matches[1] as $productId) {
                    $productIds[] = (int)$productId;
                }
            }

            // Also support item.id calls backed by Twig arrays:
            // {% set ranking_items = [{ id: 301, ... }] %}
            if (preg_match_all('/\bid\s*:\s*(\d+)\b/', $templateContent, $matches)) {
                foreach ($matches[1] as $productId) {
                    $productIds[] = (int)$productId;
                }
            }

            // 重複を除去して返す
            return array_unique($productIds);

        } catch (\Exception $e) {
            // エラーが発生した場合は空配列を返す
            return [];
        }
    }
}
