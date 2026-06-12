<?php

namespace Eccube\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class StarExtension extends AbstractExtension
{
  public function getFunctions()
  {
    return [
      new TwigFunction('render_stars', [$this, 'renderStarsHtml'], ['is_safe' => ['html']]),
      new TwigFunction('render_review_block', [$this, 'renderReviewBlockHtml'], ['is_safe' => ['html']]),
      new TwigFunction('render_review_block_simple', [$this, 'renderReviewBlockSimpleHtml'], ['is_safe' => ['html']]),
      new TwigFunction('render_related_review_block', [$this, 'renderRelatedReviewBlockHtml'], ['is_safe' => ['html']]), // ★追加
    ];
  }

  public function renderStarsHtml(float $avg): string
  {
    $html = '<ul class="rating-stars">';

    // 平均点を0〜5に制限
    $avg = max(0, min($avg, 5));

    // 星は「表示される値（小数1位に丸めた値）」を基準に決定する
    // 表示値を先に小数1位で丸めることで、数値表示と星表示の一貫性を保つ
    $displayAvg = (float) round($avg, 1);
    $integerPart = (int) floor($displayAvg);
    // 小数部を百分率で取得（浮動小数点誤差回避）
    $dec = (int) round(($displayAvg - $integerPart) * 100);

    if ($dec <= 20) {
      $rounded = $integerPart;
    } elseif ($dec >= 80) {
      $rounded = $integerPart + 1;
    } elseif ($dec >= 30 && $dec <= 70) {
      $rounded = $integerPart + 0.5;
    } else {
      // dec in 21-29 or 71-79 -> 21-29 -> floor, 71-79 -> ceil
      if ($dec < 50) {
        $rounded = $integerPart;
      } else {
        $rounded = $integerPart + 1;
      }
    }

    $full = (int) floor($rounded);
    $r2 = (int) round($rounded * 2);
    $has_half = ($r2 % 2) === 1;
    $total = $full + ($has_half ? 1 : 0);
    $empty = max(0, 5 - $total);

    for ($i = 0; $i < $full; $i++) {
      $html .= '<li class="star-part full"></li>';
    }

    if ($has_half) {
      $html .= '<li class="star-part fh"></li>';
    }

    for ($i = 0; $i < $empty; $i++) {
      $html .= '<li class="star-part lh"></li>';
    }

    $html .= '</ul>';
    return $html;
  }


  public function renderReviewBlockHtml($productId, $avgList = [], $countList = []): string
  {
    $avg = isset($avgList[$productId]) ? $avgList[$productId] : 0;
    $count = isset($countList[$productId]) ? $countList[$productId] : 0;
    $url = sprintf('/products/detail/%d#customervoice_area', $productId);

    return $this->buildReviewHtml($avg, $count, $url);
  }

  public function renderReviewBlockSimpleHtml(float $avg, int $count, string $url = '#customervoice_area'): string
  {
    return $this->buildReviewHtml($avg, $count, $url);
  }

  // ★追加：関連商品用
  public function renderRelatedReviewBlockHtml($productId, $avgList = [], $countList = [], string $url = ''): string
  {
    $avg = isset($avgList[$productId]) ? $avgList[$productId] : 0;
    $count = isset($countList[$productId]) ? $countList[$productId] : 0;

    return $this->buildReviewHtml($avg, $count, $url);
  }

  private function buildReviewHtml(float $avg, int $count, string $url): string
  {
    $starsHtml = $this->renderStarsHtml($avg);
    
    // レビュー件数が0件の場合は「-」を表示、それ以外は数値を表示
    $avgFormatted = ($count === 0) ? '-' : number_format($avg, 1);

    return sprintf(
      '%s
            <span class="review-avg">%s</span>
            <span class="review-count">（%d件）</span>
            <a href="%s" class="review-link">レビューを見る</a>',
      $starsHtml,
      $avgFormatted,
      $count,
      $url
    );
  }
}
